<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">DATA AGEN</h4>
			<div class="col-sm-12">
			<form method="post" action="<?php echo site_url('registration/proses_agen'); ?>" class="form-horizontal" role="form">
				<button type="submit" class="btn btn-default" style="margin-bottom: 12px; float: right">SIMPAN</button>
				<div style="clear: both"></div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title"><?php echo $title; ?></h3>
				  </div>
				  <input type="hidden" name="aksi" value="<?php echo $aksi; ?>">
				  <input type="hidden" name="id" value="<?php echo $id; ?>">
				  <div class="panel-body">
					  <div class="form-group">
						<label class="col-sm-3 control-label">Nama</label>
						<div class="col-sm-8">
						  <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" placeholder="">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-3 control-label">Jumlah Formulir yang diambil</label>
						<div class="col-sm-8">
						  <input type="number" name="jmlambil" value="<?php echo $jmlambil; ?>" class="form-control" placeholder="">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-3 control-label">Jumlah Formulir yang kembali</label>
						<div class="col-sm-8">
						  <input type="number" <?php if($this->uri->segment(2)=='tambah_agen') echo 'disabled'; ?> name="jmlkembali" value="<?php echo $jmlkembali; ?>" class="form-control" placeholder="">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-3 control-label">No. Telepon / HP</label>
						<div class="col-sm-8">
						  <input type="text" name="telp" value="<?php echo $telp; ?>" class="form-control" placeholder="">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-8">
						  <textarea name="keterangan" class="form-control" placeholder=""><?php echo $keterangan; ?></textarea>
						</div>
					  </div>
				  </div>
				</div>
			</form>				
			</div>
		</div>		
	  </div>
	</div>     
</div>