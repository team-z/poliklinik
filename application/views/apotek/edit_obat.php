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
                <h1>Edit Obat</h1>
            </div>
            <?php foreach ($obat as $o) { ?>
            <form method="post" action="<?php echo base_url('index.php/apoteker/edit_obat/'); ?>">
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
                                <input type="hidden" name="id" value="<?php echo $o->id_obat; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="obat" type="text" class="form-control" placeholder="Nama Obat" value="<?php echo $o->nama_obat; ?>" />
                                        </div>
                                    </div>
                                        <p>
                                            <b>Pilih Jenis Obat</b>
                                        </p>
                                        <select name="type" id="" class="form-control show-tick">
                                            <?php 
                                            $jenis = array(
                                                '1' => 'Pil' ,
                                                '2' => 'Syrup',
                                                '3' => 'Obat Tetes',
                                                '4' => 'Plester',
                                                '5' => 'Kapsul' ); 
                                                foreach ($jenis as $key=> $value) {
                                        echo '<option value="'.$key.'"';
                                        if ($key==$o->type) {
                                        echo ' selected="selected"';
                                        } echo '>'.$value.'</option>\n';
                                        } ?>
                                        </select><br><br>
                                        <p>
                                            <b>Pilih Kategori Obat</b>
                                        </p>
                                        <select name="kategori" id="" class="form-control show-tick">
                                             <?php 
                                            $kategori = array(
                                                '1' => 'keras' ,
                                                '2' => 'bebas',
                                                '3' => 'psikotropika',
                                                '4' => 'rendah' ); 
                                                foreach ($kategori as $key=> $value) {
                                        echo '<option value="'.$key.'"';
                                        if ($key==$o->kategori) {
                                        echo ' selected="selected"';
                                        } echo '>'.$value.'</option>\n';
                                        } ?>
                                        </select><br><br>
                                    <div class="form-group">
                                        <b>Harga Satuan</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Rp.
                                            </span>
                                            <div class="form-line">
                                                <input type="number" name="harga_satuan" class="form-control" placeholder="Cth : 50000" value="<?php echo $o->harga_satuan; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect">
                                                <i class="material-icons">update</i>
                                                <span>Update</span>
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php } ?>
        </div>
    </section>
    
</body>
</html>