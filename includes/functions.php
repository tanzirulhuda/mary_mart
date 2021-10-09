<?php
//Database connection
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "mary_mart";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
//Get RealIpUser
function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}
// Add to cart
function add_cart(){
    
    global $conn;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($conn,$check_product);
        
        if(mysqli_num_rows($run_check)>0){          
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";         
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty) values ('$p_id','$ip_add','$product_qty')";           
            $run_query = mysqli_query($conn,$query);
            echo "<script>window.open('index.php','_self')</script>";
            
        }
        
    }
    
}
//Count cart item
function items(){
    global $conn;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($conn,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
}
//Random String Genarator
function generateRandomString($length = 50) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



?>