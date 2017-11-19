<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<center>
		<h3>POLIKLINIK PELANGI KASIH</h3>
		<b>Bahagiamu SukaCita Ku</b><br>
		Struk Tebus Pembayaran<br>
		<hr width="100%" height="75"></hr><br>
	</center>
	POLIKLINIK PELANGI KASIH<br>
	Jl.Lumajang Kota, No. 59, Lumajang<BR><br>
	<table>
		<tr>
			<td>ID Pembayaran</td>
			<td>:</td>
			<td><?php echo $id_bayar; ?></td>
		</tr>
		<tr>
			<td>ID Pasien</td>
			<td>:</td>
			<td><?php echo $id_pasien; ?></td>
		</tr>
		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td><?php 
			$this->db->where('id_pasien', $id_pasien);
			$nama_pasien = $this->db->get('pasien')->row_array();
			echo $nama_pasien['nama_pasien']; ?></td>
		</tr>
		<tr>
			<td>Biaya Pendaftaran</td>
			<td>:</td>
			<td><?php echo number_format($biaya_daftar,2,',','.'); ?></td>
		</tr>
		<tr>
			<td>Biaya Dokter</td>
			<td>:</td>
			<td><?php echo number_format($biaya_dokter,2,',','.'); ?></td>
		</tr>
		<tr>
			<td>Biaya obat</td>
			<td>:</td>
			<td><?php echo number_format($biaya_obat,2,',','.'); ?></td>
		</tr>
		<tr>
			<td>Sub Total</td>
			<td>:</td>
			<td><?php echo number_format($biaya_total,2,',','.'); ?></td>
		</tr>
		<tr>
			<td>Uang Pembayaran</td>
			<td>:</td>
			<td><?php echo number_format($uang_bayar,2,',','.'); ?></td>
		</tr>
		<tr>
			<td>Kembalian</td>
			<td>:</td>
			<td><?php echo number_format($kembalian,2,',','.'); ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td><?php echo $status; ?></td>
		</tr>
	</table>
	<br><br>
	Tanggal Cetak <?php date_default_timezone_set("Asia/Jakarta"); $tgl = date("d F Y h:i:sa"); echo $tgl; ?>
	<hr width="100%" height="75"></hr><br>
	Kartu ini adalah BUKTI bahwa anda telah melunasi Pembayaran atas Layanan yang anda peroleh tadi<br>
	<center>***Terima Kasih Dan Cepat Sembuh Ya***<br><br>POLIKLINIK PELANGAI KASIH</center>
</body>
</html>