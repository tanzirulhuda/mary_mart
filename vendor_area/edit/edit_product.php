<?php 

    include("../db/db.php");
    
    if(!isset($_SESSION['vendor_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
 
?>
<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from products where id='$edit_id'";
        
        $run_edit = mysqli_query($conn,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['id'];
        
        $p_title = $row_edit['p_title'];
        
        $p_cat = $row_edit['cat_id'];
        
        $p_price = $row_edit['p_price'];
        
        $p_desc = $row_edit['p_desc'];

        $location = $row_edit['location'];

        $keywords = $row_edit['keywords'];
        
    }
        //get product categories
        
        $get_p_cat = "select * from product_categories where id='$p_cat'";
        
        $run_p_cat = mysqli_query($conn,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['cat_name'];

        //get location

        $get_location = "select * from location where id= '$location'";

        $run_location = mysqli_query($conn, $get_location);

        $row_location = mysqli_fetch_array($run_location);

        $location_title = $row_location['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <style>
        .bootstrap-tagsinput{
            width:100%;
        }
    </style>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
           <form id="posts" method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" value="<?php echo $p_title; ?>" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Category </label> 

                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($conn,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['id'];
                                  $p_cat_title = $row_p_cats['cat_name'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <!-- <div class="form-group">form-group Begin -->
                       
                      <!-- <label class="col-md-3 control-label"> Product Image</label>  -->
                      
                      <!-- <div class="col-md-6">col-md-6 Begin -->
                          
                          <!-- <input name="product_img" type="file" class="form-control" required>
                          <img width="70" height="70" src="Images/product_images/" alt=""> -->
                          
                      <!-- </div>col-md-6 Finish -->
                       
                   <!-- </div>form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="number" class="form-control" value="<?php echo $p_price; ?>" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Select location </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="location" class="form-control"><!-- form-control Begin -->
                               
                               <option value="<?php echo $location; ?>"> <?php echo $location_title; ?> </option>
                               
                               <?php 
                               
                               $get_location = "select * from location";
                               $run_location = mysqli_query($conn,$get_location);
                               
                               while ($row_location=mysqli_fetch_array($run_location)){
                                   
                                   $id = $row_location['id'];
                                   $title = $row_location['name'];
                                   
                                   echo "
                                   
                                   <option value='$id'> $title </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               
                           </select><!-- form-control Finish -->
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" class="form-control">
                            <?php echo $p_desc; ?>
                          </textarea>
                          
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Keywords </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                        
                        <input type="text" id="keywords" name="keywords" data-role="tagsinput" value="<?php echo $keywords;?>" />	
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script>
    $('#skills').tagsinput({
        confirmKeys: [13, 44],
        maxTags: 20
    });
</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $location = $_POST['location'];
    $keywords = $_POST['keywords'];

    // $product_img = $_FILES['product_img']['name'];
    // $fileTmpName = $_FILES['product_img']['tmp_name'];
    // $fileSize = $_FILES['product_img']['size'];
    // $fileError = $_FILES['product_img']['error'];
    // $fileType = $_FILES['product_img']['type'];

    // $fileExt = explode('.', $product_img);
    // $fileActualExt = strtolower(end($fileExt));

    // $allowed = array('png', 'jpeg', 'jpg');

    // if(in_array($fileActualExt, $allowed)){
    //     if($fileError === 0){
    //         if($fileSize < 1000000 ){
    //             $fileNameNew = uniqid('', true).".".$fileActualExt;
    //             $fileDestination = '../Images/product_images/'.$fileNameNew;
    //             move_uploaded_file($fileTmpName, $fileDestination);
    //         }else{
    //             echo "Your file is too large";
    //         }
    //     }else{
    //         echo "There was an error uploading your file!";
    //     }
    // }else{
    //     echo "You cannot upload of this type!";
    // }



    //Update from database
    
    $update_product = "update products set cat_id='$product_cat',p_title='$product_title',p_desc='$product_desc',p_price='$product_price',location='$location',keywords='$keywords' where id='$p_id'";
    
    $run_product = mysqli_query($conn,$update_product);
    
    if($run_product){
        
       echo "<script>alert('Your product has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_products','_self')</script>"; 
        
    }
    
}

?>
<?php }; ?>