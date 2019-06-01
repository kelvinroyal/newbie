<?php


	$xe = new Xe();
	$id_xe = $_GET['id_xe'];
	$sql= "SELECT * FROM xe WHERE id_xe=  $id_xe";
	$xe->query($sql);
	$row=$xe->fetch_array();

	$paginate = new Paginate();
	$sql1 = "SELECT * FROM dong";
	$paginate->query($sql1);


include_once 'Views/thongtinxe.php';
?>