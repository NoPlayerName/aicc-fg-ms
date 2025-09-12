<div wire:ignore.self class="modal fade" id="detail-pallet" tabindex="-1" aria-labelledby="detail-pallet-label"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail-pallet-label">Detail stock {{ $id }}</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead>
                                    <tr>

                                        <th>Pallet No</th>
                                        <th>Product</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>1004</td>
                                        <td>CARRIER</td>

                                    </tr>
                                    <tr>

                                        <td>1017</td>
                                        <td>HUB M581</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                    <tr>

                                        <td>1047</td>
                                        <td>CARRIER EW021 17H</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success waves-effect" wire:click="exportExccel"><i
                        class="fas fa-file-excel"></i> Export
                    Excel</button>
            </div>
        </div>
    </div>
</div>