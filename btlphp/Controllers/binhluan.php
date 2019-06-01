<?php 

$bl = new Binhluan();
if (isset($_POST['submitbl'])) {

	$bl->set_ten_bl($_POST['ten_bl']);
	$bl->set_dien_thoai($_POST['dien_thoai']);
	$bl->set_binh_luan($_POST['binh_luan']);
	$bl->set_id_xe($id_xe);

	$_POST['ngay_gio']=date("Y-m-d H:i:s");
	$bl->set_ngay_gio($_POST['ngay_gio']);

	//xu ly them binh luan
	

	if (isset($_POST['ten_bl']) && isset($_POST['dien_thoai']) && isset($_POST['binh_luan'])) {
		$bl->add();
	}
}


if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$id_xe = $_GET['id_xe'];
$paginate->set_page($page);
$paginate->set_row_per_page(5);
$paginate->set_per_row();

$per_row=$paginate->get_per_row();
$row_per_page=$paginate->get_row_per_page();
$sqlBl="SELECT * FROM blxe  WHERE id_xe=$id_xe ORDER BY id_bl DESC  LIMIT $per_row, $row_per_page";

$paginate->query($sqlBl);

//thanh phân trang
$pagination = new Paginate();
$sql2="SELECT * FROM blxe WHERE id_xe=$id_xe ";
$pagination->set_page($page);
$pagination->set_row_per_page(5);
$pagination->total_row($sql2);
$pagination->total_page();
$url="index.php?page_lg=thongtinxe&id_xe=".$id_xe."&page";
$pagination->set_list_page($url);
?>