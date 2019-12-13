<?php
    session_start();
    require_once __DIR__ ."/../../md-config/Database.php";
    require_once __DIR__ ."/../../md-config/Function.php";
    $db= new Database();

    if(! isset($_SESSION['admin_id']))
    {
    	header("location: /login/");
    }

    
    
    define("ROOT", $_SERVER['DOCUMENT_ROOT']."/public/uploads/"); //lưu file upload vào 
   
?>