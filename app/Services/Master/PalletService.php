<?php

namespace App\Services\Master;

use App\Repositories\Pallet\PalletRepositoryInterface;
use Illuminate\Http\Request;


class PalletService
{
    protected $palletRepository;

    public function __construct(PalletRepositoryInterface $palletRepository)
    {
        $this->palletRepository = $palletRepository;
    }


    public function getPallet()
    {
        return $this->palletRepository->getAll();
    }
    public function getPalletActive()
    {
        return $this->palletRepository->getAllActive();
    }


    public function savePallet($data)
    {
        return $this->palletRepository->create($data);
    }

    public function updatePallet($id, $data)
    {
        return $this->palletRepository->update($id, $data);
    }

    public function getPalletById($id)
    {
        return $this->palletRepository->getbyId($id);
    }

    public function deletePallet($id)
    {
        return $this->palletRepository->delete($id);
    }

    public function getCustomerPallet()
    {
        return $this->palletRepository->getCustomerPallet();
    }

    public function getPalletByFilter($type, $color, $customer)
    {
        return $this->palletRepository->getPalletByFilter($type, $color, $customer);
    }
    public function getDataExport($type, $color, $customer)
    {
        return $this->palletRepository->getDataExport($type, $color, $customer);
    }

    public function getByNo($no)
    {
        return $this->palletRepository->getByNo($no);
    }
}
