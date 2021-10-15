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
	<div class="alert-message"></div>
	<?php require_once("includes/header.php") ?>
    <div class="container" style="margin-top:30px;">
        <h3>My orders:</h3>
    </div>
    <div class="container" style="margin-top:30px;">
        <div class="col-md-12">
            <table class="table table-condensed table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Invoice no</th>
                    <th>Date</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $get_orders = "select * from invoice where customer_id='$customer_id'";
                    $run_orders = mysqli_query($conn, $get_orders);
                    while($row_orders = mysqli_fetch_array($run_orders)){
                        $pro_id = $row_orders['pro_id'];
//                            $get_pro = "select * from products where id='$pro_id'";
//                            $run_pro = mysqli_query($conn, $get_pro);
//                            $row_pro = mysqli_fetch_array($run_pro);
//                            $pro_name = $row_pro['p_title'];
//                            $pro_price = $row_pro['p_price'];
                        $pro_title = $row_orders['pro_title'];
                        $pro_price = $row_orders['price'];
                        $qty = $row_orders['qty'];
                        $invoice = $row_orders['invoice'];
                            $sql = "select * from customer_orders where invoice_no='$invoice'";
                            $run_sql = mysqli_query($conn, $sql);
                            $row_sql = mysqli_fetch_array($run_sql);
                            $status = $row_sql['order_status'];
                        $total = $row_orders['total'];
                        $date = $row_orders['order_date'];
                        $date = date('Y-m-d',strtotime($date));
                        $i++;
                    ?>
                  <tr class="<?php if($status=='pending'){echo 'warning';}else{echo 'success';} ?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $invoice; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $pro_title; ?></td>
                    <td><?php echo $pro_price; ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $status; ?></td>
                  </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>

	<?php include_once('./includes/cart.php') ?>
	<?php include_once('./includes/footer.php') ?>

</body>

</html>