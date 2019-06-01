<div id="sanpham">
	<h3 class="title"><span> Xe bán chạy</span></h3>
	<div class="product">
		<?php
		include_once 'Controllers/trangchu2.php';
		while ($xe2=$paginate2->fetch_array()) {
			if($xe2['dac_biet'] == 1){
			?>
			<div class="item">
				<img src="Views/images/<?php echo $xe2['img'];?>" alt="">
				<div class="info">
					<a href="index.php?page_lg=thongtinxe2&id_xe=<?php echo $xe2['id_xe']?>" class="name"><?php echo $xe2['name'];?></a>
					<p class="salary"><?php echo $xe2['price'];?><sup>đ</sup></p> <p class="price"><?php echo $xe2['price'];?><sup>đ</sup></p>
				</div>
				<a href="" class="cart"><i class="icon-bag"></i></a>
				<a href="" class="heart"><i class="icon-heart"></i></a>
				<a href="index.php?page_lg=thongtinxe2&id_xe=<?php echo $xe2['id_xe']?>" class="view"><i class="icon-magnifier-add"></i></a>
				<div class="manche"></div>
			</div>
			<?php
		}
		}
		?>
	</div>
</div>