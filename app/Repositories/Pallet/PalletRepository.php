<?php 
namespace App\Repositories\Pallet;

use App\Models\Pallet\Pallet;

class PalletRepository implements PalletRepositoryInterface
{
    public function getAll()
    {
        return Pallet::get();
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
}