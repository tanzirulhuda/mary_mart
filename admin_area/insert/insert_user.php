<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
    
    <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Vendor
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Vendor
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> E-mail/Phone  </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="email_phone" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="password" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> District </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input  name="district" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="contact" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Image </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="image" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Location </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea  name="location" class="form-control" rows="3"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="insert" value="Insert Vendor" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 

if(isset($_POST['insert'])){
    
    $user_name = $_POST['name'];
    $user_email = $_POST['email_phone'];
    $user_pass = $_POST['password'];
    $user_district = $_POST['district'];
    $user_contact = $_POST['contact'];
    $user_location = $_POST['location'];

    $user_image = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $user_image);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png', 'jpeg', 'jpg');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000 ){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../vendor_area/Images/profile_image/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Your file is too large";
            }
        }else{
            echo "There was an error uploading your file!";
        }
    }else{
        echo "You cannot upload of this type!";
    }
    
    $insert_user = "insert into vendors (name, email, password, image, district, location, contact) values ('$user_name','$user_email','$user_pass','$fileNameNew','$user_district','$user_location','$user_contact')";
    $run_user = mysqli_query($conn,$insert_user);
    
    if($run_user){
        
        echo "<script>alert('User has been inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
        
    }else{
        echo "<script>alert('An error occured!')</script>";
    }
    
}

?>


<?php } ?>