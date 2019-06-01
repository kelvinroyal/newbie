<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$paginate->set_page($page);
$paginate->set_row_per_page(8);
$paginate->set_per_row();

$per_row=$paginate->get_per_row();
$row_per_page=$paginate->get_row_per_page();
$sql="SELECT * FROM xe ORDER BY id_xe DESC LIMIT $per_row, $row_per_page";
$paginate->query($sql);
include_once 'Views/master.php';
?>
