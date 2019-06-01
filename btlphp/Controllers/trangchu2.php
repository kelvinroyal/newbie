<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$paginate2->set_page($page);
$paginate2->set_row_per_page(30);
$paginate2->set_per_row();

$per_row=$paginate2->get_per_row();
$row_per_page=$paginate2->get_row_per_page();
$sql="SELECT * FROM xe WHERE dac_biet = 1 LIMIT $per_row, $row_per_page";
$paginate2->query($sql);
include_once 'Views/master.php';
?>
