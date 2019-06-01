<?php
include_once('library/Config.php');

class Binhluan extends Config{
	protected $id_bl = null;
	protected $id_xe = null;
	protected $ten_bl = null;
	protected $dien_thoai = null;
	protected $binh_luan = null;
	protected $ngay_gio = null;

	function __construct(){
		$this->connect();
	}

	public function set_id_bl($id_bl){
		$this->id_bl = $id_bl;
	}
	public function set_id_xe($id_xe){
		$this->id_xe = $id_xe;
	}
	public function set_ten_bl($ten_bl){
		$this->ten_bl = $ten_bl;
	}
	public function set_dien_thoai($dien_thoai){
		$this->dien_thoai = $dien_thoai;
	}
	public function set_binh_luan($binh_luan){
		$this->binh_luan = $binh_luan;
	}
	public function set_ngay_gio($ngay_gio){
		$this->ngay_gio = $ngay_gio;
	}

	public function add(){
		$sql = "SELECT * FROM blxe WHERE ten_bl = '$this->ten_bl'";
		$this->query($sql);
			$sql = "INSERT INTO blxe (ten_bl,dien_thoai,binh_luan,ngay_gio,id_xe) VALUES ('$this->ten_bl', '$this->dien_thoai', '$this->binh_luan', '$this->ngay_gio', '$this->id_xe')";
			$this->query($sql);

	}
	public function del(){
		$sql = "DELETE FROM blxe WHERE id_bl = '$this->id_bl'";
		$this->query($sql);
	}
}
?>