<?php 

    session_start();
    unset($_SESSION['admin_user']);//loại bỏ 
    unset($_SESSION['admin_id']);
    
    header("location: index.php");
?> 