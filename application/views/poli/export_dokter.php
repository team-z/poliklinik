<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<center>
		<h3>POLIKLINIK PELANGI KASIH</h3>
		<b>Bahagiamu SukaCita Ku</b><br>
		Daftar Dokter<br>
		<hr width="100%" height="75"></hr><br>
	</center>
	POLIKLINIK PELANGI KASIH<br>
	Jl.Lumajang Kota, No. 59, Lumajang<BR><br>
	<table border="1">
		<thead>
			<tr>
				<th>ID Dokter</th>
				<th>Nama Dokter</th>
				<th>Alamat</th>
				<th>No Hp</th>
				<th>Spesialis</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			foreach ($dok as $key) {
			?>
			<tr>
				<td><?php echo $key->id_dokter; ?></td>
				<td><?php echo $key->nama_dokter; ?></td>
				<td><?php echo $key->alamat; ?></td>
				<td><?php echo $key->no_hp; ?></td>
				<td><?php echo $key->spesialisasi; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>