<?php
//Lấy tham số id_bl trên URL
$id_bl=$_GET['id_bl'];

//Lấy thông tin của bình luận trong csdl
$sql="SELECT * FROM blsanpham INNER JOIN sanpham ON blsanpham.id_sp=sanpham.id_sp WHERE id_bl=$id_bl";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $ten_bl=$_POST['ten_bl'];
    $ten_sp=$_POST['sp_bl'];
    $noi_dung_bl=$_POST['noi_dung_bl'];
    $duyet_bl=$_POST['check_bl'];
    
//    xử lý sửa thông tin bình luận
    if(isset($ten_bl) && isset($ten_sp) && isset($noi_dung_bl) && isset($duyet_bl)){
        $sql="UPDATE blsanpham SET ten='$ten_bl',binh_luan='$noi_dung_bl',check_bl='$duyet_bl'"
                . "WHERE id_bl=$id_bl";
        $query= mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=danhsachbl');
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
        <h1 class="page-header">Sửa bình luận</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa bình luận</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Tên bình luận</label>
                            <input class="form-control" type="text" name="ten_bl" value="<?php 
                            if(isset($_POST['ten_bl'])){
                                echo $_POST['ten_bl'];
                            }
                            else{
                                echo $row['ten']; 
                            }
                            ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm bình luận</label>
                            <input readonly="" class="form-control" type="text" name="sp_bl" value="<?php echo $row['ten_sp']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Nội dung chi tiết bình luận</label>
                            <textarea required="" class="form-control" rows="3" name="noi_dung_bl">
                                <?php 
                                if(isset($_POST['noi_dung_bl'])){
                                    echo $_POST['noi_dung_bl'];
                                }
                                else{
                                    echo $row['binh_luan']; 
                                }
                                
                                ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Duyệt bình luận</label>                                        
                            <div class="radio">
                                <label>
                                    <input required="" type="radio" checked="" name="check_bl" id="optionsRadios1" value='Y'
                                           <?php
                                           if($row['check_bl']=='Y'){
                                               echo 'checked';
                                           }
                                           ?>
                                           >Hiển thị bình luận
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required="" type="radio" name="check_bl" id="optionsRadios2" value='N'
                                           <?php
                                            if($row['check_bl']=='N'){
                                               echo 'checked';
                                           }
                                           ?>
                                           >Ẩn bình luận
                                </label>
                            </div>
                        </div>														
                        <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>

                </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

