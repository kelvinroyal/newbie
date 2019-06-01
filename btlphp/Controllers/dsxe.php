<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$id_dong = $_GET['id_dong'];
$sql = "SELECT * FROM dong WHERE id_dong = $id_dong";
$dong = new Dong();
$dong->query($sql);

$dong = $dong->fetch_array();

$paginate->set_page($page);
$paginate->set_row_per_page(8);
$paginate->set_per_row();

$per_row=$paginate->get_per_row();
$row_per_page=$paginate->get_row_per_page();
$sql="SELECT * FROM xe WHERE id_dong = $id_dong ORDER BY id_xe DESC LIMIT $per_row, $row_per_page";
$paginate->query($sql);
// include_once 'Views/dsxe.php';
?>
