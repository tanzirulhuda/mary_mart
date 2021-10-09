<?php
require_once('../db/db.php');

$id = $_REQUEST['id'];

$remove_product = "delete from cart where p_id = '$id'";

$run_remove_product = mysqli_query($conn, $remove_product);

if($run_remove_product == true){
    echo 1;
}

?>