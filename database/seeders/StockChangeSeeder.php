<?php

namespace Database\Seeders;

use App\Models\Transaction\StockChange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Console\Concerns\InteractsWithIO;

class StockChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::connection('sqlsrv')->table('tblbatal')->get();
        $this->command->withProgressBar($data, function ($item) {
            StockChange::insert([
                'form_no'    => $item->noform,
                'pallet_no'  => $item->idpallet,
                'part_no'    => $item->partno,
                'part_name'  => $item->partname,
                'product_code' => $item->kodeproduk,
                'qty'        => $item->qty,
                'customer'   => $item->customer,
                'desc'       => $item->ket,
                'created_by' => $item->createuser,
                'created_at' => $item->createdatetime,
            ]);
        });

        $this->command->newLine();
        $this->command->info('✅ StockChange seeding selesai!');
    }
}
