<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ExcelExport implements FromQuery, WithHeadings, WithMapping
{

    protected $query;
    protected $columns;
    protected $headings;
    protected $extraHead;

    public function __construct($query, array $columns, array $headings, array $extraHead = [])
    {
        $this->query = $query;
        $this->columns = $columns;
        $this->headings = $headings;
        $this->extraHead = $extraHead;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        if (!$this->query instanceof Builder) {
            throw new \Exception("Export ini harus menerima Eloquent Builder.");
        }

        return $this->query;
    }

    public function headings(): array
    {
        $header = [];
        if (!empty($this->extraHead)) {
            foreach ($this->extraHead as $value) {
                $header[] = $value;
            }
        }
        $header[] = array_merge($this->headings);
        return $header;
    }

    public function map($row): array
    {
        return collect($this->columns)->map(function ($column) use ($row) {
            // $value = data_get($row, $column);
            $value = $row->{$column} ?? '-';

            if (is_object($value) && method_exists($value, 'title')) {
                return $value->title();
            }

            if (is_bool($value)) {
                return $value ? 'Yes' : 'No';
            }

            if ($value instanceof \Carbon\Carbon) {
                return $value->format('Y-m-d H:i:s');
            }
            return $value;
        })->toArray();
    }
}
