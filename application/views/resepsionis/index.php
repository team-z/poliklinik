<!DOCTYPE html>
<html>
<head>
	<?php include 'top-res.php'; ?>
</head>
<body class="theme-red">
<?php include 'navigasi-res.php'; ?>
	<?php include 'sidebar-res.php'; ?>

	<section class="content">
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
	                                        <input type="text" class="form-control" name="nama_pasien" required>
	                                        <label class="form-label">Nama Pasien</label>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" name="umur_pasien" required>
	                                        <label class="form-label">Umur Pasien</label>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" name="tempat_lahir" required>
	                                        <label class="form-label">Tempat Lahir</label>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                        <div class="row">
	                                        	<div class="col-md-4">
		                                        	 <select class="form-control show-tick" name="tahun_lahir">
				                                        <option value="">Lahir Tahun</option>
				                                        <option value="1990">1990</option>
				                                        <option value="1991">1991</option>
				                                        <option value="1992">1992</option>
				                                        <option value="1993">1993</option>
				                                        <option value="1994">1994</option>
				                                        <option value="1995">1995</option>
				                                        <option value="1996">1996</option>
				                                        <option value="1997">1997</option>
				                                        <option value="1998">1998</option>
				                                        <option value="1999">1999</option>
				                                        <option value="2000">2000</option>
				                                    </select>
		                                        </div>
		                                        <div class="col-md-4">
		                                        	 <select class="form-control show-tick"  name="bulan_lahir">
				                                        <option value="">Lahir Bulan</option>
				                                        <option value="01">Januari</option>
				                                        <option value="02">Febuari</option>
				                                        <option value="03">Maret</option>
				                                        <option value="04">April</option>
				                                        <option value="05">Mei</option>
				                                        <option value="06">Juni</option>
				                                        <option value="07">Juli</option>
				                                        <option value="08">Agustus</option>
				                                        <option value="09">September</option>
				                                        <option value="10">Oktober</option>
				                                        <option value="11">November</option>
				                                        <option value="12">Desember</option>
				                                    </select>
		                                        </div>
		                                        <div class="col-md-4">
		                                        	 <select class="form-control show-tick" name="tanggal_lahir">
				                                        <option value="">Lahir Tanggal</option>
				                                        <option value="01">01</option>
				                                        <option value="02">02</option>
				                                        <option value="03">03</option>
				                                        <option value="04">04</option>
				                                        <option value="05">05</option>
				                                        <option value="06">06</option>
				                                        <option value="07">07</option>
				                                        <option value="08">08</option>
				                                        <option value="09">09</option>
				                                        <option value="10">10</option>
				                                        <option value="11">11</option>
				                                        <option value="12">12</option>
				                                        <option value="13">13</option>
				                                        <option value="14">14</option>
				                                        <option value="15">15</option>
				                                        <option value="16">16</option>
				                                        <option value="17">17</option>
				                                        <option value="18">18</option>
				                                        <option value="19">19</option>
				                                        <option value="20">20</option>
				                                        <option value="21">21</option>
				                                        <option value="22">22</option>
				                                        <option value="23">23</option>
				                                        <option value="24">24</option>
				                                        <option value="25">25</option>
				                                        <option value="26">26</option>
				                                        <option value="27">27</option>
				                                        <option value="28">28</option>
				                                        <option value="29">29</option>
				                                        <option value="30">30</option>
				                                        <option value="31">31</option>
				                                    </select>
		                                        </div>
	                                        </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" name="no_hp" required>
	                                        <label class="form-label">No Handphone</label>
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
	                                        <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required></textarea>
	                                        <label class="form-label">Alamat</label>
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
	                                        <input onkeyup="id_hasil(value)" type="text" class="form-control" name="id_pasien" required>
	                                        <label class="form-label">ID Pasien</label>
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" placeholder="Nama Pasien" required>
	                                        
	                                    </div>
	                                </div>
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <select class="form-control show-tick" name="id_poli">
		                                        <option value="">-----pilih Poli-----</option>
		                                        <?php  
		                                        $con = mysqli_connect("localhost","root","","poliklinik");
		                                        $sql = mysqli_query($con, "SELECT * FROM poli");
		                                        while ($kol = mysqli_fetch_array($sql)) {
		                                        ?>
		                                        <option value="<?php echo $kol['id_poli']; ?>"><?php echo $kol['nama_poli']; ?></option>
		                                        <?php } ?>
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
	                                        <textarea name="keterangan" cols="30" rows="5" class="form-control no-resize" required></textarea>
	                                        <label class="form-label">Keterangan/Keluhan</label>
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
	</script>
	<?php include 'bottom-res.php'; ?>
</body>
</html>