<?php

namespace App\Services\Transaction;


use App\Repositories\Transaction\StockIn\StockInRepositoryInterface;
use Illuminate\Http\Request;


class StockInService
{
    protected $StockInRepository;

    public function __construct(StockInRepositoryInterface $StockInRepository)
    {
        $this->StockInRepository = $StockInRepository;
    }

    public function getData($data)
    {
        return $this->StockInRepository->getData($data);
    }
    public function getSummary($data)
    {
        return $this->StockInRepository->getSummary($data);
    }
    public function getId($data)
    {
        return $this->StockInRepository->getId($data);
    }
}
