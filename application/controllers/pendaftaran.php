<?php
class Pendaftaran extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('registrasimodel');
	}
	
	public function index() {
		$cek = $this->registrasimodel->getDataWhere('artikel_menu', 'id_kategori', 1)->row();
		
		if(empty($cek))
			$data['query'] = '<p align=center>- Data Tidak Ada -</p>';
		else
			$data['query'] = $cek->isi;
		
		$data['judul'] = 'HOME';
		$data['menu'] = 'home';
		$this->load->view('pendaftaran/header');
		$this->load->view('pendaftaran/menu', $data);
		$this->load->view('pendaftaran/slider');
		$this->load->view('pendaftaran/content', $data);
		$this->load->view('pendaftaran/footer');
	}
	
	public function info_pmb() {
		$cek = $this->registrasimodel->getDataWhere('artikel_menu', 'id_kategori', 2)->row();
		
		if(empty($cek))
			$data['query'] = '<p align=center>- Data Tidak Ada -</p>';
		else
			$data['query'] = $cek->isi;

		$data['judul'] = 'INFO PMB';
		$data['menu'] = 'info_pmb';
		$this->load->view('pendaftaran/header');
		$this->load->view('pendaftaran/menu', $data);
		$this->load->view('pendaftaran/content', $data);
		$this->load->view('pendaftaran/footer');
	}
	
	public function program_studi() {
		$cek = $this->registrasimodel->getDataWhere('artikel_menu', 'id_kategori', 3)->row();
		
		if(empty($cek))
			$data['query'] = '<p align=center>- Data Tidak Ada -</p>';
		else
			$data['query'] = $cek->isi;
		
		$data['judul'] = 'PROGRAM STUDI';
		$data['menu'] = 'program_studi';
		$this->load->view('pendaftaran/header');
		$this->load->view('pendaftaran/menu', $data);
		$this->load->view('pendaftaran/content', $data);
		$this->load->view('pendaftaran/footer');
	}

	public function biaya() {
		$cek = $this->registrasimodel->getDataWhere('artikel_menu', 'id_kategori', 4)->row();
		
		if(empty($cek))
			$data['query'] = '<p align=center>- Data Tidak Ada -</p>';
		else
			$data['query'] = $cek->isi;
		
		$data['judul'] = 'BIAYA KULIAH';
		$data['menu'] = 'biaya';
		$this->load->view('pendaftaran/header');
		$this->load->view('pendaftaran/menu', $data);
		$this->load->view('pendaftaran/content', $data);
		$this->load->view('pendaftaran/footer');
	}

	public function pengumuman() {
		$cek = $this->registrasimodel->getDataWhere('artikel_menu', 'id_kategori', 5)->row();
		
		if(empty($cek))
			$data['query'] = '<p align=center>- Data Tidak Ada -</p>';
		else
			$data['query'] = $cek->isi;
		
		$data['judul'] = 'PENGUMUMAN';
		$data['menu'] = 'pengumuman';
		$this->load->view('pendaftaran/header');
		$this->load->view('pendaftaran/menu', $data);
		$this->load->view('pendaftaran/content', $data);
		$this->load->view('pendaftaran/footer');
	}
	
	public function form_daftar() {
		$data['jur'] = $this->registrasimodel->getData('prodi', 'id_prodi', 'ASC')->result();
		
		$data['menu'] = 'jalur_beasiswa';
		$data['judul'] = 'JALUR BEASISWA';
		$this->load->view('pendaftaran/header');
		$this->load->view('pendaftaran/menu', $data);
		$this->load->view('pendaftaran/content_form_daftar', $data);
		$this->load->view('pendaftaran/footer');
	}
	
}
?>