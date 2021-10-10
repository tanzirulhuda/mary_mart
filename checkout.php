<?php
require_once('./db/db.php');
require_once('./includes/functions.php');
require_once('./includes/cart.php');

if(isset($_COOKIE['current_user_auth_key'])){

    $auth_key = $_COOKIE['current_user_auth_key'];
    
    $get_current_user = "select * from customers where auth_key = '$auth_key'";
    
    $run_current_customer = mysqli_query($conn, $get_current_user);
    
    $row_current_customer = mysqli_fetch_array($run_current_customer);
    
    $customer_name = $row_current_customer['customer_name'];
    
    $customer_addr = $row_current_customer['customer_address'];
}
?>
<!DOCTYPE html>
<html>
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
    <section class="container">
        <div class="page-header"><h1>Checkout</h1></div>
        <table class="table table-hover" style="color:inherit;">
            <thead>
              <tr>
                <th>Product image</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Sub total</th>
              </tr>
            </thead>
            <tbody>
                <?php                      
                $ip_add = getRealIpUser();			
                $select_cart = "select * from cart where ip_add='$ip_add'";			
                $run_cart = mysqli_query($conn,$select_cart);			
                $count = mysqli_num_rows($run_cart);
                while($row_cart = mysqli_fetch_array($run_cart)){			
                $pro_id = $row_cart['p_id'];						
                $pro_qty = $row_cart['qty'];			
                $get_products = "select * from products where id='$pro_id'";			
                $run_products = mysqli_query($conn,$get_products);			
                while($row_products = mysqli_fetch_array($run_products)){				
                    $product_title = $row_products['p_title'];
                    $product_image = $row_products['p_img'];
                    $only_price = $row_products['p_price'];
                    $sub_total = $row_products['p_price']*$pro_qty;	
                    if($total>400){
                        $delivery_charge = 9;
                    }else{
                        $delivery_charge = 19;
                    }
                    ?>
                  <tr>
                    <td><img width="25px" height="25px" style="object-fit: cover;" src="Images/product_images/<?php echo $product_image; ?>"></td>
                    <td><?php echo $product_title; ?></td>
                    <td><?php echo $pro_qty; ?> * <?php echo $only_price ?></td>
                    <td>৳ <?php echo $sub_total ?></td>
                  </tr>
                <?php }}; ?>
            </tbody>
            <hr>
            <tfoot>
                <tr>
                    <th>Delivary charge:</th>
                    <th></th>
                    <th></th>
                    <th>৳ <?php echo $delivery_charge ?></th>
                </tr>
                <tr style="border-top:1px solid gray;">
                    <th>Total:</th>
                    <th></th>
                    <th></th>
                    <th>৳ <?php echo $total+=$delivery_charge;?></th>
                </tr>
            </tfoot>
        </table>

    </section>
    <div class="addr_info container">
        <div class="panel panel-default">
          <div class="panel-heading">Delivery address</div>
          <div style="display:flex; justify-content:space-between;padding:20px;">
              <div><i style="font-size:30px;" class="fa fa-map-marker" aria-hidden="true"></i></div>
              <div><?php echo $customer_addr; ?></div>
          </div>
        </div>
    </div>
    <div class="delivery_time container">
        <div class="panel panel-default">
          <div class="panel-heading">Time you prefer for your delivery</div>
          <div style="display:flex; justify-content:space-between;padding:20px;">
              <div><i style="font-size:30px;" class="fa fa-clock-o" aria-hidden="true"></i></div>
              <form method="post" class="form-inline" action="order.php?customer_id=<?php echo $auth_key; ?>">
                  <div class="form-group">
                    <select name="delivery_time" class="delivery_time">
                        <option value="8:00 - 9:00 AM">8:00 - 9:00 AM</option>  
                        <option value="9:00 - 10:00 AM">9:00 - 10:00 AM</option>  
                        <option value="10:00 - 11:00 AM">10:00 - 11:00 AM</option>  
                        <option value="11:00 - 12:00 AM">11:00 - 12:00 AM</option>  
                        <option value="12:00 - 1:00 PM">12:00 - 1:00 PM</option>  
                        <option value="1:00 - 2:00 PM">1:00 - 2:00 PM</option>  
                        <option value="2:00 - 3:00 PM">2:00 - 3:00 PM</option>  
                        <option value="3:00 - 4:00 PM">3:00 - 4:00 PM</option>  
                        <option value="4:00 - 5:00 PM">4:00 - 5:00 PM</option>  
                        <option value="5:00 - 6:00 PM">5:00 - 6:00 PM</option>  
                        <option value="6:00 - 7:00 PM">6:00 - 7:00 PM</option>  
                        <option value="7:00 - 8:00 PM">7:00 - 8:00 PM</option>  
                        <option value="8:00 - 9:00 PM">8:00 - 9:00 PM</option>  
                        <option value="8:00 - 9:00 PM">8:00 - 9:00 PM</option>  
                    </select>
                  </div>
                  <input type="hidden" name="due_amount" value="<?php echo $total; ?>">
                  <div class="form-group">
                    <input style="background:#ff5722; color:#fff;" name="confirm_order" type="submit" value="Confirm order" class="btn btn-small">
                  </div>
              </form>
          </div>
        </div>
    </div>

    <?php include_once('./includes/cart.php') ?>
	<?php include_once('./includes/footer.php') ?>
    <script>
    $(document).ready(function(){
        $('a#checkout-btn').remove();
    });
    </script>
</body>
</html>