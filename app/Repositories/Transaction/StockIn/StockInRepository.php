<?php

namespace App\Repositories\Transaction\StockIn;

use App\Enums\StatusStockEnums;
use App\Models\Master\Rack;
use App\Models\Transaction\StockIn;
use Carbon\Carbon;

class StockInRepository implements StockInRepositoryInterface
{
    public function getData($data)
    {
        $data = StockIn::when($data->startDate && $data->endDate, function ($q) use ($data) {
            $q->whereBetween('created_at', [[Carbon::parse($data->startDate)->startOfDay(), Carbon::parse($data->endDate)->endOfDay()]]);
        })->where('status', StatusStockEnums::In->value)
            ->when($data->search, function ($q) use ($data) {
                $q->where('part_no', 'like', '%' . $data->search . '%')
                    ->orWhere('part_name', 'like', '%' . $data->search . '%')
                    ->orWhere('pallet_no', 'like', '%' . $data->search . '%')
                    ->orWhere('desc', 'like', '%' . $data->search . '%')
                    ->orWhere('rack_no', 'like', '%' . $data->search . '%');
            });

        return $data;
    }

    public function getSummary($data)
    {
        $data = StockIn::selectRaw('part_no, part_name, SUM(qty) as Qty')->when($data->startDate && $data->endDate, function ($q) use ($data) {
            $q->whereBetween('created_at', [$data->startDate, $data->endDate]);
        })->where('status', StatusStockEnums::In->value)
            ->when($data->search, function ($q) use ($data) {
                $q->where('part_no', 'like', '%' . $data->search . '%')
                    ->orWhere('part_name', 'like', '%' . $data->search . '%')
                    ->orWhere('pallet_no', 'like', '%' . $data->search . '%')
                    ->orWhere('desc', 'like', '%' . $data->search . '%')
                    ->orWhere('rack_no', 'like', '%' . $data->search . '%');
            })->groupBy('part_no', 'part_name')->get();

        return $data;
    }

    public function getId($data)
    {
        $data = StockIn::where('id', $data)->where('status', StatusStockEnums::In->value)->first();

        return $data;
    }
}
