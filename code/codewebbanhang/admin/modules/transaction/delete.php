<?php
    $open = "transaction";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
   $id = intval(getInput('id')); // ep kieu
   
   $EditTS = $db->fetchID("transaction", $id);
   //Neu Id khong co thi tra ve index
   if(empty($EditTS))
   {
       $_SESSION['error']= "Dữ liệu không tồn tại";
       redirectAdmin("transaction");
   }
   
   $num= $db->delete("transaction",$id);
   if($num > 0)
   {
       $_SESSION['success']= "Xóa thành công!";
               //Quay tro lai trang product
       redirectAdmin("transaction");
   }
   else
   {
       $_SESSION['error']= "Xóa dữ diệu thất bại";
       redirectAdmin("transaction");
   }
           
?>