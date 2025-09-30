<?php

namespace App\Http\Livewire\Transaksi\StockOut;

use App\Models\Master\Customer;
use App\Services\Transaction\StockOutService;
use Livewire\Attributes\On;
use Livewire\Component;

class FormUpdate extends Component
{
    public $form = [
        'pallet_no'   => '',
        'part_no' => '',
        'created_at' => '',
        'part_name' => '',
        'customer' => '',
        'qty' => '',
        'form_no' => '',
        'desc' => '',
    ];
    public $id, $dataCustomer;
    public function rules()
    {
        return [
            'form.pallet_no'   => 'required',
            'form.part_no' => 'required',
            'form.created_at' => 'required',
            'form.part_name' => 'required',
            'form.customer' => 'required',
            'form.qty' => 'required',
            'form.form_no' => 'required',

        ];
    }

    public function mount()
    {
        $data = Customer::all();
        $this->dataCustomer = $data;
    }
    #[On('formUpdate')]
    public function editData($data, $id)
    {
        $data['qty'] = (int) $data['qty'];
        $this->form = $data;
        $this->id = $id;
        $this->dispatch('modalUpdate', cust: $this->form['customer']);
    }
    #[On('setCustomer')]
    public function select2($data)
    {
        $this->form['customer'] = $data;
    }
    public function save()
    {
        $this->validate();
        $form = $this->form;
        $data = app(StockOutService::class)->updateData($form, $this->id);
        if ($data) {
            $this->dispatch('saved');
            $this->dispatch('success', message: 'Modify Successfully');
        }
    }
    public function render()
    {
        return view('livewire.transaksi.stock-out.form-update');
    }
}
