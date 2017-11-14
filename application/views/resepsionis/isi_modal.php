<form id="form_validation">
	<?php $bulan = array(" ","Jan","Feb","Marc","Apr","Mei","Jun","July","Agust","Sept","Oct","Nov","Des"); 
	  $kelamin = array(" ","Laki-Laki","Perempuan");
	?>
	<div class="col-xs-12 col-md-6">
		<div class="form-group form-float">
			<div class="form-line">
			    ID Pasien <input type="text" class="form-control" value="<?php echo $key->id_pasien; ?>" readonly>
			</div>
		</div>
		<div class="form-group form-float">
			<div class="form-line">
			    Nama Pasien <input type="text" class="form-control" value="<?php echo $key->nama_pasien; ?>" readonly>
			</div>
		</div>
		<div class="form-group form-float">
			<div class="form-line">
			    Umur Pasien <input type="text" class="form-control" value="<?php echo $key->umur_pasien; ?> Tahun" readonly>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group form-float">
			<div class="form-line">
			    TTL Pasien <input type="text" class="form-control" value="<?php echo $key->tempat_lahir." ".$key->tanggal_lahir." ".$bulan[$key->bulan_lahir]." ".$key->tahun_lahir; ?>" readonly>
			</div>
		</div>
		<div class="form-group form-float">
			<div class="form-line">
			    No Hp <input type="text" class="form-control" value="<?php echo $key->no_hp; ?>" readonly>
			</div>
		</div>
		<div class="form-group form-float">
			<div class="form-line">
			    Jenis Kelamin <input type="text" class="form-control" value="<?php echo $kelamin[$key->jenis_kelamin]; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group form-float">
			<div class="form-line">
			    Alamat <textarea class="form-control" readonly><?= $key->alamat ?></textarea>
			</div>
		</div>
	</div>
</form>