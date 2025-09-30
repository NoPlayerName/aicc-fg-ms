<div wire:ignore.self class="modal fade" id="modal-form-cso" data-backdrop="static" role="dialog" tabindex="-1"
    aria-labelledby="modal-form-snp-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-cso-label">Form CSO</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-lg-6 form-group" wire:ignore>
                            <label class="control-label">Part No</label>
                            <select class="form-control select2" id="part_no_cso" wire:model="form.part_no"
                                style="width: 100%;">
                                <option>Select</option>
                                @foreach ($dataPart as $item)
                                <option value="{{ $item['part_no'] }}">{{$item['part_no']}}</option>
                                @endforeach
                            </select>
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
                            <label>Pallet No</label>
                            <input type="text" wire:model="form.pallet_no" class="form-control"
                                placeholder="Paller Number" wire:change='changePallet'>
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