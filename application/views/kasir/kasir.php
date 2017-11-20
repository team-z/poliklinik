<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'top-kas.php'; ?>
</head>
<body class="theme-red">
	<?php include 'navigasi.php'; ?>
	<?php include 'sidebar.php'; ?>
	<section class="content">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-md-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h3>Tabel Pencarian</h3>
						</div>
						<div class="body">
							<table class="table table-striped data">
								<thead>
									<tr>
										<th align="center">No.</th>
										<th align="center">ID Pasien</th>
										<th align="center">Nama Pasien</th>
										<th align="center">Biaya Daftar</th>
										<th align="center">Biaya Dokter</th>
										<th align="center">Biaya Obat</th>
										<th align="center">Total Biaya</th>
									</tr>
								</thead>
								<tbody>
									<?php  
									$no=1;
									foreach ($kasir as $key) {
									?>
									<tr>
										<td align="center"><?php echo $no++; ?></td>
										<td align="center"><?php echo $key->id_pasien; ?></td>
										<td align="left"><?php echo $key->nama_pasien; ?></td>
										<td align="right">Rp.<?php echo number_format($key->biaya_daftar,2,',','.'); ?> ,-</td>
										<td align="right">Rp.<?php echo number_format($key->biaya_dokter,2,',','.'); ?> ,-</td>
										<td align="right">Rp.<?php echo number_format($key->biaya_obat,2,',','.'); ?> ,-</td>
										<td align="right">Rp.<?php echo number_format($key->total_biaya,2,',','.'); ?> ,-</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h3>Form Pembayaran</h3>
						</div>
						<br><br>
						<div class="body">
							<div class="row">
							<form method="POST">
								<div class="col-md-10 col-sm-12">
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" class="form-control" name="key" placeholder="Cari ID Pasien" required>
										</div>
									</div>
								</div>
								<div class="col-md-2 col-sm-12">
									<div class="form-group form-float">
										<button type="submit" name="submit" class="btn btn-info waves-effect"><i class="material-icons">search</i></button>
									</div>
								</div>
							</form>
								<?php  
								if (isset($_POST['submit'])) {
								$key = $_POST['key'];
								$con = mysqli_connect("localhost","root","","poliklinik");

								$query1 = mysqli_query($con, "SELECT
																pasien.nama_pasien,
																pembayaran.id_bayar,
																pembayaran.id_pasien,
																pembayaran.biaya_daftar,
																pembayaran.biaya_dokter,
																pembayaran.biaya_obat,
																pembayaran.total_biaya
																FROM
																pasien
																INNER JOIN pembayaran ON pasien.id_pasien = pembayaran.id_pasien
																WHERE pasien.id_pasien = '$key' ");
								$query = mysqli_fetch_array($query1);
									if (empty($query)) {
												
										} else {?>
								<form action="<?php echo base_url('index.php/kasir/tebus'); ?>" target="_blank" method="POST">
									<div class="col-sm-6">
										<div class="input-group">
	                                        <span class="input-group-addon">
	                                            ID Rekam :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="id_bayar" value="<?php echo $query['id_bayar']; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="input-group">
	                                        <span class="input-group-addon">
	                                            ID Pasien :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="id_pasien" value="<?php echo $query['id_pasien']; ?>">
	                                        </div>
	                                    </div>
	                                     <div class="input-group">
	                                        <span class="input-group-addon">
	                                            Nama Pasien :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" value="<?php echo $query['nama_pasien']; ?>">
	                                        </div>
	                                    </div>
	                                     <div class="input-group">
	                                        <span class="input-group-addon">
	                                            Biaya Pendaftaran :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="biaya_daftar" value="<?php echo $query['biaya_daftar']; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="input-group">
	                                        <span class="input-group-addon">
	                                            Biaya Dokter :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="biaya_dokter" value="<?php echo $query['biaya_dokter']; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="input-group">
	                                        <span class="input-group-addon">
	                                            Biaya Obat :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="biaya_obat" value="<?php echo $query['biaya_obat']; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="input-group">
	                                        <span class="input-group-addon">
	                                            Sub Total :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="biaya_total" id="total" value="<?php echo $query['total_biaya']; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="input-group">
	                                        <span class="input-group-addon">
	                                            Yang Dibayar :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="uang_bayar" id="bayar">
	                                        </div>
	                                    </div>
	                                    <div class="input-group">
	                                        <span class="input-group-addon">
	                                            Kembalian :
	                                        </span>
	                                        <div class="form-line">
	                                            <input type="text" class="form-control date" name="kembalian" id="hasil">
	                                        </div>
	                                    </div>
	                                     <div class="input-group">
	                                        <button type="submit" class="btn btn-info waves-effect"><i class="material-icons">save</i> Simpan</button>
	                                    </div>
									</div>	
								</form>		
								<?php		}
											
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $("form").prop('autocomplete', 'on');
	    });

	    $("#bayar").keyup(function(){
	        var total    = parseInt($("#total").val());
	        var bayar = parseInt($(this).val());

	        $("#hasil").val(bayar - total); 
	        // $("#potongan_insert").val(potongan);
	    });
	</script>
	<?php include 'bottom-kas.php'; ?>
</body>
</html>