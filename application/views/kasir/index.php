<html>
	<head>
		<title>Admin Panel</title>
	<?php include 'top-kas.php'; ?>
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
                                FORM PEMBAYARAN YANG SUDAH MEMBAYAR
                            </h2>
                             <a href="<?php echo base_url('index.php/kasir/cetak_bayarlunas'); ?>" target="_blank" data-target="#smallModal" class="btn bg-red  waves-effect pull-right">
                                <i class="material-icons">print</i>
                                <span>Cetak PDF</span>
                            </a>
                        </div>
                        <div class="body">
                            <table class="table table-striped data">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Id Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Biaya Pendaftaran</th>
                                        <th>Biaya Dokter</th>
                                        <th>Biaya Obat</th>
                                        <th>Total Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    $no = 1;
                                    foreach ($kasir as $k) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td align="center"><?php echo $k->id_pasien; ?></td>
                                        <td align="center"><?php echo $k->nama_pasien; ?></td>
                                        <td align="right">Rp.<?php echo number_format($k->biaya_daftar,2,',','.'); ?> ,-</td>
                                        <td align="right">Rp.<?php echo number_format($k->biaya_dokter,2,',','.'); ?> ,-</td>
                                        <td align="right">Rp.<?php echo number_format($k->biaya_obat,2,',','.'); ?>,-</td>
                                        <td align="right">Rp.<?php echo number_format($k->total_biaya,2,',','.'); ?> ,-</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- taruh dibawah plugins/sweetalert/sweetalert.min.js -->
    <!-- <script type="text/javascript">
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
    </script> -->
	<?php include 'bottom-kas.php'; ?>
	</body>
</html>