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
		<?php foreach ($pasien as $p) {
			$bayar = $p->id_bayar;
		?>
		<tr>
			<td>ID pembayaran</td>
			<td>:</td>
			<td><?php echo $p->id_bayar; ?></td>
		</tr>
		<tr>
			<td>ID Pasien</td>
			<td>:</td>
			<td><?php echo $p->id_pasien; ?></td>
		</tr>
		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td><?php echo $p->nama_pasien; ?></td>
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
			$resep = $this->db->query("SELECT
                                                    pembayaran.id_bayar,
                                                    obat.nama_obat,
                                                    resep.jumlah_obat,
                                                    resep.dosis,
                                                    resep.total_harga,
                                                    pembayaran.id_pasien,
                                                    resep.id_resep,
                                                    obat.id_obat
                                                    FROM
                                                    pembayaran
                                                    INNER JOIN resep ON pembayaran.id_bayar = resep.id_bayar
                                                    INNER JOIN obat ON resep.id_obat = obat.id_obat
                                                    WHERE pembayaran.id_bayar = '$bayar' ")->result();
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