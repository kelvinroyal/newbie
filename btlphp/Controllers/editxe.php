<?php
$xe = new Xe();
$id = $_GET['id_xe'];
$sql= "SELECT * FROM xe WHERE id_xe=$id";
$xe->query($sql);
$row=$xe->fetch_array();

if (isset($_POST['submit'])) {
	$xe->set_id_xe($id);
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
	$xe->set_dac_biet($_POST['dac_biet']);
	// $xe->set_img($_FILES['img']);

	if ($_FILES['img']['name'] == $row['img'] || $_FILES['img']['error'] != 0) {
		$xe->set_img($_POST['img']);
	}
	else{
		$xe->set_img($_FILES['img']['name']);
		move_uploaded_file($_FILES['img']['tmp_ten'], 'Views/images/'.$_FILES['img']['name']);
	}


	if ($xe->edit() == 'exists') {
		$_SESSION['error'] = '<div class="alert alert-danger">Sửa xe thất bại!</div>';
	}
	else{
		$_SESSION['success'] = '<div class="alert alert-success">Sửa xe thành công!</div>';
		header('location: quantri.php?page_layout=qlxe');
	}
}
$paginate = new Paginate();
$sql1 = "SELECT * FROM dong";
$paginate->query($sql1);


include_once 'Views/quantri/editxe.php';
?>