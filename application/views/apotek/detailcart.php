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
                            <a href="<?php echo base_url('index.php/apoteker/view_resep'); ?>" class="btn bg-green  waves-effect pull-right">
                                <i class="material-icons">add</i>
                                <span>Tambahkan Resep</span>
                            </a>
                            <a href="<?php echo base_url('index.php/apoteker/hapus_resep/all'); ?>" target="_blank" class="btn bg-red  waves-effect pull-right confirmation" onClick="return">
                                <i class="material-icons">delete</i>
                                <span>Hapus Resep</span>
                            </a>
                        </div>
                        <br><br>
                        <div class="body">
                            <div class="table-responsive">
                                <form method="post" action="<?php echo base_url('index.php/apoteker/simpanresep') ?>">
                                <table class="table table-bordered table-striped">
                                    <?php 
                                        if ($cart = $this->cart->contents()) {
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>ID OBAT</th>
                                            <th>NAMA OBAT</th>
                                            <th>DOSIS</th>
                                            <th>JUMLAH OBAT</th>
                                            <th>HARGA SATUAN</th>
                                            <th>TOTAL</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $grand_total = 0;
                                        foreach ($cart as $item) {
                                         ?>
                                            <?php echo form_hidden('cart['. $item['id'] . '][id]' , $item['id']); ?>
                                            <?php echo form_hidden('cart['. $item['id'] . '][rowid]' , $item['rowid']); ?>
                                            <?php echo form_hidden('cart['. $item['id'] . '][name]' , $item['name']); ?>
                                            <?php echo form_hidden('cart['. $item['id'] . '][price]' , $item['price']); ?>
                                            <?php echo form_hidden('cart['. $item['id'] . '][qty]' , $item['qty']); ?>
                                            <?php echo form_hidden('cart['. $item['id'] . '][dosis]' , $item['dosis']); ?>
                                        <tr>
                                            <td><?php echo $item['id']; ?></td>
                                            <td><?php echo $item['name']; ?></td>
                                            <td><?php echo $item['dosis']; ?></td>
                                            <td><input type="number" name="jumlah" value="<?php echo $item['qty'] ?>"></td>
                                            <td align="right">Rp. <?php echo number_format($item['price'],2,',','.'); ?></td>
                                            <?php 
                                            $grand_total = $grand_total + $item['subtotal'];
                                             ?>
                                            <td align="right">Rp. <?php echo number_format($item['subtotal'],2,',','.'); ?></td>
                                        	<td>
                                                <a href="<?php echo base_url('index.php/apoteker/hapus_resep/').$item['rowid']; ?>" type="submit" class="btn btn-info btn-circle waves-effect waves-circle waves-float confirm " data-toggle="tooltip" data-placement="left" title="Tambahkan" onClick="return ">
                                                <i class="material-icons">delete</i>
                                                </a>
                                               
                                        	</td>
                                        </tr>
                                        
                                        <?php } ?>
                                        <tr>
                                            <td align="center" colspan="4">
                                                Subtotal
                                            </td>
                                            <td colspan="2">Rp. <?php echo number_format($grand_total,2,',','.'); ?></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="id_pasien" required="">
                                                <label class="form-label">Masukkan ID Pasien</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn bg-indigo  waves-effect pull-right" >
                                <i class="material-icons">save</i>
                                <span>Simpan Resep</span>
                                        </button>  
                                    </div>
                                </div>
                                </form>
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
        $('.confirm').on('click',function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warningBeforeRedirect(linkURL);
        });
        $('.simpan').on('click',function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            simpan(linkURL);
        });
        function warnBeforeRedirect(linkURL) {
            swal({
              title: "Hapus Resep Keseluruhan ?", 
              type: "warning",
              showCancelButton: true
             }, function() {
             // Redirect the user
                window.location.href = linkURL;
            });
        }      
        function warningBeforeRedirect(linkURL) {
            swal({
              title: "Hapus Resep ?", 
              type: "warning",
              showCancelButton: true
             }, function() {
             // Redirect the user
                window.location.href = linkURL;
            });
        } 
        function simpan(linkURL) {
            swal({
              title: "Simpan Data Resep ?", 
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