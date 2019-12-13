<?php
    $open = "chuyenmuc";
    require_once __DIR__ ."/../../autoload/autoload.php";

    $id = intval(getInput('id')); // ep kieu
   
   $EditTintuc = $db->fetchID("tintuc", $id);
   //Neu Id khong co thi tra ve index
   if(empty($EditTintuc))
   {
       $_SESSION['error']= "Dữ liệu không tồn tại";
       redirectAdmin("tintuc");
   }
    
    $chuyenmuc=$db->fetchAll("chuyenmuc");
   if($_SERVER["REQUEST_METHOD"]== "POST")
   {  
       $data =
       [
           "name"        =>  postInput('name'),
           //Chuyen thanh khong dau , cach thanh -
           "slug"        =>  to_slug(postInput("name")),
           "chuyenmuc_id" =>  postInput("chuyenmuc_id"),
           "content"     =>  postInput("content")
       ];
        $content = $_POST["post_content"];
       
       $error = [];
       if(postInput('chuyenmuc_id') == '')
       {
           $error['chuyenmuc_id'] = "Mời bạn chọn chuyên mục!";
       }
       if(postInput('name') == '')
       {
           $error['name'] = "Mời bạn nhập đầy đủ tên bài viết !";
       }
       
       if(postInput('content') == '')
       {
           $error['content'] = "Mời bạn nhập nội dung !";
       }
       
       
       // Trống có nghĩa là không có lỗi
       if(empty($error))
       {
           if( isset($_FILES['thunbar']))
           {
               $file_name = $_FILES['thunbar']['name'];
               $file_tmp = $_FILES['thunbar']['tmp_name'];
               $file_type = $_FILES['thunbar']['type'];
               $file_error =$_FILES['thunbar']['error'];
               
               if($file_error == 0)
               { 
                   //duong dan
                   $part = ROOT ."tintuc/";
                   $data['thunbar'] = $file_name;
               }
            }
            
            $update = $db->update("tintuc", $data,array("id"=>$id));
            if($update >0 )
            {
               move_uploaded_file($file_tmp, $part.$file_name);
               $_SESSION['success']=" Cập nhật thành công!";
               redirectAdmin("tintuc");
            }
            else
            {
                $_SESSION['error']=" Cập nhật thất bại!";
                redirectAdmin("tintuc");
            }
        }   
   }
    
?>

<?php require_once __DIR__ ."/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Chỉnh Sửa Bài viết
                                
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                                </li>
                                <li>
                                    <i></i> <a href="">Blog - tin tức</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Thêm mới
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
                            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">-Chuyên mục-</label>
                              <div class="col-sm-8">
                                  <select class="form-control col-md-8" name="chuyenmuc_id">
                                      <option values="">---Chọn chuyên mục--- </option>
                                      <?php foreach($chuyenmuc as $item): ?>
                                      <option value="<?php echo $item['id']?>" <?php echo $EditTintuc['chuyenmuc_id'] == $item['id'] 
                                              ? "selected = 'selected'" : '' ?>> <?php echo $item['name']?></option>
                                      <?php endforeach;?>
                                  </select>
                                  <?php if (isset($error['chuyenmuc'])): ?>
                                  <p class="text-danger"><?php echo $error['chuyenmuc']; ?></p> 
                                  <?php endif ?>                               
                              </div>    
                            </div> 
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Tên bài viết</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputEmail3" placeholder="Tên bài viết" name="name" value="<?php echo $EditTintuc['name']?>">
                                  <?php if (isset($error['name'])): ?>
                                  <p class="text-danger"><?php echo $error['name']; ?></p> 
                                  <?php endif ?>                               
                              </div>                            
                            </div>
                            
                       
                              <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                              <div class="col-sm-3">
                                  <input type="file" class="form-control" id="inputEmail3" name="thunbar"> 
                                  <?php if (isset($error['thunbar'])): ?>
                                  <p class="text-danger"><?php echo $error['thunbar']; ?></p> 
                                  <?php endif ?>  
                                  <img src="<?php echo uploads()?>product/<?php echo $EditTintuc['thunbar']?>" width="70px" height="50px">
                              </div>
                            </div>    
                             
                                
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
                              <div class="col-sm-8">
                                  <textarea class="form-control" name="content" rows="4"><?php echo $EditTintuc['content']?></textarea>
                                  <?php if (isset($error['content'])): ?>
                                  <p class="text-danger"><?php echo $error['content']; ?></p> 
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
 