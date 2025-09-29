<?php

namespace App\Http\Controllers\Transaction\Stock;

use App\Http\Controllers\Controller;
use App\Models\Transaction\Stock;
use App\Services\Transaction\StockService;
use Illuminate\Http\Request;

class StockController extends Controller
{
    protected $StockService;
    public function __construct(StockService $StockService)
    {
        $this->StockService = $StockService;
    }

    public function getData(Request $request)
    {

        if (!$request->startDate || !$request->endDate) {
            return datatables()->of([])->toJson();
        }
        $data = $this->StockService->getData($request);
        if (!$data->count() > 0) {
            $this->StockService->generateStock($request);
            $data = $this->StockService->getData($request);
        }
        return datatables()->of($data)->toJson();
    }
}
