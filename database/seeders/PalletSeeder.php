<?php

namespace Database\Seeders;

use App\Models\Master\Pallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Console\Concerns\InteractsWithIO;

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

        $this->command->withProgressBar($grouped, function ($items, $palletNo) {
            // Prioritas: ambil yang aktif dulu, jika tidak ada, ambil salah satu yang tidak aktif
            $itemToInsert = $items->firstWhere('aktif', 1) ?? $items->first();

            Pallet::create([
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
        });

        $this->command->newLine();
        $this->command->info('✅ Pallet seeding selesai!');
    }
}
