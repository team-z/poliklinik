<!DOCTYPE html>
<html>
<head>
	<?php include 'css.php'; ?>
</head>
<body class="theme-deep-purple">
	<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
        <div class="container-fluid">
            <form method="get" action="<?php echo base_url('index.php/apoteker/cetakresep/'); ?>">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><br><br>
                    <div class="card" style="padding: 10%;">
                        <div class="header" style="border: none;">
                        <center><h3>MASUKKAN ID PEMBAYARAN UNTUK MELANJUTKAN</h3></center>
                            <div class="row clearfix">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="rb" class="form-control" style="text-align: center" placeholder="ID Pembayaran">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-danger waves-effect">
                                                <i class="material-icons">search</i>
                                                <span>Cari</span>
                                </button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
	<?php include 'js.php'; ?>
</body>
</html>