<?php

namespace App\Repositories\Pallet;

use App\Models\Master\Pallet;

class PalletRepository implements PalletRepositoryInterface
{
    public function getAll()
    {
        return Pallet::get();
    }

    public function getAllActive()
    {
        return Pallet::where('is_active', true)->get();
    }

    public function getbyId($id)
    {
        return Pallet::find($id);
    }

    public function create($data)
    {
        return Pallet::create($data);
    }

    public function update($id, $data)
    {
        $pallet = Pallet::find($id);
        $pallet->update($data);
        return $pallet;
    }

    public function delete($id)
    {
        $pallet = Pallet::find($id);
        $pallet->delete();
        return $pallet;
    }

    public function getCustomerPallet()
    {
        $query = Pallet::selectRaw('COUNT(id) as amount, pallet_type, color, customer')
            ->where('is_active', true)
            ->groupBy('pallet_type', 'color', 'customer')
            ->orderByRaw('customer IS NOT NULL, customer ASC')
            ->get();

        return $query;
    }

    public function getPalletByFilter($palletType, $color, $customer)
    {
        return Pallet::where('is_active', true)
            ->where('pallet_type', $palletType)
            ->Where('color', $color)
            ->Where('customer', $customer)
            ->get();
    }

    public function getByNo($no)
    {
        return Pallet::where('pallet_no', $no)
            ->where('is_active', 1)
            ->whereNull('product')->first();
    }

    public function updateByNo($no, $data)
    {
        return Pallet::where('pallet_no', $no)->update($data);
    }

    public function getDataExport($palletType, $color, $customer)
    {
        return Pallet::where('is_active', true)
            ->when($palletType, function ($query) use ($palletType) {
                return $query->where('pallet_type', $palletType);
            })
            ->when($color, function ($query) use ($color) {
                return $query->where('color', $color);
            })
            ->when($customer, function ($query) use ($customer) {
                return $query->where('customer', $customer);
            });
    }
}
