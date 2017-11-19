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
				<th>Id Pasien</th>
                <th>Nama Pasien</th>
                <th>Biaya Pendaftaran</th>
                <th>Biaya Dokter</th>
                <th>Biaya Obat</th>
                <th>Total Biaya</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($kasir as $k) {
			?>
			<tr>
				<td align="center"><?php echo $k->id_pasien; ?></td>
                <td align="center"><?php echo $k->nama_pasien; ?></td>
                <td align="right">Rp.<?php echo number_format($k->biaya_daftar,2,',','.'); ?> ,-</td>
                <td align="right">Rp.<?php echo number_format($k->biaya_dokter,2,',','.'); ?> ,-</td>
                <td align="right">Rp.<?php echo number_format($k->biaya_obat,2,',','.'); ?>,-</td>
                <td align="right">Rp.<?php echo number_format($k->total_biaya,2,',','.'); ?> ,-</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>