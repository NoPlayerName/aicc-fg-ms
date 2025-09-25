<?php

namespace App\Repositories\Transaction\StockOut;

use App\Enums\StatusStockEnums;
use App\Models\Transaction\StockOut;

class StockOutRepository implements StockOutRepositoryInterface
{
    public function getData($data)
    {
        $query = StockOut::when($data->startDate && $data->endDate, function ($q) use ($data) {
            $q->whereBetween('created_at', [$data->startDate, $data->endDate]);
        })->when($data->search, function ($q) use ($data) {
            $q->where(function ($q2) use ($data) {
                $q2->where('part_no', 'like', '%' . $data->search . '%')
                    ->orWhere('part_name', 'like', '%' . $data->search . '%')
                    ->orWhere('pallet_no', 'like', '%' . $data->search . '%')
                    ->orWhere('desc', 'like', '%' . $data->search . '%')
                    ->orWhere('customer', 'like', '%' . $data->search . '%')
                    ->orWhere('rack_no', 'like', '%' . $data->search . '%');
            });
        })->get();

        return $query;
    }

    public function getSummary($data)
    {
        $query = StockOut::selectRaw('part_no, part_name, SUM(qty) as Qty')->when($data->startDate && $data->endDate, function ($q) use ($data) {
            $q->whereBetween('created_at', [$data->startDate, $data->endDate]);
        })->when($data->search, function ($q) use ($data) {
            $q->where(function ($q2) use ($data) {
                $q2->where('part_no', 'like', '%' . $data->search . '%')
                    ->orWhere('part_name', 'like', '%' . $data->search . '%')
                    ->orWhere('pallet_no', 'like', '%' . $data->search . '%')
                    ->orWhere('desc', 'like', '%' . $data->search . '%')
                    ->orWhere('customer', 'like', '%' . $data->search . '%')
                    ->orWhere('rack_no', 'like', '%' . $data->search . '%');
            });
        })->groupBy('part_no', 'part_name')->get();

        return $query;
    }

    public function getId($data)
    {
        $query = StockOut::where('id', $data)->first();

        return $query;
    }

    public function update($data, $id)
    {
        $query = StockOut::where('id', $id)->update($data);

        return $query;
    }
}
