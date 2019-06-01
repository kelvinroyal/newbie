<?php
include_once 'Controllers/timkiem.php';
include_once 'library/Paginate.php';
?>
<div id="main">
	<h2 class="h2-bar search-bar">Kết quả tìm được với từ khóa 
		<span><?php echo $stext; ?></span></h2>
		<div id="sanpham">
			<div class="product">
				<?php
        while($xe=$paginate->fetch_array()){
        ?>
				<div class="item">
					<img src="Views/images/<?php echo $xe['img']; ?>" alt="">
					<div class="info">
						<a href="index.php?page_lg=thongtinxe&id_xe=<?php echo $xe['id_xe']?>" class="name"><?php echo $xe['name']; ?></a>
						<p class="salary"><?php echo $xe['price']; ?><sup>đ</sup></p> <p class="price"><?php echo $xe['price']; ?><sup>đ</sup></p>
					</div>
					<a href="" class="cart"><i class="icon-bag"></i></a>
					<a href="" class="heart"><i class="icon-heart"></i></a>
					<a href="index.php?page_lg=thongtinxe&id_xe=<?php echo $xe['id_xe']?>" class="view"><i class="icon-magnifier-add"></i></a>
					<div class="manche"></div>
				</div>
				<?php
			}
				?>
			</div>
		</div>

	</div>

	<!-- end master page -->