<?php

namespace Database\Seeders;

use App\Models\Transaction\StockOut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Console\Concerns\InteractsWithIO;
use Illuminate\Support\Facades\DB;


class StockOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::connection('sqlsrv')->table('tblkeluar')->get();

        $this->command->withProgressBar($data, function ($item) {
            StockOut::insert([
                'part_no'    => $item->partno,
                'part_name'  => $item->partname,
                'pallet_no'  => $item->idpallet,
                'qty'        => $item->qty,
                'rack_no'    => $item->norak,
                'desc'       => $item->ket,
                'created_by' => $item->createuser,
                'created_at' => $item->createdatetime,
            ]);
        });

        $this->command->newLine();
        $this->command->info('✅ StockOut seeding selesai!');
    }
}
