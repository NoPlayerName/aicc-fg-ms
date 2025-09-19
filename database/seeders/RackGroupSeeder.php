<?php

namespace Database\Seeders;

use App\Models\Master\RackGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Console\Concerns\InteractsWithIO;

class RackGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['group' => 1, 'group_rack' => 'E3', 'priority' => 1],
            ['group' => 1, 'group_rack' => 'F3', 'priority' => 1],
            ['group' => 1, 'group_rack' => 'G3', 'priority' => 1],
            ['group' => 1, 'group_rack' => 'B3', 'priority' => 2],
            ['group' => 2, 'group_rack' => 'C1', 'priority' => 1],
            ['group' => 2, 'group_rack' => 'D1', 'priority' => 1],
            ['group' => 2, 'group_rack' => 'E1', 'priority' => 1],
            ['group' => 2, 'group_rack' => 'F1', 'priority' => 1],
            ['group' => 2, 'group_rack' => 'G1', 'priority' => 1],
            ['group' => 2, 'group_rack' => 'B1', 'priority' => 2],
            ['group' => 3, 'group_rack' => 'C2', 'priority' => 1],
            ['group' => 3, 'group_rack' => 'C3', 'priority' => 1],
            ['group' => 3, 'group_rack' => 'D2', 'priority' => 1],
            ['group' => 3, 'group_rack' => 'D3', 'priority' => 1],
            ['group' => 3, 'group_rack' => 'F2', 'priority' => 1],
            ['group' => 3, 'group_rack' => 'G2', 'priority' => 1],
            ['group' => 3, 'group_rack' => 'E2', 'priority' => 1],
            ['group' => 3, 'group_rack' => 'B1', 'priority' => 2],
            ['group' => 3, 'group_rack' => 'B2', 'priority' => 2],
            ['group' => 4, 'group_rack' => 'A1', 'priority' => 1],
            ['group' => 4, 'group_rack' => 'A2', 'priority' => 1],
            ['group' => 4, 'group_rack' => 'A3', 'priority' => 1],
        ];

        $this->command->withProgressBar($data, function ($item) {
            RackGroup::create([
                'group'      => $item['group'],
                'group_rack' => $item['group_rack'],
                'priority'   => $item['priority'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        $this->command->newLine();
        $this->command->info('✅ RackGroup seeding selesai!');
    }
}
