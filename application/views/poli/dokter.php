<!DOCTYPE html>
<html>
<head>
	<?php include "css.php"; ?>
    <style type="text/css">
        
    </style>
</head>
<body class="theme-light-blue">
	<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA DOKTER
                            </h2>
                            <a href="<?php echo base_url('index.php/Poli/form') ?>" class="btn bg-red  waves-effect pull-right">
                                <i class="material-icons">add</i>
                                <span>Tambahkan</span>
                            </a>
                            <a href="<?php echo base_url('index.php/Poli/cetak_dok') ?>" target="_blank" class="btn bg-blue  waves-effect pull-right">
                                <i class="material-icons">print</i>
                                <span>Cetak Dokter</span>
                            </a>
                        </div>
                        <br><br>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped data">
                                    <thead>
                                        <tr>
                                            <th>ID DOKTER</th>
                                            <th>FOTO</th>
                                            <th>NAMA</th>
                                            <th>POLI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1; 
                                        foreach ($user as $u) { ?>
                                        <tr>
                                            <td><?php echo $u->id_dokter; ?></td>
                                            <td><img class="img-circle" height="100" width="100" src="<?php echo base_url('uploads/').$u->foto; ?>"></td>
                                            <td><?php echo $u->nama_dokter; ?></td>
                                            <td>
                                                <?php 
                                                    $w = array('id_poli' => $u->id_poli );
                                                    $where = $this->db->where($w);
                                                    $data = $this->db->get('poli')->result();
                                                    ?>
                                                <?php echo $data[0]->nama_poli; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('index.php/poli/hapusdokter/').$u->id_dokter; ?>" class="btn btn-danger btn-circle waves-effect waves-circle waves-float confirmation " data-toggle="tooltip" data-placement="left" title="Hapus data" onClick="return">
                                                <i class="material-icons">delete</i>
                                                </a>

                                                <a href="<?php echo base_url('index.php/poli/editdokterform/').$u->id_dokter; ?>" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="right" title="Update data">
                                                <i class="material-icons">create</i>
                                                </a>
                                            </td>
                                        </tr>
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
              title: "Hapus Dokter?", 
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
    <script src="<?php echo base_url(); ?>js/pages/ui/tooltips-popovers.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>js/demo.js"></script>
</body>
</html>