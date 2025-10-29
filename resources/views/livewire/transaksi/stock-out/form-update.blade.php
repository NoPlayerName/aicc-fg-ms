<div wire:ignore.self class="modal fade" id="form-update" data-backdrop="static" role="dialog" tabindex="-1"
    aria-labelledby="modal-form-snp-label">
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
                            <input type="text" wire:model="form.pallet_no" disabled class="form-control"
                                placeholder="Pallet Number">
                        </div>

                        <div class="col-lg-6 form-group">
                            <label>Part No</label>
                            <input type="text" wire:model="form.part_no" disabled class="form-control"
                                placeholder="Part Number">
                        </div>

                        <div class="col-lg-6 form-group mb-4">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-provide="datepicker"
                                    wire:model='form.created_at' disabled data-date-format="dd M, yyyy"
                                    data-date-autoclose="true" placeholder="Date" />
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
                        <div class="col-lg-6" wire:ignore>
                            <div class="form-group">
                                <label class="control-label">Customer</label>
                                <select class="form-control select2 @error('form.customer')
                                    is-invalid                                    
                                @enderror" id="selectCust" wire:model="form.customer" style="width: 100%;">
                                    <option>Select</option>
                                    @foreach ($dataCustomer as $cust )
                                    <option value="{{$cust->customer_name}}">{{$cust->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('form.customer')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Form No</label>
                            <div class="input-group">
                                <input type="text" wire:model="form.form_no" disabled class="form-control"
                                    placeholder="Form Number">
                                <a class="btn btn-md btn-warning" wire:click="regenerateFormNo" data-toggle="tooltip"
                                    title="Regenerate Number"><i class="fas fa-undo-alt"></i></a>
                            </div>
                            @error('form.form_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Description</label>
                            <textarea id="textarea" wire:model="form.desc" class="form-control" maxlength="225" rows="3"
                                placeholder="Description"></textarea>
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