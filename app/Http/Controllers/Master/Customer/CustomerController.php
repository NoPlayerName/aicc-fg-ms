<?php

namespace App\Http\Controllers\Master\Customer;

use App\Http\Controllers\Controller;
use App\Services\Master\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function getData()
    {
        $data = $this->customerService->getCustomer();

        return datatables()->of($data)->toJson();
    }
}
