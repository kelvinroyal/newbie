<?php
$paginate = new Paginate();
$sql = "SELECT * FROM dong";
$paginate->query($sql);
$xe = new Xe();
if(isset($_POST['submit'])){
	$xe->set_name($_POST['name']);
	$xe->set_price($_POST['price']);
	$xe->set_cho_ngoi($_POST['cho_ngoi']);
	$xe->set_speed($_POST['speed']);
	$xe->set_cong_suat($_POST['cong_suat']);
	$xe->set_nhien_lieu($_POST['nhien_lieu']);
	$xe->set_khi_thai($_POST['khi_thai']);
	$xe->set_dai($_POST['dai']);
	$xe->set_rong($_POST['rong']);
	$xe->set_cao($_POST['cao']);
	$xe->set_the_tich($_POST['the_tich']);
	$xe->set_id_dong($_POST['id_dong']);
	$xe->set_mo_ta($_POST['mo_ta']);
	$xe->set_img($_FILES['img']);

	if ($_FILES['img']['name']=="") {
		$_SESSION['img_error'] = '<div class="alert alert-danger">Ảnh không hợp lệ!</div>';
	}
	else{
		$img=$_FILES['img']['name'];
		$tmp_ten=$_FILES['img']['tmp_ten'];
	}
	if ($xe->add() == "exists") {
		$_SESSION['error'] = '<div class="alert alert-danger">Thêm xe thất bại!</div>';
	}
	else{
		$_SESSION['success'] = '<div class="alert alert-success">Thêm xe thành công!</div>';
		header('location: quantri.php?page_layout=qlxe');
	}
}
include_once 'Views/quantri/addxe.php';
?>