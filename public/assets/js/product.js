$(document).on("livewire:navigated", () => {
    initTable();
    Livewire.on("open-modal", () => {
        $("#productModal").modal("show");
    });
});

function initTable() {
    let table = $("#datatable-buttons").DataTable({
        // searching: false,
        responsive: true,
        autoWidth: false,
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
            },
        ],
        ajax: {
            url: $("#datatable-buttons").data("url"),
        },
        columns: [
            { data: "part_no", orderable: false },
            { data: "part_name", orderable: false },
            { data: "std_packing", orderable: false },
            { data: "min_stock", orderable: false },
            { data: "max_stock", orderable: false },
            { data: "group", orderable: false },
        ],
    });

    // Pindahkan tombol ke div custom
    table.buttons().container().appendTo("#custom-buttons");
}
