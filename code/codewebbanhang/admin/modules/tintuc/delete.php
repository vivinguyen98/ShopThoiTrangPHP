<?php
    $open = "chuyenmuc";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
   $id = intval(getInput('id')); // ep kieu
   
   $EditProduct = $db->fetchID("tintuc", $id);
   //Neu Id khong co thi tra ve index
   if(empty($EditProduct))
   {
       $_SESSION['error']= "Dữ liệu không tồn tại";
       redirectAdmin("tintuc");
   }
   
   $num= $db->delete("tintuc",$id);
   if($num > 0)
   {
       $_SESSION['success']= "Xóa thành công!";
               //Quay tro lai trang product
       redirectAdmin("tintuc");
   }
   else
   {
       $_SESSION['error']= "Xóa dữ diệu thất bại";
       redirectAdmin("tintuc");
   }
           
?>