<?php

namespace App\Http\Controllers\Transaction\StockIn;

use App\Http\Controllers\Controller;
use App\Services\Transaction\StockInService;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    public $StockInService;

    public function __construct(StockInService $StockInService)
    {
        $this->StockInService = $StockInService;
    }

    public function getData(Request $request)
    {
        $data = $this->StockInService->getData($request);
        return datatables()->of($data)->toJson();
    }

    public function getSummary(Request $request)
    {
        $data = $this->StockInService->getSummary($request);
        return datatables()->of($data)->toJson();
    }
}
