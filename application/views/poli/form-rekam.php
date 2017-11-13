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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <b>Tanggal</b>
                                            </p>
                                    <select name="tanggal" class="form-control show-tick">
                                        <?php 
                                        $date = date("d");
                                         for ($i=1; $i<=31 ; $i++) {
                                       echo '<option value="'.$i.'"';
                                                if( $i ==  $date ) {
                                                echo ' selected="selected"';
                                                }
                                                echo ' >'.$i.'</option>';
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
                                    $month = date("m");
                                        foreach ($months as $key=> $value) {
                                        echo '<option value="'.$key.'"';
                                                if( $key ==  $month ) {
                                                echo ' selected="selected"';
                                                }
                                                echo ' >'.$value.'</option>';
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
                                                if( $starting_year ==  $current_year ) {
                                                echo ' selected="selected"';
                                                }
                                                echo ' >'.$starting_year.'</option>';
                                                }               
                                             ?>
                                             </select>
                                        </div>
                                    </div><br><br>
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
                            <h1>Riwayat Rekam Medis</h1>
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
                                        <td>
                                        <?php echo $r->tanggal; ?> - <?php echo $r->bulan; ?> - <?php echo $r->tahun; ?>
                                        </td>
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