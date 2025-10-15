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
                            <input type="text" wire:model="form.pallet_no" class="form-control @error('form.pallet_no')
                                is-invalid
                            @enderror" placeholder="Paller Number" wire:change='changePallet'>
                            @error('form.pallet_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12" wire:ignore>
                            <div class="form-group">
                                <label class="control-label">Part No</label>
                                <select class="form-control select2 @error('form.part_no') is-invalid
                                @enderror" id="part_no" wire:model="form.part_no" wire:change='change'
                                    style="width: 100%;">
                                    <option>Select</option>
                                    @foreach ($dataPart as $item )
                                    <option value="{{ $item['part_no'] }}">{{$item['part_no']}} - {{ $item['part_name']
                                        }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('form.part_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group d-none">
                            <label>Part Name</label>
                            <input type="text" wire:model="form.part_name" disabled class="form-control @error('form.part_name')
                                is-invalid
                            @enderror" placeholder="Part Name">
                            @error('form.part_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Qty</label>
                            <input type="number" wire:model.defer="form.qty" class="form-control @error('form.qty')
                                is-invalid                                
                            @enderror" min="0" placeholder="0">
                            @error('form.qty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Rack No</label>
                            <input type="text" wire:model="form.rack_no" class="form-control @error('form.rack_no')
                                is-invalid
                            @enderror" placeholder="Rack Number">
                            @error('form.rack_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-4 form-group custom-control custom-checkbox custom-control-right ml-3 mt-4">
                            <input type="checkbox" class="custom-control-input" wire:model.defer="form.desc"
                                id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Part Trial</label>
                        </div>
                        {{--
                        <div class="col-lg-6 form-group">
                            <label>Part Trial</label>
                            <input type="checkbox" wire:model.defer="form.part_trial" class="form-control">
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