let filterGlobal = {};
let stockColumns = [
    { data: "part_no", orderable: false },
    { data: "part_name", orderable: false },
    {
        data: "begining_balance",
        orderable: false,
        render: (data) => parseInt(data),
    },
    {
        data: "stock_in",
        orderable: false,
        render: (data) => parseInt(data),
    },
    {
        data: "stock_out",
        orderable: false,
        render: (data) => parseInt(data),
    },
    {
        data: "closing_balance",
        orderable: false,
        render: (data) => parseInt(data),
    },
    {
        data: "id",
        render: (data, type, row) => {
            return `<a class="btn" wire:click="showDetail('${row.part_no}')"><i
                    class="fas fa-eye text-info" data-toggle="tooltip" data-placement="top"
                    title="View Detail"></i> </a>`;
        },
        orderable: false,
    },
];

// =======================
// FUNCTION INIT DATATABLE
// =======================

function initTable() {
    if ($.fn.DataTable.isDataTable("#datatable-buttons")) {
        $("#datatable-buttons").DataTable().destroy();
    }
    let table = $("#datatable-buttons").DataTable({
        searching: false,
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        order: [],
        dom:
            "B" +
            "<'row'<'col-sm-6 mt-2'l><'col-sm-6'f>>" + // baris 1: kiri = show entries, kanan = search
            "<'row'<'col-sm-12'tr>>" + // baris 2: tabel
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: "excel",
                // title: selector.replace("#datatable-", ""),
                // filename: selector.replace("#datatable-", ""),
                className: "btn btn-success btn-md",
                text: '<i class="fas fa-file-excel"></i> Export Excel',
                action: () => {
                    Livewire.dispatch("exportExcel");
                },
            },
        ],
        ajax: {
            url: $("#datatable-buttons").data("url"),
            data: function (d) {
                d.startDate = filterGlobal.startDate ?? null;
                d.endDate = filterGlobal.endDate ?? null;
                d.search = filterGlobal.search ?? null;
            },
            error: function (xhr) {
                if (xhr.status === 404) {
                    Livewire.dispatch("error", {
                        message: "Data not found",
                    });
                }
            },
        },
        columns: stockColumns,
    });

    // Pindahkan tombol ke div custom
    if ($("#datatable-buttons").is(":empty")) {
        table.buttons().container().appendTo("#datatable-buttons");
    }
    return table;
}

// =======================
// LIVEWIRE NAVIGATED
// =======================

$(document).on("livewire:navigated", () => {
    // Inisialisasi tabel
    initTable();

    // Inisialisasi select2 jika ada
    // $(".select2").select2();
});

Livewire.on("filter", (event) => {
    filterGlobal = event.filter;
    console.log(filterGlobal);
    $("#datatable-buttons").DataTable().ajax.reload(null, false);
});

Livewire.on("open-detail", () => {
    $("#detail-stock").modal("show");
});
