<?php
$bl = new Binhluan();
$id=$_GET['id_bl'];
$bl->set_id_bl($id);
$bl->del();
$_SESSION['success'] = '<div class="alert alert-success">Xóa bình luận thành công!</div>';
header('location: quantri.php?page_layout=qlbl');
?>