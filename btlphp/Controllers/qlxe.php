<?php

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$paginate->set_page($page);
$paginate->set_row_per_page(5);
$paginate->set_per_row();

$per_row=$paginate->get_per_row();
$row_per_page=$paginate->get_row_per_page();
$sql="SELECT * FROM xe INNER JOIN dong ON xe.id_dong = dong.id_dong ORDER BY id_xe DESC  LIMIT $per_row, $row_per_page";
$paginate->query($sql);

//thanh phân trang
$pagination=new Paginate();
$sql1="SELECT * FROM xe";
$pagination->set_page($page);
$pagination->set_row_per_page(5);
$pagination->total_row($sql1);
$pagination->total_page();
$url="quantri.php?page_layout=qlxe&page";
$pagination->set_list_page($url);

include_once 'Views/quantri/qlxe.php';
?>