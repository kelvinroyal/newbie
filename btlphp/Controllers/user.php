<?php
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
	$sql = "SELECT * FROM thanhvien WHERE email ='".$_SESSION['email']."' AND password ='".$_SESSION['password']."'";
	$user->query($sql);
	$row1 = $user->fetch_array();
	if ($user->num_rows() > 0) {
		switch ($_GET['page_layout']) {
			case 'admin':
			include_once 'admin.php';
			break;
			case 'addtv':
			include_once 'addtv.php';
			break;
			case 'edittv':
			include_once 'edittv.php';
			break;
			case 'logout':
			include_once 'logout.php';
			break;
			case 'deltv':
			include_once 'deltv.php';
			break;

			case 'logout2':
			include_once 'logout2.php';
			break;

			case 'qldong':
			include_once 'qldong.php';
			break;
			case 'adddong':
			include_once 'adddong.php';
			break;
			case 'editdong':
			include_once 'editdong.php';
			break;
			case 'deldong':
			include_once 'deldong.php';
			break;

			case 'qlxe':
			include_once 'qlxe.php';
			break;
			case 'addxe':
			include_once 'addxe.php';
			break;
			case 'editxe':
			include_once 'editxe.php';
			break;
			case 'delxe':
			include_once 'delxe.php';
			break;
			
			case 'qlbl':
			include_once 'qlbl.php';
			break;
			case 'delbl':
			include_once 'delbl.php';
			break;
			default:
			header('location: quantri.php?page_layout=admin');
			break;
		}
	}
	else{
		if ($_GET['page_layout']!='login') {
			header('location: quantri.php?page_layout=login');
		}
		else{
			include_once 'Views/quantri/login.php';
		}
	}
}
else{
	if ($_GET['page_layout']!='login') {
		header('location: quantri.php?page_layout=login');
	}
	else{
		include_once 'login.php';
	}
}
?>