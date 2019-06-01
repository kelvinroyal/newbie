<?php
session_start();
if($_SESSION['email']=='vietpro.edu.vn@gmail.com' && $_SESSION['mk']=='vietpro.edu.vn'){
    $id_qc=$_GET['id_qc'];
    include_once './ketnoi.php';
    $sql="DELETE FROM quangcao WHERE id_qc=$id_qc";
    $query= mysqli_query($conn, $sql);
    header('location: quantri.php?page_layout=danhsachqc');
}
?>