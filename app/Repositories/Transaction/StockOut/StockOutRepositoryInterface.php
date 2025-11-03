<?php

namespace App\Repositories\Transaction\StockOut;

interface StockOutRepositoryInterface
{
    public function getData($data);
    public function getDataExport($data);
    public function getSummary($data);
    public function getId($data);
    public function update($data, $id);
}
