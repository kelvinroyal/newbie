<?php
class Config{
	protected $dbHost = 'localhost';
	protected $dbUser = 'root';
	protected $dbPass = '';
	protected $dbName = 'autocar';

	protected $connect = null;
	protected $query = null;
	protected $rows = null;
	protected $array = null;

	public function __construct(){
		$this->connect();
	}
	public function connect(){
		$this->connect = mysqli_connect($this->dbHost,$this->dbUser, $this->dbPass,$this->dbName);
		if($this->connect){
			mysqli_query($this->connect, "SET NAMES 'utf-8'");
		}
		else{
			echo "Thất bại";
		}
	}
	public function free_result(){
		if ($this->query) {
			mysqli_free_result($this->query);
		}
	}
	public function query($sql){
		$this->free_result();
		$this->query = mysqli_query($this->connect,$sql);
	}
	public function num_rows(){
		$this->rows = mysqli_num_rows($this->query);
		return $this->rows;
	}
	public function fetch_array(){
		$this->array = mysqli_fetch_array($this->query);
		return $this->array;
	}
}
?>