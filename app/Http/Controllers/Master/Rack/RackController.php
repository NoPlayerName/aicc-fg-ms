<?php

namespace App\Http\Controllers\Master\Rack;

use App\Http\Controllers\Controller;
use App\Services\Master\RackService;
use Illuminate\Http\Request;

class RackController extends Controller
{
    protected $rackService;

    public function __construct(RackService $rackService)
    {
        $this->rackService = $rackService;
    }

    public function getData()
    {
        $data = $this->rackService->getRack();
        return datatables()->of($data)
            ->addColumn('css_class', fn($row) => $row->status->cssClass())
            ->toJson();
    }
}
