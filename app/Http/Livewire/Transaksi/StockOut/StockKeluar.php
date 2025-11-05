<?php

namespace App\Http\Livewire\Transaksi\StockOut;

use App\Exports\ExcelExport;
use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Transaction\StockOutService;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;

class StockKeluar extends BaseLivewireComponent
{

    public $startDate, $endDate, $searchKey;
    public $canEdited =  false;

    public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }

        $this->canEdited = $this->can('can_edit');

        $this->startDate = now()->setTime(7, 0)->format('Y-m-d\TH:i');
        $this->endDate = now()->setTime(20, 0)->format('Y-m-d\TH:i');
        $this->search();
    }

    public function openModal()
    {

        $this->dispatch('open-modal');
    }

    public function search()
    {

        $this->dispatch('filter', filter: [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search' => $this->searchKey,
        ]);
    }
    public function editShow($id)
    {
        $data = app(StockOutService::class)->getId($id);

        $this->dispatch('formUpdate', data: $data, id: $id)->to(FormUpdate::class);
    }

    #[On('exportExcel-stockOut')]
    public function export()
    {
        $form = (object) [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search' => $this->searchKey,
        ];
        $columns = ['pallet_no', 'created_at', 'part_no', 'part_name', 'qty', 'customer', 'rack_no', 'desc',];
        $heading = ['Pallet No', 'Created At', 'Part No', 'Part Name', 'Qty', 'Customer', 'Rack No', 'Desc',];
        $data = app(StockOutService::class)->getDataExport($form);
        return Excel::download(new ExcelExport($data, $columns, $heading), 'Stock Out_' . $this->startDate . '_' . $this->endDate . '.xlsx');
    }
    #[On('exportExcel-summary')]
    public function exportSumamry()
    {
        $form = (object) [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search' => $this->searchKey,
        ];
        $startDate = Carbon::parse($this->startDate);
        $endDate = Carbon::parse($this->endDate);
        $columns = ['part_no', 'part_name', 'Qty'];
        $heading = ['Pallet No', 'Part Name', 'Qty'];
        $data = app(StockOutService::class)->getSummary($form);
        $data->orderBy('part_no', 'asc');
        return Excel::download(new ExcelExport($data, $columns, $heading), 'Summary' . $startDate . '_' . $endDate . '.xlsx');
    }

    #[Title('Stock Out')]
    public function render()
    {
        return view('livewire.transaksi.stock-out.stock-keluar');
    }
}
