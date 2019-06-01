<!DOCTYPE html>
<html>
<head>
	<title>Mitsubishi AutoCar</title>
	<meta charset="utf-8">
	<meta http-euiv="X-UA-Compatible" content=""IE=edge">
	<meta name="viewport" conte="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Views/css/style.css">
	<link rel="stylesheet" href="Views/css/simple-line-icons.css"> 
	<script src="Views/js/jquery-3.1.1.min.js"></script>
	<script src="Views/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div id="header">
			<div class="row">
				<div class="logo col-md-3 col-xs-12 col-sm-12">
					<h1><a href="trang-chu"><img src="Views/images/logo.png"></a></h1>
				</div>
				<div class="right col-md-9 col-xs-12 col-sm-12">
					<p>Hotline: 01678349336 -- Email: kelvinroyal96@gmail.com</p>
					<nav class="col-md-10 navbar navbar-expand-md bg-dark navbar-dark">
						<a class="navbar-brand" href="trang-chu">Trang chủ</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="collapsibleNavbar">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="xemoi">Mới nhất</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="banchay">Bán chạy</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Bảo hành</a>
								</li>    
								<li class="nav-item">
									<a class="nav-link" href="#">Xe cũ</a>
								</li>   
								<li class="nav-item">
									<a class="nav-link" href="#">Nhập khẩu</a>
								</li>   
								<li class="nav-item">
									<a class="nav-link" href="#">Trong nước</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?page_lg=lienhe">Liên hệ</a>
								</li> 
								<li class="nav-item">
									<?php include_once 'Controllers/login2.php';
									if (isset($_SESSION['success2'])) { ?><p style="color: white;"> <?php echo $_SESSION['email']; ?></p><?php
									}else{ ?>
									<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đăng nhập</button>

									<div id="id01" class="modal">
										
										<form class="modal-content animate" method="post" action="">

											<div class="container">
												<label><b>Email</b></label>
												<input type="text" placeholder="Nhập Email" name="email" required>

												<label><b>Mật khẩu</b></label>
												<input type="password" placeholder="Nhập mật khẩu" name="password" required>

												<button type="submit" name="submit">Đăng nhập</button>
												<label>
													<input type="checkbox" checked="checked"> Remember me
												</label>
											</div>

											<div class="container" style="background-color:#f1f1f1">
												<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy</button>
												<span class="psw">Quên <a href="#">Mật khẩu?</a></span>
											</div>
										</form>
									</div>

									<script>
										var modal = document.getElementById('id01');

										window.onclick = function(event) {
											if (event.target == modal) {
												modal.style.display = "none";
											}
										}
									</script>
									<?php } ?>
								</li>

								<!-- đăng ký -->
								<li class="nav-item">
									<?php
									if (isset($_SESSION['success2'])) { ?>
									&nbsp;<a class="btn btn-outline-danger" href="quantri.php?page_layout=logout2" role="button">Đăng xuất</a>
									<?php
								}else{ ?>

								<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Đăng ký</button>
								<div id="id02" class="modal">
									<?php include_once 'Controllers/dangky.php'; ?>
									<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
									<form class="modal-content" method="post" action="">
										<div class="container">
											<h1>Đăng ký</h1>
											<p>Nhập thông tin tài khoản muốn đăng ký.</p>
											<hr>
											<label><b>Tên đăng ký</b></label>
											<input type="text" placeholder="Nhập tên" name="name_thanhvien" required>

											<label><b>Email</b></label>
											<input type="text" placeholder="Nhập Email" name="email" required>

											<label><b>Mật khẩu</b></label>
											<input type="password" placeholder="Nhập mật khẩu" name="password" required>

											<label><b>Quyền hạn</b></label>
											<select name="level_thanhvien" class="form-control">
												<option value="3" selected="selected">User</option>
											</select>

											<label>
												<input type="checkbox" checked="checked" style="margin-bottom:15px"> Remember me
											</label>

											<p>Được cung cấp quyền tạo bởi <a href="#" style="color:dodgerblue">Nguyễn Việt Hoàng</a>.</p>

											<div class="clearfix">
												<button type="submit" name="submit2" class="signupbtn">Đăng ký</button>
												<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy</button>
											</div>
										</div>
									</form>
								</div>

								<script>
							// Get the modal
							var modal = document.getElementById('id02');

							// When the user clicks anywhere outside of the modal, close it
							window.onclick = function(event) {
								if (event.target == modal) {
									modal.style.display = "none";
								}
							}
						</script>
						<?php } ?>
					</li>
				</ul>
			</div>  
		</nav>



	</div>
</div>
<!-- end row header -->
</div>

<!-- slide -->

<div class="row">
	<div id="demo" class="carousel slide col-md-10 col-xs-12 col-sm-12" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="Views/images/slide1.jpg" alt="sl1" width="100%" height="auto">
				<div class="carousel-caption">
				</div>   
			</div>
			<div class="carousel-item">
				<img src="Views/images/slide2.jpg" alt="sl2" width="100%" height="auto">
				<div class="carousel-caption">
				</div>   
			</div>
			<div class="carousel-item">
				<img src="Views/images/slide3.jpg" alt="sl3" width="100%" height="auto">
				<div class="carousel-caption">
				</div>   
			</div>
		</div>
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>

</div>
<!-- end slide -->

<div class="container-fluid">
	<div id="body">
		<div class="row">
			<div class="col-md-2 col-xs-12 col-sm-12">
				<div id="danh-muc" class="sidebar">
					<h2 class="h2-bar">Danh mục sản phẩm</h2>
					<?php
					while ($dong=$paginate->fetch_array()) {
						?>
						<ul class="hang-fix">
							<li><a href="index.php?page_lg=dsxe&id_dong=<?php echo $dong['id_dong']?>"><?php echo $dong['name_dong'];?></a></li>
						</ul>
						<?php
					}
					?>
				</div>
				<!-- end danh mục -->
				<div id="counter">
					<h2 class="h2-bar">Thống kê truy cập</h2>
					<p>Hiện đã có <span><?php echo $count;?></span> người truy cập</p>
				</div>
				<!-- end thống kê -->
				<div class="banner">
					<img src="Views/images/banner1.png">
					<img src="Views/images/banner2.jpg">
				</div>
			</div>

			<div class="main col-md-10 col-xs-12 col-sm-12">
				<!-- Tìm kiếm -->

				<nav class="navbar navbar-default">
					<div class="nav nav-justified navbar-nav col-md-5">
						<form role="search" method="post" name="sform" action="index.php?page_lg=dstimkiem">
							<div class="input-group">

								<input type="text" name="stext" class="form-control" placeholder="Nhập tên xe cần tìm...">

								<div class="input-group-btn">
									<button type="submit" class="btn btn-search btn-danger" name="submittk">
										<span class="glyphicon glyphicon-search"></span>
										<span class="label-icon">Tìm kiếm</span>
									</button>
								</div>
							</div>  
						</form>   

					</div>
					
				</nav>

				<!-- sản phẩm -->
				<!-- master page -->

				<?php
				if (isset($_GET['page_lg'])) {
					switch ($_GET['page_lg']){
						case 'dstimkiem':
						include_once 'dstimkiem.php';
						break;
						case 'dsxe':
						include_once 'dsxe.php';
						break;
						case 'thongtinxe':
						include_once 'thongtinxe.php';
						break;
						case 'thongtinxe2':
						include_once 'thongtinxe.php';
						break;
						case 'xemoi':
						include_once 'xemoi.php';
						break;
						case 'banchay':
						include_once 'banchay.php';
						break;
						case 'lienhe':
						include_once 'lienhe.php';
						break;
					}
				}
				else{
					include_once 'trangchu.php';
				}
				?>


				<!-- end master page -->
			</div>
		</div>
	</div>
</div>
<!-- end container -->
<div class="container-fluid">
	<div class="row">
		<div class="map col-md-12 col-sm-12 col-xs-12">
			<img src="Views/images/map.jpg">
		</div>
	</div>
</div>
<div id="footer-t">
	<div class="container-fluid">
		<div class="row">
			<div class="logo2 col-md-3 col-sm-12 col-xs-12">
				<a href="#"><img src="Views/images/logo2.png"></a>
			</div>
			<div class="content-f col-md-3 col-sm-12 col-xs-12">
				<h3>Về chúng tối</h3>
				<p>
					VIET HOANG AutoCar chuyên cung cấp các dòng xe ô tô nhập khẩu nguyên chiếc từ nước ngoài. Ngoài ra chúng tôi cũng cung cấp các dòng xe được lắp rắp trong nước. AutoCar cam kết về chất lượng, đảm bảo an toàn trên từng chặng đường.
				</p>
			</div>
			<div class="content-f col-md-3 col-sm-12 col-xs-12">
				<h3>Hotline</h3>
				<p>Phone Sale: (+84) 01678349336</p>
				<p>Email: kelvinroyal96@gmail.com</p>
			</div>
			<div class="content-f col-md-3 col-sm-12 col-xs-12">
				<h3>Địa chỉ</h3>
				<p>
					Address 1: 9A2 Thụy Khuê - Tây Hồ - Hà Nội
				</p>
				<p>
					Address 2: Tòa nhà lớn nhất cái Hà Nội
				</p>
			</div>
		</div>
	</div>
</div>

<div id="footer-b">
	<div class="container">
		<div class="row">
			<div class="footer-b-item col-md-6 col-sm-12 col-xs-12">
				<p>VIET HOANG AutoCar - autocar.com</p>
			</div>
			<div class="footer-b-item col-md-6 col-sm-12 col-xs-12">
				<p>© 2018 AutoCar. Bản quyền thuộc về Nguyễn Việt Hoàng và Vũ Xuân Hà</p>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow92.js"></script>
	<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>

</div>

</body>
</html>