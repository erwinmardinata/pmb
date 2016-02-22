<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran</h4>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('registration/prosesBayar'); ?>">
<div class="modal-body">
  <div class="form-group">
	<label class="col-sm-3 control-label">Total Bayar</label>
	<div class="col-sm-8">
		<input type="hidden" name="key" value="<?php echo $key; ?>" class="form-control">
		<input type="number" min="0" name="bayar" class="form-control" placeholder="Total Bayar dalam Rupiah" required>
	</div>
  </div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
	<button type="submit" class="btn btn-primary">Bayar</button>
</form>
</div>