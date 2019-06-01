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
$sql="SELECT * FROM dong LIMIT $per_row, $row_per_page";
$paginate->query($sql);

//thanh phân trang
$pagination=new Paginate();
$sql1="SELECT * FROM dong";
$pagination->set_page($page);
$pagination->set_row_per_page(5);
$pagination->total_row($sql1);
$pagination->total_page();
$url="quantri.php?page_layout=qldong&page";
$pagination->set_list_page($url);

include_once 'Views/quantri/qldong.php';
?>