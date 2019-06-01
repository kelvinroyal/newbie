<?php
session_start();
include_once './library/__autoload.php';

$user = new User();
$dong = new Dong();
$xe = new Xe();
$paginate = new Paginate();
if (isset($_GET['page_layout'])) {
    include_once 'Controllers/user.php';
}else{
    header('location: quantri.php?page_layout=login');
}
?>