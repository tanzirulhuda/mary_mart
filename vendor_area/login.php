<?php 

    session_start();
    include("../db/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Vendor Area</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Vendor Login </h2>

           <input type="text" class="form-control" placeholder="Email Address" name="email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="vendor_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>


<?php 

    if(isset($_POST['vendor_login'])){
        
        $vendor_email = mysqli_real_escape_string($conn,$_POST['email']);
        
        $vendor_pass = mysqli_real_escape_string($conn,$_POST['pass']);
        
        $get_vendor = "select * from vendors where email='$vendor_email' AND password='$vendor_pass'";
        
        $run_vendor = mysqli_query($conn,$get_vendor);
        
        $count = mysqli_num_rows($run_vendor);
        
        if($count==1){
            
            $_SESSION['vendor_email']=$vendor_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            header("location: ./login.php?action=failed");
            // echo "<script>alert('Email or Password is Wrong !')</script>";
            
        }
        
    }

?>