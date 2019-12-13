<?php
    session_start();
    require_once __DIR__ ."/../md-config/Database.php";
    require_once __DIR__ ."/../md-config/Function.php";
    $db= new Database();
    
    define("ROOT", $_SERVER['DOCUMENT_ROOT']."/public/uploads/");
    
    
    //Loai danh muc - fronend
    $category = $db->fetchAll("category");
    $chuyenmuc = $db->fetchAll("chuyenmuc");
    
    
    //San pham moi nhat
    $sqlNew= "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 5";
    $productNew= $db->fetchsql($sqlNew);
    
    //San pham ban chay
    $sqlPay =  "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 5";
    $productPay = $db->fetchsql($sqlPay);

    $sqlNew= "SELECT * FROM tintuc WHERE 1 ORDER BY ID DESC LIMIT 5";
    $tintucNew= $db->fetchsql($sqlNew);
    
?>