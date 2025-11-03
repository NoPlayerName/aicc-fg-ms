<?php

namespace App\Repositories\Transaction\StockIn;

interface StockInRepositoryInterface
{
    public function getData($data);
    public function getDataExport($data);
    public function getSummary($data);
    public function getId($data);
    public function createData($data);
    public function updateData($data, $id);
}
