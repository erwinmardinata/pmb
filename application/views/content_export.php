<p style="text-align: center; font-size: 20px">Laporan Rekapan Mahasiswa Baru<br><?php echo $judul; ?></p>
<table>
	<thead>
		<tr>
			<th>No.</th>
			<th>Tanggal Daftar</th>
			<th>Nomor Registrasi</th>
			<th>Jalur</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>Provinsi</th>
			<th>Kabupaten</th>
			<th>Anak ke-</th>
			<th>Jumlah Saudara</th>
			<th>Telepon</th>
			<th>No. KTP</th>
			<th>Kode Pos</th>
			<th>Email</th>
			<th>KPPS</th>
			<th>Jumlah KPPS</th>
			<th>Sekolah Asal</th>
			<th>Tahun Lulus</th>
			<th>Jurusan</th>
			<th>Nama Ayah</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Pendidikan Ayah</th>
			<th>Pekerjaan Ayah</th>
			<th>Penghasilan Ayah</th>
			<th>Telepon Ayah</th>
			<th>Nama Ibu</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Pendidikan Ibu</th>
			<th>Pekerjaan Ibu</th>
			<th>Penghasilan Ibu</th>
			<th>Telepon Ibu</th>
			<th>Bayar</th>
			<th>Fakultas</th>
			<th>Program Studi</th>
		</tr>
	</thead>
	<tbody>
	<?php $x=1; foreach($query as $row): ?>
		<tr>
			<td><?php echo $x; ?></td>
			<td><?php echo $row->tgldaftar; ?></td>
			<td><?php echo $row->noreg; ?></td>
			<td>
				<?php 
					if ($row->jalur == 1) echo "PPKB"; else
					if ($row->jalur == 2) echo "UNDANGAN"; else
					echo "TES SIMAK";
				?>
			</td>
			<td><?php echo $row->nama; ?></td>
			<td><?php echo $row->jeniskelamin; ?></td>
			<td><?php echo $row->tmplahir; ?></td>
			<td><?php echo $row->tgllahir; ?></td>
			<td><?php echo $row->agama; ?></td>
			<td><?php echo $row->alamat; ?></td>
			<td>
				<?php
					$prov = mysql_query("SELECT * FROM master_provinsi WHERE provinsi_id = $row->provinsi");
					$list = mysql_fetch_array($prov);
					echo $list['provinsi_nama'];
				?>
			</td>
			<td>
				<?php
					$kota = mysql_query("SELECT * FROM master_kokab WHERE kota_id = $row->kabupaten");
					$list = mysql_fetch_array($kota);
					echo $list['kokab_nama'];
				?>
			</td>
			<td><?php echo $row->anakke; ?></td>
			<td><?php echo $row->jml_saudara; ?></td>
			<td><?php echo $row->no_ktp; ?></td>
			<td><?php echo $row->kode_pos; ?></td>
			<td><?php echo $row->telp; ?></td>
			<td><?php echo $row->email; ?></td>
			<td><?php echo $row->kpps; ?></td>
			<td><?php echo $row->jml_kpps; ?></td>
			<td><?php echo $row->sekolahasal; ?></td>
			<td><?php echo $row->tahunlulus; ?></td>
			<td><?php echo $row->jurusan; ?></td>
			<td><?php echo $row->namaayah; ?></td>
			<td><?php echo $row->tmp_lhr_ayah; ?></td>
			<td><?php echo $row->tgl_lhr_ayah; ?></td>
			<td><?php echo $row->pendidikan_ayah; ?></td>
			<td><?php echo $row->pekerjaan_ayah; ?></td>
			<td><?php echo $row->penghasilan_ayah; ?></td>
			<td><?php echo $row->telp_ayah; ?></td>
			<td><?php echo $row->namaibu; ?></td>
			<td><?php echo $row->tmp_lhr_ibu; ?></td>
			<td><?php echo $row->tgl_lhr_ibu; ?></td>
			<td><?php echo $row->pendidikan_ibu; ?></td>
			<td><?php echo $row->pekerjaan_ibu; ?></td>
			<td><?php echo $row->penghasilan_ibu; ?></td>
			<td><?php echo $row->telp_ibu; ?></td>
			<td><?php echo "Rp. ".$row->jumlah_bayar; ?></td>
			<td>
				<?php
					$fakultas = mysql_query("SELECT * FROM fakultas WHERE id_fak = $row->fakultas");
					$list = mysql_fetch_array($fakultas);
					echo $list['nama_fak'];
				?>
			</td>
			<td>
				<?php
					$prodi = mysql_query("SELECT * FROM prodi WHERE id_prodi = $row->prodi");
					$list = mysql_fetch_array($prodi);
					echo $list['nama_prodi'];
				?>
			</td>
		</tr>
	<?php $x++; endforeach; ?>
	</tbody>
<table>