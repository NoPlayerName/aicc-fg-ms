<?php

namespace App\Services\Master;

use App\Models\Master\Product as ProductModel;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductService
{

    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getData()
    {
        return $this->productRepository->all();
    }

    public function getById($part_no) {
        return $this->productRepository->getById($part_no);
    }
}
