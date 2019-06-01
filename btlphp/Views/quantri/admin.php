<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoCar</title>

    <link href="Views/quantri/css/bootstrap.min.css" rel="stylesheet">
    <link href="Views/quantri/css/datepicker3.css" rel="stylesheet">
    <link href="Views/quantri/css/styles.css" rel="stylesheet">

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
            <li  class="parent active">
                <a href="quantri.php?page_layout=admin">
                    <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý thành viên
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li>
                        <a href="quantri.php?page_layout=admin">
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
                        <a class="" href="#">
                            <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                        </a>
                    </li>

                </ul>     
            </li>
            <li class="parent ">
                <a href="quantri.php?page_layout=qlxe">
                    <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý xe
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li>
                        <a class="" href="#">
                            <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
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
                <h1 class="page-header">Quản lý thành viên</h1>
            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-sm-12">

                <div id="navbar" class="row">
                   <div class="col-sm-12">
                     <nav class="navbar navbar-default">
                        <div class="container-fluid">
                           <ul class="nav navbar-nav">
                              <li><a href="quantri.php">Home</a></li>
                              <li><a href="quantri.php?page_layout=addtv">Thêm thành viên</a></li>
                          </ul>
                          <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="quantri.php?page_layout=logout">Logout</a></p>
                      </div>
                  </nav>
              </div>
          </div>
          <?php
          if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        ?>
        <table class="table table-striped">
            <tr id="tbl-first-row">
              <td width="5%">#</td>
              <td width="25%">Tên thành viên</td>
              <td width="25%">Email</td>
              <td width="5%">Level</td>
              <td width="5%">Sửa</td>
              <td width="5%">Xóa</td>
          </tr>
          <?php
          while ($user=$paginate->fetch_array()) {
              ?>
              <tr>
                <td><?php echo $user['id_thanhvien'];?></td>
                <td><?php echo $user['name_thanhvien'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $user['level_thanhvien'];?></td>
                <td><a href="quantri.php?page_layout=edittv&id_thanhvien=<?php echo $user['id_thanhvien']?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a></td>
                <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="quantri.php?page_layout=deltv&id_thanhvien=<?php echo $user['id_thanhvien']?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div aria-label="Page navigation">
        <ul class="pagination">
          <li><a aria-label="Previous" href="#">
            <span aria-hidden="true">&laquo;</span>
        </a></li>
        <?php
        echo $pagination->get_list_page();
        ?>
        <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
          </a>
      </li>
  </ul>
</div>
</div>
</div>
</div>

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


<script src="Views/quantri/js/jquery-1.11.1.min.js"></script>
<script src="Views/quantri/js/bootstrap.min.js"></script>
<script src="Views/quantri/js/chart.min.js"></script>
<script src="Views/quantri/js/chart-data.js"></script>
<script src="Views/quantri/js/easypiechart.js"></script>
<script src="Views/quantri/js/easypiechart-data.js"></script>
<script src="Views/quantri/js/bootstrap-datepicker.js"></script>  
<script src="Views/quantri/js/bootstrap-table.js"></script>
<link rel="stylesheet" href="Views/quantri/css/bootstrap-table.css"/>
<script>
    $('#calendar').datepicker({
    });

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







</body>

</html>
