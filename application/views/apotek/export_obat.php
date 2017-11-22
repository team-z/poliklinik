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
				<th>Kategori</th>
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
				<td><?php 
						$jenis = array(
                                                '1' => 'Pil' ,
                                                '2' => 'Syrup',
                                                '3' => 'Obat Tetes',
                                                '4' => 'Plester',
                                                '5' => 'Kapsul' ); 
                                                foreach ($jenis as $key=> $value) {
                                        		if ($key==$obt->type) {
                                        			echo $value;
                                        		} } ?>
                </td>
				<td><?php 
						$kategori = array(
                                                '1' => 'keras' ,
                                                '2' => 'bebas',
                                                '3' => 'psikotropika',
                                                '4' => 'rendah' ); 
                                                foreach ($kategori as $key=> $value) {
                                        		if ($key==$obt->kategori) {
                                        			echo $value;
                                        		} } ?></td>
				<td><?php echo "Rp.".number_format($obt->harga_satuan,2,',','.'); ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>