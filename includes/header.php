<?php

if(isset($_COOKIE['current_user_auth_key'])){

    $auth_key = $_COOKIE['current_user_auth_key'];
    
    $get_current_user = "select * from customers where auth_key = '$auth_key'";
    
    $run_current_customer = mysqli_query($conn, $get_current_user);
    
    $row_current_customer = mysqli_fetch_array($run_current_customer);
    
    $customer_name = $row_current_customer['customer_name'];
}


?>
    <!-- top-header -->
	<div class="header-most-top">
		<p>Grocery Offer Zone Top Deals & Discounts</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 col-xs-8 logo_agile">
				<h1>
					<a href="index.php">
						<!-- <span>M</span>ary
						<span>M</span>art -->
						<img src="images/logo/logo.png" alt=" " width="225px">
					</a>
				</h1>
			</div>
            <div class="col-xs-4 visible-xs" style="z-index:99;margin-top:10px;">
                <ul style="list-style:none;">
                    <li style="font-size:14px;">
                        <?php
                        
                        if(!isset($_COOKIE['current_user_auth_key'])){
                            
						echo "
                        <a style=\"text-decoration:none; color:#000;\" href=\"#\" data-toggle=\"modal\" data-target=\"#myModal1\">
							<span style=\"color:#ff8201;\" class=\"fa fa-unlock-alt\" aria-hidden=\"true\"></span> Sign In 
                        </a>
                        ";
                        }else{
                        echo "
                        <a style=\"text-decoration:none; color:#000;\" href=\"#\" data-toggle=\"modal\" data-target=\"#user_profile_section\">
							<span style=\"color:#ff8201;\" class=\"fa fa-user\" aria-hidden=\"true\"></span> My Account
                        </a>
                        ";
                        }
                        ?>
                    </li>
                </ul>
            </div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul class="hidden-xs">
					<li class="area-select">
                      <select>
                        <option value="">Khulna</option>
                        <option value="">Khulna</option>
                        <option value="">Dhaka</option>
                        <option value="">Shariyatpur</option>
                      </select>
					</li>
					<li class="hidden-xs">
						<span class="fa fa-phone" aria-hidden="true"></span> 8801991668049
					</li>
					<li>
                        <?php
                        
                        if(!isset($_COOKIE['current_user_auth_key'])){
                            
						echo "
                        <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal1\">
							<span class=\"fa fa-unlock-alt\" aria-hidden=\"true\"></span> Sign In 
                        </a>
                        ";
                        }else{
                        echo "
                        <a href=\"#\" data-toggle=\"modal\" data-target=\"#user_profile_section\">
							<span class=\"fa fa-user\" aria-hidden=\"true\"></span> My Account
                        </a>
                        ";
                        }
                        ?>
					</li>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="search.php" method="post">
						<input name="keywords" type="search" placeholder="How can we help you today?" required="">
						<button name="search" type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							<button class="w3view-cart" id="cart-btn">
								<a id="cd-cart-trigger"  style="color:inherit;" href="">
								<span style="position: absolute;margin-left: 20px;margin-top: 23px;font-size: 16px;background: #ff5722;" class="badge badge-pill badge-light"><?php items(); ?></span>
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
								</a>
							</button>
					</div>
				</div>
				<!-- //cart details -->
            <div class="col-12 visible-xs">
                <ul style="list-style:none; display:inline-flex; justify-content:space-between;width:100%; margin-top:10px;">
                    <p>Your City: </p>
                    <li class="area-select" style="border:none; padding:0;">
                      <select>
                        <?php
                          
                          $get_locations = "select * from location";
                          $run_locations = mysqli_query($conn, $get_locations);
                          while($row_locations = mysqli_fetch_array($run_locations)){
                            $location_id = $row_locations['id'];
                            $location_name = $row_locations['name'];
                        ?>
                        <option value="<?php echo $location_id; ?>"><?php echo $location_name; ?></option>
                        <?php }; ?>
                      </select>
                    </li>
                </ul>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form action="login.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Mobile number" name="phone_number" required>
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required>
							</div>
							<input type="submit" name="sign_in" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
    <div class="modal fade" id="user_profile_section" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="modal_body_left modal_body_left1">
	                   <div class="list-group">
                          <a href="#" class="list-group-item disabled"><?php echo $customer_name; ?></a>
                          <a href="#" class="list-group-item">View orders</a>
                          <a href="#" class="list-group-item">Change Password</a>
                          <a href="./logout.php" class="list-group-item">Logout</a>
                        </div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Mary Mart! Let's set up your Account.
						</p>
						<form action="register.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="name" required>
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Phone number" name="phone" required>
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required>
                            </div>
                            <div class="styled-input">
								<input type="text" placeholder="Address" name="address" required>
							</div>
							<input type="submit" name="register" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="agileits-navi_search">
				<form action="#" name="category">
					<select id="agileinfo-nav_search" name="pro_category" onchange="location = this.value;">
						<option>All Categories</option>
                        <?php
                        $get_cats = "select * from product_categories";
                        $run_cats = mysqli_query($conn, $get_cats);
                        
                        while($row_cats = mysqli_fetch_array($run_cats)){
                            $cat_id = $row_cats['id'];
                            $cat_name = $row_cats['cat_name'];
                        ?>
                        <option value="shop.php?pro_cat=<?php echo $cat_id;?>"><?php echo $cat_name; ?></option>
                        <?php }; ?>
					</select>
				</form>
			</div>
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead" href="index.php">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.php">About Us</a>
								</li>
												</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->

<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("area-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>