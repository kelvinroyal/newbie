<?php
session_start();
include_once './library/__autoload.php';


$user = new User();
$dong = new Dong();
$xe = new Xe();
$xe2 = new Xe();
$paginate = new Paginate();
$paginate2 = new Paginate();

include_once 'Controllers/thongke.php'; 
include_once 'Controllers/menudong.php';
include_once 'Views/master.php';
?>
