<?php

namespace App\Repositories\Pallet;

interface PalletRepositoryInterface
{
    public function getAll();
    public function getAllActive();
    //for get data customer pallets
    public function getCustomerPallet();
    public function getById($id);
    public function getByNo($no);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
    public function getPalletByFilter($palletType, $color, $customer);
    public function updateByNo($no, $data);
}
