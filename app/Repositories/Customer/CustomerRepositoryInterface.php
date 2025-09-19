<?php

namespace App\Repositories\Customer;

interface CustomerRepositoryInterface
{
    public function getAll();
    public function getAllActive();
    public function getById($id);
}
