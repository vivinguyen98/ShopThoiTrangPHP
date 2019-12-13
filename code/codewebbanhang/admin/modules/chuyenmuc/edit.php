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
   if($_SERVER["REQUEST_METHOD"]== "POST")
   {  
       $data =
       [
           "name" => postInput('name'),
           //Chuyen thanh khong dau , cach thanh -
           "slug" =>  to_slug(postInput("name"))
       ];
       
       $error = [];
       
       if(postInput('name') == '')
       {
           $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
       }
       // Trống có nghĩa là không có lỗi
       if(empty($error))
       {
           // Kiem tra ten danh muc cap nhat
           if($EditChuyenmuc['name'] !=$data['name'])
           {
               $isset = $db->fetchOne("chuyenmuc", "name='".$data['name']."'");
           
                if(count($isset)>0)
                {
                    $_SESSION['error']="Tên  đã tồn tại!";

                }
                else
                {
                     $id_update = $db->update("chuyenmuc",$data,array("id"=>$id));
                     if($id_update > 0)
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
                }       
           }
           else
           {
            $id_update = $db->update("chuyenmuc",$data,array("id"=>$id));
                     if($id_update > 0)
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
           }
           
       }
   }   
    
    
?>

<?php require_once __DIR__ ."/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Sửa chuyên mục
                               
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                                </li>
                                <li>
                                    <i></i> <a href="">Chuyên mục</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Cập nhật
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!-- Thong bao loi -->
                            <?php require_once __DIR__ ."/../../../partials/notification.php"; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Tên chuyên mục</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputEmail3" placeholder="Tên chuyên mục" name="name" value="<?php echo $EditChuyenmuc['name'] ?>">
                                  <?php if (isset($error['name'])): ?>
                                  <p class="text-danger"><?php echo $error['name']; ?></p> 
                                  <?php endif ?>
                                 
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Lưu</button>
                              </div>
                            </div>
                            </form>
                        </div>
                    </div>
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>
 