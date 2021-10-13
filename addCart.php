<?php 
session_start();
require_once("./db/db.php");
if(isset($_COOKIE['current_user_auth_key'])){
    $auth_key = $_COOKIE['current_user_auth_key'];
}

if(isset($_POST['id']) && isset($_POST['qty']) && isset($_POST['auth_key'])){
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $auth_key = $_POST['auth_key'];

    $check_product = "select * from cart where p_id='$id' and auth_key='$auth_key'";
    $run_check = mysqli_query($conn,$check_product);

    if(mysqli_num_rows($run_check)>0){          
        echo "Already added";
    }else{
        $query = "insert into cart (p_id,auth_key,qty) values ('$id','$auth_key','$qty')";           
        $run_query = mysqli_query($conn,$query);
        echo "Added";
    }
}
// Cart Item Count
if(isset($_GET['cartItem'])){
    $get_items = "select * from cart where auth_key='$auth_key'";
    $run_items = mysqli_query($conn,$get_items);
    $count_items = mysqli_num_rows($run_items);
    echo $count_items;
}

?>