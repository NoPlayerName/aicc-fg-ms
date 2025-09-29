<?php

namespace App\Http\Livewire\Transaksi\Stock;

use App\Exports\ExcelExport;
use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Transaction\StockService;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;

class Stock extends BaseLivewireComponent
{
    public $startDate, $endDate, $searchKey;

    public function mount()
    {

        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }
    }
    public function showDetail($part_no)
    {
        $data = (object)[
            'search' => $part_no,
            'startDate' => null,
            'endDate' => null
        ];
        $this->dispatch('show-detail', data: $data)->to(DetailStock::class);
    }

    public function search()
    {
        $this->dispatch('filter', filter: [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search' => $this->searchKey,
        ]);
    }

    #[On('exportExcel')]
    public function export()
    {
        $filters = (object) [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search'    => $this->searchKey,
        ];
        $data = app(StockService::class)->getData($filters);
        $columns = ['part_no', 'part_name', 'begining_balance', 'stock_in', 'stock_out', 'closing_balance'];
        $heading = ['Part Number', 'Part Name', 'Begining Balance', 'Stock In', 'Stock Out', 'Closing Balance'];
        return Excel::download(new ExcelExport($data, $columns, $heading), 'Stock_' . $this->startDate . '_' . $this->endDate . '.xlsx');
    }

    #[Title('Data Stock')]
    public function render()
    {
        return view('livewire.transaksi.stock.stock');
    }
}
