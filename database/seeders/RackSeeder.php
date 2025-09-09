<?php

namespace Database\Seeders;

use App\Models\Rack\Rack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::connection('sqlsrv')->table('tblrak')->get();

        foreach ($data as $item) {
            Rack::insert([
                'rack_no' => $item->norak,
                'part_no' => $item->partno,
                'product_code' => $item->kodeproduk,
                'status' => $item->ket == 0 ? 1 : 0,
            ]);
        }
    }
}
