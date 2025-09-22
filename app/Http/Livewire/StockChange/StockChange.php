<?php

namespace App\Http\Livewire\StockChange;

use App\Exports\ExcelExport;
use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Transaction\StockChangeService;
use Maatwebsite\Excel\Facades\Excel;

class StockChange extends BaseLivewireComponent
{

    public $startDate;
    public $endDate;
    public $Search;

    public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }

        $this->startDate = now()->format('Y-m-d');
        $this->endDate   = now()->format('Y-m-d');
    }

    public function search()
    {
        $this->dispatch('filter');
    }

    public function export()
    {
        $filters = (object) [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search'    => $this->Search,
        ];
        $data = app(StockChangeService::class)->filterData($filters);
        $columns = ['form_no', 'pallet_no', 'part_no', 'part_name', 'customer', 'desc', 'created_by', 'product_code'];
        $heading = ['Form Number', 'Pallet Number', 'Part Number', 'Part Name', 'Customer', 'Description', 'Created By', 'Product Code'];
        return Excel::download(new ExcelExport($data, $columns, $heading), 'Stock Change.xlsx');
    }


    public function render()
    {
        return view('livewire.stock-change.stock-change');
    }
}
