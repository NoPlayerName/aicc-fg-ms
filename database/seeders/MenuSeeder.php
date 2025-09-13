<?php

namespace Database\Seeders;

use App\Models\Menu\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Console\Concerns\InteractsWithIO;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'urutan_menu' => 41,
                'menu_name' => 'Dashboard FG MS',
                'url' => 'dashboard',
                'icon' => 'ri-dashboard-line',
                'has_extra_permissions' => 0,
                'apps_group' => 'FG-MS'
                
            ],
            [
                'urutan_menu' => 42,
                'menu_name' => 'Transaction',
                'url' => '#',
                'icon' => 'ri-currency-line',
                'has_extra_permissions' => 0,
                'apps_group' => 'FG-MS',
                'childern' => [
                    [
                        'urutan_menu' => 43,
                        'menu_name' => 'Stock',
                        'url' => 'transaksi.stock.index',
                        'icon' => 'ri-inbox-line',
                        'has_extra_permissions' => 0,
                        'apps_group' => 'FG-MS'
                ],
                    [
                        'urutan_menu' => 44,
                        'menu_name' => 'Stock In',
                        'url' => 'transaksi.stock.masuk.index',
                        'icon' => 'ri-inbox-archive-line',
                        'has_extra_permissions' => 0,
                        'apps_group' => 'FG-MS'
                ],
                    [
                        'urutan_menu' => 45,
                        'menu_name' => 'Stock Out',
                        'url' => 'transaksi.stock.keluar.index',
                        'icon' => 'ri-inbox-unarchive-line',
                        'has_extra_permissions' => 0,
                        'apps_group' => 'FG-MS'
                ],
                
                    ]
            ],
            [
                'urutan_menu' => 46,
                'menu_name' => 'Stock Change',
                'url' => 'stock.change.index',
                'icon' => 'ri-file-list-line',
                'has_extra_permissions' => 0,
                'apps_group' => 'FG-MS'
            ],
            [
                'urutan_menu' => 47,
                'menu_name' => 'Pallet Data',
                'url' => 'pallet.data.index',
                'icon' => 'ri-database-2-line',
                'has_extra_permissions' => 0,
                'apps_group' => 'FG-MS'
            ],
            [
                'urutan_menu' => 48,
                'menu_name' => 'Master Data',
                'url' => '#',
                'icon' => 'ri-database-2-line',
                'has_extra_permissions' => 0,
                'apps_group' => 'FG-MS',
                'childern' => [
                    [
                        'urutan_menu' => 49,
                        'menu_name' => 'Master Product',
                        'url' => 'master.produk.index',
                        'icon' => 'ri-archive-line',
                        'has_extra_permissions' => 0,
                        'apps_group' => 'FG-MS'
                ],
                    [
                        'urutan_menu' => 50,
                        'menu_name' => 'Master Customer',
                        'url' => 'master.customer.index',
                        'icon' => 'ri-group-line',
                        'has_extra_permissions' => 0,
                        'apps_group' => 'FG-MS'
                ],
                    [
                        'urutan_menu' => 51,
                        'menu_name' => 'Master Rack',
                        'url' => 'master.rack.index',
                        'icon' => 'ri-fridge-line',
                        'has_extra_permissions' => 0,
                        'apps_group' => 'FG-MS'
                ],
                    [
                        'urutan_menu' => 52,
                        'menu_name' => 'Master Pallet',
                        'url' => 'master.master-pallet.index',
                        'icon' => 'ri-fridge-line',
                        'has_extra_permissions' => 0,
                        'apps_group' => 'FG-MS'
                ],
                
                    ]
            ],
        ];

        $this->command->withProgressBar($data, function ($menu) {
            $childern = $menu['childern'] ?? [];
            unset($menu['childern']);

            $parent = Menu::updateOrCreate(
                ['menu_name' => $menu['menu_name']],
                [
                    'urutan_menu' => $menu['urutan_menu'],
                    'url' => $menu['url'],
                    'icon' => $menu['icon'],
                    'has_extra_permissions' => $menu['has_extra_permissions'],
                    'parent_id' => null
                ]
            );
            if(!empty($childern)){
                foreach($childern as $child){
                    $child['parent_id'] = $parent->id;
                    Menu::updateOrCreate(
                        ['menu_name' => $child['menu_name']],
                        [
                            'urutan_menu' => $child['urutan_menu'],
                            'url' => $child['url'],
                            'icon' => $child['icon'],
                            'has_extra_permissions' => $child['has_extra_permissions'],
                            'parent_id' => $parent->id
                        ]
                    );
                }
            }
        });
        $this->command->newLine();
        $this->command->info("\n✅ Menu seeding selesai!");

    }
}
