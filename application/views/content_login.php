<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 class="page-head-line">Please Login To Enter </h4>

			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-body">
					<?php echo $info; ?>
					<form method="post" action="<?php echo site_url('registration/prosesLogin'); ?>">
					 <label>Username : </label>
						<input type="text" name="username" class="form-control" />
						<label>Password :  </label>
						<input type="password" name="password" class="form-control" />
						<hr />
						<button type="submit" class="btn btn-info btn-block"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
					</form>
				  </div>
				</div>
			</div>
			<div class="col-md-4 "></div>
		</div>
	</div>
</div>
