<!-- Google Fonts -->
    <link href="<?php echo base_url('roboto/roboto.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('iconfont/material-icons.css') ?>" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo base_url();?>plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url();?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />
    <!-- Sweetalert Css -->
    <link href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>css/themes/all-themes.css" rel="stylesheet" />
	<title>Resepsionis</title>
    <style type="text/css">
        .index {
            margin-top: 100px;
            margin-left: 30px;
        }
    </style>
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
     <script type="text/javascript">
        $('#tables').DataTable({
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
   </script>