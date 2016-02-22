<link href="<?php echo base_url('assets/ckeditor/contents.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('assets/ckfinder/ckfinder.js'); ?>"></script>
<!-- MENU SECTION END-->
<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="<?php echo site_url('registration/proses_edit_berita'); ?>">
					<h4 class="page-head-line">Edit Berita</h4>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="aksi" value="<?php echo $aksi; ?>">
					<textarea class="form-control" id="content" name="berita"><?php echo $berita; ?></textarea><br/>
					<button type="submit" class="btn btn-default">Simpan</button>
					<button type="reset" class="btn btn-default">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script type='text/javascript'>
	var editor = CKEDITOR.replace('content');
	CKFinder.setupCKEditor(editor, 'ckfinder/');
</script>