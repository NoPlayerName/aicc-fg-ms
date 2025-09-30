<?php

namespace App\Repositories\StockChange;


use App\Models\Master\Rack;
use App\Models\Transaction\StockChange;
use Carbon\Carbon;

class StockChangeRepository implements StockChangeRepositoryInterface
{
    public function getFilter($data)
    {

        $query = StockChange::when($data->startDate && $data->endDate, function ($q) use ($data) {
            $q->whereBetween('created_at', [[Carbon::parse($data->startDate)->startOfDay(), Carbon::parse($data->endDate)->endOfDay()]]);
        })
            ->when($data->search, function ($q) use ($data) {
                $q->where(function ($q2) use ($data) {
                    $q2->where('pallet_no', 'like', '%' . $data->search . '%')
                        ->orWhere('part_no', 'like', '%' . $data->search . '%')
                        ->orWhere('part_name', 'like', '%' . $data->search . '%')
                        ->orWhere('customer', 'like', '%' . $data->search . '%')
                        ->orWhere('desc', 'like', '%' . $data->search . '%')
                        ->orWhere('created_by', 'like', '%' . $data->search . '%')
                        ->orWhere('product_code', 'like', '%' . $data->search . '%');
                });
            })->get();

        return $query;
    }

    public function create($data)
    {
        return StockChange::create($data);
    }
}
