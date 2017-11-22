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
            </div>
            <?php foreach ($pasien as $p): ?>           
            <form method="post" action="<?php echo base_url('index.php/admin/up_pas/').$p->id_pasien; ?>">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h1>Edit Pasien</h1>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <input type="hidden" name="id" value="<?php echo $p->id_pasien; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input value="<?php echo $p->nama_pasien; ?>" name="pasien" type="text" class="form-control" />
                                            <label class="form-label">NAMA PASIEN</label>
                                        </div>
                                    </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input value="<?php echo $p->tempat_lahir ?>" type="text" name="tempat" class="form-control">
                                        <label class="form-label">TEMPAT LAHIR</label>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <b>Tanggal</b>
                                            </p>
                                    <select name="tanggal" class="form-control show-tick">
                                         <?php
                                            for ($i=1; $i<=31 ; $i++) { 
                                            echo '<option value="'.$i.'"';
                                                if ($i==$p->tanggal_lahir) {
                                                    echo ' selected="selected"';
                                                } echo '>'.$i.'</option>\n';          
                                            }             
                                             ?>
                                    </select>
                                        </div>
                                        <div class="col-md-4">
                                            <p>
                                                <b>Bulan</b>
                                            </p>
                                    <select name="bulan" class="form-control show-tick">
                                    <?php 
                                    $months = array('1' => 'Januari', '2'=>'Februari', '3'=>'Maret', '4'=>'April', '5'=>'Mei', '6'=>'Juni', '7'=>'Juli', '8'=>'Agustus', '9'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember');
                                    ?>
                                    <?php
                                        foreach ($months as $key=> $value) {
                                        echo '<option value="'.$key.'"';
                                        if ($key==$p->bulan_lahir) {
                                        echo ' selected="selected"';
                                        } echo '>'.$value.'</option>\n';
                                        }
                                    ?>
                                        
                                    </select>
                                        </div>
                                        <div class="col-md-4">
                                            <p>
                                                <b>Tahun</b>
                                            </p>
                                            <select name="tahun" class="form-control show-tick">
                                            <?php
                                            $starting_year  =date('Y', strtotime('-60 year'));
                                            $ending_year = date('Y');
                                            $current_year = date('Y');
                                            for($starting_year; $starting_year <= $ending_year; $starting_year++) {
                                                echo '<option value="'.$starting_year.'"';
                                                if( $starting_year ==  $p->tahun_lahir ) {
                                                echo ' selected="selected"';
                                                }
                                                echo ' >'.$starting_year.'</option>';
                                                }               
                                             ?>
                                             </select>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="telpon" value="<?php echo $p->no_hp; ?>" type="text" class="form-control" />
                                            <label class="form-label">NOMOR TELEPON</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="alamat" rows="4" class="form-control no-resize" placeholder="Alamat Dokter" value="<?php echo $p->alamat; ?>"><?php echo $p->alamat; ?></textarea>
                                            <label class="form-label">ALAMAT</label>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                         <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <b>Jenis Kelamin</b>
                                            </p>
                                    <select name="gender" class="form-control show-tick">
                                        <?php 
                                    $gender = array('1' => 'Laki-laki', '2'=>'Perempuan');
                                    ?>
                                    <?php
                                        foreach ($gender as $key=> $value) {
                                        echo '<option value="'.$key.'"';
                                        if ($key==$p->jenis_kelamin) {
                                        echo ' selected="selected"';
                                        } echo '>'.$value.'</option>\n';
                                        }
                                    ?>
                                    </select>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect">
                                                <i class="material-icons">add</i>
                                                <span>Update</span>
                                            </button>
                                            <a href="<?php echo base_url('index.php/admin/pasien'); ?>" class="btn btn-primary waves-effect">
                                                <i class="material-icons">exit_to_app</i>
                                                <span>Kembali</span>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php endforeach ?>
        </div>
    </section>
	<?php include 'js.php'; ?>
</body>
</html>