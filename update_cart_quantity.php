<?php
require_once("./db/db.php");
require_once ("./includes/cart.php");
// if(isset($_GET['newvalue'])){
    $newQty = $_POST['newQty'];
    $proId = $_POST['proId'];
    $sql = "update cart set qty='$newQty' where p_id='$proId'";
    $run_sql = mysqli_query($conn, $sql);
// }
                
?>