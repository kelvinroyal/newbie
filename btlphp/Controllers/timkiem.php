<?php
if(isset($_POST['stext'])){
    $stext=$_POST['stext'];
}
else{
    $stext=$_GET['stext'];
}


//Loai bo cac khoang trang dau va cuoi chuoi Tu khoa

$stextNew= trim($stext);
$arr_stextNew= explode(' ', $stextNew); 
$stextNew= implode('%', $arr_stextNew);
$stextNew='%'.$stextNew.'%';



$paginate->set_page($page);
$paginate->set_row_per_page(8);
$paginate->set_per_row();

$per_row=$paginate->get_per_row();
$row_per_page=$paginate->get_row_per_page();
$sql="SELECT * FROM xe WHERE name LIKE ('$stextNew') ORDER BY id_xe DESC LIMIT $per_row, $row_per_page";
$paginate->query($sql);



//thanh phân trang
$pagination=new Paginate();
$sql1="SELECT * FROM xe";
$pagination->set_page($page);
$pagination->set_row_per_page(5);
$pagination->total_row($sql1);
$pagination->total_page();
$url="index.php?page=dstimkiem&page";
$pagination->set_list_page($url);
?>