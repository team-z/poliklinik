<!DOCTYPE html>
<html>
<head>
	<?php include 'top-res.php'; ?>
	<style type="text/css">
		.index {
			margin-top: 100px;
			margin-left: 30px;
		}
	</style>
</head>
<body class="theme-red">
<?php include 'navigasi-res.php'; ?>
	<?php include 'sidebar-res.php'; ?>

	<section class="content index">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-md-6 col-xs-12">
					<div class="card">
	                       <div class="header">
	                            <h2>Input Pasien</h2>
	                       </div>
	                       <div class="body">
	                            <form id="form_validation" action="<?php echo base_url('index.php/Resepsionis/tambah_pasien'); ?>" method="POST">
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pasien" required>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" name="umur_pasien"  placeholder="Umur Pasien" required>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir"  required>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                        <div class="row">
	                                        	<div class="col-md-4">
		                                        	 <select name="tahun_lahir" class="form-control show-tick">
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
		                                        <div class="col-md-4">
		                                        	   <select name="bulan_lahir" class="form-control show-tick">
					                                        <?php 
					                                    $months = array('01' => 'Januari', '02'=>'Februari', '03'=>'Maret', '04'=>'April', '05'=>'Mei', '06'=>'Juni', '07'=>'Juli', '08'=>'Agustus', '09'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember');
					                                    ?>
					                                    <?php
					                                        foreach ($months as $key=> $value) {
					                                        echo '<option value="' . $key . '">' . $value . '</option>\n';
					                                        }
					                                    ?>
					                                    </select>
		                                        </div>
		                                        <div class="col-md-4">
		                                        	 <select name="tanggal_lahir" class="form-control show-tick">
				                                        <?php 
				                                         for ($i=1; $i<=31 ; $i++) { ?>
				                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				                                         <?php } ?>
				                                    </select>
		                                        </div>
	                                        </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" name="no_hp" placeholder="No Handphone"  required>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <input type="radio" name="jenis_kelamin" id="1" value="1" class="with-gap">
	                                    <label for="1">Laki-Laki</label>

	                                    <input type="radio" name="jenis_kelamin" id="2" value="2" class="with-gap">
	                                    <label for="2" class="m-l-20">Perempuan</label>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <textarea name="alamat" placeholder="Alamat" cols="30" rows="5" class="form-control no-resize" required></textarea>
	                                    </div>
	                                </div>
	                                <button class="btn btn-primary waves-effect" type="submit">Kirim</button>
	                            </form>
	                       </div>
	                </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="card">
	                       <div class="header">
	                            <h2>Pendaftaran</h2>
	                       </div>
	                       <div class="body">
	                            <form id="form_validation" action="<?php echo base_url('index.php/Resepsionis/tambah_pendaftaran'); ?>" method="POST">
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input onkeyup="id_hasil(value)" type="text" class="form-control" name="id_pasien" placeholder="ID Pasien" required>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" placeholder="Nama Pasien" required>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <select  class="form-control show-tick" name="id_poli" id="poli">
		                                        <option value="">-----pilih Poli-----</option>
		                                        <?php
                                            $data = $this->db->get('poli')->result(); 
                                            foreach ($data as $p) { ?>    
                                            <option value="<?php echo $p->id_poli; ?>"><?php echo $p->nama_poli; ?></option>
                                            <?php } ?>
		                                    </select>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-group">
											<select class="form-control show tick" name="dokter" id="dokter">
												<option>-- Pilih Dokter --</option>
											</select>
										</div>
	                                </div>
	                                 <div class="form-group form-float">
	                                    <div class="form-line">	
	                                        <input type="text" class="form-control" name="biaya" value="50000" readonly>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <textarea name="keterangan" placeholder="Keterangan/Keluhan" cols="30" rows="5" class="form-control no-resize" required></textarea>
	                                    </div>
	                                </div>
	                                <button class="btn btn-success waves-effect" type="submit">Cetak</button>
	                            </form>
	                       </div>
	                </div>
				</div>
				<div class="col-xs-12">
					<div class="card">
						<div class="header">
							<h2>Tabel Pencarian Pasien</h2>
						</div>
						<div class="body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped data">
									<thead>
										<tr>
											<th>No.</th>
											<th>ID Pasien</th>
											<th>Nama Pasien</th>
											<th>Umur</th>
											<th>Jenis Kelamin</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($pasien as $key) { ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $key->id_pasien; ?></td>
											<td><?php echo $key->nama_pasien; ?></td>
											<td><?php echo $key->umur_pasien; ?></td>
											<td><?php if($key->jenis_kelamin == "1") {
												echo "Laki-Laki";
											} elseif ($key->jenis_kelamin == "2") {
												echo "Perempuan"; 
											}?></td>
											<td>
												 <a href="" data-color="cyan" class="btn bg-cyan waves-effect" data-toggle="modal" data-target="#defaultModal<?= $no?>"><i class="material-icons">search</i> <span class="icon-name"></span></a>

												 <!-- Default Size -->
												<div class="modal fade" id="defaultModal<?= $no?>" tabindex="-1" role="dialog">
									                <div class="modal-dialog" role="document">
									                    <div class="modal-content">
									                        <div class="modal-header">
									                            <h4 class="modal-title" id="defaultModalLabel">Detail</h4>
									                        </div>
									                        <div class="modal-body">
									                           <?php include 'isi_modal.php'; ?>
									                        </div>
									                        <div class="modal-footer">
									                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="material-icons">clear</i> <span class="icon-name"></span></button>
									                        </div>
									                    </div>
									                </div>
									            </div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include 'bottom-res.php'; ?>
	<script>
		function id_hasil(value) {
			$.ajax({
				url : '<?php echo base_url("index.php/Resepsionis/ambil_data_id") ?>',
				method : 'POST',
				data : { id : value },
				dataType  : 'JSON',
				success : function(data){
					$('#nama_pasien').val('');
					$('#nama_pasien').val(data.nama_pasien);
				}
			})
		}
		$(document).ready(function () {
			$("#poli").change(function () {
				var id = $(this).val();

				$.ajax({
					url: '<?php echo base_url() ?>index.php/Resepsionis/ambil_data_poli/' + id,
					method : 'POST',
					dataType:'json',
					success : function(res){
						console.log(res[0].nama_dokter);
						for (var i = 0; i < res.length; i++) {
							$("#dokter").append($('<option></option>').attr('value', res[i].id_dokter).text(res[i].nama_dokter));
						}
					}
				})
			})
		})
	</script>
</body>
</html>