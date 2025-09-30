<?php

namespace App\Http\Controllers\Transaction\StockChange;

use App\Http\Controllers\Controller;
use App\Services\Transaction\StockChangeService;
use Illuminate\Http\Request;

class StockChangeController extends Controller
{
    public $StockChangeService;
    public function __construct(StockChangeService $StockChangeService)
    {
        $this->StockChangeService = $StockChangeService;
    }


    public function filterData(Request $request)
    {
        $data = $this->StockChangeService->filterData($request);
        return datatables()->of($data)->toJson();
    }
}
