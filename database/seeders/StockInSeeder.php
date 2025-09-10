<?php

namespace Database\Seeders;

use App\Models\Transaction\StockIn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Console\Concerns\InteractsWithIO;

class StockInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::connection('sqlsrv')->table('tblmasuk')->get();

        $this->command->withProgressBar($data, function ($item) {
            StockIn::insert([
                'part_no'    => $item->partno,
                'part_name'  => $item->partname,
                'pallet_no'  => $item->idpallet,
                'qty'        => $item->qty,
                'rack_no'    => $item->norak,
                'status'     => $item->mark == 'x' ? 0 : 1,
                'desc'       => $item->ket,
                'created_by' => $item->createuser,
                'created_at' => $item->createdatetime,
            ]);
        });

        $this->command->newLine();
        $this->command->info('✅ StockIn seeding selesai!');
    }
}
