<?php

namespace App\Repositories\Product;

use App\Models\Master\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {

        $query = Product::with('prodName')->get();

        $data = $query->map(function ($item) {
            return [
                'id' => $item->id,
                'part_no' => $item->part_no,
                'part_name' => $item->prodName?->part_name ?? '-',
                'std_packing' => $item->std_packing ?? '-',
                'min_stock' => $item->min_stock ?? '-',
                'max_stock' => $item->max_stock ?? '-',
                'without_pallet' => $item->without_pallet ?? '-',
                'group' => $item->group ?? '-',
            ];
        });
        return $data;
    }

    public function getById($part_no)
    {
        $query = Product::with('prodName')->where('part_no', $part_no)->first();
        return $query;
    }
}
