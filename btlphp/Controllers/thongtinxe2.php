<?php


	$xe2 = new Xe();
	$id = $_GET['id_xe'];
	$sql= "SELECT * FROM xe WHERE id_xe=$id";
	$xe2->query($sql);
	$row=$xe2->fetch_array();

	$paginate = new Paginate();
	$sql1 = "SELECT * FROM dong";
	$paginate->query($sql1);


include_once 'Views/thongtinxe.php';
?>