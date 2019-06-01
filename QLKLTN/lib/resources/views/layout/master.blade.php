<!DOCTYPE html>
<html>
<head>
  <base href="{{asset('public/layout')}}/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | Hệ thống quản lý khóa luận tốt nghiệp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <link rel="stylesheet" type="text/css" href="dist/css/semantic.min.css">

  <link rel="stylesheet" type="text/css" href="dist/css/jquery.loadingModal.min.css">


</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="{{asset('trang-chu')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">KLTN</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Quản lý </b>KLTN</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="glyphicon glyphicon-align-justify sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">SOS</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Liện hệ thư ký</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    @foreach($lh as $lhs)
                    <li><!-- start message -->
                      <a href="https://mail.google.com/mail/u/0/#inbox?compose=new">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="{{asset('lib/storage/app/avatar/'.$lhs->anh)}}" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          {{$lhs->ten_thanhvien}}
                          <small><i class="fa fa-sun-o"></i>{{$lhs->khoa->ten_khoa}}</small>
                        </h4>
                        <!-- The message -->
                        <p>{{$lhs->email}}</p>
                      </a>
                    </li>
                    @endforeach
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                {{-- <li class="footer"><a href="#">See All Messages</a></li> --}}
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            @if(Auth::user()->quyen != 2)
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">!</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header"> Thông báo của bạn</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    @if(Auth::user()->quyen==1)
                      @foreach($tb as $tbs)
                      <li><!-- start notification -->
                        <a href="{{asset('khoa-luan/xac-nhan')}}">
                          <i class="fa fa-users text-aqua"></i> {{$tbs->noi_dung}}
                        </a>
                      </li>
                      @endforeach
                    @else
                      @foreach($tb as $tbs)
                      <li><!-- start notification -->
                        <a href="{{asset('khoa-luan/ca-nhan')}}">
                          <i class="fa fa-users text-aqua"></i> {{$tbs->noi_dung}}
                        </a>
                      </li>
                      @endforeach
                    @endif
                    <!-- end notification -->
                  </ul>
                </li>
                {{-- <li class="footer"><a href="#">View all</a></li> --}}
              </ul>
            </li>
            @endif
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{asset('lib/storage/app/avatar/'.Auth::user()->anh)}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{Auth::user()->ten_thanhvien}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{asset('lib/storage/app/avatar/'.Auth::user()->anh)}}" class="img-circle" alt="User Image">

                  <p>
                    {{Auth::user()->ten_thanhvien}} - @if(Auth::user()->quyen==1) Thư kí @endif @if(Auth::user()->quyen==2) Giáo viên @endif @if(Auth::user()->quyen==3) Sinh viên @endif
                    <small>{{Auth::user()->ma_thanhvien}}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                @if(Auth::user()->quyen==3)
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-12 text-center">
                      <a href="{{asset('khoa-luan/ca-nhan')}}"><b>Khóa luận của bạn</b></a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                @endif

                @if(Auth::user()->quyen==2)
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-12 text-center">
                      <a href="{{asset('khoa-luan/huong-dan')}}"><b>Khóa luận hướng dẫn</b></a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                @endif
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{asset('thanh-vien/edit/'.Auth::user()->id)}}" class="btn btn-default btn-flat">Hồ sơ</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{asset('logout')}}" class="btn btn-default btn-flat">Đăng xuất</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-hand-o-up"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('lib/storage/app/avatar/'.Auth::user()->anh)}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::user()->ten_thanhvien}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        <form action="{{asset('search/')}}" role="search" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="result" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header">Chức năng</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="treeview">
            <a href="{{asset('thanh-vien/danh-sach')}}"><i class="fa fa-users"></i> <span>Quản lý thành viên</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(Auth::user()->quyen == 1) 
              <li><a href="{{asset('thanh-vien/add')}}">Thêm thành viên</a></li> 
              <li><a href="{{asset('thanh-vien/import')}}">Import file danh sách</a></li> 
              @endif
              <li><a href="{{asset('thanh-vien/danh-sach')}}">Danh sách thành viên</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="{{asset('de-tai/danh-sach')}}"><i class="fa fa-bookmark"></i> <span>Đề tài gợi ý</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(Auth::user()->quyen == 2) <li><a href="{{asset('de-tai/add')}}">Thêm đề tài</a></li> @endif
              <li><a href="{{asset('de-tai/danh-sach')}}">Danh sách đề tài</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="{{asset('khoa-luan/danh-sach')}}"><i class="fa fa-book"></i> <span>Quản lý khóa luận</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(Auth::user()->quyen == 3) <li><a href="{{asset('khoa-luan/dang-ky')}}">Đăng ký khóa luận</a></li> @endif
              @if(Auth::user()->quyen == 1) <li><a href="{{asset('khoa-luan/xac-nhan')}}">Xác nhận bảo vệ</a></li> @endif
              <li><a href="{{asset('khoa-luan/danh-sach')}}">Danh sách khóa luận</a></li>
            </ul>
          </li>
          @if(Auth::user()->quyen == 1)
          <li class="treeview">
            <a href="{{asset('hoi-dong/danh-sach')}}"><i class="fa fa-user-secret"></i> <span>Quản lý hội đồng chấm</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{asset('hoi-dong/add')}}">Thêm thành viên hội đồng</a></li>
              <li><a href="{{asset('hoi-dong/danh-sach')}}">Danh sách hội đồng</a></li>
              <li><a href="{{asset('hoi-dong/thiet-lap')}}">Thiết lập hội đồng</a></li>
            </ul>
          </li>
          {{-- <li><a href="{{asset('trong-so')}}"><i class="fa fa-link"></i> <span>Quản lý trọng số</span></a></li> --}}
          @endif
          <li><a href="{{asset('bao-cao')}}"><i class="fa fa-file-o"></i> <span>Quản lý báo cáo</span></a></li>
          <li><a href="{{asset('thong-ke')}}"><i class="fa fa-pie-chart"></i> <span>Thống kê</span></a></li>
          @if(Auth::user()->quyen == 1)
          <li><a href="{{asset('khoa')}}"><i class="fa fa-university"></i> <span>Quản lý khoa</span></a></li>
          <li><a href="{{asset('nganh')}}"><i class="fa fa-leanpub"></i> <span>Quản lý ngành</span></a></li>
          <li><a href="{{asset('nam')}}"><i class="fa fa-calendar-times-o"></i> <span>Quản lý năm</span></a></li>
          @endif

        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('title2')
          <small>@yield('title3')</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>

      <!-- MASTER PAGE -->
      <!-- Main content -->
      <section class="content">

        {{-- MAIN --}}
        @yield('main')

      </section>
      <!-- /.content -->
      <!-- END MASTER -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Khóa luận tốt nghiệp
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2018 <a href="#">ĐH Thăng Long</a>.</strong> Bản quyền thuộc về Nguyễn Việt Hoàng.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Quy trình khóa luận</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a @if(Auth::user()->quyen == 3) href="{{asset('khoa-luan/dang-ky')}}" @endif>
                <i class="menu-icon bg-red">1</i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Đăng ký làm khóa luận</h4>
                  <p>Sinh viên</p>
                </div>
              </a>
            </li>
            <li>
              <a @if(Auth::user()->quyen == 1) href="{{asset('khoa-luan/xac-nhan')}}" @endif>
                <i class="menu-icon bg-blue">2</i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Xác nhận khóa luận</h4>
                  <p>Thư ký</p>
                </div>
              </a>
            </li>
            <li>
              <a @if(Auth::user()->quyen == 1) href="{{asset('bao-cao')}}" @endif>
                <i class="menu-icon bg-yellow">3</i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Upload báo cáo</h4>
                  <p>Thư ký</p>
                </div>
              </a>
            </li>
            <li>
              <a @if(Auth::user()->quyen == 1) href="{{asset('khoa-luan/danh-sach')}}" @endif>
                <i class="menu-icon bg-purple">4</i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nhập điểm và trọng số</h4>
                  <p>Thư ký</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">Cài đặt và bảo hành</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Nguyễn Việt Hoàng
              </label>

              <p>Khoa Toán-Tin học<br>Trường ĐH Thăng Long</p>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <!-- AdminLTE App -->
 <script src="dist/js/app.min.js"></script>

 {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}
 <script src="dist/js/loader.js"></script>
 <script src="dist/js/jquery.loadingModal.min.js"></script>
     @yield('script')
   </body>
   </html>
