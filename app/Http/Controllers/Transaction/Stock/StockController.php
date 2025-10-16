<?php

namespace App\Http\Controllers\Transaction\Stock;

use App\Http\Controllers\Controller;
use App\Models\Transaction\Stock;
use App\Models\Transaction\StockIn;
use App\Models\Transaction\StockOut;
use App\Services\Transaction\StockService;
use Carbon\Carbon;
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
        $user = auth()->user()->usr;
        if (!$request->startDate || !$request->endDate) {
            return datatables()->of([])->toJson();
        }
        $periode = now()->format('Y-m-d');

        $lastGenerated = Stock::where('created_by', $user)
            ->where('periode', $periode)->max('last_generated_at');
        $stockIn = StockIn::max('created_at');
        $stockOut = StockOut::max('created_at');

        if ($stockIn) {
            $stockIn = Carbon::parse($stockIn);
        }
        if ($stockOut) {
            $stockOut = Carbon::parse($stockOut);
        }

        $needRegenerate = false;

        if (!$lastGenerated) {
            $needRegenerate = true;
        } elseif (
            ($stockIn && $stockIn->gt($lastGenerated)) ||
            ($stockOut && $stockOut->gt($lastGenerated))
        ) {
            $needRegenerate = true;
        }

        if ($needRegenerate) {
            // dd('regenerate');
            $this->StockService->generateStock($request);
        }

        $data = $this->StockService->getData($request);
        return datatables()->eloquent($data)->toJson();
    }
}
