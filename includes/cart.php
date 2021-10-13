<div id="cd-shadow-layer"></div> 
<?php 
if(isset($_COOKIE['current_user_auth_key'])){
    $auth_key = $_COOKIE['current_user_auth_key'];
}                     
	$select_cart = "select * from cart where auth_key='$auth_key'";			
	$run_cart = mysqli_query($conn,$select_cart);			
	$count = mysqli_num_rows($run_cart);
?>

<div id="cd-cart">
	<h2>My Cart</h2>
	<p class="text-muted text-success">You have currently <?php echo $count; ?> item(s) in your cart</p>
    <?php
    if($count != 0){
    ?>
	<ul class="cd-cart-items">
	<?php                        
		$total = 0;		
		while($row_cart = mysqli_fetch_array($run_cart)){			
			$pro_id = $row_cart['p_id'];						
			$pro_qty = $row_cart['qty'];			
			$get_products = "select * from products where id='$pro_id'";			
			$run_products = mysqli_query($conn,$get_products);			
			while($row_products = mysqli_fetch_array($run_products)){				
				$product_title = $row_products['p_title'];								
				$only_price = $row_products['p_price'];				
				$sub_total = $row_products['p_price']*$pro_qty;				
				$total += $sub_total;				
		?>
		<li>
			<div style="display:flex;">
				<div style="display:flex; flex-direction: column; align-items:center; margin-right:.5em;" class="inc-dec">
				<form id="unq">
					<div>
						<div id="button" data-value="<?php echo $pro_id; ?>" class="dec button noselect">-</div>
							<input class="noselect" type="text" id="quantity" value="<?php echo $pro_qty ?>" readonly/>
						<div id="button" data-value="<?php echo $pro_id; ?>" class="inc button noselect">+</div>
					</div>
				</form>
				</div>
				<div id="item_info" style="align-self:center;">
					<!-- <span class="cd-qty">x</span> -->
					<a style="text-decoration:inherit; color:inherit;" href="details.php?product_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
					<div class="cd-price">৳ <?php echo $sub_total ?></div>
					<!-- <a href="" data-id="" id="cd-item-remove" class="cd-item-remove cd-img-replace"></a> -->
					<a href="" data-id="<?php echo $pro_id; ?>" id="cd-item-remove" class="cd-item-remove cd-img-replace"></a>
				</div>
			</div>
		</li>
		<?php }}; ?>
	</ul> <!-- cd-cart-items -->

	<div class="cd-cart-total">
		<p>Total <span>৳ <?php echo $total; ?></span></p>
	</div> <!-- cd-cart-total -->
    <?php
    if(isset($_COOKIE['current_user_auth_key'])){ 
    ?>
	<a href="checkout.php" id="checkout-btn">
		<div class="checkout-btn">
			Place order
		</div>
	</a>
    <?php } ;?>
    <?php }else{ ?>
    
    <div style="width:100%; margin-top:10px;">
    <img width="100%" height="100%" src="images/empty.svg">
    </div>
	<a href="index.php" id="checkout-btn">
		<div class="checkout-btn">
			Continue shopping
		</div>
	</a>
    
    
    <?php }; ?>
    

</div> <!-- cd-cart -->


	<!-- !SideBar Cart -->

