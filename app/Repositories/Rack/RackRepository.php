<?php

namespace App\Repositories\Rack;

use App\Enums\StatusRackEnums;
use App\Models\Master\Product;
use App\Models\Master\Rack;
use App\Models\Master\RackGroup;
use Illuminate\Support\Facades\DB;

class RackRepository implements RackRepositoryInterface
{
    public function getAll()
    {
        return Rack::select(
            'tb_rack.*',
            'tb_stock_in.pallet_no',
            DB::raw("DATE_FORMAT(tb_stock_in.created_at, '%d-%m-%Y %H:%i') as date")
    
        )->leftJoin('tb_stock_in', function($join) {
            $join->on('tb_rack.rack_no', '=', 'tb_stock_in.rack_no')
                ->on('tb_rack.part_no', '=', 'tb_stock_in.part_no')
                ->where('tb_stock_in.status', 1);
        })->get();
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
