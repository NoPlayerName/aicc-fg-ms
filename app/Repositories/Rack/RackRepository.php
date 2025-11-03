<?php

namespace App\Repositories\Rack;

use App\Enums\StatusRackEnums;
use App\Models\Master\Product;
use App\Models\Master\Rack;
use App\Models\Master\RackGroup;

class RackRepository implements RackRepositoryInterface
{
    public function getAll()
    {
        return Rack::get();
    }

    public function getAllActive()
    {
        return Rack::where('is_active', true)->get();
    }

    public function getbyId($id)
    {
        return Rack::find($id);
    }

    public function create($data)
    {
        return Rack::create($data);
    }

    public function update($id, $data)
    {
        $rack = Rack::where('rack_no', $id);
        $rack->update($data);
        return $rack;
    }

    public function delete($id)
    {
        $rack = Rack::find($id);
        $rack->delete();
        return $rack;
    }

    public function getRandomRack($data)
    {
        $product = Product::where('part_no', $data)->first();
        if (!$product) {
            return null; // kalau product nggak ketemu
        }
        $group = RackGroup::where('group', $product->group)
            ->orderBy('priority', 'asc')
            ->get(['group_rack', 'priority']);

        // $product = Product::with(['group' => function ($q) {
        //     $q->orderBy('priority', 'asc');
        // }])->where('part_no', $data)->first();

        if (!$product) {
            return null; // kalau product nggak ketemu
        }
        // dd($group);

        $rack = null;

        foreach ($group as $g) {
            $rack = Rack::where('status', StatusRackEnums::Empty->value)
                ->where('rack_no', 'LIKE', $g->group_rack . '%')
                ->inRandomOrder()
                ->first();
            if ($rack) {
                break;
            }
        }
        return $rack;
    }
    public function getDataExport()
    {
        return Rack::query();
    }
}
