<div wire:ignore.self class="modal fade" id="modal-form-snp" tabindex="-1" aria-labelledby="modal-form-snp-label"
    aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-snp-label">Form SNP</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">

                    <div class="form-group">
                        <label>ID Pallet</label>
                        <input type="text" wire:model.defer="id_pallet" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Part No</label>
                        <input type="text" wire:model.defer="part_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Part Name</label>
                        <input type="text" wire:model.defer="part_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="number" wire:model.defer="qty" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Pallet</label>
                        <input type="text" wire:model.defer="no_pallet" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Rak</label>
                        <input type="text" wire:model.defer="no_rak" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Part Trial</label>
                        <input type="checkbox" wire:model.defer="part_trial" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @push('scripts')
    <script>
        $(document).on("livewire:navigated", function() {
            Livewire.on('showModal', () => {
                $('#modal-form-snp').modal('show');
            });

            Livewire.on('hideModal', () => {
                $('#modal-form-snp').modal('hide');
            });
        });
    </script>
@endpush --}}
