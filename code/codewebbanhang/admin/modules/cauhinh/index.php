<?php
  //  $open="cauhinh";
    require_once __DIR__. "/../../autoload/autoload.php" ;

    $cauhinh = if(isset($_POST['ok.a.duc'])){
        $email = $address = $phone = $title = $mota = $keyword = "";  
       
       if($_POST['txtemail'] == NULL){
          echo "Vui lòng nhập địa chỉ email";
       }else{
          $name = $_POST['txtemail']; 
       }
       if($_POST['txtaddress'] == NULL){
          echo "Vui lòng nhập địa chỉ";
       }else{
          $name = $_POST['txtaddress']; 
       }
       if($_POST['txtphone'] == NULL){
          echo "Vui lòng nhập số điện thoại";
       }else{
          $name = $_POST['txtphone']; 
       }
       if($_POST['txttitle'] == NULL){
          echo "Vui lòng nhập title";
       }else{
          $name = $_POST['txttitle']; 
       }
       if($_POST['txtmota'] == NULL){
          echo "Vui lòng nhập mô tả";
       }else{
          $name = $_POST['txtmota']; 
       }
       if($_POST['txtkeyword'] == NULL){
          echo "Vui lòng nhập từ khóa";
       }else{
          $name = $_POST['txtkeyword']; 
       }
       if($email && $address && $phone && $keyword &&$mota &&$title ){
          
          echo $address."<br/>";
          echo $email."<br/>";
          echo $phone."<br/>";
          echo $title."<br/>";
          echo $mota."<br/>";
          echo $keyword."<br/>";
       }
    }
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading -->

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">


            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" name="txttitle"
                    value="<?php if(isset($_POST['txttitle']) && $_POST['txttitle'] != NULL){ echo $_POST['txttitle']; } ?>">
                 </div>
            </div>


            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" size='40' name="txtmota"
                    value="<?php if(isset($_POST['txtmota']) && $_POST['txtmota'] != NULL){ echo $_POST['txtmota']; } ?>">
                 </div>
            </div>



            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Keyword</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" name="txtkeyword"
                    value="<?php if(isset($_POST['txtkeyword']) && $_POST['txtkeyword'] != NULL){ echo $_POST['txtkeyword']; } ?>">
                 </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Hotline</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" name="txtphone"
                    value="<?php if(isset($_POST['txtphone']) && $_POST['txtphone'] != NULL){ echo $_POST['txtphone']; } ?>">
                 </div>
            </div>


             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" name="txtemail"
                    value="<?php if(isset($_POST['txtemail']) && $_POST['txtemail'] != NULL){ echo $_POST['txtemail']; } ?>">
                 </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" name="txtaddress"
                    value="<?php if(isset($_POST['txtaddress']) && $_POST['txtaddress'] != NULL){ echo $_POST['txtaddress']; } ?>">
                 </div>
            </div>


        <input type="submit" value="Lưu lại nhé " name="ok.a.duc"  />
        </form>
    </div>
</div>            



  




<?php require_once __DIR__. "/../../layouts/footer.php"; ?>