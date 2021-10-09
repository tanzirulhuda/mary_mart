<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Slide
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Slide
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide heading
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="slide_heading" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                        Slide sub-heading
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input name="slide_sub_heading" type="text" class="form-control">
                    
                    </div><!-- col-md-6 finish -->
                
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="slide_image" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['submit'])){
        
        $slide_heading = $_POST['slide_heading'];
        $slide_sub_heading = $_POST['slide_sub_heading'];
        
        $slide_image = $_FILES['slide_image']['name'];        
        $fileTmpName = $_FILES['slide_image']['tmp_name']; 
        $fileError = $_FILES['slide_image']['error'];
        $fileType = $_FILES['slide_image']['type'];

        $fileExt = explode('.', $slide_image);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('png', 'jpeg', 'jpg');

        //View slides
        $view_slides = "select * from slider";        
        $view_run_slide = mysqli_query($conn,$view_slides);       
        $count = mysqli_num_rows($view_run_slide);  

        //Condition to upload file
        if($count<4){   
            
            
            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = '../Images/slides_image/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                }else{
                    echo "There was an error uploading your file!";
                }
            }else{
                echo "You cannot upload of this type!";
            }          
            //Insert into database
            $insert_slide = "insert into slider (slide_heading,sub_heading,slide_image) values ('$slide_heading','$slide_sub_heading','$fileNameNew')";            
            $run_slide = mysqli_query($conn,$insert_slide);            
            echo "<script>alert('Your new slide image has been inserted')</script>";           
            echo "<script>window.open('index.php?view_slides','_self')</script>";
            
        }else{
            
           echo "<script>alert('You have already inserted 4 slides')</script>"; 
            
        }
        
    }

?>

<?php } ?>