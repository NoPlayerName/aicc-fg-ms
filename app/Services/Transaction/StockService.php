<?php

namespace App\Services\Transaction;

use App\Repositories\Transaction\Stock\StockRepositoryInterface;

class StockService
{

    protected $StockRepository;
    public function __construct(StockRepositoryInterface $StockRepository)
    {
        $this->StockRepository = $StockRepository;
    }

    public function getData($data)
    {

        return $this->StockRepository->getData($data);
    }

    public function generateStock($data)
    {
        return $this->StockRepository->generateStock($data);
    }
}
