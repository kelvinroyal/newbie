<?php
include_once 'Controllers/thongtinxe.php';
include_once 'Controllers/thongtinxe2.php';
include_once 'Controllers/login2.php';
?>
<meta name="viewport" conte="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Views/css/style.css">
	<link rel="stylesheet" href="Views/css/simple-line-icons.css"> 
<div class="row">
	<div id="anh_xe" class="col-md-7 col-sm-12 col-xs-12">
		<img src="Views/images/<?php echo $row['img'];?>">
	</div>
	<div id="ttxe" class="col-md-5 col-xs-12 col-sm-12">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Thông tin xe</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tên xe</td>
					<td><?php echo $row['name'];?></td>
				</tr>
				<tr>
					<td>Giá xe</td>
					<td><?php echo $row['price'];?></td>
				</tr>
				<tr>
					<td>Số chỗ ngồi</td>
					<td><?php echo $row['cho_ngoi'];?></td>
				</tr>
				<tr>
					<td>Tốc độ tối đa</td>
					<td><?php echo $row['speed'];?></td>
				</tr>
				<tr>
					<td>Mức tiêu thụ nhiên liệu</td>
					<td><?php echo $row['nhien_lieu'];?></td>
				</tr>
				<tr>
					<td>Công suất</td>
					<td><?php echo $row['cong_suat'];?></td>
				</tr>
				<tr>
					<td>Lượng khí thải CO2</td>
					<td><?php echo $row['khi_thai'];?></td>
				</tr>
				<tr>
					<td>Dài</td>
					<td><?php echo $row['dai'];?></td>
				</tr>
				<tr>
					<td>Rộng</td>
					<td><?php echo $row['rong'];?></td>
				</tr>
				<tr>
					<td>Cao</td>
					<td><?php echo $row['cao'];?></td>
				</tr>
				<tr>
					<td>Dòng xe</td>
					<td><?php
					while ($dong=$paginate->fetch_array()) {
						?>
						<?php 
						if($row['id_dong']==$dong['id_dong']){
							echo $dong['name_dong'];
						} 
						?>
						<?php
					}
					?></td>
				</tr>
				<tr>
					<td>Thể tích bình xăng</td>
					<td><?php echo $row['the_tich'];?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="mo_ta" class="col-md-12 col-sm-12 col-xs-12">
		<h5>Mô tả</h5>
		<?php echo $row['mo_ta']; ?>
	</div>
	<!-- đánh giá -->
	
	<div id="comment" class="col-md-12 col-sm-12 col-xs-12">
		<h3>Đánh giá xe</h3>
		<form method="post">
			<div class="form-group">
				<label>Tên</label>
				<input type="text" name="ten_bl" class="form-control" placeholder="Nguyễn Văn A" required="">
			</div>
			<div class="form-group" >
				<label>Điện thoại</label>
				<input type="text" name="dien_thoai" class="form-control" placeholder="012345678" required="">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Nội dung</label>
				<textarea class="form-control" name="binh_luan" placeholder="Nhập bình luận của bạn..." required=""></textarea>
			</div>
			<button type="submit" name="submitbl" class="btn btn-default">Bình luận</button>
		</form>

		<!-- liet ke binh luan -->
		<?php 
		include_once 'Controllers/binhluan.php';
		// if($row->num_rows()>0){
		?>
		<div id="comments" class="col-md-12 col-xs-12 col-sm-12">
			<?php
			while($row=$paginate->fetch_array()){
				?>
				<ul>
					<li class="comm-name"><?php echo $row['ten_bl']; ?></li>
					<li class="comm-time"><?php echo $row['ngay_gio']; ?></li>
					<li class="comm-details">
						<p>
							<?php echo $row['binh_luan']; ?>
						</p>
					</li>
				</ul>
				<?php
			}
			?>
		</div>
		<?php 
		//}
		?>
		<div aria-label="Page navigation">
			<ul class="pagination">
				<?php
					echo $pagination->get_list_page();
				?>
			</div>

		</div>
	</div>