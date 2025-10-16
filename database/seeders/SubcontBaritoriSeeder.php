<?php

namespace Database\Seeders;

use App\Models\Master\SubcontBaritori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcontBaritoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::connection('sqlsrv')->table('subcontbaritori')->get();

        $this->command->withProgressBar($data, function ($item) {
            SubcontBaritori::insert([
                'name' => $item->nama,
            ]);
        });

        $this->command->newLine();
        $this->command->info('✅ Subcont Baritori seeding selesai!');
    }
}
