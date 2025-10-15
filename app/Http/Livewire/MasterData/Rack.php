<?php

namespace App\Http\Livewire\MasterData;

use App\Exports\ExcelExport;
use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Master\RackService;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;

class Rack extends BaseLivewireComponent
{
    public $dataRack;

    public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }
    }

    public function exportExcel()
    {
        $columns = ['rack_no', 'part_no', 'product_code', 'status'];
        $heading = ['Rack Number', 'Part Number', 'Produc Code', 'Status'];
        $this->dataRack = app(RackService::class)->getRack();
        return Excel::download(new ExcelExport($this->dataRack, $columns, $heading), 'Data Rack.xlsx');
    }
    #[Title('Master Rack')]
    public function render()
    {
        return view('livewire.master-data.rack');
    }
}
