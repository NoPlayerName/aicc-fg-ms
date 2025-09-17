<?php

namespace App\Repositories\Rack;

interface RackRepositoryInterface
{
    public function getAll();
    public function getAllActive();
    public function getById($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
