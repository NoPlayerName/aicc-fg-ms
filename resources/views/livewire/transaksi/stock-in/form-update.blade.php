<div wire:ignore.self class="modal fade" id="form-update" data-backdrop="static" role="dialog" tabindex="-1"
    aria-labelledby="modal-form-snp-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-update-label">Form Update</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label>Pallet No</label>
                            <input type="text" wire:model.defer="form.pallet_no" class="form-control"
                                placeholder="Pallet Number">
                        </div>

                        <div class="col-lg-6 form-group">
                            <label>Part No</label>
                            <input type="text" wire:model="form.part_no" wire:change='changePartNo' class="form-control"
                                placeholder="Part Number" onchange="this.dispatchEvent(new InputEvent('input'))" />
                        </div>

                        <div class="col-lg-6 form-group mb-4">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model.defer="form.created_at"
                                    data-provide="datepicker" data-date-autoclose="true" placeholder="Date" disabled />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                            <!-- input-group -->
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Part Name</label>
                            <input type="text" wire:model="form.part_name" disabled class="form-control"
                                placeholder="Part Name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Qty</label>
                            <input type="number" wire:model="form.qty" disabled class="form-control" min="0"
                                placeholder="0">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Form No</label>
                            <div class="input-group">
                                <input type="text" wire:model="form.form_no" disabled class="form-control"
                                    placeholder="Form Number">
                                <a class="btn btn-md btn-warning" wire:click="regenerateFormNo" data-toggle="tooltip"
                                    title="Regenerate Number"><i class="fas fa-undo-alt"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Description</label>
                            <textarea id="textarea" class="form-control" wire:model.defer="form.desc" maxlength="225"
                                rows="3" placeholder="Description"></textarea>
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