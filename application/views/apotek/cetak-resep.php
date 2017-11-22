<html>
	<head>
		<title>Admin Panel</title>
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
    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
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
                                DATA RESEP
                                
                            </h2>
                            <?php 
                             $no = 1; 
                             foreach ($pasien as $p) { 
                            ?>
                            <a href="<?php echo base_url('index.php/apoteker/print_resep/').$p->id_bayar; ?>" target="_blank" class="btn bg-blue  waves-effect pull-right">
                                <i class="material-icons">print</i>
                                <span>Cetak Resep</span>
                            </a><?php } ?>
                        </div>
                        <br><br>
                        <div class="body">
                            <?php 
                             $no = 1; 
                             foreach ($pasien as $p) { 
                                $bayar = $p->id_bayar;
                            ?>
                            <h4>ID Pembayaran : <?php echo $p->id_bayar; ?></h4>
                            <h4>ID PASIEN : <?php echo $p->id_pasien; ?></h4>
                            <h4>NAMA PASIEN : <?php echo $p->nama_pasien; ?></h4>
                            <?php } ?><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID RESEP</th>
                                            <th>NAMA OBAT</th>
                                            <th>DOSIS</th>
                                            <th>JUMLAH OBAT</th>
                                            <th>TOTAL HARGA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                             $subtot = 0;
                             $no = 1; 
                             $resep = $this->db->query("SELECT
                                                    pembayaran.id_bayar,
                                                    obat.nama_obat,
                                                    resep.jumlah_obat,
                                                    resep.dosis,
                                                    resep.total_harga,
                                                    pembayaran.id_pasien,
                                                    resep.id_resep,
                                                    obat.id_obat
                                                    FROM
                                                    pembayaran
                                                    INNER JOIN resep ON pembayaran.id_bayar = resep.id_bayar
                                                    INNER JOIN obat ON resep.id_obat = obat.id_obat
                                                    WHERE pembayaran.id_bayar = '$bayar' ")->result();
                             foreach ($resep as $u) { 
                            ?>
                                        <tr>
                                            <td><?php echo $u->id_resep; ?></td>
                                            <td><?php 
                                            $where = array('id_obat' => $u->id_obat);
                                            $data = $this->db->get_where('obat',$where)->result();
                                            foreach ($data as $key) {
                                                echo $key->nama_obat;
                                            }
                                             ?></td>
                                             <td><?php echo $u->dosis; ?></td>
                                             <td align="right"><?php echo $u->jumlah_obat; ?></td>
                                             <td align="right">Rp. <?php echo number_format($u->total_harga,2,',','.'); ?> ,-</td>
                                        </tr>
                                        <?php $subtot += $u->total_harga; } ?>
                                    </tbody>
                                    <footer>
                                        <tr>
                                            <td colspan="4" align="center">Sub Total</td>
                                            <td align="right">Rp. <?php echo number_format($subtot,2,',','.'); ?> ,-</td>
                                        </tr>
                                    </footer>
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
    <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.confirmation').on('click',function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
        });
        function warnBeforeRedirect(linkURL) {
            swal({
              title: "Hapus Obat ?", 
              type: "warning",
              showCancelButton: true
             }, function() {
             // Redirect the user
                window.location.href = linkURL;
            });
        }                                                
</script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/ui/tooltips-popovers.js"></script>
    
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/tables/jquery-datatable.js"></script>
	</body>
</html>