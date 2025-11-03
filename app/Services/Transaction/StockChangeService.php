<?php

namespace App\Services\Transaction;


use App\Repositories\StockChange\StockChangeRepositoryInterface;
use Illuminate\Http\Request;


class StockChangeService
{
    protected $StockChangeRepository;

    public function __construct(StockChangeRepositoryInterface $StockChangeRepository)
    {
        $this->StockChangeRepository = $StockChangeRepository;
    }


    public function filterData($data)
    {
        return $this->StockChangeRepository->getFilter($data);
    }
    public function getDataExport($data)
    {
        return $this->StockChangeRepository->getDataExport($data);
    }

    public function create($data)
    {
        return $this->StockChangeRepository->create($data);
    }
}
