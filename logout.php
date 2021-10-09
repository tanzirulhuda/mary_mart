<?php 
if(isset($_COOKIE['current_user_auth_key'])){

    setcookie("current_user_auth_key","",time()-(86400*1));
    
    header('location: index.php');
}

?>