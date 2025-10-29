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
        $startDate = Carbon::parse($data->startDate);
        $endDate = Carbon::parse($data->endDate);

        $data = StockIn::when($data->startDate && $data->endDate, function ($q) use ($startDate, $endDate) {
            $q->whereBetween('created_at', [$startDate, $endDate]);
        })->where('status', StatusStockEnums::In->value)
            ->when($data->search, function ($q) use ($data) {
                $q->where(function ($query) use ($data) {
                    $query->where('part_no', 'like', '%' . $data->search . '%')
                        ->orWhere('part_name', 'like', '%' . $data->search . '%')
                        ->orWhere('pallet_no', 'like', '%' . $data->search . '%')
                        ->orWhere('desc', 'like', '%' . $data->search . '%')
                        ->orWhere('rack_no', 'like', '%' . $data->search . '%');
                });
            })->orderBy('created_at', 'desc')->get();

        return $data;
    }

    public function getSummary($data)
    {
        $startDate = Carbon::parse($data->startDate);
        $endDate = Carbon::parse($data->endDate);

        $data = StockIn::selectRaw('part_no, part_name, SUM(qty) as Qty')->when($startDate && $endDate, function ($q) use ($endDate, $startDate) {
            $q->whereBetween('created_at', [$startDate, $endDate]);
        })->where('status', StatusStockEnums::In->value)
            ->when($data->search, function ($q) use ($data) {
                $q->where(function ($q2) use ($data) {
                    $q2->where('part_no', 'like', '%' . $data->search . '%')
                        ->orWhere('part_name', 'like', '%' . $data->search . '%')
                        ->orWhere('pallet_no', 'like', '%' . $data->search . '%')
                        ->orWhere('desc', 'like', '%' . $data->search . '%')
                        ->orWhere('rack_no', 'like', '%' . $data->search . '%');
                });
            })->groupBy('part_no', 'part_name')->get();

        return $data;
    }

    public function getId($data)
    {
        $data = StockIn::where('id', $data)->where('status', StatusStockEnums::In->value)->first();

        return $data;
    }

    public function createData($data)
    {
        $query = StockIn::create($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query = StockIn::where('id', $id)->update($data);
        return $query;
    }
}
