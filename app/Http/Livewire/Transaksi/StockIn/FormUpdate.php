<?php

namespace App\Http\Livewire\Transaksi\StockIn;

use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Master\ProductService;
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
        $this->form['part_name'] = 'part baru ketika berubah';
        // $data = app(ProductService::class)->getById($value);
        // dd($data);
        // foreach ($data->toArray() as $key => $val) {
            
        // }
    }


    public function save()
    {
        dd($this->form['part_name']);
    }

    public function render()
    {
        return view('livewire.transaksi.stock-in.form-update');
    }
}
