<?php
require_once('db/db.php');
require_once('includes/functions.php');

if(isset($_GET['customer_id'])){   
$customer_auth_key = $_GET['customer_id'];
$sql = "select * from customers where auth_key='$customer_auth_key'";
$run_sql = mysqli_query($conn, $sql);
$row_sql = mysqli_fetch_array($run_sql);
$customer_id = $row_sql['customer_id'];
$customer_order = generateRandomString();
$due_amount = $_POST['due_amount'];
$delivery_time = $_POST['delivery_time'];   
// $ip_add = getRealIpUser();
$status = "pending";
$order_status = "In progress";
$invoice_no = mt_rand();
$select_cart = "select * from cart where auth_key='$customer_auth_key'";
$run_cart = mysqli_query($conn,$select_cart);
    while($row_cart = mysqli_fetch_array($run_cart)){  
        $pro_id = $row_cart['p_id']; 
        $pro_qty = $row_cart['qty'];  
        $get_products = "select * from products where id='$pro_id'"; 
        $run_products = mysqli_query($conn,$get_products);
        while($row_products = mysqli_fetch_array($run_products)){
            $vendor_id = $row_products['vendor_id'];      
            $insert_customer_order = "insert into customer_orders (customer_order,customer_id,vendor_id,pro_id,due_amount,invoice_no,qty,delivery_time,order_date,order_status) values ('$customer_order','$customer_id','$vendor_id','$pro_id','$due_amount','$invoice_no','$pro_qty','$delivery_time',NOW(),'$status')";      
            $run_customer_order = mysqli_query($conn,$insert_customer_order);      
            $insert_pending_order = "insert into pending_orders (customer_order,customer_id,vendor_id,pro_id,due_amount,invoice_no,qty,delivery_time,order_date,order_status) values ('$customer_order','$customer_id','$vendor_id','$pro_id','$due_amount','$invoice_no','$pro_qty','$delivery_time',NOW(),'$order_status')";     
            $run_pending_order = mysqli_query($conn,$insert_pending_order);      
            $delete_cart = "delete from cart where auth_key='$customer_auth_key'";       
            $run_delete = mysqli_query($conn,$delete_cart);      
            echo "<script>alert('Your orders has been submitted, Thanks')</script>";      
            echo "<script>window.open('index.php','_self')</script>";     
        }
    }
}


?>