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
            // 1. Ambil produk AKTIF (misal dapat 128 baris)
            $allProducts = Product::with('prodName')
                ->where('is_active', 1)
                ->orderBy('part_no')
                ->get();
            
            // 2. Filter agar UNIK (aman jika ada duplikat)
            $products = $allProducts->unique('part_no');

            // Ambil semua part_no yang relevan (128 part_no)
            $partNumbers = $products->pluck('part_no');

            // 3. Hitung SEMUA saldo awal (1 query)
            $saldoAwalProducts = Product::whereIn('part_no', $partNumbers)
                ->where('date_begining_balance', '<', $tglAwal)
                ->select('part_no', DB::raw('SUM(begining_balance) as total_saldo'))
                ->groupBy('part_no')
                ->get()->keyBy('part_no'); // keyBy agar mudah dicari

            // 4. Hitung SEMUA masuk awal (1 query)
            $masukAwal = StockIn::whereIn('part_no', $partNumbers)
                ->where('created_at', '<', $tglAwal)
                ->select('part_no', DB::raw('SUM(qty) as total_masuk'))
                ->groupBy('part_no')
                ->get()->keyBy('part_no');

            // 5. Hitung SEMUA keluar awal (1 query)
            $keluarAwal = StockOut::whereIn('part_no', $partNumbers)
                ->where('created_at', '<', $tglAwal)
                ->select('part_no', DB::raw('SUM(qty) as total_keluar'))
                ->groupBy('part_no')
                ->get()->keyBy('part_no');

            // 6. Hitung SEMUA masuk periode ini (1 query)
            $masuk = StockIn::whereIn('part_no', $partNumbers)
                ->whereBetween('created_at', [$tglAwal, $tglAkhir])
                ->select('part_no', DB::raw('SUM(qty) as total_masuk'))
                ->groupBy('part_no')
                ->get()->keyBy('part_no');

            // 7. Hitung SEMUA keluar periode ini (1 query)
            $keluar = StockOut::whereIn('part_no', $partNumbers)
                ->whereBetween('created_at', [$tglAwal, $tglAkhir])
                ->select('part_no', DB::raw('SUM(qty) as total_keluar'))
                ->groupBy('part_no')
                ->get()->keyBy('part_no');

            
            Stock::where('created_by', $user)->delete();
            $lastGenerate = now()->format('Y-m-d H:i');
            $stockData = [];

            // 8. Loop di PHP (Hanya 128 kali, SANGAT CEPAT, tidak ada query)
            //    Gunakan ->values() untuk reset key array setelah unique()
            foreach ($products->values() as $product) { 
                $part_no = $product->part_no;

                // Ambil data dari koleksi (BUKAN query)
                $sAwal = $saldoAwalProducts->get($part_no)?->total_saldo ?? 0;
                $mAwal = $masukAwal->get($part_no)?->total_masuk ?? 0;
                $kAwal = $keluarAwal->get($part_no)?->total_keluar ?? 0;
                $m = $masuk->get($part_no)?->total_masuk ?? 0;
                $k = $keluar->get($part_no)?->total_keluar ?? 0;
                
                $saldoAwalTotal = $sAwal + $mAwal - $kAwal;
                $closing = $saldoAwalTotal + $m - $k;

                $stockData[] = [
                    'part_no' => $part_no,
                    'part_name' => $product->prodName?->part_name,
                    'begining_balance' => $saldoAwalTotal,
                    'stock_in' => $m,
                    'stock_out' => $k,
                    'closing_balance' => $closing,
                    'created_by' => $user,
                    'last_generated_at' => $lastGenerate,
                    'periode' => now(),
                ];
            }

            // 9. Upsert 128 data (Total hanya ~7 query)
            $query = Stock::upsert(
                $stockData,
                ['part_no', 'created_by'],
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
