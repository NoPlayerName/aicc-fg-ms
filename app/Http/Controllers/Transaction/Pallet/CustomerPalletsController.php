<?php

namespace App\Http\Controllers\Transaction\Pallet;

use App\Http\Controllers\Controller;
use App\Services\Master\PalletService;
use Illuminate\Http\Request;

class CustomerPalletsController extends Controller
{
    protected $palletService;
    public function __construct(PalletService $palletService)
    {
        $this->palletService = $palletService;
    }

    public function getAmount()
    {
        $data = $this->palletService->getCustomerPallet();
        return datatables()->of($data)->toJson();
    }
}
