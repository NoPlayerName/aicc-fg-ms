<?php

namespace App\Services\Master;

use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getCustomer()
    {
        return $this->customerRepository->getAll();
    }

    public function getAllActive()
    {
        return $this->customerRepository->getAllActive();
    }
    public function getById($id)
    {
        return $this->customerRepository->getById($id);
    }
}
