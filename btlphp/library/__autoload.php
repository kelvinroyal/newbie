<?php
function __autoload($fileName){
	switch ($fileName) {
		case 'User':
		include_once 'Models/User.php';
		break;
		case 'Dong':
		include_once 'Models/Dong.php';
		break;
		case 'Xe':
		include_once 'Models/Xe.php';
		break;
		case 'Binhluan':
		include_once 'Models/Binhluan.php';
		break;
		case 'Trangchu':
		include_once 'Models/Trangchu.php';
		break;
		case 'Paginate':
		include_once 'library/Paginate.php';
		break;
		case 'Config':
		include_once 'library/Config.php';
		break;

		default:
			# code...
		break;
	}
	//include_once ($fileName.'.php');
}
?>