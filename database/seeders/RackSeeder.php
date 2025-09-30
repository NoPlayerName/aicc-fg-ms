<?php

namespace Database\Seeders;

use App\Models\Master\Rack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Console\Concerns\InteractsWithIO;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::connection('sqlsrv')->table('tblrak')->get();

        $this->command->withProgressBar($data, function ($item) {
            Rack::create([
                'rack_no'    => $item->norak,
                'part_no'    => $item->partno,
                'product_code' => $item->kodeproduk,
                'status'     => $item->ket == 0 ? 1 : 0,
            ]);
        });
        $this->command->newLine();
        $this->command->info('✅ Rack seeding selesai!');
    }
}
