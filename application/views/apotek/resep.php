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
                                DATA OBAT
                                
                            </h2>
                            <a href="<?php echo base_url('index.php/apoteker/detailresep'); ?>" class="btn bg-red  waves-effect pull-right">
                                <i class="material-icons">remove_red_eye</i>
                                <span>Detail Resep</span>
                            </a>
                        <br><br>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped data">
                                    <thead>
                                        <tr>
                                            <th>ID OBAT</th>
                                            <th>NAMA OBAT</th>
                                            <th>HARGA SATUAN</th>
                                            <th>JUMLAH OBAT</th>
                                            <th>DOSIS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1; 
                                        foreach ($user as $u) { ?>
                                        
                                        <tr>
                                        	<form method="post" action="<?php echo base_url('index.php/apoteker/addresep') ?>">
                                        	<td><?php echo $u->id_obat; ?><input type="hidden" name="id" value="<?php echo $u->id_obat; ?>"></td>
                                        	<td><?php echo $u->nama_obat; ?><input type="hidden" name="nama" value="<?php echo $u->nama_obat; ?>"></td>
                                        	<td><?php echo $u->harga_satuan; ?><input type="hidden" name="harga" value="<?php echo $u->harga_satuan; ?>"></td>
                                        	<td><input type="number" class="form-control" name="jumlah" placeholder="Jumlah Obat"></td>
                                        	<td>
                                        		<input placeholder="Masukkan Dosis Obat" type="text" class="form-control" name="dosis">
                                        	</td>
                                        	<td><button type="submit" class="btn btn-default">Tambahkan</button></td>
                                        	</form>
                                        </tr>
                                        
                                        <?php $no++; } ?>
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
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/ui/tooltips-popovers.js"></script>
    
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/tables/jquery-datatable.js"></script>
	</body>
</html>