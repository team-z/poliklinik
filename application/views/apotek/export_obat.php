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
				<th>ID Obat</th>
				<th>Nama Obat</th>
				<th>Type</th>
				<th>Stok</th>
				<th>Harga Satuan</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			foreach ($obat as $obt) {
			?>
			<tr>
				<td><?php echo $obt->id_obat; ?></td>
				<td><?php echo $obt->nama_obat; ?></td>
				<td><?php echo $obt->type; ?></td>
				<td><?php echo $obt->stok; ?></td>
				<td><?php echo $obt->harga_satuan; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>