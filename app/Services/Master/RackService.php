<?php

namespace App\Services\Master;

use App\Repositories\Rack\RackRepositoryInterface;
use Illuminate\Http\Request;


class RackService
{
    protected $RackRepository;

    public function __construct(RackRepositoryInterface $RackRepository)
    {
        $this->RackRepository = $RackRepository;
    }


    public function getRack()
    {
        return $this->RackRepository->getAll();
    }
    public function getRackActive()
    {
        return $this->RackRepository->getAllActive();
    }


    public function saveRack($data)
    {
        return $this->RackRepository->create($data);
    }

    public function updateRack($id, $data)
    {
        return $this->RackRepository->update($id, $data);
    }

    public function getRackById($id)
    {
        return $this->RackRepository->getbyId($id);
    }

    public function deleteRack($id)
    {
        return $this->RackRepository->delete($id);
    }
}
