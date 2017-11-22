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
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/admin/add_user'); ?>">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1>Input User</h1>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                <center>
                                            <h1>Pilih foto</h1>

                                            <img id="preview" src="<?php echo base_url('images/person.png'); ?>" height="200" width="200" class="img-circle" alt="User Image"/>

                                            <input accept="image/*" onchange="tampilkanPreview(this,'preview')" type="file" name="gambar">
                                </center>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="user" type="text" class="form-control" placeholder="Username" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="password" type="text" class="form-control" placeholder="Password" />
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <b>Tanggal</b>
                                            </p>
                                    <select name="tanggal" class="form-control show-tick">
                                        <?php 
                                         for ($i=1; $i<=31 ; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                         <?php } ?>
                                        
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
                                        echo '<option value="' . $key . '">' . $value . '</option>\n';
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
                                    </div><br>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="status">
                                            <option value="">--Pilih Status--</option>
                                            <option value="admin">Admin</option>
                                            <option value="poli">Poli</option>
                                            <option value="kasir">Kasir</option>
                                            <option value="resepsionis">Resepsionis</option>
                                            <option value="apotek">Apoteker</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="telpon" type="text" class="form-control" placeholder="No Telepon" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="alamat" rows="4" class="form-control no-resize" placeholder="Alamat Pasien"></textarea>
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
            </div>
            </form>
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