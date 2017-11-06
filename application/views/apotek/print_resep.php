<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<center>
		<h3>POLIKLINIK PELANGI KASIH</h3>
		<b>Bahagiamu SukaCita Ku</b><br>
		Kartu Resep<br>
		<hr width="100%" height="75"></hr><br>
	</center>
	POLIKLINIK PELANGI KASIH<br>
	Jl.Lumajang Kota, No. 59, Lumajang<BR><br>

	<table>
		<?php foreach ($pasien as $val) {?>
		<tr>
			<td>ID Pasien</td>
			<td>:</td>
			<td><?php echo $val->id_pasien; ?></td>
		</tr>
		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td><?php echo $val->nama_pasien; ?></td>
		</tr>
		<?php } ?>
	</table><br><br>
	<table border="1" width="100%">
			<tr>
				<th>ID Resep</th>
				<th>Nama Obat</th>
				<th>Dosis</th>
				<th>Jumlah Obat</th>
				<th>Total Harga</th>
			</tr>
			<?php  
			$subtot = 0;
			foreach ($resep as $lue) {
			?>
			<tr>
				<td><?php echo $lue->id_resep; ?></td>
				<td><?php 
                    $where = array('id_obat' => $lue->id_obat);
                    $data = $this->db->get_where('obat',$where)->result();
                        foreach ($data as $key) {
                            echo $key->nama_obat;
                        }
                    ?></td>
				<td><?php echo $lue->dosis; ?></td>
				<td><?php echo $lue->jumlah_obat; ?></td>
				<td align="right">Rp. <?php echo number_format($lue->total_harga,2,',','.'); ?> ,-</td>
			</tr>
			<?php $subtot += $lue->total_harga; } ?>
			<tr>
				<td align="center" colspan="4">Sub Total</td>
				<td align="right">Rp. <?php echo number_format($subtot,2,',','.'); ?> ,-</td>
			</tr>
	</table>
</body>
</html>