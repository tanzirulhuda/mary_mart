<?php
require_once('db/db.php');

if(isset($_POST["search"]))  
{  
     if(!empty($_POST["keywords"]))  
     {  
          $query = str_replace(" ", "+", $_POST["keywords"]);  
          header("location:search.php?search=" . $query);  
     }  
} 
?>
<!-- DOCTYPE html -->
<?php 
require_once('db/db.php');
require_once('includes/functions.php');
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

	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-mm">Search result
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-12">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">
						
                        <?php  
                            if(isset($_GET["search"]))  
                            {  
                                $condition = '';  
                                $query = explode(" ", $_GET["search"]);  
                                foreach($query as $text)  
                                {  
                                    $condition .= "keywords LIKE '%".mysqli_real_escape_string($conn, $text)."%' OR ";  
                                }  
                                $condition = substr($condition, 0, -4);  
                                $sql_query = "SELECT * FROM products WHERE " . $condition;  
                                $result = mysqli_query($conn, $sql_query);  
                                if(mysqli_num_rows($result) > 0)  
                                {  
                                while($row = mysqli_fetch_array($result)){  
                                    $id = $row["id"];
                                    $title = $row["p_title"];
                                    $price = $row["p_price"];
                                    $img = $row["p_img"];   
                        ?>  
						<div class="col-md-3">
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
										<del>$280.00</del>
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
						</div>
                        <?php } }else{
                            echo "
                            <div class=\"container\" style=\"display:flex;justify-content:center;align-items:center;\">
                            <img class=\"img-responsive\" src=\"./images/not_found.svg\" alt=\"No products found\">
                            </div>
                            ";
                        } }else{
                            $URL="./index.php";
                            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                        } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>

	<?php include_once('./includes/cart.php') ?>
	<?php include_once('./includes/footer.php') ?>

</body>

</html>