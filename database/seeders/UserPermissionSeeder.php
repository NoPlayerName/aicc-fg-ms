<?php

namespace Database\Seeders;

use App\Models\Permission\UserMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Console\Concerns\InteractsWithIO;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 237,
                'menu_id' => 90,
                'can_access' => 1,
                'can_read'=> 0,
                'can_edit'=> 0,
                'can_delete'=> 0,
                'can_add'=> 0,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 91,
                'can_access' => 1,
                'can_read'=> 0,
                'can_edit'=> 0,
                'can_delete'=> 0,
                'can_add'=> 0,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 92,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 93,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 94,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 95,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 96,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 97,
                'can_access' => 1,
                'can_read'=> 0,
                'can_edit'=> 0,
                'can_delete'=> 0,
                'can_add'=> 0,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 98,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 99,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 100,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
            [
                'user_id' => 237,
                'menu_id' => 101,
                'can_access' => 1,
                'can_read'=> 1,
                'can_edit'=> 1,
                'can_delete'=> 1,
                'can_add'=> 1,
                'can_approve1'=> 0,
                'can_approve2'=> 0,
                'can_approve3'=> 0,
                'can_approve4'=> 0,

            ],
        ];

        $this->command->withProgressBar($data, function($permission) {
            UserMenuPermission::updateOrCreate( [
                    'user_id' => $permission['user_id'],
                    'menu_id' => $permission['menu_id'],
                ],
                $permission);
        });

        $this->command->newLine();
        $this->command->info('✅ UserPermission seeding selesai!');


    }
}
