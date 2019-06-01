<?php
include_once('library/Config.php');
class Xe extends Config{
	protected $id_xe = null;
	protected $name = null;
	protected $price = null;
	protected $xi_lanh = null;
	protected $img = null;
	protected $speed = null;
	protected $cong_suat = null;
	protected $nhien_lieu = null;
	protected $khi_thai = null;
	protected $dai = null;
	protected $rong = null;
	protected $cao = null;
	protected $the_tich = null;
	protected $id_dong = null;
	protected $dac_biet = null;
	protected $mo_ta = null;

	function __construct(){
		$this->connect();
	}

	public function set_id_xe($id_xe){
		$this->id_xe = $id_xe;
	}
	public function set_name($name){
		$this->name = $name;
	}
	public function set_price($price){
		$this->price = $price;
	}
	public function set_cho_ngoi($cho_ngoi){
		$this->cho_ngoi = $cho_ngoi;
	}
	public function set_img($img){
		$this->img = $img;
	}
	public function set_speed($speed){
		$this->speed = $speed;
	}
	public function set_cong_suat($cong_suat){
		$this->cong_suat = $cong_suat;
	}
	public function set_nhien_lieu($nhien_lieu){
		$this->nhien_lieu = $nhien_lieu;
	}
	public function set_khi_thai($khi_thai){
		$this->khi_thai = $khi_thai;
	}
	public function set_dai($dai){
		$this->dai = $dai;
	}
	public function set_rong($rong){
		$this->rong = $rong;
	}
	public function set_cao($cao){
		$this->cao = $cao;
	}
	public function set_the_tich($the_tich){
		$this->the_tich = $the_tich;
	}
	public function set_id_dong($id_dong){
		$this->id_dong = $id_dong;
	}
	public function set_dac_biet($dac_biet){
		$this->dac_biet = $dac_biet;
	}
	public function set_mo_ta($mo_ta){
		$this->mo_ta = $mo_ta;
	}

	public function add(){
		$sql = "SELECT * FROM xe WHERE name = '$this->name'";
		$this->query($sql);
		if ($this->num_rows() > 0) {
			echo 'exists';
		}
		else{
			move_uploaded_file($this->$img['tmp_ten'], 'Views/images/'.$this->$img['name']);

			$sql = "INSERT INTO xe (name, price, cho_ngoi, img, speed, cong_suat, nhien_lieu, khi_thai, dai, rong, cao, the_tich, id_dong, mo_ta) VALUES ('$this->name', '$this->price', '$this->cho_ngoi', '{$this->img["name"]}', '$this->speed', '$this->cong_suat', '$this->nhien_lieu', '$this->khi_thai', '$this->dai', '$this->rong', '$this->cao', '$this->the_tich', '$this->id_dong', '$this->mo_ta')";
			$this->query($sql);
		}
	}
	public function del(){
		$sql = "DELETE FROM xe WHERE id_xe = '$this->id_xe'";
		$this->query($sql);
	}
	public function edit(){
		

		$sql = "SELECT * FROM xe WHERE name = '$this->name' AND price = '$this->price' AND cho_ngoi = '$this->cho_ngoi' AND speed = '$this->speed' AND cong_suat = '$this->cong_suat' AND nhien_lieu = '$this->nhien_lieu' AND khi_thai = '$this->khi_thai' AND dai = '$this->dai' AND rong = '$this->rong' AND cao = '$this->cao' AND the_tich = '$this->the_tich' AND id_dong = '$this->id_dong' AND id_xe != '$this->id_xe'";
		$this->query($sql);
		if ($this->num_rows() > 0) {
			echo 'exists';
		}
		else{
			$sql = "UPDATE xe SET name = '$this->name', price = '$this->price', cho_ngoi = '$this->cho_ngoi', img='$this->img', speed = '$this->speed', cong_suat = '$this->cong_suat', nhien_lieu = '$this->nhien_lieu', khi_thai = '$this->khi_thai', dai = '$this->dai', rong = '$this->rong', cao = '$this->cao', the_tich = '$this->the_tich', id_dong = '$this->id_dong', dac_biet = '$this->dac_biet', mo_ta = '$this->mo_ta' WHERE id_xe = '$this->id_xe'";
			$this->query($sql);
		}
	}
}
$xe = new Xe;
?>