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
                <h1>Edit Dokter</h1>
            </div>
            <?php foreach ($data as $d): ?>           
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <center>
                                    <div class="form-group">
                                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/poli/update_image/').$d->id_dokter; ?>">

                                            <h1>Pilih foto</h1>

                                            <img id="preview" src="<?php if ($d->foto=="") {
                                                echo base_url('images/person.png');
                                            }else{echo base_url('uploads/').$d->foto;} ?>" height="200" width="200" class="img-circle" alt="User Image"/>

                                            <input accept="image/*" onchange="tampilkanPreview(this,'preview')" type="file" value="<?php echo $d->foto; ?>" name="gambar">

                                            <input type="hidden" name="image" value="<?php echo $d->foto; ?>"><br>

                                            <button type="submit" class="btn btn-danger btn-lg"><i class="material-icons">camera_alt</i><span>Update Foto</span></button>

                                        </form>
                                    </div>
                                    </center>
                                </div>
                                <form enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/poli/updatedokter/').$d->id_dokter; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="<?php echo $d->nama_dokter; ?>" name="dokter" type="text" class="form-control" placeholder="Nama Dokter" />
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input value="<?php echo $d->tempat_lahir ?>" type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
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
                                                if ($i==$d->tanggal_lahir) {
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
                                        if ($key==$d->bulan_lahir) {
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
                                                if( $starting_year ==  $d->tahun_lahir ) {
                                                echo ' selected="selected"';
                                                }
                                                echo ' >'.$starting_year.'</option>';
                                                }               
                                             ?>
                                             </select>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                             <p>
                                                <b>Poli</b>
                                            </p>
                                    <select name="poli" class="form-control show-tick">
                                       <?php
                                        $link = mysqli_connect('localhost','root','','poliklinik');
                                        $query = mysqli_query($link,"SELECT * FROM poli");
                                        while ($data = mysqli_fetch_array($query)) { 
                                        echo '<option value="'.$data['id_poli'].'"';
                                                if( $data['id_poli'] ==  $d->id_poli ) {
                                                echo ' selected="selected"';
                                                }
                                                echo ' >'.$data['nama_poli'].'</option>';
                                        }?>
                                        
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="telpon" value="<?php echo $d->no_hp; ?>" type="text" class="form-control" placeholder="No Telepon" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="alamat" rows="4" class="form-control no-resize" placeholder="Alamat Dokter"><?php echo $d->alamat; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="bio" rows="4" class="form-control no-resize" placeholder="Bio"><?php echo $d->bio; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect">
                                                <i class="material-icons">add</i>
                                                <span>Update</span>
                                            </button>
                                            <a href="<?php echo base_url('index.php/poli/index'); ?>" class="btn btn-info waves-effect">
                                                <i class="material-icons">exit_to_app</i>
                                                <span>Kembali</span>
                                            </a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </section>
	<?php include 'js.php'; ?>
    <script>
            function tampilkanPreview(gambar,idpreview){
                var gb = gambar.files;
                for (var i = 0; i < gb.length; i++){
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
                        preview.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(preview);
                        reader.readAsDataURL(gbPreview);
                    }else{
                        alert("file yang anda upload tidak sesuai. Khusus mengunakan image.");
                    }
                   
                }    
            }
        </script>
</body>
</html>