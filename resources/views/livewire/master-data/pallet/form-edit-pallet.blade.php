<div wire:ignore.self class="modal fade" id="form-edit-pallet" data-backdrop="static" role="dialog" tabindex="-1"
    aria-labelledby="form-edit-pallet-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-edit-pallet-label">Edit Pallet</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="save">

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label>Pallet No</label>
                            <input type="text" wire:model.defer="form.pallet_no" class="form-control @error('form.pallet_no')
                                is-invalid
                            @enderror" placeholder="Pallet Number">
                            @error('form.pallet_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group">
                            <label>Pallet Type</label>
                            <input type="text" wire:model.defer="form.pallet_type" class="form-control @error('form.pallet_type')
                                is-invalid
                            @enderror" placeholder="Pallet Type">
                            @error('form.pallet_type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Pallet Name</label>
                            <input type="text" wire:model.defer="form.name" class="form-control @error('form.name')
                                is-invalid
                            @enderror" placeholder="Pallet Name">
                            @error('form.name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Color</label>
                            <input type="text" wire:model.defer="form.color" class="form-control @error('form.color')
                                is-invalid
                            @enderror" placeholder="Color">
                            @error('form.color')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-3 form-group form-check ml-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                wire:model.defer='form.is_active'>
                            <label class="form-check-label" for="defaultCheck1">
                                Is Active?
                            </label>
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