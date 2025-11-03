<?php

namespace App\Services\Transaction;

use App\Enums\StatusRackEnums;
use App\Enums\StatusStockEnums;
use App\Repositories\Pallet\PalletRepositoryInterface;
use App\Repositories\Rack\RackRepositoryInterface;
use App\Repositories\StockChange\StockChangeRepositoryInterface;
use App\Repositories\Transaction\StockIn\StockInRepositoryInterface;
use Illuminate\Support\Arr;

class StockInService
{
    protected $StockInRepository;
    protected $StockChangeRepository;
    protected $PalletRepository;
    protected $RackRepository;

    public function __construct(
        StockInRepositoryInterface $StockInRepository,
        StockChangeRepositoryInterface $StockChangeRepository,
        PalletRepositoryInterface $PalletRepository,
        RackRepositoryInterface $RackRepository,
    ) {
        $this->StockInRepository = $StockInRepository;
        $this->StockChangeRepository = $StockChangeRepository;
        $this->PalletRepository = $PalletRepository;
        $this->RackRepository = $RackRepository;
    }

    public function getData($data)
    {
        return $this->StockInRepository->getData($data);
    }
    public function getDataExport($data)
    {
        return $this->StockInRepository->getDataExport($data);
    }
    public function getSummary($data)
    {
        return $this->StockInRepository->getSummary($data);
    }
    public function getId($data)
    {
        return $this->StockInRepository->getId($data);
    }

    public function updateData($data, $id)
    {
        $user = auth()->user()->usr;
        $dataUdate = array_merge(
            Arr::except($data, ['form_no']),
            [
                'updated_at' => now(),
                'updated_by' => $user,
            ]
        );

        $update = $this->StockInRepository->updateData($dataUdate, $id);

        $stockChange = array_merge($data, [
            'created_at' => now(),
            'created_by' => $user
        ]);
        if ($update) {
            $update = $this->StockChangeRepository->create($stockChange);
        }
        return $update;
    }

    public function getPallet($data)
    {
        $query = $this->PalletRepository->getByNo($data);

        return $query;
    }

    public function create($data)
    {
        $user = auth()->user()->usr;
        $form = array_merge($data, [
            'created_at' => now(),
            'created_by' => $user,
            'status' => StatusStockEnums::In->value
        ]);

        $query =  $this->StockInRepository->createData($form);
        if ($query) {
            $id = $data['rack_no'] ?? null;
            if ($id) {
                $dataRack = [
                    'part_no' => $data['part_no'],
                    'product_code' => $data['part_name'],
                    'status' => StatusRackEnums::Loaded->value,
                    'updated_at' => now(),
                ];
                $this->RackRepository->update($id, $dataRack);
            }

            $no = $data['pallet_no'] ?? null;
            if ($no) {
                $palletUpdate = [
                    'product' => $data['part_name'],
                ];
                $this->PalletRepository->updateByNo($no, $palletUpdate);
            }
        }
        return $query;
    }
}
