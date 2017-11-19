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
	<table border="1">
		<thead>
			<tr>
				<th>ID Rekam</th>
				<th>ID Pasien</th>
				<th>Keterangan</th>
				<th>Tanggal Rekam</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			foreach ($cetak as $key) {
			?>
			<tr>
				<td><?php echo $key->id_rekam; ?></td>
				<td><?php echo $key->id_pasien; ?></td>
				<td><?php echo $key->keterangan; ?></td>
				<td><?php echo $key->waktu; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>