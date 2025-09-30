<?php

namespace App\Http\Livewire\Transaksi\StockIn;

use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Master\ProductService;
use App\Services\Transaction\StockInService;
use Livewire\Attributes\On;

class FormUpdate extends BaseLivewireComponent
{

    public $form = [
        'pallet_no'   => '',
        'part_no' => '',
        'created_at' => '',
        'part_name' => '',
        'qty' => '',
        'form_no' => '',
        'desc' => '',
    ];
    public $id;

    public function rules()
    {
        return [
            'form.pallet_no'   => 'required',
            'form.part_no' => 'required',
            'form.date' => 'required',
            'form.part_name' => 'required',
            'form.qty' => 'required',
            'form.form_no' => 'required',

        ];
    }

    #[On('formUpdate')]
    public function editData($data, $id)
    {
        $data['qty'] = (int) $data['qty'];
        $this->form = $data;
        $this->id = $id;
        $this->dispatch('modalUpdate');
    }

    public function changePartNo()
    {
        $value = $this->form['part_no'];
        $data = app(ProductService::class)->getById($value);
        $this->form['part_name'] = $data->prodName?->part_name;
        $this->form['qty'] = $data->std_packing;
    }


    public function save()
    {
        // $this->validate();
        $form = $this->form;
        $query = app(StockInService::class)->updateData($form, $this->id);
        if ($query) {
            $this->dispatch('saved');
            $this->dispatch('success', message: 'Modify Successfully');
        }
    }

    public function render()
    {
        return view('livewire.transaksi.stock-in.form-update');
    }
}
