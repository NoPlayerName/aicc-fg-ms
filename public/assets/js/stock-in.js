$(document).on("livewire:navigated", () => {
    if (!$.fn.DataTable.isDataTable("#datatable-stockIn")) {
        initTable("#datatable-stockIn", "#custom-buttons-stockin");
    }
    if (!$.fn.DataTable.isDataTable("#datatable-summary")) {
        initTable("#datatable-summary", "#custom-buttons-summary");
    }
    $("#custom-buttons-summary").addClass("d-none");

    $(".select2").select2();
});

Livewire.on("storeSnp", () => {
    $("#modal-form-snp").modal("hide");
});

$('a[data-toggle="tab"]').on("show.bs.tab", (e) => {
    let target = $(e.target).attr("href");
    if (target === "#stock-in") {
        $("#custom-buttons-summary").addClass("d-none");
        $("#custom-buttons-stockin").removeClass("d-none");
    } else if (target === "#summary") {
        $("#custom-buttons-stockin").addClass("d-none");
        $("#custom-buttons-summary").removeClass("d-none");
    }
});

function initTable(selector, selectorButton) {
    if ($.fn.DataTable.isDataTable(selector)) {
        $(selector).DataTable().destroy();
    }
    let table = $(selector).DataTable({
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
                title: selector.replace("#datatable-", ""),
                filename: selector.replace("#datatable-", ""),
                className: "btn btn-success btn-md",
                text: '<i class="fas fa-file-excel"></i> Export Excel',
            },
        ],
    });

    // Pindahkan tombol ke div custom
    if ($(selectorButton).is(":empty")) {
        table.buttons().container().appendTo(selectorButton);
    }
}
