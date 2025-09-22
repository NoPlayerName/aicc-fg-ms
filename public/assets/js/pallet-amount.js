$(document).on("livewire:navigated", () => {
    let table = $("#datatable-buttons").DataTable({
        responsive: true,
        autoWidth: true,
        order: [],
        dom:
            "B" +
            "<'row'<'col-sm-6 mt-2'l><'col-sm-6'f>>" + // baris 1: kiri = show entries, kanan = search
            "<'row'<'col-sm-12'tr>>" + // baris 2: tabel
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: "excel",
                className: "btn btn-success btn-mb",
                text: '<i class="fas fa-file-excel"></i> Export Excel',
                title: "Customer Pallet",
                exportOptions: {
                    columns: ":visible:not(:last-child)", // exclude kolom terakhir
                },
            },
        ],
        ajax: window.routes.palletAmount,
        columns: [
            { data: "amount", orderable: false },
            { data: "pallet_type", orderable: false },
            { data: "color", orderable: false },
            { data: "customer", orderable: false },
            { data: "amount", orderable: false },
        ],
        columnDefs: [
            {
                targets: 4,
                className: "text-center align-middle",
                render: (data, type, row) => {
                    return ` <a class="btn" data-toggle="modal"
                                            data-target="#detail-pallet" wire:click="showDetail('${row.pallet_type}', '${row.color}', '${row.customer}')"><i
                                                class="fas fa-eye text-info" data-toggle="tooltip" data-placement="top"
                                                title="View Detail"></i> </a>`;
                },
            },
        ],
    });

    // Pindahkan tombol ke div custom
    table.buttons().container().appendTo("#custom-buttons");
});
