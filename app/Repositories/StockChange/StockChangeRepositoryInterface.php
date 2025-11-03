<?php

namespace App\Repositories\StockChange;

interface StockChangeRepositoryInterface
{
    public function getFilter($data);
    public function getDataExport($data);
    public function create($data);
}
