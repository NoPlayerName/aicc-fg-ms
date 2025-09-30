<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ExcelExport implements FromCollection, WithHeadings, WithMapping
{

    protected $query;
    protected $columns;
    protected $headings;

    public function __construct($query, array $columns, array $headings)
    {
        $this->query = $query;
        $this->columns = $columns;
        $this->headings = $headings;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->query instanceof Builder
            ? $this->query->get()
            : ($this->query instanceof Collection ? $this->query : collect($this->query));
    }

    public function headings(): array
    {
        return $this->headings;
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
