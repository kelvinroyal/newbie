<script>
    function xoaBinhluan(){
        var conf=confirm("Bạn có chắc chắn muốn xóa bình luận này hay không?");
        return conf;
    }
</script>
<?php
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}

$rowsPerPage=5;
$perRow=$page*$rowsPerPage-$rowsPerPage;

$sql="SELECT *, SUBSTRING(binh_luan,1,50) AS binh_luan FROM blsanpham INNER JOIN sanpham ON blsanpham.id_sp=sanpham.id_sp LIMIT $perRow,$rowsPerPage";
$query= mysqli_query($conn, $sql);

$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM blsanpham"));
$totalPages=ceil($totalRows/$rowsPerPage);

$listPage="";
for($i=1;$i<=$totalPages;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachbl&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listPage.='<li><a href="quantri.php?page_layout=danhsachbl&page='.$i.'">'.$i.'</a></li>';
    }
}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý bình luận</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên bình luận</th>
                            <th data-sortable="true">Sản phẩm bình luận</th>
                            <th data-sortable="true">Nội dung bình luận</th>
                            <th data-sortable="true">Thời gian bình luận</th>
                            <th data-sortable="true">Duyệt bình luận</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row= mysqli_fetch_array($query)){
                        ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_bl']; ?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=suabl&id_bl=<?php echo $row['id_bl']; ?>"><?php echo $row['ten']; ?></a></td>
                            <td data-checkbox="true"><?php echo $row['ten_sp']; ?></td>
                            <td data-checkbox="true"><?php echo $row['binh_luan']; ?></td>
                            <td data-sortable="true"><?php echo $row['ngay_gio']; ?></td>					
                            <td data-sortable="true">
                                <?php
                                if($row['check_bl']=='N'){
                                ?>
                                <a href="quantri.php?page_layout=suabl&id_bl=<?php echo $row['id_bl']; ?>">Ẩn bình luận</a>
                                <?php
                                }
                                else{
                                ?>
                                <a href="quantri.php?page_layout=suabl&id_bl=<?php echo $row['id_bl']; ?>">Hiển thị bình luận</a>
                                <?php
                                }
                                ?>
                            </td>   
                            <td>
                                <a href="quantri.php?page_layout=suabl&id_bl=<?php echo $row['id_bl']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>

                            <td>
                                <a onclick="return xoaBinhluan();" href="xoabl.php?id_bl=<?php echo $row['id_bl']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                    <?php
                    echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->	



