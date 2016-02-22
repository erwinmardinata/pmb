<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line"><?php echo $title; ?></h4>
			<?php echo $info; ?>
			<button onclick="location.href='<?php echo site_url("registration/tambah_agen"); ?>'" class="btn btn-primary" style="margin-bottom: 12px; float: right">Tambah Agen Baru</button>
			<button onclick="location.href='<?php echo site_url("registration/agenExport/pdf"); ?>'" class="btn btn-default" style="margin-bottom: 12px; float: right">Export to PDF</button>
			<button onclick="location.href='<?php echo site_url("registration/agenExport/xls"); ?>'" class="btn btn-default" style="margin-bottom: 12px; float: right">Export to Excel</button>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>NO</th>
						<th>Nama Agen</th>
						<th>Formulir yang diambil</th>
						<th>Formulir yang Kembali</th>
						<th>No Telepon / HP</th>
						<th>Nama Calon Mahasiswa</th>
						<th>Keterangan</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php if($query == null) { ?>
				<tr>
					<td align="center" colspan="5"> - Data Tidak Ada - </td>
				</tr>
			<?php } else { 
				$x=1; foreach($query as $row): 
			?>
					<tr>
						<td><?php echo $x; ?></td>
						<td><?php echo $row->nama; ?></td>
						<td><?php echo $row->jml_formulir_ambil; ?></td>
						<td><?php echo $row->jml_formulir_kembali; ?></td>
						<td><?php echo $row->telp; ?></td>
						<td>
							<?php
								$korban = mysql_query("SELECT * FROM korban WHERE id_agen = $row->id");
								while($list = mysql_fetch_array($korban)){
									echo "- ".$list['nama_korban']."<br />";
								}
							?>							
						</td>
						<td><?php echo $row->keterangan; ?></td>
						<td>
							<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								Aksi <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo site_url('registration/setDataMilikAgen/'.$row->id); ?>">Tambah Nama Korban</a></li>
								<li><a href="<?php echo site_url('registration/edit_agen/'.$row->id); ?>">Edit</a></li>
								<li><a onclick="return confirm('anda yakin ?')" href="<?php echo site_url('registration/hapus_agen/'.$row->id); ?>">Hapsus</a></li>
							  </ul>
							</div>
						</td>
					</tr>
			<?php $x++; endforeach; } ?>
				</tbody>
			</table>
		</div>		
	  </div>
	</div>     
</div>