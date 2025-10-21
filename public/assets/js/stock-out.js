let tableStockOut, tableSummary;
let filterGlobal = {};
let canEdit;

// =======================
// FUNCTION INIT DATATABLE
// =======================

function initTable(selector, selectorButton, column) {
    if ($.fn.DataTable.isDataTable(selector)) {
        $(selector).DataTable().destroy();
    }
    let table = $(selector).DataTable({
        // searching: false,
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
                className: "btn btn-success btn-md",
                text: '<i class="fas fa-file-excel"></i> Export Excel',
                action: () => {
                    Livewire.dispatch(
                        selector.replace("#datatable-", "exportExcel-")
                    );
                },
            },
        ],
        ajax: {
            url: $(selector).data("url"),
            data: function (d) {
                d.startDate = filterGlobal.startDate ?? null;
                d.endDate = filterGlobal.endDate ?? null;
                d.search = filterGlobal.search ?? null;
            },
        },
        columns: column,
    });

    // Pindahkan tombol ke div custom
    if ($(selectorButton).is(":empty")) {
        table.buttons().container().appendTo(selectorButton);
    }
    return table;
}

//==========
// select2
//==========

$("#selectCust").on("change", function () {
    let val = $(this).val();
    Livewire.dispatch("setCustomer", { data: val });
});

//==========
// modal update
//==========

Livewire.on("modalUpdate", (val) => {
    $("#form-update").modal("show");
    $("#selectCust").val(val.cust).trigger("change.select2");
});

// =======================
// LIVEWIRE NAVIGATED
// =======================

$(document).on("livewire:navigated", () => {
    // Inisialisasi tabel
    tableStockOut = initTable(
        "#datatable-stockOut",
        "#custom-buttons-stockout",
        stockColumns
    );
    tableSummary = initTable(
        "#datatable-summary",
        "#custom-buttons-summary",
        summaryColumns
    );

    // Sembunyikan tombol summary default
    $("#custom-buttons-summary").addClass("d-none");

    // Inisialisasi select2 jika ada
    $(".select2").select2();
});

// =======================
// TAB SWITCH (Bootstrap)
// =======================
$('a[data-toggle="tab"]').on("show.bs.tab", (e) => {
    let target = $(e.target).attr("href");
    if (target === "#stock-out") {
        console.log("masuk");
        $("#custom-buttons-summary").addClass("d-none");
        $("#custom-buttons-stockout").removeClass("d-none");
    } else if (target === "#summary") {
        console.log("keluar");
        $("#custom-buttons-stockout").addClass("d-none");
        $("#custom-buttons-summary").removeClass("d-none");
    }
});

Livewire.on("filter", (event) => {
    filterGlobal = event.filter;
    if (tableStockOut) tableStockOut.ajax.reload(null, false);
    if (tableSummary) tableSummary.ajax.reload(null, false);
});

// =======================
// COLUMN DEFINITIONS
// =======================
let stockColumns = [
    { data: "pallet_no", orderable: false },
    { data: "created_at", orderable: false },
    { data: "part_no", orderable: false },
    { data: "part_name", orderable: false },
    {
        data: "qty",
        orderable: false,
        render: (data) => parseInt(data),
    },
    { data: "customer", orderable: false },
    { data: "rack_no", orderable: false },
    { data: "desc", orderable: false },
    {
        data: "id",
        render: (data, type, row) => {
            canEdit = $("#datatable-stockOut").data("edited");
            if (!canEdit) return "";
            return `<a class="btn" wire:click="editShow('${data}')">
                <i class="fas fa-edit text-warning" data-toggle="tooltip" title="Edit"></i>
            </a>`;
        },
        orderable: false,
    },
];

let summaryColumns = [
    { data: "part_no", orderable: false },
    { data: "part_name", orderable: false },
    {
        data: "Qty",
        orderable: false,
        render: (data) => parseInt(data),
    },
];

Livewire.on("saved", () => {
    $("#form-update").modal("hide");
    if (tableStockOut) tableStockOut.ajax.reload(null, false);
    if (tableSummary) tableSummary.ajax.reload(null, false);
    // $("#form-edit-pallet").modal("hide");
    // $("#datatable-buttons").DataTable().ajax.reload(null, false);
    // toastr.success("Data has been saved!");
});
