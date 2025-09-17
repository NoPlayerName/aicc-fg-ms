<?php

namespace App\Http\Livewire\MasterData\Pallet;

use App\Exports\ExcelExport;
use App\Http\Livewire\BaseLivewireComponent;
use App\Models\Pallet\Pallet;
use App\Services\Master\PalletService;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class MasterPallet extends BaseLivewireComponent
{
    public $form = [
        'pallet_no'   => '',
        'name' => '',
        'pallet_type' => '',
        'color'       => '',
        'is_active'   => true,
    ];
    public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }
    }

    public function edit($id)
    {
        if (!$this->can('can_edit')) {

            $this->dispatch('no_permission', message: 'You no Have Permission');
            return;
        }
        $this->form = app(PalletService::class)->getPalletById($id);

        $this->dispatch('editForm', data: $this->form, id: $id)->to(FormEditPallet::class);
    }


    public function deleteConfirm($id)
    {
        if (!$this->can('can_delete')) {
            $this->dispatch('no_permission', message: 'You no Have Permission');
            return;
        }
        $this->dispatch('delete-confirm', id: $id);
    }



    public function delete($id)
    {
        if (!$this->can('can_delete')) {
            $this->dispatch('no_permission', message: 'You no Have Permission');
            return;
        }
        app(PalletService::class)->deletePallet($id);
    }

    public function exportExcel()
    {
        $columns = ['pallet_no', 'name', 'pallet_type', 'color'];
        $head = ['Pallet Number', 'Pallet Name', 'Pallet Type', 'Color'];
        $data = app(PalletService::class)->getPalletActive();

        // dd($data);

        return Excel::download(new ExcelExport($data, $columns, $head), 'Pallet.xlsx');
    }

    #[Title('Master Pallet')]
    public function render()
    {
        return view('livewire.master-data.pallet.master-pallet');
    }
}
