<?php

namespace App\Repositories\StockChange;


use App\Models\Master\Rack;
use App\Models\Transaction\StockChange;

class StockChangeRepository implements StockChangeRepositoryInterface
{
    public function getFilter($data)
    {

        $data = StockChange::query()
            ->when($data->startDate && $data->endDate, function ($q) use ($data) {
                $q->whereBetween('created_at', [$data->startDate, $data->endDate]);
            })
            ->when($data->search, function ($q) use ($data) {
                $q->where('pallet_no', 'like', '%' . $data->search . '%')
                    ->orWhere('part_no', 'like', '%' . $data->search . '%')
                    ->orWhere('part_name', 'like', '%' . $data->search . '%')
                    ->orWhere('customer', 'like', '%' . $data->search . '%')
                    ->orWhere('desc', 'like', '%' . $data->search . '%')
                    ->orWhere('created_by', 'like', '%' . $data->search . '%')
                    ->orWhere('product_code', 'like', '%' . $data->search . '%');
            });

        return $data;
    }
}
