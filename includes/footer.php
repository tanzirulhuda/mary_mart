<!-- newsletter -->
<div class="footer-top">
		<div class="container-fluid">
			<div class="col-xs-8 agile-leftmk">
				<h2>Get your Groceries delivered from local stores</h2>
				<p>                                       </p>
				<form action="#" method="post">
					<input type="email" placeholder="E-mail" name="email" required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="newsform-mm">
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
				</div>
			</div>
			<div class="col-xs-4 mm-rightmk">
				<img src="images/tab3.png" alt=" ">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main">
				<span>"Mary Mart"</span> is an online market place provides access both vendor, customer and delivery services. This market place mainly works to ensure delivery on time to its clients. Peoples life are becoming first day by day. Many people calculate their time and distribute in their daily work for the optimum utilization of time. We actually offer adore people to take chance of saving time, so that they can use it for their more important work.</p>
			<!-- //footer first section -->
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Top Categories</h3>
						<ul>
							<?php
							
							$get_cat = "select * from product_categories order by rand() LIMIT 0,5";
							$run_cat = mysqli_query($conn, $get_cat);
							while($row_cat = mysqli_fetch_array($run_cat)){
								$id = $row_cat['id'];
								$title = $row_cat['cat_name'];
							?>
							<li>
								<a href="shop.php?pro_cat=<?php echo $id; ?>"><?php echo $title; ?></a>
							</li>
							<?php }; ?>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Quick Links</h3>
						<ul>
							<li>
								<a href="about.html">About Us</a>
							</li>
							<li>
								<a href="contact.html">Contact Us</a>
							</li>
							<li>
								<a href="help.html">Help</a>
							</li>
							<li>
								<a href="faqs.html">Faqs</a>
							</li>
							<li>
								<a href="terms.html">Terms of use</a>
							</li>
							<li>
								<a href="privacy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<!-- <div class="col-xs-6 footer-grids">
						<h3>Get in Touch</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i> 123 Sebastian, USA.</li>
							<li>
								<i class="fa fa-mobile"></i> 333 222 3333 </li>
							<li>
								<i class="fa fa-phone"></i> +222 11 4444 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:example@mail.com"> mail@example.com</a>
							</li>
						</ul>
					</div> -->
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  mm-socialmk">
					<h3>Follow Us on</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
					<!-- <div class="agileits_app-devices">
						<h5>Download the App</h5>
						<a href="#">
							<img src="images/1.png" alt="">
						</a>
						<a href="#">
							<img src="images/2.png" alt="">
						</a>
						<div class="clearfix"> </div>
					</div> -->
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© Mary Mart. All rights reserved | Developed by
				<a href="#"> Apps Valley.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->


    <!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- imagezoom -->
	<script src="js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
	<script src="js/main.js"></script>

	<!-- popup modal (for signin & signup)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<script>

	$(document).ready(function(){
		//Add to cart
		$(".add_to_cart_button").on("click", function(e){
				e.preventDefault();
				var form = $(this).closest(".form-submit");
				var id = form.find(".id").val();
				var qty = form.find(".qty").val();
				var auth_key = form.find(".auth_key").val();

				$.ajax({
					url:"addCart.php",
					method:"post",
					data:{id:id, qty:qty, auth_key:auth_key},
					success:function(response){
						$(form.find("#addItem")).html(response).attr("disabled","disabled");
						// window.scrollTo(0,0);
						load_cart_item_number();
						
					}
				});
			});
			load_cart_item_number();
			//Count cart item
			function load_cart_item_number(){
				$.ajax({
					url: "addCart.php",
					method: "get",
					data: {cartItem: "cart_item"},
					success:function(response){
						$("#cart_item").html(response);
						$("#cd-cart").load(window.location.href+" #cd-cart > *");
						$("#container").load(window.location.href+" #container > *");
					}
				});
			}

		//Increment decrement qty
		$(document).on("click", "div.button", function() {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
		// Don't allow decrementing below zero
		if (oldValue > 1) {
			var newVal = parseFloat(oldValue) - 1;
		} else {
			newVal = 1;
		}
		}
		$button.parent().find("input").val(newVal);
		var newQty = $button.parent().find("input").val();
		var proId = $button.data("value");
		// console.log(proId);;
			$.ajax({
			type: "POST",
			url: "update_cart_quantity.php?id=" + proId + "&newvalue=" + newQty,
			data:{proId:proId, newQty: newQty},
			success: function() {
				// console.log($button.parent().find("input").val());
				$("#cd-cart").load(window.location.href+" #cd-cart > *");
				$("#container").load(window.location.href+" #container > *");
			}
			});
		});
		$(document).on("click", "div#item_info a#cd-item-remove", function(e){
			e.preventDefault();
			var id = $(this).data("id");
			$.ajax({
				url:"./includes/remove_product.php",
				method:"post",
				data:{id:id},
				success:function(response){
					$("#cart_item").html(response);
					$("#cd-cart").load(window.location.href+" #cd-cart > *");
					$("#container").load(window.location.href+" #container > *");
				}

			});
		});
	});

	</script>
<!-- password-script -->
<script>
window.onload = function () {
	document.getElementById("password1").onchange = validatePassword;
	document.getElementById("password2").onchange = validatePassword;
}

function validatePassword() {
	var pass2 = document.getElementById("password2").value;
	var pass1 = document.getElementById("password1").value;
	if (pass1 != pass2)
		document.getElementById("password2").setCustomValidity("Passwords Don't Match");
	else
		document.getElementById("password2").setCustomValidity('');
	//empty string means no validation error
}
</script>
<!-- //password-script -->
