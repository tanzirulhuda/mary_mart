<?php 

    if(isset($_GET['delete_product'])){
        
        $delete_id = $_GET['delete_product'];
        
        $delete_pro = "delete from products where id='$delete_id'";
        
        $run_delete = mysqli_query($conn,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your product has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_products','_self')</script>";
            
        }
        
    }

?>