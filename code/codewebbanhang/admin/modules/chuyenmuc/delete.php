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
   
   $is_product = $db->fetchOne("tintuc","chuyenmuc_id= $id ");
   if($is_product == NULL)
   {
        $num= $db->delete("chuyenmuc",$id);
        if($num > 0)
        {
            $_SESSION['success']= "Xóa thành công!";
                    //Quay tro lai trang chuyenmuc
            redirectAdmin("chuyenmuc");
        }
        else
        {
            $_SESSION['error']= "Xóa dữ diệu thất bại";
            redirectAdmin("chuyenmuc");
        }
   }
   else
   {
         $_SESSION['error']= "Chuyên mục có bài viết, bạn không thể xóa!";
         redirectAdmin("chuyenmuc");
   }
   
  
           
?>