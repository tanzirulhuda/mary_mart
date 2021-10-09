<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_order'])){
        
        $delete_id = $_GET['delete_order'];
        
        $delete_order = "delete from pending_orders where customer_order='$delete_id'";
        
        $run_delete = mysqli_query($conn,$delete_order);
        
        $update_order = "update customer_orders set order_status='Deleted' where customer_order='$delete_id'";

        $run_update = mysqli_query($conn, $update_order);
        if($run_delete){
            
            echo "<script>alert('One of your costumer order has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_orders','_self')</script>";
            
        }
        
    }

?>

<?php } ?>