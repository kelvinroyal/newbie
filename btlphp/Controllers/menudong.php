<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$paginate->set_page($page);
$paginate->set_row_per_page(20);
$paginate->set_per_row();

$per_row=$paginate->get_per_row();
$row_per_page=$paginate->get_row_per_page();
$sql="SELECT * FROM dong LIMIT $per_row, $row_per_page";
$paginate->query($sql);

// include_once 'Views/master.php';
?>