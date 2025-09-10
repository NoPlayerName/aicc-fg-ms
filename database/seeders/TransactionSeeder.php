<?php

namespace Database\Seeders;

use App\Models\Transaction\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Console\Concerns\InteractsWithIO;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = DB::connection('pallet')->table('transaksi')->count();

        $this->command->getOutput()->progressStart($total);
        DB::connection('pallet')->table('transaksi')
            ->orderBy('id')
            ->chunk(1000, function ($rows) {
                $insertData = [];

                foreach ($rows as $item) {
                    $insertData[] = [
                        'pallet_no' => $item->nopallet,
                        'location' => $item->lokasi,
                        'product' => $item->produk,
                        'status' => ($item->masuk == 0 && $item->keluar == 1) ? 0 : 1,
                        'created_at' => $item->createdatetime,
                    ];
                    $this->command->getOutput()->progressAdvance();
                }

                // insert sekaligus per 1000 record
                Transaction::insert($insertData);
            });

        $this->command->getOutput()->progressFinish();
        $this->command->info('✅ Transaction seeding selesai!');

        // $this->command->withProgressBar($data, function ($item) {
        //     Transaction::insert([
        //         'pallet_no' => $item->nopallet,
        //         'location' => $item->lokasi,
        //         'product' => $item->produk,
        //         'status' => ($item->masuk == 0 && $item->keluar == 1) ? 0 : 1,
        //         'created_at' => $item->createdatetime,
        //     ]);
        // });
        // $this->command->newLine();
        // $this->command->info('✅ Transaction seeding selesai!');

    }
}
