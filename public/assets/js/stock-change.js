$(document).on("livewire:navigated", () => {
    let table = $("#datatable-buttons").DataTable({
        responsive: true,
        autoWidth: true,
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
    });

    // Pindahkan tombol ke div custom
    table.buttons().container().appendTo("#custom-buttons");
});
