<?php
class Registration extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('registrasimodel');
		date_default_timezone_set('Asia/makassar');
	}
		
	public function index() {
		$this->cek_privileges();

		$data['title'] = 'Dashboard';		
		$header['aktif'] = 'dashboard';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content');
		$this->load->view('footer');
	}
	
	public function login() {
		$cek = $this->session->userdata('ada');
		if(!empty($cek)){
			redirect('registration/index');
		}	
		
		if($this->uri->segment(3) == 1)
			$data['info'] = "<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<p align='center'>username atau password anda salah !<br> silakan coba lagi</p>
							</div>";
		else
		$data['info'] = '';
		
		$data['title'] = 'Login Admin';
		$this->load->view('header', $data);
		$this->load->view('content_login', $data);
		$this->load->view('footer');		
	}
	
	public function prosesLogin() {
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$cek = $this->registrasimodel->login('admin', $user, $pass)->row();
		
		if(count($cek) > 0) {
			$data['ada'] = 'yes';
			$data['id'] = $cek->id;
			$data['nama'] = $cek->nama;
			$data['username'] = $cek->username;
			$this->session->set_userdata($data);
			redirect('registration/index');
		} else {
			redirect('registration/login/1');
		}
		
	}
	
	public function logout() {
		$data['ada'] = '';
		$data['id'] = '';
		$data['username'] = '';
		$this->session->unset_userdata($data);
		redirect('registration/login');
	}

	public function cek_privileges() {
		$cek = $this->session->userdata('ada');
		if($cek=='') redirect('registration/login');
	}
	
	public function berita() {
		$this->cek_privileges();
		
		if($this->uri->segment(3) == 1) {
			$data['info'] = "<div class='alert alert-info alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<p align='center'>Berhasil Update Data</p>
					</div>";
		} else if($this->uri->segment(3) == 2) {
			$data['info'] = "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<p align='center'>Gagal Update Data</p>
					</div>";
			
		} else {
			$data['info'] = '';
		}
		
		$data['query'] = $this->registrasimodel->getData('kategori_menu', 'id_kategori', 'ASC')->result();
		$data['title'] = 'Berita';
		$header['aktif'] = '';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_berita', $data);
		$this->load->view('footer');
	}
	
	public function edit_berita($id) {
		$this->cek_privileges();
		
		$cek = $this->registrasimodel->getDataWhere('artikel_menu', 'id_kategori', $id)->row();
		if(empty($cek)) {
			$data['aksi'] = 'tambah'; 
			$data['berita'] = '';
		} else {
			$data['aksi'] = 'edit'; 
			$data['berita'] = $cek->isi;
		}
		$data['id'] = $id;
		$header['aktif'] = '';
		$this->load->view('header');
		$this->load->view('menu', $header);
		$this->load->view('content_edit_berita', $data);
		$this->load->view('footer');
	}
	
	public function proses_edit_berita() {
		$id = $this->input->post('id');
		$aksi = $this->input->post('aksi');
		$berita = $this->input->post('berita');
		
		$data = array(
			'id_kategori' => $id,
			'isi' => $berita
		);
		
		if($aksi == 'tambah'){
			$query = $this->registrasimodel->insertData('artikel_menu', $data);
		} else if($aksi == 'edit') {
			$query	= $this->registrasimodel->updateData('artikel_menu', 'id_kategori', $id, $data);			
		}
		
		if($query){
			redirect('registration/berita/1');
		} else {
			redirect('registration/berita/2');
		}
		
	}
	
	public function formRegistrasi() {
		$this->cek_privileges();
		if($this->uri->segment(3) == 1) {
			$info = "<div class='alert alert-info alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<p align='center'>Berhasil menambahkan data baru</p>
					</div>";
		} else if($this->uri->segment(3) == 2) {
			$info = "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<p align='center'>Gagal menambahkan data baru</p>
					</div>";
			
		} else {
			$info = '';
		}
	
		$data = array(
			'prov' => $this->registrasimodel->getData('master_provinsi', 'provinsi_id', 'ASC')->result(),
			'fak' => $this->registrasimodel->getData('fakultas', 'id_fak', 'ASC')->result(),
			'info' => $info,
			'url' => 'url',
			'aksi' => 'tambah',
			'id' => '',
			'jalur' => '',
			'nama' => '',
			'jeniskelamin' => '',
			'tmplahir' => '',
			'tgl' => '',
			'bulan' => '',
			'tahun' => '',
			'agama' => '',
			'alamat' => '',
			'provinsi' => '',
			'kabupaten' => '',
			'anakke' => '',
			'jml_saudara' => '',
			'no_ktp' => '',
			'kode_pos' => '',
			'telp' => '',
			'email' => '',
			'kpps' => '',
			'jml_kpps' => '',
			'sekolahasal' => '',
			'tahunlulus' => '',
			'jurusan' => '',
			'namaayah' => '',
			'tmp_lhr_ayah' => '',
			'tgl_ayah' => '',
			'bln_ayah' => '',
			'thn_ayah' => '',
			'pendidikan_ayah' => '',
			'pekerjaan_ayah' => '',
			'penghasilan_ayah' => '',
			'telp_ayah' => '',
			'namaibu' => '',
			'tmp_lhr_ibu' => '',
			'tgl_ibu' => '',
			'bln_ibu' => '',
			'thn_ibu' => '',
			'pendidikan_ibu' => '',
			'pekerjaan_ibu' => '',
			'penghasilan_ibu' => '',
			'telp_ibu' => '',
			'fakultas' => '',
			'prodi' => '',
		);
		$data['title'] = 'Form Registrasi';
		$header['aktif'] = 'formdaftar';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_form_daftar', $data);
		$this->load->view('footer');
	}
	
	public function getDataPendaftar() {
		$this->cek_privileges();
		$data['prodi'] = $this->registrasimodel->getData('prodi', 'id_prodi', 'ASC')->result();
		$header['aktif'] = 'datadaftar';
		$data['title'] = 'Data Pendaftar Divisi Seleksi';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_data_daftar', $data);
		
		$url = $this->uri->segment(3);
		$url2 = $this->uri->segment(4);
		$url3 = $this->uri->segment(5);
		
		if($url == "semua") {
			if($url2 == 1)
				$data['info'] = "<div class='alert alert-info alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<p align='center'>Berhasil Update atau Hapus data baru</p>
								</div>";
			else if($url2 == 2)
				$data['info'] = "<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<p align='center'>Gagal Update atau Hapus data baru</p>
							</div>";
			else 
				$data['info'] = "";
			
			$data['query'] = $this->registrasimodel->getData('pendaftar', 'id', 'DESC')->result();
			$this->load->view('content_getdata', $data);
		} else if($url == "jalur") {
			for($x=1; $x<=3; $x++) {
				if($x == $url2 ) {
					if($url3 == 1)
						$data['info'] = "<div class='alert alert-info alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<p align='center'>Berhasil Update atau Hapus data baru</p>
										</div>";
					else if($url3 == 2)
						$data['info'] = "<div class='alert alert-danger alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<p align='center'>Gagal Update atau Hapus data baru</p>
									</div>";
					else 
						$data['info'] = "";
					
					$data['query'] = $this->registrasimodel->getDataWhere('pendaftar', 'jalur', $url2)->result();
					$this->load->view('content_getdata', $data);
				}
			}
		} else if($url == "prodi") {
			for($x=1; $x<=14; $x++) {
				if($x == $url2 ) {
					if($url3 == 1)
						$data['info'] = "<div class='alert alert-info alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<p align='center'>Berhasil Update atau Hapus data baru</p>
										</div>";
					else if($url3 == 2)
						$data['info'] = "<div class='alert alert-danger alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<p align='center'>Gagal Update atau Hapus data baru</p>
									</div>";
					else 
						$data['info'] = "";
					
					$data['query'] = $this->registrasimodel->getDataWhere('pendaftar', 'prodi', $url2)->result();
					$this->load->view('content_getdata', $data);
				}
			}
		} else if($url == "grafik") {
			$data['prodi'] = $this->registrasimodel->getData('prodi', 'id_prodi', 'ASC')->result();
			$this->load->view('content_grafik', $data);
		}
		
		$this->load->view('footer');
	}
	
	public function getDataPendaftarBayar() {
		$this->cek_privileges();
		$data['prodi'] = $this->registrasimodel->getData('prodi', 'id_prodi', 'ASC')->result();
		$header['aktif'] = 'databayar';
		$data['title'] = 'Data Pendaftar Sudah Bayar';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_data_daftar', $data);
		
		$url = $this->uri->segment(3);
		$url2 = $this->uri->segment(4);
		$url3 = $this->uri->segment(5);
		
		if($url == "semua") {
			if($url2 == 1)
				$data['info'] = "<div class='alert alert-info alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<p align='center'>Berhasil Update atau Hapus data baru</p>
								</div>";
			else if($url2 == 2)
				$data['info'] = "<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<p align='center'>Gagal Update atau Hapus data baru</p>
							</div>";
			else 
				$data['info'] = "";
			
			$data['query'] = $this->registrasimodel->getDataBayarSemua()->result();
			$this->load->view('content_getdata', $data);
		} else if($url == "jalur") {
			for($x=1; $x<=3; $x++) {
				if($x == $url2 ) {
					if($url3 == 1)
						$data['info'] = "<div class='alert alert-info alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<p align='center'>Berhasil Update atau Hapus data baru</p>
										</div>";
					else if($url3 == 2)
						$data['info'] = "<div class='alert alert-danger alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<p align='center'>Gagal Update atau Hapus data baru</p>
									</div>";
					else 
						$data['info'] = "";
					
					$data['query'] = $this->registrasimodel->getDataBayarJalur($url2)->result();
					$this->load->view('content_getdata', $data);
				}
			}
		} else if($url == "prodi") {
			for($x=1; $x<=14; $x++) {
				if($x == $url2 ) {
					if($url3 == 1)
						$data['info'] = "<div class='alert alert-info alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<p align='center'>Berhasil Update atau Hapus data baru</p>
										</div>";
					else if($url3 == 2)
						$data['info'] = "<div class='alert alert-danger alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<p align='center'>Gagal Update atau Hapus data baru</p>
									</div>";
					else 
						$data['info'] = "";
					
					$data['query'] = $this->registrasimodel->getDataBayarProdi($url2)->result();
					$this->load->view('content_getdata', $data);
				}
			}
		} else if($url == "grafik") {
			$data['prodi'] = $this->registrasimodel->getData('prodi', 'id_prodi', 'ASC')->result();
			$this->load->view('content_grafik', $data);
		}
		
		$this->load->view('footer');
	}
	
	
	public function insertData() {
		$url = $this->input->post('url');
		$id = $this->input->post('id');
		$jalur = $this->input->post('jalur');
		$aksi = $this->input->post('aksi');
		
		$cek = $this->registrasimodel->getDataWhere('pendaftar', 'jalur', $jalur)->row();

		if(empty($cek)) {
			$noNew = '0001'; 
		} else {
			$noOld = (int) substr($cek->noreg, 0, 4);
			$noOld++;
			$noNew = sprintf('%04s', $noOld);
		}
		
		switch($jalur) {
			case 1 : $noreg = $noNew.'/PMB-UTS/PPKB/'.date('Y');
			break;
			case 2 : $noreg = $noNew.'/PMB-UTS/UND/'.date('Y');
			break;
			case 3 : $noreg = $noNew.'/PMB-UTS/SIMAK/'.date('Y');
			break;
			case 4 : $noreg = $noNew.'/PMB-UTS/BSISWA/'.date('Y');
			break;

		}
						
		if($aksi == 'tambah') {
			$data = array(
			'tgldaftar' => date('Y-m-d'),
			'noreg' => $noreg,
			'jalur' => $jalur,
			'nama' => $this->input->post('nama'),
			'jeniskelamin' => $this->input->post('jeniskelamin'),
			'tmplahir' => $this->input->post('tmplahir'),
			'tgllahir' => date($this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl')),
			'agama' => $this->input->post('agama'),
			'alamat' => $this->input->post('alamat'),
			'provinsi' => $this->input->post('provinsi'),
			'kabupaten' => $this->input->post('kabupaten'),
			'anakke' => $this->input->post('anakke'),
			'jml_saudara' => $this->input->post('jml_saudara'),
			'no_ktp' => $this->input->post('no_ktp'),
			'kode_pos' => $this->input->post('kode_pos'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'kpps' => $this->input->post('kpps'),
			'jml_kpps' => $this->input->post('jml_kpps'),
			'sekolahasal' => $this->input->post('sekolahasal'),
			'tahunlulus' => $this->input->post('tahunlulus'),
			'jurusan' => $this->input->post('jurusan'),
			'namaayah' => $this->input->post('namaayah'),
			'tmp_lhr_ayah' => $this->input->post('tmp_lhr_ayah'),
			'tgl_lhr_ayah' => date($this->input->post('thn_ayah').'-'.$this->input->post('bln_ayah').'-'.$this->input->post('tgl_ayah')),
			'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
			'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
			'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
			'telp_ayah' => $this->input->post('telp_ayah'),
			'namaibu' => $this->input->post('namaibu'),
			'tmp_lhr_ibu' => $this->input->post('tmp_lhr_ibu'),
			'tgl_lhr_ibu' => date($this->input->post('thn_ibu').'-'.$this->input->post('bln_ibu').'-'.$this->input->post('tgl_ibu')),
			'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
			'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
			'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
			'telp_ibu' => $this->input->post('telp_ibu'),
			'fakultas' => $this->input->post('fakultas'),
			'prodi' => $this->input->post('prodi')
			);
			$data = $this->registrasimodel->insertData('pendaftar', $data);
			
			if($data){
				redirect('registration/formRegistrasi/1');				
			} else {
				redirect('registration/formRegistrasi/2');	
			}
		} else if($aksi == 'edit') {
			$data = array(
			'noreg' => $noreg,
			'jalur' => $jalur,
			'nama' => $this->input->post('nama'),
			'jeniskelamin' => $this->input->post('jeniskelamin'),
			'tmplahir' => $this->input->post('tmplahir'),
			'tgllahir' => date($this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl')),
			'agama' => $this->input->post('agama'),
			'alamat' => $this->input->post('alamat'),
			'provinsi' => $this->input->post('provinsi'),
			'kabupaten' => $this->input->post('kabupaten'),
			'anakke' => $this->input->post('anakke'),
			'jml_saudara' => $this->input->post('jml_saudara'),
			'no_ktp' => $this->input->post('no_ktp'),
			'kode_pos' => $this->input->post('kode_pos'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'kpps' => $this->input->post('kpps'),
			'jml_kpps' => $this->input->post('jml_kpps'),
			'sekolahasal' => $this->input->post('sekolahasal'),
			'tahunlulus' => $this->input->post('tahunlulus'),
			'jurusan' => $this->input->post('jurusan'),
			'namaayah' => $this->input->post('namaayah'),
			'tmp_lhr_ayah' => $this->input->post('tmp_lhr_ayah'),
			'tgl_lhr_ayah' => date($this->input->post('thn_ayah').'-'.$this->input->post('bln_ayah').'-'.$this->input->post('tgl_ayah')),
			'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
			'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
			'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
			'telp_ayah' => $this->input->post('telp_ayah'),
			'namaibu' => $this->input->post('namaibu'),
			'tmp_lhr_ibu' => $this->input->post('tmp_lhr_ibu'),
			'tgl_lhr_ibu' => date($this->input->post('thn_ibu').'-'.$this->input->post('bln_ibu').'-'.$this->input->post('tgl_ibu')),
			'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
			'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
			'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
			'telp_ibu' => $this->input->post('telp_ibu'),
			'fakultas' => $this->input->post('fakultas'),
			'prodi' => $this->input->post('prodi')
			);
			$data = $this->registrasimodel->updateData('pendaftar', 'id', $id, $data);
			if($data) {
				redirect('registration/'.$url.'/1');	
			} else {
				redirect('registration/'.$url.'/2');
			}
		}
	}
	
	public function editDataPendaftar($id, $status, $jalur, $key=null) {
		$this->cek_privileges();
		$row = $this->registrasimodel->getDataWhere('pendaftar', 'id', $id)->row();
		
		if($jalur == 'semua') {
			$url = $status.'/'.$jalur;
		} else {
			$url = $status.'/'.$jalur.'/'.$key;
		}
		
		$thn = substr($row->tgllahir, 0, 4);
		$bln = substr($row->tgllahir, 5, 2);
		$tgl = substr($row->tgllahir, 8, 2);

		$thn_ayah = substr($row->tgl_lhr_ayah, 0, 4);
		$bln_ayah = substr($row->tgl_lhr_ayah, 5, 2);
		$tgl_ayah = substr($row->tgl_lhr_ayah, 8, 2);

		$thn_ibu = substr($row->tgl_lhr_ibu, 0, 4);
		$bln_ibu = substr($row->tgl_lhr_ibu, 5, 2);
		$tgl_ibu = substr($row->tgl_lhr_ibu, 8, 2);
		
		$data = array(
			'info' => '',
			'url' => $url,
			'aksi' => 'edit',
			'id' => $row->id,
			'jalur' => $row->jalur,
			'nama' => $row->nama,
			'jeniskelamin' => $row->jeniskelamin,
			'tmplahir' => $row->tmplahir,
			'tgl' => $tgl,
			'bulan' => $bln,
			'tahun' => $thn,
			'agama' => $row->agama,
			'alamat' => $row->alamat,
			'provinsi' => $row->provinsi,
			'kabupaten' => $row->kabupaten,
			'anakke' => $row->anakke,
			'jml_saudara' => $row->jml_saudara,
			'no_ktp' => $row->no_ktp,
			'kode_pos' => $row->kode_pos,
			'telp' => $row->telp,
			'email' => $row->email,
			'kpps' => $row->kpps,
			'jml_kpps' => $row->jml_kpps,
			'sekolahasal' => $row->sekolahasal,
			'tahunlulus' => $row->tahunlulus,
			'jurusan' => $row->jurusan,
			'namaayah' => $row->namaayah,
			'tmp_lhr_ayah' => $row->tmp_lhr_ayah,
			'tgl_ayah' => $tgl_ayah,
			'bln_ayah' => $bln_ayah,
			'thn_ayah' => $thn_ayah,
			'pendidikan_ayah' => $row->pendidikan_ayah,
			'pekerjaan_ayah' => $row->pekerjaan_ayah,
			'penghasilan_ayah' => $row->penghasilan_ayah,
			'telp_ayah' => $row->telp_ayah,
			'namaibu' => $row->namaibu,
			'tmp_lhr_ibu' => $row->tmp_lhr_ibu,
			'tgl_ibu' => $tgl_ibu,
			'bln_ibu' => $bln_ibu,
			'thn_ibu' => $thn_ibu,
			'pendidikan_ibu' => $row->pendidikan_ibu,
			'pekerjaan_ibu' => $row->pekerjaan_ibu,
			'penghasilan_ibu' => $row->penghasilan_ibu,
			'telp_ibu' => $row->telp_ibu,
			'fakultas' => $row->fakultas,
			'prodi' => $row->prodi,
			'prov' => $this->registrasimodel->getData('master_provinsi', 'provinsi_id', 'ASC')->result(),
			'fak' => $this->registrasimodel->getData('fakultas', 'id_fak', 'ASC')->result(),
			'kab' => $this->registrasimodel->getDataWhere('master_kokab', 'kota_id', $row->kabupaten)->row(),
			'prod' => $this->registrasimodel->getDataWhere('prodi', 'id_prodi', $row->prodi)->row()
		);
		
		$header['aktif'] = 'datadaftar';
		$data['title'] = 'Edit Data Pendaftar';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_form_daftar', $data);
		$this->load->view('footer');
	}
	
	public function deleteData($id, $status, $jalur, $key) {
		$data = $this->registrasimodel->deleteData('pendaftar', 'id', $id);
		
		if($jalur == 'semua') {
			$url = $status.'/'.$jalur;
		} else {
			$url = $status.'/'.$jalur.'/'.$key;
		}
		
		if($data) {
			redirect('registration/'.$url.'/1');	
		} else {
			redirect('registration/'.$url.'/2');
		}
	}
	
	public function getKab() {
		$id = $this->input->post('id');
		
		$data = $this->registrasimodel->getDataWhere('master_kokab', 'provinsi_id', $id)->result();
		
		foreach($data as $row){
			echo "<option value=".$row->kota_id.">".$row->kokab_nama."</option>";
		}
	}
	
	public function getKecam() {
		$id = $this->input->post('id');
		
		$data = $this->registrasimodel->getDataWhere('master_kecam', 'kota_id', $id)->result();
		
		foreach($data as $row){
			echo "<option value=".$row->kecam_id.">".$row->nama_kecam."</option>";
		}
	}
	
	public function getProdi() {
		$id = $this->input->post('id');
		
		$data = $this->registrasimodel->getDataWhere('prodi', 'id_fak', $id)->result();
		
		foreach($data as $row){
			echo "<option value=".$row->id_prodi.">".$row->nama_prodi."</option>";
		}	
	}	
	
	public function export($status, $type, $value, $id=null) {
		if($value=='semua') {
			$data['judul'] = 'Semua Data Mahasiswa';
			if($status == 'getDataPendaftar')
				$data['query'] = $this->registrasimodel->getDataWhere('pendaftar', 'jumlah_bayar', $jml = 0)->result();
			else if($status == 'getDataPendaftarBayar')
				$data['query'] = $this->registrasimodel->getDataBayarSemua()->result();
		} else if($value == 'jalur') {
			for($x=1; $x<=3; $x++) {
				if($x == $id) 
					if($id == 1){
						$data['judul'] = 'PPKB (Prestasi dan Pemerataan Kesempatan Belajar)';
					} else if($id == 2) {
						$data['judul'] = 'Jalur Undangan';
					} else if($id == 3) {
						$data['judul'] = 'Jalur SIMAK';
					}
					if($status == 'getDataPendaftar')
					$data['query'] = $this->registrasimodel->getDataBelumBayarJalur($url2)->result();
					else if($status == 'getDataPendaftarBayar')
					$data['query'] = $this->registrasimodel->getDataBayarJalur($url2)->result();
			}
		} else if($value == 'prodi') {
			for($x=1; $x<=14; $x++) {
				if($x == $id) {
					$cek = $this->registrasimodel->getDataWhere('prodi', 'id_prodi', $id)->row();
					$data['judul'] = $cek->nama_prodi;
					if($status == 'getDataPendaftar')
					$data['query'] = $this->registrasimodel->getDataBelumBayarProdi($id)->result();
					else if($status == 'getDataPendaftarBayar')
					$data['query'] = $this->registrasimodel->getDataBayarProdi($id)->result();
					break;
				}		
			}
		}
		
		if($type == 'xls') {
			$judul = str_replace(' ', '_', $data['judul']);
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=".$judul.".xls");
			
			$this->load->view('content_export', $data);			
		} else if($type == 'pdf') {
			// $this->load->library('pdfgenerator');
			$this->load->view('content_export', $data);
			
			// $this->pdfgenerator->generate($html, $data['judul']);
		}
						
	}
	
	public function grafik() {
		$this->cek_privileges();
		
		$data['prodi'] = $this->registrasimodel->getData('prodi', 'id_prodi', 'ASC')->result();
		$header['aktif'] = '';
		$data['title'] = 'Grafik Pendaftar';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_grafik', $data);
		$this->load->view('footer');
	}
	
	public function setting() {
		$this->cek_privileges();
		
		if($this->uri->segment(3) == 1) {
			$data['info'] = "<div class='alert alert-info alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<p align='center'>berhasil ganti Password !</p>
							</div>";
		} else if($this->uri->segment(3) == 2) {
			$data['info'] = "<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<p align='center'>gagal ganti Password !<br> silakan coba lagi</p>
							</div>";
		} else {
			$data['info'] = "";
		}
			
		$header['aktif'] = '';
		$data['title'] = 'Setting';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_setting', $data);
		$this->load->view('footer');
	}
	
	public function prosesGantiPassword() {
		$p = $this->input->post('password');
		$p1 = $this->input->post('password1');
		$p2 = $this->input->post('password2');
		
		$cek = $this->registrasimodel->getDataWhere('admin', 'id', $this->session->userdata('id'))->row();
		
		if($cek->password != $p || $p1 != $p2) {
			redirect('registration/setting/2');
		}
		$data = array(
			'password' => $p1
		);
		$query = $this->registrasimodel->updateData('admin', 'id', $this->session->userdata('id'), $data);
		if($query) {
			redirect('registration/setting/1');
		} else {
			redirect('registration/setting/2');
		}
	}
	
	public function bayar() {
		$key['key'] = $this->input->post('key');
		
		$this->load->view('content_bayar', $key);
	}
	
	public function prosesBayar() {
		$key = $this->input->post('key');
		$bayar = $this->input->post('bayar');
		
		$data = explode('/', $key);
		
		$id = $data[0];
		$status = $data[1];
		$jalur = $data[2];
		$value = $data[3];
		
		if($jalur == 'semua') {
			$url = $status.'/'.$jalur;
		} else {
			$url = $status.'/'.$jalur.'/'.$value;
		}
		
		$cek = $this->registrasimodel->getDataWhere('pendaftar', 'id', $id)->row();
		$sisa = $cek->jumlah_bayar;
		$tambah = $sisa + $bayar;
		
		$query = array(
			'jumlah_bayar' => $tambah
		);
		$data = $this->registrasimodel->updateData('pendaftar', 'id', $id, $query);
		
		if($data) {
			redirect('registration/'.$url.'/1');	
		} else {
			redirect('registration/'.$url.'/2');
		}
		
	}
	
	public function korpus() {
		$this->cek_privileges();

		if($this->uri->segment(3) == 1) {
			$data['info'] = "<div class='alert alert-info alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<p align='center'>Berhasil</p>
					</div>";
		} else if($this->uri->segment(3) == 2) {
			$data['info'] = "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<p align='center'>Gagal</p>
					</div>";
			
		} else {
			$data['info'] = '';
		}
		
		$data['query'] = $this->registrasimodel->getData('agen', 'id', 'ASC')->result();
		
		$data['title'] = 'Data Agen';		
		$header['aktif'] = '';
		$this->load->view('header', $data);
		$this->load->view('menu', $header);
		$this->load->view('content_korpus', $data);
		$this->load->view('footer');		
	}
	
	public function tambah_agen() {
		$this->cek_privileges();
		
		$data = array(
			'title' => 'Tambah Data Agen',
			'aksi' => 'tambah',
			'id' => '',
			'aktif' => '',
			'nama' => '',
			'jmlambil' => '',
			'jmlkembali' => '',
			'telp' => '',
			'keterangan' => ''
		);
		
		$this->load->view('header', $data);
		$this->load->view('menu', $data);
		$this->load->view('content_form_agen', $data);
		$this->load->view('footer');				
	}
	
	public function edit_agen($id) {
		$this->cek_privileges();
		
		$cek = $this->registrasimodel->getDataWhere('agen', 'id', $id)->row();
		
		$data = array(
			'title' => 'Edit Data Agen',
			'aksi' => 'edit',
			'id' => $id,
			'aktif' => '',
			'nama' => $cek->nama,
			'jmlambil' => $cek->jml_formulir_ambil,
			'jmlkembali' => $cek->jml_formulir_kembali,
			'telp' => $cek->telp,
			'keterangan' => $cek->keterangan
		);
		
		$this->load->view('header', $data);
		$this->load->view('menu', $data);
		$this->load->view('content_form_agen', $data);
		$this->load->view('footer');						
	}
	
	public function proses_agen() {
		$aksi = $this->input->post('aksi');
		$id = $this->input->post('id');
		
		if($aksi == 'tambah') {
			$data = array(
				'nama' => $this->input->post('nama'),
				'jml_formulir_ambil' => $this->input->post('jmlambil'),
				'telp' => $this->input->post('telp'),
				'keterangan' => $this->input->post('keterangan')
			);
			$query = $this->registrasimodel->insertData('agen', $data);
			
		} else if($aksi == 'edit') {
			$data = array(
				'nama' => $this->input->post('nama'),
				'jml_formulir_ambil' => $this->input->post('jmlambil'),
				'jml_formulir_kembali' => $this->input->post('jmlkembali'),
				'telp' => $this->input->post('telp'),
				'keterangan' => $this->input->post('keterangan')
			);
			$query = $this->registrasimodel->updateData('agen', 'id', $id, $data);
			
		}
		
		if($query){
			redirect('registration/korpus/1');	
		} else {
			redirect('registration/korpus/2');
		}
	}
	
	public function hapus_agen($id) {
		$query = $this->registrasimodel->deleteData('agen', 'id', $id);

		if($query){
			$this->registrasimodel->deleteData('korban', 'id_agen', $id);
			redirect('registration/korpus/1');	
		} else {
			redirect('registration/korpus/2');
		}
	}
	
	public function setDataMilikAgen() {
		$this->cek_privileges();
		
		$id = $this->uri->segment(3);
		
		if($this->uri->segment(4) == 1) {
			$info =  "<div class='alert alert-info alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<p align='center'>Berhasil</p>
				</div>";
		} else if($this->uri->segment(4) == 2) {
			$info =  "<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<p align='center'>Gagal</p>
				</div>";
		} else {
			$info = '';
		}

		
		$cek = $this->registrasimodel->getDataWhere('agen', 'id', $id)->row();
		$nama = $cek->nama;
		
		$data = array(
			'aktif' => '',
			'info' => $info,
			'title' => 'Data Korban Agen',
			'id' => $id,
			'nama' => $nama,
			'query' => $this->registrasimodel->getDataWhere('korban', 'id_agen', $id)->result()
		);
		
		$this->load->view('header', $data);
		$this->load->view('menu', $data);
		$this->load->view('content_form_korban', $data);
		$this->load->view('footer');
	}
	
	public function prosesInputKorban() {
		$data = array(
			'id_agen' => $this->input->post('id'),
			'nama_korban' => $this->input->post('nama')
		);
		
		$query = $this->registrasimodel->insertData('korban', $data);
		
		if($query){
			redirect('registration/setDataMilikAgen/'.$this->input->post('id').'/1');	
		} else {
			redirect('registration/setDataMilikAgen/'.$this->input->post('id').'/2');
		}
	}
	
	public function hapusDataKorban($id, $id2) {
		$query = $this->registrasimodel->deleteData('korban', 'id', $id);

		if($query){
			redirect('registration/setDataMilikAgen/'.$id2.'/1');	
		} else {
			redirect('registration/setDataMilikAgen/'.$id2.'/2');
		}
	}
	
	public function agenExport($type) {
		$data['query'] = $this->registrasimodel->getData('agen', 'id', 'DESC')->result();
		
		if($type == 'xls') {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Data_agen.xls");
			
			$this->load->view('content_export_agen', $data);	
		}
	}	
}

?>