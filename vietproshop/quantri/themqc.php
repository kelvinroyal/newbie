<?php
if(isset($_POST['submit'])){
    $ten_qc=$_POST['ten_qc'];
    $ten_doi_tac=$_POST['ten_doi_tac_qc'];
    $link_doi_tac=$_POST['link_doi_tac_qc'];
    $anh_qc=$_FILES['anh_qc']['name'];
    $tmp=$_FILES['anh_qc']['tmp_name'];
    $duyet_qc=$_POST['check_qc'];
    $xem_qc=$_POST['xem_qc'];
    
    if(isset($ten_qc) && isset($ten_doi_tac) && isset($link_doi_tac) && isset($anh_qc)
            && isset($duyet_qc)){
//        upload anh mo ta
        move_uploaded_file($tmp, 'anh/banner/'.$anh_qc);
//        thêm thông tin vào csdl
        $sql="INSERT INTO quangcao(ten_qc,ten_doi_tac,link_doi_tac,anh_qc,duyet_qc,xem_qc) "
                . "VALUES('$ten_qc','$ten_doi_tac','$link_doi_tac','$anh_qc','$duyet_qc','$xem_qc')";
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
        <h1 class="page-header">Thêm banner quảng cáo mới</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm banner quảng cáo mới</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên banner quảng cáo</label>
                            <input type="text" class="form-control"  name="ten_qc" required="">
                        </div>

                        <div class="form-group">
                            <label>Tên đối tác</label>
                            <input type="text" class="form-control"  name="ten_doi_tac_qc" required="">
                        </div>
                        <div class="form-group">
                            <label>Link đối tác</label>
                            <input type="text" class="form-control" name="link_doi_tac_qc" value="" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh banner quảng cáo</label>
                            <input required="" type="file" name="anh_qc">
                        </div>
                        <div class="form-group">
                            <label>Duyệt banner quảng cáo</label>
                            <div class="radio">
                                <label>
                                    <input required="" type="radio" name="check_qc" id="optionsRadios1" value=1>Hiển thị banner
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required="" type="radio" name="check_qc" id="optionsRadios2" value=0 checked>Ẩn banner
                                </label>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Lựa chọn xem ở tab khác</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="xem_qc" id="optionsRadios1" value=1>Xem ở tab khác
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                        <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

