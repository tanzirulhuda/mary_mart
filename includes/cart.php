<div id="cd-shadow-layer"></div>
 
<?php                      
	$ip_add = getRealIpUser();			
	$select_cart = "select * from cart where ip_add='$ip_add'";			
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
			<span class="cd-qty"><?php echo $pro_qty ?>x</span>
            <a style="text-decoration:inherit; color:inherit;" href="details.php?product_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
			<div class="cd-price">৳ <?php echo $sub_total ?></div>
			<a href="" id="remove_id" data-value="<?php echo $pro_id; ?>" class="cd-item-remove cd-img-replace"></a>
		</li>
		<?php }}; ?>
	</ul> <!-- cd-cart-items -->

	<div class="cd-cart-total">
		<p>Total <span>৳ <?php echo $total; ?></span></p>
	</div> <!-- cd-cart-total -->
    <?php
    if(!isset($_COOKIE['current_user_auth_key'])){ 
    ?>
    <a href="#" data-toggle="modal" data-target="#myModal1" id="checkout-btn" class="checkout-btn">Place order</a>
    <?php }else{ ?>
	<a href="checkout.php" id="checkout-btn" class="checkout-btn">Place order</a>
    <?php }; ?>
    <?php }else{ ?>
    
    <div style="width:100%; margin-top:10px;">
    <img width="100%" height="100%" src="Images/empty.svg">
    </div>
    
    <a href="index.php" id="checkout-btn" class="checkout-btn">Continue shopping</a>
    
    
    <?php }; ?>
    

</div> <!-- cd-cart -->


	<!-- !SideBar Cart -->


