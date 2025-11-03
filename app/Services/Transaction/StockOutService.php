<?php

namespace App\Services\Transaction;

use App\Repositories\StockChange\StockChangeRepositoryInterface;
use App\Repositories\Transaction\StockOut\StockOutRepositoryInterface;
use Illuminate\Http\Request;


class StockOutService
{
    protected $StockOutRepository;
    protected $StockChangeRepository;

    public function __construct(StockOutRepositoryInterface $StockOutRepository, StockChangeRepositoryInterface $StockChangeRepository)
    {
        $this->StockOutRepository = $StockOutRepository;
        $this->StockChangeRepository = $StockChangeRepository;
    }

    public function getData($data)
    {
        return $this->StockOutRepository->getData($data);
    }
    public function getDataExport($data)
    {
        return $this->StockOutRepository->getDataExport($data);
    }
    public function getSummary($data)
    {
        return $this->StockOutRepository->getSummary($data);
    }
    public function getId($data)
    {
        return $this->StockOutRepository->getId($data);
    }

    public function updateData($data, $id)
    {
        $dataStockOut = [
            'part_no' => $data['part_no'],
            'part_name' => $data['part_name'],
            'pallet_no' => $data['pallet_no'],
            'qty' => $data['qty'],
            'customer' => $data['customer'],
            'updated_at' => now(),
        ];

        $update = $this->StockOutRepository->update($dataStockOut, $id);

        $data = array_merge($data, [
            'created_by' => auth()->user()->usr,
            'created_at' => now(),
        ]);

        if ($update) {
            $update = $this->StockChangeRepository->create($data);
            return $update;
        };

        return $update;
    }
}
