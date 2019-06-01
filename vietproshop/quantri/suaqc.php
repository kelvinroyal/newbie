<?php
$id_qc=$_GET['id_qc'];
$sql="SELECT * FROM quangcao WHERE id_qc=$id_qc";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $ten_qc=$_POST['ten_qc'];    
    $ten_doi_tac=$_POST['ten_doi_tac_qc'];
    $link_doi_tac=$_POST['link_doi_tac_qc'];        
    $duyet_qc=$_POST['check_qc'];
    $xem_qc=$_POST['xem_qc'];
    
//    xử lý upload ảnh được thay đổi
    if($_FILES['anh_qc']['name']==""){
        $anh_qc=$_POST['anh_qc'];
    }
    else{
        $anh_qc=$_FILES['anh_qc']['name'];
        $tmp_name=$_FILES['anh_qc']['tmp_name'];
    }
    
    if(isset($ten_qc) && isset($ten_doi_tac) && isset($link_doi_tac) && isset($duyet_qc)){
        move_uploaded_file($tmp_name, 'anh/banner/'.$anh_qc);
        $sql="UPDATE quangcao SET ten_qc='$ten_qc',ten_doi_tac='$ten_doi_tac',"
                . "link_doi_tac='$link_doi_tac',anh_qc='$anh_qc',duyet_qc='$duyet_qc',"
                . "xem_qc='$xem_qc' WHERE id_qc=$id_qc";
        $query= mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=danhsachqc');
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
        <h1 class="page-header">Sửa banner quảng cáo</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa banner quảng cáo</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên banner quảng cáo</label>
                            <input type="text" class="form-control"  name="ten_qc" value="<?php if(isset($_POST['ten_qc'])){echo $_POST['ten_qc'];} else{ echo $row['ten_qc'];} ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Tên đối tác</label>
                            <input type="text" class="form-control"  name="ten_doi_tac_qc" value="<?php if(isset($_POST['ten_doi_tac_qc'])){echo $_POST['ten_doi_tac_qc'];} else{echo $row['ten_doi_tac'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Link đối tác</label>
                            <input type="text" class="form-control" name="link_doi_tac_qc" value="<?php if(isset($_POST['link_doi_tac_qc'])){echo $_POST['link_doi_tac_qc'];} else{echo $row['link_doi_tac'];} ?>" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh banner quảng cáo</label>
                            <input type="file" name="anh_qc">
                            <input type="hidden" name="anh_qc" value="<?php echo $row['anh_qc']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Duyệt banner quảng cáo</label>
                            <div class="radio">
                                <label>
                                    <input required="" type="radio" name="check_qc" id="optionsRadios1" value=1 <?php if($row['duyet_qc']==1){echo 'checked';} ?>>Hiển thị banner
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required="" type="radio" name="check_qc" id="optionsRadios2" value=0 <?php if($row['duyet_qc']==0){echo 'checked';} ?>>Ẩn banner
                                </label>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Lựa chọn xem ở tab khác</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="xem_qc" id="optionsRadios1" value=1 <?php if($row['xem_qc']==1){echo 'checked';} ?>>Xem ở tab khác
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                        <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

