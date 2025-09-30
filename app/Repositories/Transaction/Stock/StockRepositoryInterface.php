<?php

namespace App\Repositories\Transaction\Stock;

interface StockRepositoryInterface
{
    public function getData($data);
    public function generateStock($data);
}
