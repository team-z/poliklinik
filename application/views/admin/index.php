<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo base_url();?>plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url();?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Sweetalert Css -->
    <link href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>css/themes/all-themes.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
</head>
<body class="theme-red">
<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
        <div class="container-fluid">
        	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA POLI
                            </h2>
                            <a href="" data-toggle="modal" data-target="#smallModal" class="btn bg-red  waves-effect pull-right">
                                <i class="material-icons">add</i>
                                <span>Tambahkan Poli</span>
                            </a>
                        </div>
                        <br><br>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped data">
                                    <thead>
                                        <tr>
                                            <th>ID POLI</th>
                                            <th>NAMA POLI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1; 
                                        foreach ($user as $u) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $u->nama_poli; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('index.php/admin/hapus/').$u->id_poli; ?>" class="btn btn-danger btn-circle waves-effect waves-circle waves-float confirmation " data-toggle="tooltip" data-placement="left" title="Hapus data" onClick="return ">
                                                <i class="material-icons">delete</i>
                                                </a>

                                                <a href="#" data-toggle="modal" id="edit-data" data-target="#small" data-poli="<?php echo $u->nama_poli; ?>" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="right" title="Update data">
                                                <i class="material-icons">create</i>
                                                </a>

                                                <a href="<?php echo base_url('index.php/admin/datadokter/').$u->id_poli ?>" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="right" title="Data dokter">
                                                <i class="material-icons">contacts</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="small" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                <form action="<?php echo base_url('index.php/admin/updatepoli/').$u->id_poli ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Edit Poli</h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input id="poli" type="text" name="poli" class="form-control" placeholder="Nama Poli">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- SweetAlert Plugin Js -->

    <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
        $('.confirmation').on('click',function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
        });
        function warnBeforeRedirect(linkURL) {
            swal({
              title: "Hapus Poli ?", 
              type: "warning",
              showCancelButton: true
             }, function() {
             // Redirect the user
                window.location.href = linkURL;
            });
        }                                                
</script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/ui/tooltips-popovers.js"></script>
    
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/tables/jquery-datatable.js"></script>
        <script>
        $(document).ready(function() {
            // Untuk sunting
            $('#small').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal          = $(this)
 
                // Isi nilai pada field
                modal.find('#poli').attr("value",div.data('poli'));
            });
        });
    </script>

        <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>js/demo.js"></script>
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                <form action="<?php echo base_url('index.php/admin/tambahpoli') ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Input Poli</h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="poli" class="form-control" placeholder="Nama Poli">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">TAMBAHKAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            
</body>
</html>