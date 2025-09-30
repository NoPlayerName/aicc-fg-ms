<div wire:ignore.self class="modal fade" id="detail-stock" tabindex="-1" aria-labelledby="detail-stock-label"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail-stock-label">Detail stock {{ $part_no }}</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Pallet No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $res )
                                    <tr>
                                        <td>{{$res->created_at->format('Y-m-d')}}</td>
                                        <td>{{$res->pallet_no}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>