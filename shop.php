<?php 
require_once('db/db.php');
require_once('includes/functions.php');
add_cart();

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Mary Mart</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="shortcut icon" href="./images/ico.png" type="image/x-icon">
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<?php require_once("includes/header.php") ?>
	<?php
		if(isset($_GET['pro_cat'])){
			$pro_cat_id = $_GET['pro_cat'];
			$get_pro_cat = "select * from product_categories where id='$pro_cat_id'";
			$run_pro_cat = mysqli_query($conn,$get_pro_cat);
			$row_pro_cat = mysqli_fetch_array($run_pro_cat);
			$pro_cat_title = $row_pro_cat['cat_name'];
			$get_pro = "select * from products where cat_id='$pro_cat_id'";
			$run_pro = mysqli_query($conn,$get_pro);
			$count = mysqli_num_rows($run_pro);	
	?>
	<?php if($count==0){?>
		<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-mm"><?php echo $pro_cat_title; ?>
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<center style="margin-bottom:25px;"><h3 class="text-warning">Sorry! No items found in this category. Try another one.</h3></center>
			<div class="container">
				<div style="display:flex;justify-content:center;align-items:center;">
				<center>
					<img src="images/empty.svg" width="100%" alt="">
				</center>
				</div>
			</div>
		</div>
	</div>
		<?php }else{ ?>
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-mm"><?php echo $pro_cat_title; ?>
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3 hidden-xs">
				<!-- deals -->
				<div class="deal-leftmk left-side">
					<h3 class="agileits-sear-head">Special Deals</h3>
					<?php
					
					$get_products = "select * from products where cat_id='$pro_cat_id' order by rand() LIMIT 0,7";
					$run_products = mysqli_query($conn, $get_products);
					while($row_products = mysqli_fetch_array($run_products)){
						$id = $row_products['id'];
						$title = $row_products['p_title'];
						$price = $row_products['p_price'];
						$img = $row_products['p_img'];
					?>
					<div class="special-sec1">
						<a href="details.php?product_id=<?php echo $id; ?>">
							<div class="col-xs-4 img-deals">
								<img style="width:70px; height:70px;" src="images/product_images/<?php echo $img; ?>" alt="">
							</div>
							<div class="col-xs-8 img-deal1">
								<h3><?php echo $title; ?></h3>
								<a href="details.php?product_id=<?php echo $id; ?>">৳ <?php echo $price; ?></a>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<?php }; ?>
				</div>
				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">
						
						<?php
					
						$get_products = "select * from products where cat_id='$pro_cat_id' order by rand() LIMIT 0,20";
						$run_products = mysqli_query($conn, $get_products);
	
						while($row_products = mysqli_fetch_array($run_products)){
							$id = $row_products['id'];
							$title = $row_products['p_title'];
							$price = $row_products['p_price'];
							$img = $row_products['p_img'];
						?>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img width="160px" height="150px" src="images/product_images/<?php echo $img; ?>" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="details.php?product_id=<?php echo $id; ?>" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								</div>
								<div class="item-info-product ">
									<div class="name">
										<h4>
											<a href="details.php?product_id=<?php echo $id; ?>"><?php echo $title; ?></a>
										</h4>
									</div>
									<div class="info-product-price">
										<span class="item_price">৳ <?php echo $price; ?></span>
										<!-- <del>$280.00</del> -->
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="index.php?add_cart=<?php echo $id; ?>" method="post">
											<fieldset>
												<input type="hidden" name="product_qty" value="1" />
												<input type="submit" name="submit" value="Add to cart" class="button" />
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
		<?php }; ?>
	<?php }else{ ?>
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-mm">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3 hidden-xs">
				<!-- deals -->
				<div class="deal-leftmk left-side">
					<h3 class="agileits-sear-head">Special Deals</h3>
					<?php
					
					$get_products = "select * from products order by rand() LIMIT 0,7";
					$run_products = mysqli_query($conn, $get_products);

					while($row_products = mysqli_fetch_array($run_products)){
						$id = $row_products['id'];
						$title = $row_products['p_title'];
						$price = $row_products['p_price'];
						$img = $row_products['p_img'];
					?>
					<div class="special-sec1">
						<a href="details.php?product_id=<?php echo $id; ?>">
							<div class="col-xs-4 img-deals">
								<img style="width:70px; height:70px;" src="images/product_images/<?php echo $img; ?>" alt="">
							</div>
							<div class="col-xs-8 img-deal1">
								<h3><?php echo $title; ?></h3>
								<a href="details.php?product_id=<?php echo $id; ?>">৳ <?php echo $price; ?></a>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<?php }; ?>
				</div>
				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">
						
						<?php
					
						$get_products = "select * from products order by rand() LIMIT 0,10";
						$run_products = mysqli_query($conn, $get_products);
	
						while($row_products = mysqli_fetch_array($run_products)){
							$id = $row_products['id'];
							$title = $row_products['p_title'];
							$price = $row_products['p_price'];
							$img = $row_products['p_img'];
						?>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img width="160px" height="150px" src="images/product_images/<?php echo $img; ?>" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="details.php?product_id=<?php echo $id; ?>" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								</div>
								<div class="item-info-product ">
									<div class="name">
										<h4>
											<a href="details.php?product_id=<?php echo $id; ?>"><?php echo $title; ?></a>
										</h4>
									</div>
									<div class="info-product-price">
										<span class="item_price">৳ <?php echo $price; ?></span>
										<!-- <del>$280.00</del> -->
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="index.php?add_cart=<?php echo $id; ?>" method="post">
											<fieldset>
												<input type="hidden" name="product_qty" value="1" />
												<input type="submit" name="submit" value="Add to cart" class="button" />
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<?php }; ?>
	<!-- //top products -->
	<?php include_once('./includes/cart.php') ?>
	<?php include_once('./includes/footer.php') ?>


</body>

</html>