<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function all();
    public function getById($id);
    // public function create(array $data);
    // public function update($id, array $data);
    // public function delete($id);
}
