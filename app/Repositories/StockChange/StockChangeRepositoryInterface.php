<?php

namespace App\Repositories\StockChange;

interface StockChangeRepositoryInterface
{
    public function getFilter($data);
    public function create($data);
}
