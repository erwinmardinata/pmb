<script>
	$(document).ready(function(){
		$("#carijalur").click(function() {
			var id = $("#jalur").val(); 
			if(id == ""){
				return alert("Silakan Pilih Dulu");
			}
			document.location.href="<?php echo site_url('registration/'.$this->uri->segment(2).'/jalur/'); ?>" + "/" + id;
		});
		
		$("#cariprodi").click(function() {
			var id = $("#prodi").val(); 
			if(id == "") {
				return alert("Silakan Pilih Dulu");
			}
			document.location.href="<?php echo site_url('registration/'.$this->uri->segment(2).'/prodi/'); ?>" + "/" + id;
		});
	});
</script>
<div class="content-wrapper">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line"><?php echo $title; ?></h4>
		</div>
			
		<div style="clear: both"></div>
			<nav class="navbar navbar-default" role="navigation">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <div class="navbar-form navbar-left">
					<!--
					<button onclick="location.href='<?php echo site_url("registration/".$this->uri->segment(2)."/semua"); ?>'" class="btn btn-default">Tampil Semua Data</button> |
					--> 
					<select class="form-control" id="jalur">
						<option value=""> - Filter berdasarkan Jalur Pilihan - </option>
						<option value="1">PPKB (Prestasi dan Pemerataan Kesempatan Belajar)</option>
						<option value="2">Jalur Undangan</option>
						<option value="3">Tes Simak</option>
					</select>
					<button class="btn btn-default" id="carijalur">Cari</button> |
					<select class="form-control" id="prodi">
						<option value=""> - Filter berdasarkan Program Studi - </option>
						<?php
							foreach($prodi as $row){
								echo "<option value=".$row->id_prodi.">".$row->nama_prodi."</option>";
							}
						?>
					</select>
					<button class="btn btn-default" id="cariprodi">Cari</button>
				  </div>
				  
				  <!-- navbar right -->
				  <div class="navbar-form navbar-right">
					<button onclick="location.href='<?php echo site_url("registration/".$this->uri->segment(2)."/grafik"); ?>'" class="btn btn-default">Tampilkan Grafik</button>
				  </div>	
				  
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			
			<br>