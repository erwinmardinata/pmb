<p style="text-align: center; font-size: 20px; font-weight: bold;">Laporan Rekapan Agen</p><br />
<table>
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Jumlah Formulir yang diambil</th>
			<th>Jumlah Formulir yang kembali</th>
			<th>Nomor Telp / HP</th>
			<th>Keterangan</th>
			<th>Nama Mahasiswa</th>
		</tr>
	</thead>
	<tbody>
	<?php $x=1; foreach($query as $row): ?>
		<tr>
			<td><?php echo $x; ?></td>
			<td><?php echo $row->nama; ?></td>
			<td><?php echo $row->jml_formulir_ambil; ?></td>
			<td><?php echo $row->jml_formulir_kembali; ?></td>
			<td><?php echo $row->telp; ?></td>
			<td><?php echo $row->keterangan; ?></td>
			<td>
				<?php
					$korban = mysql_query("SELECT * FROM korban WHERE id_agen = $row->id");
					while($list = mysql_fetch_array($korban)){
						echo "- ".$list['nama_korban']."<br />";
					}
				?>
			</td>
		</tr>
	<?php $x++; endforeach; ?>
	</tbody>
<table>