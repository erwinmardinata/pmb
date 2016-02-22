<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="pay"></div>
    </div>
  </div>
</div><!-- end Modal -->

<?php echo $info; ?>
<div class="panel panel-default">
	  <div class="panel-heading" style="font-weight: bold">
		<div style="float: left; margin-top: 8px;">
			<h3 class="panel-title">Data Pendaftar</h3>
		</div>
		<div style="float: right">
			<button onclick="location.href='<?php echo site_url('registration/export/'.$this->uri->segment(2).'/xls/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>'" class="btn btn-default"> Export to Excel</button>
			<button onclick="location.href='<?php echo site_url('registration/export/'.$this->uri->segment(2).'/pdf/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>'" class="btn btn-default"> Export to PDF</button>
		</div>
		<div style="clear: both"></div>
	  </div>
	  <div class="panel-body">
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Nomor Registrasi</th>
					<th>Jalur</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Sekolah Asal</th>
					<?php if($this->uri->segment(2) == 'getDataPendaftar') echo ""; else echo "<th>Bayar</th>"; ?>
					<th>Fakultas</th>
					<th>Jurusan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php if($query == null) { ?>
				<tr>
					<td align="center" colspan="9"> - Data Tidak Ada - </td>
				</tr>
			<?php } else { 
				$x=1; foreach($query as $row): 
			?>
				<tr <?php if($row->jumlah_bayar > 0 && $this->uri->segment(2) == 'getDataPendaftar' ) echo "class='info'"; ?> >
					<td><?php echo $x; ?></td>
					<td><?php echo $row->noreg; ?></td>
					<td>
						<?php 
							if ($row->jalur == 1) echo "PPKB"; else
							if ($row->jalur == 2) echo "UNDANGAN"; else
							echo "TES SIMAK";
						?>
					</td>
					<td><?php echo $row->nama ?></td>
					<td><?php echo $row->jeniskelamin ?></td>
					<td><?php echo $row->sekolahasal; ?></td>
					<?php if($this->uri->segment(2) == 'getDataPendaftar') echo ""; else echo "<th>Rp. ".$row->jumlah_bayar."</th>"; ?>
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
					<td>
						<div class="btn-group">
						  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							Aksi <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo site_url('registration/editDataPendaftar/'.$row->id.'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>">Edit</a></li>
							<li><a onclick="return confirm('anda yakin ?')" href="<?php echo site_url('registration/deleteData/'.$row->id.'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>">Hapus</a></li>
							<?php if($row->jumlah_bayar > 0 && $this->uri->segment(2) == 'getDataPendaftar'){} else { ?>
							<li><a href="#" id="bayar" data-id="<?php echo $row->id.'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4); ?>">Bayar</a></li>
							<?php } ?>
						  </ul>
						</div>
					</td>
				</tr>
			<?php $x++; endforeach; } ?>
			</tbody>
		</table>
	  
	  </div>
	</div>
<script>
$(function(){
	$(document).on('click','#bayar',function(e){
			e.preventDefault();
			$("#myModal").modal('show');
			$.post('<?php echo site_url('registration/bayar'); ?>',
				{key:$(this).attr('data-id')},
				function(html){
					$(".pay").html(html);
				}   
			);
		});
	$(document).ready(function(){
    $('#myTable').DataTable();
});

});
</script>