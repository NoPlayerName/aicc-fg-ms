<?php

namespace App\Http\Controllers\Master\Pallet;

use App\Http\Controllers\Controller;
use App\Services\Master\PalletService;
use Illuminate\Http\Request;

class PalletController extends Controller
{
    public $palletService;
    public function __construct(PalletService $palletService)
    {
        $this->palletService = $palletService;
    }

    public function getData()
    {
        $data =  $this->palletService->getPallet();
        return datatables()->of($data)->toJson();
        // return $this->palletService->getPallet();
    }
}
