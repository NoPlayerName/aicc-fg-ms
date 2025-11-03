<?php

namespace App\Http\Livewire\Transaksi\StockIn;

use App\Exports\ExcelExport;
use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Permission\PermissionService;
use App\Services\Transaction\StockInService;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;

class StockMasuk extends BaseLivewireComponent
{

    public $typeForm;
    public $canEdited =  false;
    public $startDate;
    public $endDate;
    public $searchKey;

    protected $listeners = ['refresh' => 'refreshTable'];

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

    public function openModalSnp()
    {
        $this->dispatch('showModalSnp');
        $this->dispatch('resetFormSnp')->to(ModalFormSnp::class);
    }

    public function openModalCso()
    {
        $this->dispatch('showModalCso');
        $this->dispatch('resetFormCso')->to(ModalFormCso::class);
    }


    public function refreshTable()
    {
        $this->dispatch('refreshTableSNP');
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
        $data = app(StockInService::class)->getId($id);

        $this->dispatch('formUpdate', data: $data, id: $id)->to(FormUpdate::class);
    }
    #[On('exportExcel-stockIn')]
    public function export()
    {
        $form = (object) [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search' => $this->searchKey,
        ];
        $startDate = Carbon::parse($this->startDate);
        $endDate = Carbon::parse($this->endDate);
        $columns = ['pallet_no', 'created_at', 'part_no', 'part_name', 'qty', 'rack_no', 'desc',];
        $heading = ['Pallet No', 'Created At', 'Part No', 'Part Name', 'Qty', 'Rack No', 'Desc',];
        $data = app(StockInService::class)->getDataExport($form);
        return Excel::download(new ExcelExport($data, $columns, $heading), 'Stock In_' .  $startDate . '_' . $endDate . '.xlsx');
    }
    #[On('exportExcel-summary')]
    public function exportSumamry()
    {
        $form = (object) [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search' => $this->searchKey,
        ];
        $columns = ['part_no', 'part_name', 'Qty'];
        $heading = ['Pallet No', 'Part Name', 'Qty'];
        $data = app(StockInService::class)->getSummary($form);
        return Excel::download(new ExcelExport($data, $columns, $heading), 'Summary' . $this->startDate . '_' . $this->endDate . '.xlsx');
    }

    #[Title('Stock In')]
    public function render()
    {
        return view('livewire.transaksi.stock-in.stock-masuk');
    }
}
