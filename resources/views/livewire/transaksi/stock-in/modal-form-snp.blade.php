<div wire:ignore.self class="modal fade" id="modal-form-snp" data-backdrop="static" role="dialog" tabindex="-1"
    aria-labelledby="modal-form-snp-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-snp-label">Form SNP</h5>
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Part No</label>
                                <select class="form-control select2" wire:model.defer="part_no" style="width: 100%;">
                                    <option>Select</option>
                                    <option value="AK">0779869698</option>
                                    <option value="HI">4564577456</option>
                                    <option value="CA">456474574</option>
                                    <option value="NV">45645745234</option>
                                    <option value="OR">23423623</option>
                                    <option value="WA">2352534634</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <label>Part Name</label>
                            <input type="text" wire:model.defer="part_name" disabled class="form-control"
                                placeholder="Part Name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Qty</label>
                            <input type="number" wire:model.defer="qty" class="form-control" min="0" placeholder="0">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Rack No</label>
                            <input type="text" wire:model.defer="no_rak" class="form-control" placeholder="Rack Number">
                        </div>

                        <div class="col-lg-4 form-group custom-control custom-checkbox custom-control-right ml-3 mt-4">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Part Trial</label>
                        </div>
                        {{--
                        <div class="col-lg-6 form-group">
                            <label>Part Trial</label>
                            <input type="checkbox" wire:model.defer="part_trial" class="form-control">
                        </div> --}}
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