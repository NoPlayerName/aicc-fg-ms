<?php

namespace App\Repositories\Customer;

use App\Models\Master\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll()
    {
        return Customer::all();
    }
    public function getAllActive()
    {
        return Customer::where('is_active', 1)->get();
    }

    public function getById($id)
    {
        return Customer::find($id);
    }
}
