<?php
require_once('db/db.php');
require_once('includes/functions.php');

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $ip = getRealIpUser();
    $auth_key = md5(sha1($phone.$password));
    $select_user="select * from customers where customer_phone='$phone'";
    $run_user = mysqli_query($conn,$select_user);
    $check_user = mysqli_num_rows($run_user);
    
    if($check_user == 0){
        $insert_data = "insert into customers (customer_name, customer_phone, customer_pass, customer_address, customer_ip, auth_key) values('$name','$phone','$password','$address','$ip','$auth_key')";
        $run_query = mysqli_query($conn, $insert_data);
        // If registration successfull
        if($run_query == true){
            echo "<script>alert('Registered successfully!')</script>";
            setcookie("current_user_auth_key",$auth_key,time()+(86400*730));
            echo "<script>window.top.location='https://www.marymart.xyz/index.php'</script>";
        }
    }else{
        echo "<script>alert('You already have an account! Please sign in.')</script>";
    }

}
?>