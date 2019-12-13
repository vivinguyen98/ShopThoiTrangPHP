<?php 
    $open = "chuyenmuc";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
   $id = intval(getInput('id')); // ep kieu
   $EditChuyenmuc = $db->fetchID("chuyenmuc", $id);
   
   //Neu Id khong co thi tra ve index
   if(empty($EditChuyenmuc))
   {
       $_SESSION['error']= "Dữ liệu không tồn tại";
       redirectAdmin("chuyenmuc");
   }
   
   $home = $EditChuyenmuc['home'] == 0 ? 1 : 0;
   $update = $db->update("chuyenmuc",array("home"=>$home), array("id"=>$id));
   
   if($update > 0)
   {
        $_SESSION['success']= "Cập nhật thành công!";
                             //Quay tro lai trang chuyenmuc
        redirectAdmin("chuyenmuc");
    }
    else
    {
       //Them that bai
        $_SESSION['error']= "Dữ liệu không thay đổi";
        redirectAdmin("chuyenmuc");                  
    }                 
?>