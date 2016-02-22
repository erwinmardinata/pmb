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
		
		$("#kab").change(function() {
			var id = $("#kab").val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('registration/getKecam'); ?>",
				data: {'id':id},
				success: function(data) {
					$("#kecam").html(data);
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
		
		  <form role="form" method="post" action="<?php echo site_url('registration/insertData'); ?>">	  
			  <div class="col-md-6">
			  <!-- data diri -->
				<div class="panel panel-default">
				  <div class="panel-body" style="margin-bottom: 25px">
					<h3>Data Diri</h3><hr>
					  <div class="form-group">
						<label>Pilihan Jalur *</label>
						<select class="form-control" name="jalur">
							<option value="4">Beasiswa Luar Daerah</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap *</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
						<label>Jenis Kelamin *</label>
						<select class="form-control" name="jeniskelamin">
							<option value=""></option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Tempat Lahir *</label>
						<input type="text" name="tmplahir" class="form-control" placeholder="Tempat Lahir">
					  </div>
					  <div class="form-group">
						<label>Tanggal Lahir *</label>
						<input type="text" name="tgllahir" class="form-control" placeholder="Tanggal Lahir">
					  </div>
					  <div class="form-group">
						<label>Agama *</label>
						<select class="form-control" name="agama">
							<option value=""></option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
							<option value="Konghucu">Konghucu</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Alamat *</label>
						<textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
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
						<label>Telp / HP *</label>
						<input type="text" name="telp" class="form-control" placeholder="Telp / HP">
					  </div>
					  
					  <h3>Pendidikan</h3><hr>
					  <div class="form-group">
						<label>Sekolah Asal *</label>
						<input type="text" name="sekolahasal" class="form-control" placeholder="Sekolah Asal">
					  </div>
					  <div class="form-group">
						<label>Tahun Lulus *</label>
						<input type="text" name="tahunlulus" class="form-control" placeholder="Tahun Lulus">
					  </div>
					  <div class="form-group">
						<label>Jurusan *</label>
						<input type="text" name="jurusan" class="form-control" placeholder="Jurusan">
					  </div>
					  
				  </div>
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-body">
					<!-- keluarga -->
					  <h3>Data Orang Tua</h3><hr>
					  <div class="form-group">
						<label>Nama Ayah / Wali *</label>
						<input type="text" name="namaayah" class="form-control" placeholder="Nama Ayah / Wali">
					  </div>
					  <div class="form-group">
						<label>Nama Ibu *</label>
						<input type="text" name="namaibu" class="form-control" placeholder="Nama Ibu">
					  </div>
					  <div class="form-group">
						<label>Telp / HP *</label>
						<input type="text" name="telportu" class="form-control" placeholder="Telp / HP">
					  </div>
					  <div class="form-group">
						<label>Jumlah Anak *</label>
						<input type="number" name="jmlanak" min="0" max="20" class="form-control" placeholder="Jumlah Anak">
					  </div>
					  <div class="form-group">
						<label>Anak Ke *</label>
						<input type="number" name="anakke" min="0" max="20" class="form-control" placeholder="Anak Ke">
					  </div>
					  <div class="form-group">
						<label>Penghasilan Orang Tua Perbulan *</label>
						<select class="form-control" name="penghasilan_ortu">
							<option value=""></option>
							<option value="Dibawah 1 Juta/bulan">Dibawah 1 Juta/bulan</option>
							<option value="Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan">Rp. 2 Juta/bulan s/d Rp. 3 Juta/bulan</option>
							<option value="Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan">Rp. 4 Juta/bulan s/d Rp. 5 Juta/bulan</option>
							<option value="Diatas Rp. 6 Juta/bulan">Diatas Rp. 6 Juta/bulan</option>
						</select>
					  </div>
					  
					<!-- pilihan program studi -->
					  <h3>Pilihan Program Studi</h3><hr>
					  <div class="form-group">
						<label>Jurusan Pertama *</label>
						<select class="form-control" name="fakultas" id="fak" required>
							<option value=""> - Pilih Jurusan Pertama - </option>
							<?php foreach($jur as $row){ ?>
								<option value="<?php echo $row->id_prodi; ?>"><?php echo $row->nama_prodi; ?></option>
							<?php } ?>
						</select>				  
					  </div>
					  <div class="form-group">
						<label>Jurusan Kedua *</label>
						<select class="form-control" name="prodi">
							<option value=""> - Pilih Jurusan Kedua - </option>							
							<?php foreach($jur as $row){ ?>
								<option value="<?php echo $row->id_prodi; ?>"><?php echo $row->nama_prodi; ?></option>
							<?php } ?>
						</select>				  
					  </div>
					  
					  <h3>Upload Photo</h3><hr>
					  <div class="form-group">
						<label>file *</label>
						<input type="file" name="photo" class="form-control">
					  </div>
					  
					  <h3>Password untuk Edit/Cetak Data</h3><hr>
					  <div class="form-group">
						<label>Username *</label>
						<input type="text" name="username" class="form-control" placeholder="Username">
					  </div>
					  <div class="form-group">
						<label>Password *</label>
						<input type="password" name="password" class="form-control" placeholder="Password">
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