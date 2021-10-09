
<?php 
if(isset($_GET['delivered_order'])){
    $id = $_GET['delivered_order'];  
    $delete_order = "delete from pending_orders where customer_order='$id'";
    $run_delete = mysqli_query($conn,$delete_order);
    $update_order = "update customer_orders set order_status='Delivered' where customer_order='$id'";
    $run_update = mysqli_query($conn, $update_order);

    echo "<script>alert('Delivered successfully!')</script>";
    echo "<script>window.open('index.php?view_orders','_self')</script>";
}
?>