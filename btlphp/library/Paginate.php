<?php
include_once('Config.php');
class Paginate extends Config{
	protected $page = null; //trang hien tai
	protected $row_per_page = null; //tong so ban ghi/page
	protected $per_row = null; //ban ghi bat dau

	protected $total_row = null;
	protected $total_page = null;
	protected $list_page = null;

	function __construct(){
		$this->connect();
	}
	public function set_page($page){
		$this->page = $page;
	}
	public function set_row_per_page($row_per_page){
		$this->row_per_page = $row_per_page;
	}
	public function get_row_per_page(){
		return $this->row_per_page;
	}
	public function set_per_row(){
		$this->per_row = ($this->page * $this->row_per_page) - $this->row_per_page;
	}

	/////////////////////////
	//thanh phân trang
	public function get_per_row(){
		return $this->per_row;		
	}
	public function total_row($sql){
		$this->query($sql);
		$this->total_row = $this->num_rows();
	}
	public function total_page(){
		$this->total_page = ceil($this->total_row/$this->row_per_page);
	}
	public function set_list_page($url){
		for($i=1; $i<=$this->total_page;$i++){
			if ($i == $this->page) {
				$this->list_page .= '<li class="active"><a href="'.$url.'='.$i.'">'.$i.'</a></li>';
			}else{
				$this->list_page .= '<li><a href="'.$url.'='.$i.'">'.$i.'</a></li>';
			}
		}
	}
	public function get_list_page(){
		return $this->list_page;
	}
}
$paginate = new Paginate;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}
