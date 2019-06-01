<?php
$user = new User();
if (isset($_POST['submit'])) {
	$user->set_email($_POST['email']);
	$user->set_password($_POST['password']);
	
	if ($user->login() == 'login_fail') {
		$_SESSION['error'] = '<div class="alert alert-danger">Đăng nhập thất bại!</div>';
	}else{
		$_SESSION['success'] = '<div class="alert alert-success">Đăng nhập thành công!</div>';
		header('location: quantri.php?page_layout=admin');
	}
}
 include_once 'Views/quantri/login.php';
?>