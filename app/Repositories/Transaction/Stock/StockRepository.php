<?php

namespace App\Repositories\Transaction\Stock;

use App\Enums\StatusStockEnums;
use App\Models\Master\Product;
use App\Models\Transaction\Stock;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction\StockIn;
use App\Models\Transaction\StockOut;
use Carbon\Carbon;

class StockRepository implements StockRepositoryInterface
{

    public function getData($data)
    {
        // $tglAwal  = Carbon::parse($data->startDate);
        // $tglAkhir = Carbon::parse($data->endDate);

        $user = auth()->user()->usr;

        $query = Stock::where('created_by', $user);

        if (!empty($data->search)) {
            $query->where(function ($q) use ($data) {
                $q->where('part_no', 'like', '%' . $data->search . '%')
                    ->orWhere('part_name', 'like', '%' . $data->search . '%');
            });
        }

        return $query;
    }

    public function generateStock($data)
    {
        $tglAwal  = Carbon::parse($data->startDate);
        $tglAkhir = Carbon::parse($data->endDate);
        $user = auth()->user()->usr;

        DB::beginTransaction();
        try {
            // Ambil product aktif
            $products = Product::with('prodName')
                ->where('is_active', 1)->get();
            // ->when($data->search, function ($q) use ($data) {
            //     $q->where(function ($q2) use ($data) {
            //         $q2->where('part_no', 'like', '%' . $data->search . '%')
            //             ->orWhereHas('prodName', function ($q3) use ($data) {
            //                 $q3->where('part_name', 'like', '%' . $data->search . '%');
            //             });
            //     });
            // })


            Stock::where('created_by', $user)->delete();
            $lastGenerate = now()->format('Y-m-d H:i');
            // Hitung stock per produk
            $stockData = $products->map(function ($product) use ($tglAwal, $tglAkhir, $user, $lastGenerate) {
                $saldoAwal = Product::where('part_no', $product->part_no)
                    ->where('date_begining_balance', '<', $tglAwal)
                    ->sum('begining_balance');

                $masukAwal = StockIn::where('part_no', $product->part_no)
                    ->where('created_at', '<', $tglAwal)
                    ->sum('qty');

                $keluarAwal = StockOut::where('part_no', $product->part_no)
                    ->where('created_at', '<', $tglAwal)
                    ->sum('qty');

                $masuk = StockIn::where('part_no', $product->part_no)
                    ->whereBetween('created_at', [$tglAwal, $tglAkhir])
                    ->sum('qty');

                $keluar = StockOut::where('part_no', $product->part_no)
                    ->whereBetween('created_at', [$tglAwal, $tglAkhir])
                    ->sum('qty');

                $saldoAwalTotal = $saldoAwal + $masukAwal - $keluarAwal;
                $closing = $saldoAwalTotal + $masuk - $keluar;

                return [
                    'part_no' => $product->part_no,
                    'part_name' => $product->prodName?->part_name,
                    'begining_balance' => $saldoAwalTotal,
                    'stock_in' => $masuk,
                    'stock_out' => $keluar,
                    'closing_balance' => $closing,
                    'created_by' => $user, // key unik per periode
                    'last_generated_at' => $lastGenerate,
                    'periode' => now(),
                ];
            })->toArray();

            // Upsert sekaligus insert/update
            $query = Stock::upsert(
                $stockData,
                ['part_no', 'created_by'], // key unik lengkap
                ['part_name', 'begining_balance', 'stock_in', 'stock_out', 'closing_balance', 'last_generated_at']
            );

            DB::commit();
            return $query;
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Sync stock gagal',
                'error'   => $th->getMessage(),
            ], 500);
        }
    }
}
