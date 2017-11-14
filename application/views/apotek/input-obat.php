<!DOCTYPE html>
<html>
<head>
	<?php include 'css.php'; ?>
    <?php include 'js.php'; ?>
</head>
<body class="theme-red">
	<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Input Obat</h1>
            </div>
            <form method="post" action="<?php echo base_url('index.php/poli/tambahdokter'); ?>">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <center>
                                    <div id="image-preview">
                                        <label for="image-upload" id="image-label">Pilih Foto</label>
                                            <input type="file" accept="img/*" name="image" id="image-upload" />
                                    </div>
                                    </center>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="obat" type="text" class="form-control" placeholder="Nama Obat" />
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="dist" class="form-control" placeholder="Distributor">
                                    </div>
                                </div>
                                        <p>
                                            <b>Pilih Jenis Obat</b>
                                        </p>
                                        <select name="kategori" id="" class="form-control show-tick">
                                            <?php 
                                            $jenis = array(
                                                '1' => 'Pil' ,
                                                '2' => 'Syrup',
                                                '3' => 'Obat Tetes',
                                                '4' => 'Plester' ); 
                                                foreach ($jenis as $j => $value) { ?>
                                                <option value="<?php echo $j; ?>"><?php echo $value ?></option>
                                            <?php  } ?>
                                        </select><br><br>
                                        <p>
                                            <b>Pilih Kategori Obat</b>
                                        </p>
                                        <select name="kategori" id="" class="form-control show-tick">
                                            
                                        </select><br><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="stok" type="number" class="form-control" placeholder="Stok Barang" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <b>Harga Satuan</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Rp.
                                            </span>
                                            <div class="form-line">
                                                <input type="number" class="form-control" placeholder="Cth : 50000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="bio" rows="4" class="form-control no-resize" placeholder="Bio"></textarea>
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
	
</body>
</html>