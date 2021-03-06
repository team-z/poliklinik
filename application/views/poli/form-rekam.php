<!DOCTYPE html>
<html>
<head>
	<?php include 'css.php'; ?>
</head>
<body class="theme-light-blue">
	<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
        <div class="container-fluid">
            <form method="post" action="<?php echo base_url('index.php/poli/tambahrekam'); ?>">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                      
                        <div class="header">
                        <h1>Input Rekam Medis</h1>
                        <br>
                            <div class="row clearfix">
                            <?php foreach ($pasien as $p): ?>  
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">ID PASIEN : <?php echo $p->id_pasien; ?></label>
                                            <input name="id_pasien" value="<?php echo $p->id_pasien; ?>" type="hidden" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">NAMA PASIEN : <?php echo $p->nama_pasien; ?></label>
                                            <input name="nama" value="<?php echo $p->nama_pasien; ?>" type="hidden" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="keterangan" rows="4" class="form-control no-resize" placeholder="Keterangan Penyakit"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect">
                                                <i class="material-icons">add</i>
                                                <span>Tambahkan</span>
                                            </button>
                                            <a href="<?php echo base_url('index.php/poli/formrekam') ?>" class="btn btn-primary waves-effect">
                                                <i class="material-icons">exit_to_app</i>
                                                <span>Kembali</span>
                                            </a>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6"><h1>Data Rekam Medis</h1></div>
                                <div class="col-md-6">
                                    <a href="<?php echo base_url('index.php/poli/cetak'); ?>" class="btn btn-primary pull-right waves-effect">
                                        <i class="material-icons">print</i>
                                        <span>Cetak Rekam Medis</span>
                                    </a>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID REKAM</th>
                                        <th>KETERANGAN</th>
                                        <Th>TANGGAL REKAM</Th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($rekam as $r){?>
                                    <tr>
                                        <td><?php echo $r->id_rekam; ?></td>
                                        <td><?php echo $r->keterangan; ?></td>
                                        <td><?php echo $r->waktu; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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