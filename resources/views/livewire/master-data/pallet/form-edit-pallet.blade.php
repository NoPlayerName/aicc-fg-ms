<div wire:ignore.self class="modal fade" id="form-edit-pallet" data-backdrop="static" role="dialog" tabindex="-1"
    aria-labelledby="form-edit-pallet-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-edit-pallet-label">Add new pallet</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label>Pallet No</label>
                            <input type="text" wire:model.defer="pallet_no" class="form-control"
                                placeholder="Paller Number">
                        </div>

                        <div class="col-lg-6 form-group">
                            <label>Pallet Type</label>
                            <input type="text" wire:model.defer="part_name" class="form-control"
                                placeholder="Part Name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Pallet Name</label>
                            <input type="text" wire:model.defer="no_rak" class="form-control" placeholder="Rack Number">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Color</label>
                            <input type="text" wire:model.defer="no_rak" class="form-control" placeholder="Rack Number">
                        </div>
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