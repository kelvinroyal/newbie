<?php
include_once('library/Config.php');
class Dong extends Config{
	protected $id_dong = null;
	protected $name_dong = null;

	function __construct(){
		$this->connect();
	}

	public function set_id_dong($id_dong){
		$this->id_dong = $id_dong;
	}
	public function set_name_dong($name_dong){
		$this->name_dong = $name_dong;
	}
	

	public function add(){
		$sql = "SELECT * FROM dong WHERE name_dong = '$this->name_dong'";
		$this->query($sql);
		if ($this->num_rows() > 0) {
			echo 'exists';
		}
		else{
			$sql = "INSERT INTO dong (name_dong) VALUES ('$this->name_dong')";
			$this->query($sql);
		}
	}
	public function del(){
		$sql = "DELETE FROM dong WHERE id_dong = '$this->id_dong'";
		$this->query($sql);
	}
	public function edit(){
		$sql = "SELECT * FROM dong WHERE name_dong = '$this->name_dong' AND id_dong != '$this->id_dong'";
		$this->query($sql);
		if ($this->num_rows() > 0) {
			echo 'exists';
		}
		else{
			$sql = "UPDATE dong SET name_dong = '$this->name_dong' WHERE id_dong = '$this->id_dong'";
			$this->query($sql);
		}
	}
}
?>