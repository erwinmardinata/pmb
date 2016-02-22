<!-- MENU SECTION END-->
<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 class="page-head-line"><?php echo $title; ?></h4>
				<?php echo $info; foreach($query as $row): ?>
				<div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <a href="<?php echo site_url('registration/edit_berita/'.$row->id_kategori); ?>"><i class="fa fa-edit dashboard-div-icon" ></i></a>
                         <h5><?php echo $row->nama_kategori ?></h5>
                    </div>
                </div>
				<?php endforeach; ?>				
			</div>
		</div>
	</div>
</div>