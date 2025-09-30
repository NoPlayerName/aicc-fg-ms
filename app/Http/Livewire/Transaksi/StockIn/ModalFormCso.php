<?php

namespace App\Http\Livewire\Transaksi\StockIn;

use App\Services\Master\ProductService;
use App\Services\Transaction\StockInService;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalFormCso extends Component
{
    public $dataPart;

    public $form = [
        'part_no',
        'part_name',
        'qty',
        'pallet_no',
    ];
    public function rules()
    {
        return [
            'form.pallet_no' => 'required',
            'form.part_no' => 'required',
            'form.part_name' => 'required',
            'form.qty' => 'required',

        ];
    }

    public function mount()
    {
        $data = app(ProductService::class)->getData();
        $this->dataPart = $data;
    }


    #[On('changePartCso')]
    public function changePart($dataPrt)
    {
        $data = app(ProductService::class)->getById($dataPrt);
        $this->form['part_name'] = $data->prodName?->part_name;
        $this->form['part_no'] = $dataPrt;
        $this->form['qty'] = $data->std_packing;
    }


    #[On('resetFormCso')]
    public function resetForm()
    {
        $this->reset('form');

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function changePallet()
    {
        $data = $this->form['pallet_no'];
        $query =  app(StockInService::class)->getPallet($data);
        if (!$query) {
            $this->addError('form.pallet_no', 'Pallet Not Found.');
            $this->dispatch('error', message: 'Pallet Not Found');
        } else {
            $this->dispatch('success', message: 'Pallet Added');
            $this->resetErrorBag();
            $this->resetValidation();
        }
        return $query;
    }

    public function save()
    {
        $this->validate();
        $this->form['desc'] = 'CSO';
        $save = app(StockInService::class)->create($this->form);
        if (!$save) {
            $this->dispatch('error', message: 'Field to Save');
            return;
        } else {
            $this->dispatch('saved');
            $this->reset('form');
            $this->dispatch('success', message: 'Save Successfully');
            return;
        }
    }

    public function render()
    {
        return view('livewire.transaksi.stock-in.modal-form-cso');
    }
}
