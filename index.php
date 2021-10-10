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
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big Save
						</h3>
						<p>Get flat 10% Cashback</p>
						<a class="button2" href="shop.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy Savingg
						</h3>
						<p>Get Upto 30% Off</p>
						<a class="button2" href="shop.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big Deal
						</h3>
						<p>Get Best Offer Upto 20% </p>
						<a class="button2" href="shop.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Today Discount
						</h3>
						<p>Get Now 40% Discount</p>
						<a class="button2" href="shop.php">Shop Now </a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

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
			<div class="side-bar col-md-3">
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
	<!-- //top products -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-mm">Special Offers
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexisel">
				<?php
					
					$get_products = "select * from products order by rand() LIMIT 0,10";
					$run_products = mysqli_query($conn, $get_products);

					while($row_products = mysqli_fetch_array($run_products)){
						$id = $row_products['id'];
						$title = $row_products['p_title'];
						$price = $row_products['p_price'];
						$img = $row_products['p_img'];
					?>
					<li>
						<div class="mm-specilamk">
							<div class="speioffer-agile">
								<a href="details.php?product_id=<?php echo $id; ?>">
									<img width="150px" height="150px" src="images/product_images/<?php echo $img; ?>" alt="">
								</a>
							</div>
							<div class="product-name-mm">
								<h4 class="name_special_offer_slide">
									<a href="details.php?product_id=<?php echo $id; ?>"><?php echo $title ?></a>
								</h4>
								<div class="mm-pricehkj">
									<h6>৳ <?php echo $price; ?></h6>
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
					</li>
					<?php }; ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->


	<?php include_once('./includes/cart.php') ?>
	<?php include_once('./includes/footer.php') ?>

	<!-- flexisel (for special offers) -->
	<script src="js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexisel").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

</body>

</html>