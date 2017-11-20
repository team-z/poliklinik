<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<center>
		<h3>POLIKLINIK PELANGI KASIH</h3>
		<b>Bahagiamu SukaCita Ku</b><br>
		Kartu Pendaftaran<br>
		<hr width="100%" height="75"></hr><br>
	</center>
	POLIKLINIK PELANGI KASIH<br>
	Jl.Lumajang Kota, No. 59, Lumajang<BR><br>
	<table>
		<?php  
		foreach ($join as $key) {
		?>
		<tr>
			<td>Nomor Pendaftaran</td>
			<td>:</td>
			<td><?php echo $id_pendaftaran; ?></td>
		</tr>
		<tr>
			<td>ID Pasien</td>
			<td>:</td>
			<td><?php echo $id_pasien; ?></td>
		</tr>
		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td><?php echo $key->nama_pasien; ?></td>
		</tr>
		<tr>
			<td>Poli</td>
			<td>:</td>
			<td><?php echo $id_poli; ?></td>
		</tr>
		<tr>
			<td>Dokter</td>
			<td>:</td>
			<td><?php echo $key->nama_dokter; ?></td>
		</tr>
		<tr>
			<td>Tanggal Pendaftaran</td>
			<td>:</td>
			<td><?php echo $key->tanggal_pendaftaran; ?></td>
		</tr>
		<tr>
			<td>Biaya Pendaftaran</td>
			<td>:</td>
			<td>500000</td>
		</tr>
		<tr>
			<td>Keterangan/Keluhan</td>
			<td>:</td>
			<td><?php echo $keterangan; ?></td>
		</tr>
		<?php } ?>
	</table>
	<br><br>
	Tanggal Cetak <?php date_default_timezone_set("Asia/Jakarta"); $tgl = date("d F Y h:i:sa"); echo $tgl; ?>
	<hr width="100%" height="75"></hr><br>
	Kartu ini harap dibawa saat menuju Poli yang anda Tuju, Tunjukan ke petugas Poli<br>
	<center>***Terima Kasih Dan Cepat Sembuh Ya***<br><br>POLIKLINIK PELANGAI KASIH</center>
</body>
</html>