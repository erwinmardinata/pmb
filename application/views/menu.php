<section class="menu-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="navbar-collapse collapse ">
					<ul id="menu-top" class="nav navbar-nav navbar-right">
						<li><a <?php echo $aktif=='dashboard'?'class="menu-top-active"':''; ?> href="<?php echo site_url('registration'); ?>">Dashboard</a></li>
						<li><a <?php echo $aktif=='formdaftar'?'class="menu-top-active"':''; ?> href="<?php echo site_url('registration/formRegistrasi'); ?>">Form Pendaftar</a></li>
						<li><a <?php echo $aktif=='datadaftar'?'class="menu-top-active"':''; ?> href="<?php echo site_url('registration/getDataPendaftar/semua'); ?>">Data Pendaftar Divisi Seleksi</a></li>                            
						<li><a <?php echo $aktif=='databayar'?'class="menu-top-active"':''; ?> href="<?php echo site_url('registration/getDataPendaftarBayar/semua'); ?>">Data Pendaftar Final</a></li>                            
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>