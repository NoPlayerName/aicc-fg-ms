<?php

namespace App\Http\Controllers\Transaction\StockOut;

use App\Http\Controllers\Controller;
use App\Services\Transaction\StockOutService;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    public $StockOutService;

    public function __construct(StockOutService $StockOutService)
    {
        $this->StockOutService = $StockOutService;
    }

    public function getData(Request $request)
    {
        $data = $this->StockOutService->getData($request);
        return datatables()->of($data)->toJson();
    }

    public function getSummary(Request $request)
    {
        $data = $this->StockOutService->getSummary($request);
        return datatables()->of($data)->toJson();
    }
}
