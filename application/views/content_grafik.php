<script src="<?php echo base_url('assets/highcharts/highcharts.js'); ?>"></script>
<script>
$(function () { 
    $('#container1').highcharts({
        chart: {
			renderTo: 'container',
            type: 'line'
        },
        title: {
            text: 'Grafik seleksi Perbandingan Tiga Jalur '
        },
        xAxis: {
            categories: ['PPKB','UNDANGAN','SIMAK']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pendaftar'
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
					<?php
					for($x=1; $x<=3; $x++){
						if($this->uri->segment(2) == 'getDataPendaftar') {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x ")->row();		
						} else {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x and jumlah_bayar > 0 ")->row();							
						}
						
						if($query->total == null)
							echo "0 ,";
						else
							echo $query->total.",";
					}
					?>
				  ]
        }]
    });
	
	$('#container2').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik seleksi Semua Jalur'
        },
        xAxis: {
            categories: [
						<?php
							foreach($prodi as $row){
								echo "'.$row->nama_prodi.'".",";
							} 
						?>
						]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pendaftar'
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
					<?php
					for($x=1; $x<=14; $x++){
						if($this->uri->segment(2) == 'getDataPendaftar') {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x ")->row();		
						} else {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x and jumlah_bayar > 0 ")->row();							
						}
						if($query->total == null)
						echo "0 ,";
						else
						echo $query->total.",";
					}
					?>
				  ]
        }]
    });
	
	$('#container3').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik seleksi Jalur PPKB'
        },
        xAxis: {
            categories: [
						<?php
							foreach($prodi as $row){
								echo "'.$row->nama_prodi.'".",";
							} 
						?>
						]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pendaftar'
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
					<?php
					for($x=1; $x<=14; $x++){
						if($this->uri->segment(2) == 'getDataPendaftar') {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x ")->row();		
						} else {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x and jumlah_bayar > 0 ")->row();							
						}
						if($query->total == null)
						echo "0 ,";
						else
						echo $query->total.",";
					}
					?>
				  ]
        }]
    });

	$('#container4').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik seleksi Jalur Undangan'
        },
        xAxis: {
            categories: [
						<?php
							foreach($prodi as $row){
								echo "'.$row->nama_prodi.'".",";
							} 
						?>
						]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pendaftar'
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
					<?php
					for($x=1; $x<=14; $x++){
						if($this->uri->segment(2) == 'getDataPendaftar') {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x ")->row();		
						} else {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x and jumlah_bayar > 0 ")->row();							
						}
						if($query->total == null)
						echo "0 ,";
						else
						echo $query->total.",";
					}
					?>
				  ]
        }]
    });

	$('#container5').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik seleksi Jalur Tes Simak'
        },
        xAxis: {
            categories: [
						<?php
							foreach($prodi as $row){
								echo "'.$row->nama_prodi.'".",";
							} 
						?>
						]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pendaftar'
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
					<?php
					for($x=1; $x<=14; $x++){
						if($this->uri->segment(2) == 'getDataPendaftar') {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x ")->row();		
						} else {
							$query = $this->db->query("SELECT COUNT(jalur) total FROM pendaftar WHERE jalur = $x and jumlah_bayar > 0 ")->row();							
						}
						if($query->total == null)
						echo "0 ,";
						else
						echo $query->total.",";
					}
					?>
				  ]
        }]
    });
	
});
</script>
<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-body">
					  <div id="container1"></div>	
				  </div>
				</div>				
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-body">
					  <div id="container2"></div>	
				  </div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-body">
					  <div id="container3"></div>	
				  </div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-body">
					  <div id="container4"></div>	
				  </div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-body">
					  <div id="container5"></div>	
				  </div>
				</div>
			</div>

		</div>
	</div>
</div>

