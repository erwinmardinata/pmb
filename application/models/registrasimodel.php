<?php
class Registrasimodel extends CI_Model {
	
	public function login($table, $user, $pass) {
		$u = mysql_real_escape_string($user);
		$p = mysql_real_escape_string($pass);
		$this->db->where('username', $u);
		$this->db->where('password', $p);
		return $this->db->get($table);
	}
	
	public function insertData($table, $data) {
		return $this->db->insert($table, $data);
	}
	
	public function getData($table, $key, $value) {
		$this->db->order_by($key, $value);
		return $this->db->get($table);
	}
	
	public function getDataWhere($table, $key, $value) {
		$this->db->where($key, $value);
		return $this->db->get($table);
	}
	
	public function updateData($table, $key, $value, $data) {
		$this->db->where($key, $value);
		return $this->db->update($table, $data);
	}
	
	function deleteData($table, $key, $value) {
		$this->db->where($key, $value);
		return $this->db->delete($table);
	}

	public function getKodeReg($key) {
		$query = "SELECT * FROM pendaftar WHERE 
		          jalur = $key ORDER BY id DESC";
		return $this->db->query($query);
	}
	
	public function getDataBelumBayarJalur($key) {
		$query = "SELECT * FROM pendaftar WHERE
				  jalur = $key and jumlah_bayar = 0
				  ORDER BY id DESC";
		return $this->db->query($query);
	}

	public function getDataBelumBayarProdi($key) {
		$query = "SELECT * FROM pendaftar WHERE
				  prodi  = $key and jumlah_bayar = 0
				  ORDER BY id DESC";
		return $this->db->query($query);
	}
	
	public function getDataBayarSemua() {
		$query = "SELECT * FROM pendaftar WHERE
				  jumlah_bayar > 0 ORDER BY id DESC";
		return $this->db->query($query);		
	}

	public function getDataBayarJalur($key) {
		$query = "SELECT * FROM pendaftar WHERE
				  jalur = $key and jumlah_bayar > 0
				  ORDER BY id DESC";
		return $this->db->query($query);
	}

	public function getDataBayarProdi($key) {
		$query = "SELECT * FROM pendaftar WHERE
				  prodi  = $key and jumlah_bayar > 0
				  ORDER BY id DESC";
		return $this->db->query($query);
	}
	
}

?>