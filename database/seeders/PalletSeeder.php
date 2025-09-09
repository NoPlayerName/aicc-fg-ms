<?php

namespace Database\Seeders;

use App\Models\Pallet\Pallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = DB::connection('pallet')->table('pallet')->get();

        // Kelompokkan berdasarkan pallet_no
        $grouped = $data->groupBy('nopallet');

        foreach ($grouped as $palletNo => $items) {
            // Prioritas: ambil yang aktif dulu, jika tidak ada, ambil salah satu yang tidak aktif
            $itemToInsert = $items->firstWhere('aktif', 1) ?? $items->first();

            Pallet::insert([
                'pallet_no'   => $itemToInsert->nopallet,
                'pallet_type' => $itemToInsert->typepallet,
                'name'        => $itemToInsert->namapallet,
                'color'       => $itemToInsert->warna,
                'customer'    => $itemToInsert->cust,
                'product'     => $itemToInsert->produk,
                'status'      => $itemToInsert->masuk == 0 ? 0 : 1,
                'is_active'   => $itemToInsert->aktif,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
