<?php

namespace App\Http\Livewire\Pallet;

use App\Exports\ExcelExport;
use App\Services\Master\PalletService;
use Livewire\Attributes\On;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class DetailPallet extends Component
{
    public $type, $color, $customer, $data = [];
    #[On('show-detail')]
    public function open($type, $color, $customer)
    {
        $this->type = $type;
        $this->color = $color;
        $this->customer = $customer;

        $this->data = app(PalletService::class)->getPalletByFilter($type, $color, $customer) ?? [];
    }
    public function exportExccel()
    {
        $columns = ['pallet_no', 'product'];
        $heading = ['Pallet Number', 'Product'];
        $extraHead = [['Location: ' . $this->customer]];
        return Excel::download(new ExcelExport($this->data, $columns, $heading, $extraHead), 'List_pallet_location_' . $this->customer . '.xlsx');
    }
    public function render()
    {
        return view('livewire.pallet.detail-pallet');
    }
}
