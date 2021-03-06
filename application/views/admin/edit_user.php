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
            <?php foreach ($user as $u): ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h1>Edit User</h1>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <center>
                                    <div class="form-group">
                                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/admin/update_image/').$u->id; ?>">

                                            <h1>Pilih foto</h1>

                                            <img id="preview" src="<?php if ($u->gambar=="") {
                                                echo base_url('images/person.png');
                                            }else{echo base_url('uploads/').$u->gambar;} ?>" height="200" width="200" class="img-circle" alt="User Image"/>

                                            <input accept="image/*" onchange="tampilkanPreview(this,'preview')" type="file" value="<?php echo $u->gambar; ?>" name="gambar">

                                            <input type="hidden" name="image" value="<?php echo $u->gambar; ?>"><br>

                                            <button type="submit" class="btn btn-danger btn-lg"><i class="material-icons">camera_alt</i><span>Update Foto</span></button>

                                        </form>
                                    </div>
                                    </center>
                                </div>
                                <form method="post" action="<?php echo base_url('index.php/admin/updateuser/').$u->id; ?>">
                                <input value="<?php echo $u->status ?>" type="hidden" name="status" >
                                <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?php echo $u->nama_lengkap; ?>" name="nama">
                                        <label class="form-label">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?php echo $u->user; ?>" name="user">
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>
                                    <input type="hidden" name="img" value="<?php echo $u->gambar; ?>"><br>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input value="<?php echo $u->password ?>" type="password" name="password" class="form-control" placeholder="Password">
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="telpon" value="<?php echo $u->no_hp; ?>" type="text" class="form-control" />
                                            <label class="form-label">Nomor telepon</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="alamat" rows="4" class="form-control no-resize" value="<?php echo $u->alamat; ?>"><?php echo $u->alamat; ?></textarea>
                                            <label class="form-label">Alamat</label>
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
                                                if ($i==$u->tanggal_lahir) {
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
                                        if ($key==$u->bulan_lahir) {
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
                                                if( $starting_year ==  $u->tahun_lahir ) {
                                                echo ' selected="selected"';
                                                }
                                                echo ' >'.$starting_year.'</option>';
                                                }               
                                             ?>
                                             </select>
                                        </div>
                                    </div><br>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="tempat" value="<?php echo $u->tempat_lahir; ?>" type="text" class="form-control"/>
                                            <label class="form-label">Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect">
                                                <i class="material-icons">add</i>
                                                <span>Update</span>
                                            </button>
                                            <a href="<?php echo base_url('index.php/admin/user'); ?>" class="btn btn-primary waves-effect">
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