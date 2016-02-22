<script>	
	$(document).ready(function() {
		$("#prov").change(function() {
			var id = $("#prov").val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('registration/getKab'); ?>",
				data: {'id':id},
				success: function(data) {
					$("#kab").html(data);
				}
			});
			
		});
				
		$("#fak").change(function() {
			var id = $("#fak").val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('registration/getProdi'); ?>",
				data: {'id':id},
				success: function(data) {
					$("#prodi").html(data);
				}
			});
			
		});
		$('#induk').change(function() {
			var id = $('#induk').val();
			if(id == 1) {
				$('#value').html("<input type='text' name='jml_kpps' class='form-control' placeholder='Jumlah KPPS'>");
			} else {
				$('#value').html("");
			}
		});
	});
</script>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Form Pendaftaran</h4>
		</div>
		<div style="clear: both"></div>
		<?php echo $info; ?>
		
		  <form role="form" method="post" action="<?php echo site_url('registration/insertData'); ?>">	  
			  <div class="col-md-6">
			  <!-- data diri -->
				<div class="panel panel-default">
				  <div class="panel-body">
					<h3>Data Diri</h3><hr>
					  <input type="hidden" name="aksi" value="<?php echo $aksi ?>">
					  <input type="hidden" name="id" value="<?php echo $id ?>">
					  <input type="hidden" name="url" value="<?php echo $url ?>">
					  <div class="form-group">
						<label>Pilihan Jalur *</label>
						<select class="form-control" name="jalur">
							<option value=""></option>
							<option <?php echo $jalur==1?'selected':''; ?> value="1">PPKB (Prestasi dan Pemerataan Kesempatan Belajar)</option>
							<option <?php echo $jalur==2?'selected':''; ?> value="2">Jalur Undangan</option>
							<option <?php echo $jalur==3?'selected':''; ?> value="3">Tes Simak</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap *</label>
						<input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
						<label>Jenis Kelamin *</label>
						<select class="form-control" name="jeniskelamin">
							<option value=""></option>
							<option <?php echo $jeniskelamin=='Laki-laki'?'selected':''; ?> value="Laki-laki">Laki-laki</option>
							<option <?php echo $jeniskelamin=='Perempuan'?'selected':''; ?> value="Perempuan">Perempuan</option>
						</select>
					  </div>
					  <div class="form-group row">
						<label class="col-md-12">Tempat Tanggal Lahir *</label>
						<div style="clear: both"></div>
						<div class="col-md-4">
						<input type="text" name="tmplahir" value="<?php echo $tmplahir; ?>" class="form-control" placeholder="Tempat Lahir">
						</div>
						<div class="col-md-2">
							<select name="tgl" class="form-control">
								<option value=""> Tgl </option>
								<?php	for($x = 1; $x <= 31; $x++){	?>
									<option <?php echo $tgl==$x?'selected':''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
								<?php	}	?>
							</select>
						</div>
						<div class="col-md-3">
							<select name="bln" class="form-control">
								<option value="">Bulan</option>
								<option <?php echo $bulan=='1'?'selected':''; ?> value="1">January</option>
								<option <?php echo $bulan=='2'?'selected':''; ?> value="2">February</option>
								<option <?php echo $bulan=='3'?'selected':''; ?> value="3">March</option>
								<option <?php echo $bulan=='4'?'selected':''; ?> value="4">April</option>
								<option <?php echo $bulan=='5'?'selected':''; ?> value="5">May</option>
								<option <?php echo $bulan=='6'?'selected':''; ?> value="6">June</option>
								<option <?php echo $bulan=='7'?'selected':''; ?> value="7">July</option>
								<option <?php echo $bulan=='8'?'selected':''; ?> value="9">August</option>
								<option <?php echo $bulan=='9'?'selected':''; ?> value="9">September</option>
								<option <?php echo $bulan=='10'?'selected':''; ?> value="10">October</option>
								<option <?php echo $bulan=='11'?'selected':''; ?> value="11">November</option>
								<option <?php echo $bulan=='12'?'selected':''; ?> value="12">December</option>
							</select>
						</div>
						<div class="col-md-3">
							<select name="thn" class="form-control">
								<option value="">Tahun</option>
								<?php	for($x = 2015; $x >= 1970; $x--){	?>
									<option <?php echo $tahun==$x?'selected':''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
								<?php	}	?>
							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label>Agama *</label>
						<select class="form-control" name="agama">
							<option value=""></option>
							<option <?php echo $agama=='Islam'?'selected':''; ?> value="Islam">Islam</option>
							<option <?php echo $agama=='Kristen'?'selected':''; ?> value="Kristen">Kristen</option>
							<option <?php echo $agama=='Hindu'?'selected':''; ?> value="Hindu">Hindu</option>
							<option <?php echo $agama=='Buddha'?'selected':''; ?> value="Buddha">Buddha</option>
							<option <?php echo $agama=='Konghucu'?'selected':''; ?> value="Konghucu">Konghucu</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Alamat *</label>
						<textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
					  </div>
					  <div class="form-group">
						<label>Provinsi *</label>
						<select class="form-control" name="provinsi" id="prov">
							<option value=""> - Pilih Provinsi - </option>
							<?php foreach($prov as $row){ ?>
								<option <?php echo $provinsi==$row->provinsi_id?'selected':''; ?> value="<?php echo $row->provinsi_id; ?>"><?php echo $row->provinsi_nama; ?></option>
							<?php } ?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Kabupaten *</label>
						<select class="form-control" name="kabupaten" id="kab">
							<option value="<?php echo $kabupaten; ?>"> <?php echo $kabupaten==''?'Pilih Provinsi Dulu':$kab->kokab_nama; ?> </option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Anak Ke *</label>
						<input type="number" name="anakke" value="<?php echo $anakke; ?>" min="0" max="20" class="form-control" placeholder="Anak Ke">
					  </div>
					  <div class="form-group">
						<label>Jumlah Saudara *</label>
						<input type="number" name="jml_saudara" value="<?php echo $jml_saudara; ?>" min="0" max="20" class="form-control" placeholder="Jumlah Anak">
					  </div>
					  <div class="form-group">
						<label>No. KTP *</label>
						<input type="text" name="no_ktp" value="<?php echo $no_ktp; ?>" class="form-control" placeholder="Telp / HP">
					  </div>	
					  <div class="form-group">
						<label>Kode Pos *</label>
						<input type="text" name="kd_pos" value="<?php echo $kode_pos; ?>" class="form-control" placeholder="Telp / HP">
					  </div>	
					  <div class="form-group">
						<label>Telp / HP *</label>
						<input type="text" name="telp" value="<?php echo $telp; ?>" class="form-control" placeholder="Telp / HP">
					  </div>	
					  <div class="form-group">
						<label>Email *</label>
						<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Telp / HP">
					  </div>
					  <div class="form-group row">
						<label class="col-md-12">Penerima KPPS *</label>
						<div style="clear: both"></div>
						<div class="col-md-4">
							<select name="kpps" class="form-control" id="induk">
								<option value=""></option>
								<option <?php echo $kpps==1?'selected':''; ?> value="1">Ya</option>
								<option <?php echo $kpps==0?'selected':''; ?> value="2">Tidak</option>
							</select>
						</div>
						<div class="col-md-8" id="value">
							<?php if($kpps == 1) { ?>
								<input type='text' value='<?php echo $jml_kpps; ?>' name='jml_kpps' class='form-control' placeholder='Jumlah KPPS'>
							<?php } ?>
						</div>
					  </div>
					  <h3>Pendidikan</h3><hr>
					  <div class="form-group">
						<label>Sekolah Asal *</label>
						<input type="text" name="sekolahasal" value="<?php echo $sekolahasal; ?>" class="form-control" placeholder="Sekolah Asal">
					  </div>
					  <div class="form-group">
						<label>Tahun Lulus *</label>
						<input type="text" name="tahunlulus" value="<?php echo $tahunlulus; ?>" class="form-control" placeholder="Tahun Lulus">
					  </div>
					  <div class="form-group">
						<label>Jurusan *</label>
						<input type="text" name="jurusan" value="<?php echo $jurusan; ?>" class="form-control" placeholder="Jurusan">
					  </div>
					  
				  </div>
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="panel panel-default" style="padding-bottom: 417px">
				  <div class="panel-body">
					<!-- keluarga -->
					  <h3>Keluarga</h3><hr>
					  <div class="form-group">
						<label style="font-size: 17px">A. AYAH</label><br />
						<label class="col-md-12">Nama</label>
						<div class="col-md-12">
							<input type="text" name="namaayah" value="<?php echo $namaayah; ?>" class="form-control" placeholder="Nama Ayah">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Tempat Lahir *</label>
						<div style="clear: both"></div>
						<div class="col-md-4">
							<input type="text" name="tmp_lhr_ayah" value="<?php echo $tmp_lhr_ayah; ?>" class="form-control" placeholder="Tempat Lahir">
						</div>
						<div class="col-md-2">
							<select name="tgl_ayah" class="form-control">
								<option value=""> Tgl </option>
								<?php	for($x = 1; $x <= 31; $x++){	?>
									<option <?php echo $tgl_ayah==$x?'selected':''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
								<?php	}	?>
							</select>
						</div>
						<div class="col-md-3">
							<select name="bln_ayah" class="form-control">
								<option value="">Bulan</option>
								<option <?php echo $bln_ayah=='1'?'selected':''; ?> value="1">January</option>
								<option <?php echo $bln_ayah=='2'?'selected':''; ?> value="2">February</option>
								<option <?php echo $bln_ayah=='3'?'selected':''; ?> value="3">March</option>
								<option <?php echo $bln_ayah=='4'?'selected':''; ?> value="4">April</option>
								<option <?php echo $bln_ayah=='5'?'selected':''; ?> value="5">May</option>
								<option <?php echo $bln_ayah=='6'?'selected':''; ?> value="6">June</option>
								<option <?php echo $bln_ayah=='7'?'selected':''; ?> value="7">July</option>
								<option <?php echo $bln_ayah=='8'?'selected':''; ?> value="9">August</option>
								<option <?php echo $bln_ayah=='9'?'selected':''; ?> value="9">September</option>
								<option <?php echo $bln_ayah=='10'?'selected':''; ?> value="10">October</option>
								<option <?php echo $bln_ayah=='11'?'selected':''; ?> value="11">November</option>
								<option <?php echo $bln_ayah=='12'?'selected':''; ?> value="12">December</option>
							</select>
						</div>
						<div class="col-md-3">
							<select name="thn_ayah" class="form-control">
								<option value="">Tahun</option>
								<?php	for($x = 2015; $x >= 1970; $x--){	?>
									<option <?php echo $thn_ayah==$x?'selected':''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
								<?php	}	?>
							</select>
						</div>
					  </div><br>
					  <div class="form-group">
						<label class="col-md-12">Pendidikan *</label>
						<div class="col-md-12">
							<input type="text" name="pendidikan_ayah" value="<?php echo $pendidikan_ayah; ?>" class="form-control" placeholder="Pendidikan Ayah">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Pekerjaan / Golongan(PNS) *</label>
						<div class="col-md-12">
							<input type="text" name="pekerjaan_ayah" value="<?php echo $pekerjaan_ayah; ?>" class="form-control" placeholder="Pekerjaan Ayah">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Penghasilan Perbulan *</label>
						<div class="col-md-12">
						<select class="form-control" name="penghasilan_ayah">
							<option value=""></option>
							<option <?php echo $penghasilan_ayah=='Dibawah 1 Juta/bulan'?'selected':''; ?> value="Dibawah 1 Juta/bulan">Dibawah 1 Juta/bulan</option>
							<option <?php echo $penghasilan_ayah=='Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan'?'selected':''; ?> value="Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan">Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan</option>
							<option <?php echo $penghasilan_ayah=='Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan'?'selected':''; ?> value="Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan">Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan</option>
							<option <?php echo $penghasilan_ayah=='Diatas Rp. 6 Juta/bulan'?'selected':''; ?> value="Diatas Rp. 6 Juta/bulan">Diatas Rp. 6 Juta/bulan</option>
						</select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Telp / HP *</label>
						<div class="col-md-12">
							<input type="text" name="telp_ayah" value="<?php echo $telp_ayah; ?>" class="form-control" placeholder="Telepon">
						</div>
					  </div>
					  <div style="clear: both"></div>

					  <div class="form-group">
						<label style="font-size: 17px"></label><br />
						<label style="font-size: 17px">A. IBU</label><br />
						<label class="col-md-12">Nama</label>
						<div class="col-md-12">
							<input type="text" name="namaibu" value="<?php echo $namaibu; ?>" class="form-control" placeholder="Nama ibu">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Tempat Lahir *</label>
						<div style="clear: both"></div>
						<div class="col-md-4">
							<input type="text" name="tmp_lhr_ibu" value="<?php echo $tmp_lhr_ibu; ?>" class="form-control" placeholder="Tempat Lahir">
						</div>
						<div class="col-md-2">
							<select name="tgl_ibu" class="form-control">
								<option value=""> Tgl </option>
								<?php	for($x = 1; $x <= 31; $x++){	?>
									<option <?php echo $tgl_ibu==$x?'selected':''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
								<?php	}	?>
							</select>
						</div>
						<div class="col-md-3">
							<select name="bln_ibu" class="form-control">
								<option value="">Bulan</option>
								<option <?php echo $bln_ibu=='1'?'selected':''; ?> value="1">January</option>
								<option <?php echo $bln_ibu=='2'?'selected':''; ?> value="2">February</option>
								<option <?php echo $bln_ibu=='3'?'selected':''; ?> value="3">March</option>
								<option <?php echo $bln_ibu=='4'?'selected':''; ?> value="4">April</option>
								<option <?php echo $bln_ibu=='5'?'selected':''; ?> value="5">May</option>
								<option <?php echo $bln_ibu=='6'?'selected':''; ?> value="6">June</option>
								<option <?php echo $bln_ibu=='7'?'selected':''; ?> value="7">July</option>
								<option <?php echo $bln_ibu=='8'?'selected':''; ?> value="9">August</option>
								<option <?php echo $bln_ibu=='9'?'selected':''; ?> value="9">September</option>
								<option <?php echo $bln_ibu=='10'?'selected':''; ?> value="10">October</option>
								<option <?php echo $bln_ibu=='11'?'selected':''; ?> value="11">November</option>
								<option <?php echo $bln_ibu=='12'?'selected':''; ?> value="12">December</option>
							</select>
						</div>
						<div class="col-md-3">
							<select name="thn_ibu" class="form-control">
								<option value="">Tahun</option>
								<?php	for($x = 2015; $x >= 1970; $x--){	?>
									<option <?php echo $thn_ibu==$x?'selected':''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
								<?php	}	?>
							</select>
						</div>
					  </div><br>
					  <div class="form-group">
						<label class="col-md-12">Pendidikan *</label>
						<div class="col-md-12">
							<input type="text" name="pendidikan_ibu" value="<?php echo $pendidikan_ibu; ?>" class="form-control" placeholder="Pendidikan Ibu">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Pekerjaan / Golongan(PNS) *</label>
						<div class="col-md-12">
							<input type="text" name="pekerjaan_ibu" value="<?php echo $pekerjaan_ibu; ?>" class="form-control" placeholder="Pekerjaan Ibu">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Penghasilan Perbulan *</label>
						<div class="col-md-12">
						<select class="form-control" name="penghasilan_ibu">
							<option value=""></option>
							<option <?php echo $penghasilan_ibu=='Dibawah 1 Juta/bulan'?'selected':''; ?> value="Dibawah 1 Juta/bulan">Dibawah 1 Juta/bulan</option>
							<option <?php echo $penghasilan_ibu=='Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan'?'selected':''; ?> value="Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan">Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan</option>
							<option <?php echo $penghasilan_ibu=='Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan'?'selected':''; ?> value="Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan">Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan</option>
							<option <?php echo $penghasilan_ibu=='Diatas Rp. 6 Juta/bulan'?'selected':''; ?> value="Diatas Rp. 6 Juta/bulan">Diatas Rp. 6 Juta/bulan</option>
						</select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-12">Telp / HP *</label>
						<div class="col-md-12">
							<input type="text" name="telp_ibu" value="<?php echo $telp_ibu; ?>" class="form-control" placeholder="Telepon">
						</div>
					  </div>
					  <div style="clear: both"></div>

					  
					<!-- pilihan program studi -->
					  <h3>Pilihan Program Studi</h3><hr>
					  <div class="form-group">
						<label>Fakultas *</label>
						<select class="form-control" name="fakultas" id="fak">
							<option value=""> - Pilih Fakultas - </option>
							<?php foreach($fak as $row){ ?>
								<option <?php echo $fakultas==$row->id_fak?'selected':''; ?> value="<?php echo $row->id_fak; ?>"><?php echo $row->nama_fak; ?></option>
							<?php } ?>
						</select>				  
					  </div>
					  <div class="form-group">
						<label>Jurusan *</label>
						<select class="form-control" name="prodi" id="prodi">
							<option value="<?php echo $prodi; ?>"> <?php echo $prodi==''?'Pilih Fakultas Dulu':$prod->nama_prodi; ?> </option>
						</select>				  
					  </div>				  
				  
				  </div>
				</div>
			  
			  </div>
			  <div class="col-md-12">
				<div class="well" style="text-align: center">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="reset" class="btn btn-primary">Batal</button>
				</div>
			  </div>
		  </form>
	  </div>
	</div>     
</div>