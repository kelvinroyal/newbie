<?php
$user = new User();
$id = $_GET['id_thanhvien'];
$sql= "SELECT * FROM thanhvien WHERE id_thanhvien=$id";
$user->query($sql);
$row=$user->fetch_array();
if (isset($_POST['submit'])) {
	$user->set_id_thanhvien($id);
	$user->set_name_thanhvien($_POST['name_thanhvien']);
	$user->set_email($_POST['email']);
	$user->set_password($_POST['password']);
	$user->set_level_thanhvien($_POST['level_thanhvien']);
	if ($user->edit() == 'exists') {
		$_SESSION['error'] = '<div class="alert alert-danger">Sửa thành viên thất bại!</div>';
	}
	else{
		$_SESSION['success'] = '<div class="alert alert-success">Sửa thành viên thành công!</div>';
		header('location: quantri.php');
	}
}
include_once 'Views/quantri/edittv.php';
?>