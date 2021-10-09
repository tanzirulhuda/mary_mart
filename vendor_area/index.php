<?php 

    session_start();
    include("../db/db.php");
    
    if(!isset($_SESSION['vendor_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        $vendor_session = $_SESSION['vendor_email'];
        
        $get_vendor = "select * from vendors where email='$vendor_session'";
        
        $run_vendor = mysqli_query($conn,$get_vendor);
        
        $row_vendor = mysqli_fetch_array($run_vendor);
        
        $vendor_id = $row_vendor['id'];
        
        $vendor_name = $row_vendor['name'];
        
        $vendor_email = $row_vendor['email'];

        $vendor_image = $row_vendor['image'];

        $vendor_contact = $row_vendor['contact'];

        $vendor_district = $row_vendor['district'];

        $vendor_location = $row_vendor['location'];

        $get_products = "select * from products where vendor_id='$vendor_id'";
        
        $run_products = mysqli_query($conn,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>vendor Panel | Mary Mart</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>

<div id="wrapper"><!-- #wrapper begin -->
       
        <?php include_once('./includes/sidebar.php') ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("./dashboard.php");
                        
                }
                   if(isset($_GET['insert_product'])){
                        
                        include("./insert/insert_product.php");
                        
                }
                   if(isset($_GET['view_products'])){
                        
                        include("./view/view_products.php");
                        
                }
                   if(isset($_GET['delete_product'])){
                        
                        include("./delete/delete_product.php");
                        
                }
                   if(isset($_GET['edit_product'])){
                        
                        include("./edit/edit_product.php");
                        
                }
                
                   if(isset($_GET['user_profile'])){
                        
                        include("./user_profile.php");
                        
                }
        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->
    
</body>
</html>
<?php }; ?>