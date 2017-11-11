<!DOCTYPE html>
<html>
<head>
	<?php include 'css.php'; ?>
</head>
<body class="theme-red">
	<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Input Rekam Medis</h1>
            </div>
            <form method="post" action="<?php echo base_url('index.php/poli/tambahdokter'); ?>">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="key" type="text" class="form-control" placeholder="ID PASIEN" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect"><i class="material-icons">search</i><span>Cari Pasien</span></button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input disabled="" name="dokter" type="text" class="form-control" placeholder="ID PASIEN" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="dokter" type="text" class="form-control" placeholder="Nama Pasien" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="alamat" rows="4" class="form-control no-resize" placeholder="Keterangan Penyakit"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect">
                                                <i class="material-icons">add</i>
                                                <span>Tambahkan</span>
                                            </button>
                                    </div>
                                </div>
                            </div>
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