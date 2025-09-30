<?php

namespace App\Http\Controllers\Master\Product;

use App\Http\Controllers\Controller;
use App\Services\Master\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $ProductService;
    public function __construct(ProductService $ProductService)
    {
        $this->ProductService = $ProductService;
    }

    public function getData()
    {
        $data = $this->ProductService->getData();
        return datatables()->of($data)->toJson();
    }
}
