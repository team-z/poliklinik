<!DOCTYPE html>
<html>
<head>
	<?php include 'css.php'; ?>
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
</head>
<body class="theme-deep-purple">
	<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Input Obat</h1>
            </div>
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/apoteker/input'); ?>">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
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
                                            <input name="obat" type="text" class="form-control" placeholder="Nama Obat" />
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
                                                foreach ($jenis as $j => $value) { ?>
                                                <option value="<?php echo $j; ?>"><?php echo $value ?></option>
                                            <?php  } ?>
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
                                                foreach ($kategori as $k => $value) { ?>
                                                <option value="<?php echo $k; ?>"><?php echo $value ?></option>
                                            <?php  } ?>
                                        </select><br><br>
                                    <div class="form-group">
                                        <b>Harga Satuan</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Rp.
                                            </span>
                                            <div class="form-line">
                                                <input type="number" name="harga_satuan" class="form-control" placeholder="Cth : 50000">
                                            </div>
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