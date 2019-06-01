<?php
include_once('library/Config.php');
class User extends Config{
	protected $id_thanhvien = null;
	protected $name_thanhvien = null;
	protected $email = null;
	protected $password = null;
	protected $level_thanhvien = null;

	function __construct(){
		$this->connect();
	}

	public function set_id_thanhvien($id_thanhvien){
		$this->id_thanhvien = $id_thanhvien;
	}
	public function set_name_thanhvien($name_thanhvien){
		$this->name_thanhvien = $name_thanhvien;
	}
	public function set_email($email){
		$this->email = $email;
	}
	public function set_password($password){
		$this->password = $password;
	}
	public function set_level_thanhvien($level_thanhvien){
		$this->level_thanhvien = $level_thanhvien;
	}

	public function login(){
		$sql = "SELECT * FROM thanhvien WHERE email = '$this->email' AND password = '$this->password' AND level_thanhvien < 3";
		$this->query($sql);
		if($this->num_rows() > 0){
			$_SESSION['email'] = $this->email;
			$_SESSION['password'] = $this->password;
		}
		else{
			return 'login_fail';
		}
	}
	public function loginf(){
		$sql = "SELECT * FROM thanhvien WHERE email = '$this->email' AND password = '$this->password' AND level_thanhvien > 2";
		$this->query($sql);
		if($this->num_rows() > 0){
			$_SESSION['email'] = $this->email;
			$_SESSION['password'] = $this->password;
		}
		else{
			return 'login_fail';
		}
	}
	public function add(){
		$sql = "SELECT * FROM thanhvien WHERE email = '$this->email'";
		$this->query($sql);
		if ($this->num_rows() > 0) {
			echo 'exists';
		}
		else{
			$sql = "INSERT INTO thanhvien (name_thanhvien, email, password, level_thanhvien) VALUES ('$this->name_thanhvien', '$this->email', '$this->password', '$this->level_thanhvien')";
			$this->query($sql);
		}
	}
	public function del(){
		$sql = "DELETE FROM thanhvien WHERE id_thanhvien = '$this->id_thanhvien'";
		$this->query($sql);
	}
	public function edit(){
		$sql = "SELECT * FROM thanhvien WHERE name_thanhvien = '$this->name_thanhvien' AND emmail = '$this->email' AND password = '$this->password' AND level_thanhvien = '$this->level_thanhvien' AND id_thanhvien != '$this->id_thanhvien'";
		$this->query($sql);
		if ($this->num_rows() > 0) {
			echo 'exists';
		}
		else{
			$sql = "UPDATE thanhvien SET name_thanhvien = '$this->name_thanhvien', email = '$this->email', password = '$this->password', level_thanhvien = '$this->level_thanhvien' WHERE id_thanhvien = '$this->id_thanhvien'";
			$this->query($sql);
		}
	}
}
$user = new User;
?>