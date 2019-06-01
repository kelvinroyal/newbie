<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoCar</title>

    <link href="Views/quantri/css/bootstrap.min.css" rel="stylesheet">
    <link href="Views/quantri/css/datepicker3.css" rel="stylesheet">
    <link href="Views/quantri/css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!--Icons-->
    <script src="Views/quantri/js/lumino.glyphs.js"></script>


</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="quantri.php"><span>VIETHOANG AutoCar </span>Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span style="color: white;">Xin chào, </span><?php if(isset($_SESSION['email'])){echo $row1["name_thanhvien"]; } ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Thông tin thành viên</a></li>
                            <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Cài đặt</a></li>
                            <li><a href="quantri.php?page_layout=logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm">
            </div>
        </form>
        <ul class="nav menu">
            <li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ <b>AutoCar</b></a></li>
            <li class="parent" >
                <a href="quantri.php?page_layout=admin">
                    <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý thành viên
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li>
                        <a href="#">
                            <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                            Thêm mới
                        </a>
                    </li>
                </ul>			
            </li>
            <li class="parent ">
                <a href="quantri.php?page_layout=qldong">
                    <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý dòng xe
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li>
                        <a href="#">
                            <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                            Thêm mới
                        </a>
                    </li>

                </ul>			
            </li>
            <li class="parent active">
                <a href="quantri.php?page_layout=qlxe">
                    <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý xe
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li>
                        <a href="#">
                            <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                            Thêm mới
                        </a>
                    </li>
                </ul>				
            </li>
            <li class="parent ">
                <a href="quantri.php?page_layout=qlbl">
                    <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg></span> Quản lý bình luận
                </a>	
            </li>

            <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>

            <li role="presentation" class="divider"></li>
            <li><a href="quantri.php?page_layout=logout"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng xuất</a></li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active"></li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin xe</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Sửa thông tin xe</div>
                    <div class="panel-body">
                        <?php
                        if (isset($_SESSION['error'])) {
                          echo $_SESSION['error'];
                          unset($_SESSION['error']);
                      }
                      ?>
                      <?php
                      if (isset($_SESSION['img_error'])) {
                          echo $_SESSION['img_error'];
                          unset($_SESSION['img_error']);
                      }
                      ?>
                      <form method="post" enctype="multipart/form-data" role="form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên xe</label>
                                <input type="text" class="form-control"  name="name" value="<?php echo $row['name'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Giá xe</label>
                                <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>" required="">
                            </div>

                            <div class="form-group">
                                <label>Số chỗ ngồi</label>
                                <input type="text" class="form-control" name="cho_ngoi" value="<?php echo $row['cho_ngoi'];?>" required="">
                            </div>

                            <div class="form-group">
                                <label>Tốc độ tối đa</label>
                                <input type="text" class="form-control" name="speed" value="<?php echo $row['speed'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Công suất</label>
                                <input type="text" class="form-control" name="cong_suat" value="<?php echo $row['cong_suat'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Mức tiêu thụ nhiên liệu</label>
                                <input type="text" class="form-control" name="nhien_lieu" value="<?php echo $row['nhien_lieu'];?>" required="">
                            </div>
                            <!-- <div class="form-group">
                                <label>Ảnh xe</label>
                                <input type="file" name="img">
                            </div> -->
                            <div class="form-group">
                                <label>Ảnh xe</label>                   
                                <input type="file" id="img" name="img"  class="form-control " onchange="changeImg(this)">
                                <input type="hidden" name="img" value="<?php echo $row['img']?>">
                                <img id="avatar" class="thumbnail" width="200px" height="200px" src="Views/images/<?php echo $row['img']?>" >
                            </div>
                            

                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>Lượng khí thải CO2</label>
                                <input type="text" class="form-control" name="khi_thai" value="<?php echo $row['khi_thai'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Dài</label>
                                <input type="text" class="form-control" name="dai" value="<?php echo $row['dai'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Rộng</label>
                                <input type="text" class="form-control" name="rong" value="<?php echo $row['rong'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Cao</label>
                                <input type="text" class="form-control" name="cao" value="<?php echo $row['cao'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Thể tích bình xăng</label>
                                <input type="text" class="form-control" name="the_tich" value="<?php echo $row['the_tich'];?>" required="">
                            </div>

                            <div class="form-group">
                                <label>Dòng xe</label>
                                <select name="id_dong" class="form-control">
                                    <?php
                                    while ($dong=$paginate->fetch_array()) {
                                      ?>
                                      <option
                                      <?php 
                                      if($row['id_dong']==$dong['id_dong']){
                                        echo 'selected="selected"';
                                    } 
                                    ?>
                                    value="<?php echo $dong['id_dong'];?>"><?php echo $dong['name_dong'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Đặc biệt</label><br>
                            <input name="dac_biet" type="radio" checked="checked" value="0"/>Xe mới
                            <input name="dac_biet" type="radio" value="1"/>Xe bán chạy

                        </div>
                    </div>

                    <div class="col-md-12">
                       <label>Mô tả</label>
                       <textarea name="mo_ta" id="editor1" rows="10" class="col-md-12" required><?php echo $row['mo_ta']; ?></textarea>
                   </div>

                   <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                   <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


               </form>
           </div>
       </div>
   </div><!-- /.col-->
</div><!-- /.row -->

</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $('#avatar').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
    $('#avatar').click(function(){
        $('#img').click();
    });
});
</script>

<script>
    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768)
            $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767)
            $('#sidebar-collapse').collapse('hide')
    })
</script>	

<script>    CKEDITOR.replace( 'editor1' );</script>
</body>

</html>
