<?php 
require_once('db/db.php');
require_once('includes/functions.php');
?>
<?php

if(isset($_GET['product_id'])){
	$product_id = $_GET['product_id'];
	$get_product = "select * from products where id='$product_id'";
	$run_product = mysqli_query($conn, $get_product);
	$row_product = mysqli_fetch_array($run_product);

	$id = $row_product['id'];
	$title = $row_product['p_title'];
	$price = $row_product['p_price'];
	$description = $row_product['p_desc'];
	$img = $row_product['p_img'];
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Mary Mart</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- flexslider -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
<?php require_once("includes/header.php") ?>
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Details</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<ul class="slides">
						<li data-thumb="images/si.jpg">
							<div class="thumb-image">
								<img src="images/product_images/<?php echo $img; ?>" data-imagezoom="true" class="img-responsive" alt=""> 
							</div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h3><?php echo $title; ?></h3>
				<p>
					<span class="item_price">৳ <?php echo $price; ?></span>
				</p>
				<!-- <div class="single-infoagile">
					<ul>
						<li>
							Cash on Delivery Eligible.
						</li>
						<li>
							Shipping Speed to Delivery.
						</li>
						<li>
							Sold and fulfilled by Supple Tek (3.6 out of 5 | 8 ratings).
						</li>
						<li>
							1 offer from
							<span class="item_price">$950.00</span>
						</li>
					</ul>
				</div> -->
				<div class="product-single-w3l">
					<div class="description">
						<div>
						<h4 class="text-muted"><strong>Description:</strong></h4>
						</div>
						<p>
							<?php echo $description; ?>
						</p>
					</div>
					<p>
						<i class="fa fa-refresh" aria-hidden="true"></i>All food products are
						<label>non-returnable.</label>
					</p>
				</div>
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form class="form-submit">
							<fieldset>
								<!-- Input QTY -->								
								<div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="product_qty" class="form-control input-number qty" value="1" min="1">
									<input class="auth_key" type="hidden" name="auth_key" value="<?php echo $auth_key; ?>" />
                                    <input class="id" type="hidden" name="product_id" value="<?php echo $id; ?>" />
									<span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
								<!-- !Input QTY -->
								<button class="add_to_cart_button" id="addItem" type="submit">Add to Cart</button>
							</fieldset>
						</form>
					</div>

				</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Single Page -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-mm">Add more
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="addmore">
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
									<form class="form-submit">
										<fieldset>
											<input class="id" type="hidden" name="product_id" value="<?php echo $id; ?>" />
											<input class="qty" type="hidden" name="product_qty" value="1" />
											<input class="auth_key" type="hidden" name="auth_key" value="<?php echo $auth_key; ?>" />
											<!-- <input type="submit" name="submit" value="Add to cart" class="button" /> -->
											<button class="add_to_cart_button" id="addItem" type="submit">Add to Cart</button>
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

	<?php include_once('./includes/cart.php') ?>
	<?php include_once('./includes/footer.php') ?>


	<!-- flexisel (for special offers) -->
	<script src="js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#addmore").flexisel({
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
	<!-- Custom Jquery -->
	<script>
		$(document).ready(function(){
			var quantitiy=0;
			$('.quantity-right-plus').click(function(e){	
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());		
				// If is not undefined			
					$('#quantity').val(quantity + 1);		
					// Increment
			});
			$('.quantity-left-minus').click(function(e){
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());
				// If is not undefined
				// Increment
					if(quantity>1){
					$('#quantity').val(quantity - 1);
					}
			});
		
		});
	</script>

</body>

</html>