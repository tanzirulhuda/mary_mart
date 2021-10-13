<?php
require_once('../db/db.php');
if(isset($_COOKIE['current_user_auth_key'])){
    $auth_key = $_COOKIE['current_user_auth_key'];
}
$id = $_POST['id'];
$remove_product = "delete from cart where p_id = '$id'";
$run_remove_product = mysqli_query($conn, $remove_product);

$get_items = "select * from cart where auth_key='$auth_key'";
$run_items = mysqli_query($conn,$get_items);
$count_items = mysqli_num_rows($run_items);
echo $count_items;
?>