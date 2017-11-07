$(function () {
    $('.data').DataTable({
        responsive: true,
        "language":{
            "decimal":        "",
            "emptyTable":     "Data tidak ada di dalam tabel",
            "info":           "Menampilkan _START_ ke _END_ dari _TOTAL_ Data",
            "infoEmpty":      "Showing 0 to 0 of 0 entries",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Menampilkan _MENU_ Entrian",
            "loadingRecords": "Memuat...",
            "processing":     "Memproses...",
            "search":         "Cari:",
            "zeroRecords":    "Data tidak ditemukan",
            "paginate": {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});