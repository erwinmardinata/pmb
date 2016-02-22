<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">DATA AGEN</h4>
			<div class="col-sm-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo site_url('registration/korpus'); ?>">Data Agen</a></li>
				  <li class="active">Data Calon Mahasiswa</li>
				</ol>

				<div style="clear: both"></div>
				<?php echo $info; ?>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Form Input Nama Korban Agen : <?php echo $nama; ?></h3>
				  </div>
				  <div class="panel-body">
				<form method="post" action="<?php echo site_url('registration/prosesInputKorban'); ?>" class="form-horizontal" role="form">
					  <div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-5">
						  <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" placeholder="">
						  <input type="text" name="nama" class="form-control" placeholder="">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-primary">Simpan</button>
						  <button type="reset" class="btn btn-default">Reset</button>
						</div>
					  </div>
					</form>				
						<div class="col-md-8">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th width="50px">No</th>
										<th>Nama</th>
										<th width="100px"></th>
									</tr>
								</thead>
								<tbody>
								<?php if($query == null) { ?>
									<tr>
										<td align="center" colspan="3"> - Data Tidak Ada - </td>
									</tr>
								<?php } else { 
									$x=1; foreach($query as $row): 
								?>
									<tr>
										<td><?php echo $x; ?></td>
										<td><?php echo $row->nama_korban; ?></td>
										<td>
											<A onclick="return confirm('anda yakin ?')" href="<?php echo site_url('registration/hapusDataKorban/'.$row->id.'/'.$id); ?>" class="btn btn-default">Hapus</button>
										</td>
									</tr>
								<?php $x++; endforeach; } ?>
								</tbody>
							</table>
						</div>
				  </div>
				</div>
			</div>
		</div>		
	  </div>
	</div>     
</div>	