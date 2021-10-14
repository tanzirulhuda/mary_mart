<?php
require_once('db/db.php');
require_once('includes/functions.php');

if(isset($_POST['sign_in'])){
    $customer_phone = $_POST['phone_number'];
    $customer_pass = $_POST['password'];
    $auth_key = md5(sha1($customer_phone.$customer_pass));
    $select_customer = "select * from customers where auth_key='$auth_key'";
    $run_customer = mysqli_query($conn,$select_customer);
    $get_ip = getRealIpUser();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "select * from cart where ip_add='$get_ip'";
    $run_cart = mysqli_query($conn,$select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer==0){     
        echo "<script>alert('Your email or password is wrong')</script>";
        header('location: index.php');
        exit();
    }
    
    if($check_customer==1 AND $check_cart==0){
       setcookie("current_user_auth_key",$auth_key,time()+(86400*730));
        header('location: ./index.php');  
    }else{  
       setcookie("current_user_auth_key",$auth_key,time()+(86400*730));
       header('location: ./index.php');    
    }
}


?>