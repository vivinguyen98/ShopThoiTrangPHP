
<?php 
    
    require_once __DIR__ ."/autoload/autoload.php";
    if(isset($_SESSION['name_id']))
    {
        echo "<script> alert('Bạn đã có tài khoản trên hệ thống!');' </script>";
    }
    //ket noi database
	else
	{
		echo "<script> alert('Bạn cần có một tài khoản trên hệ thống!'); location.href='index.php' </script>";
	}
    $user = $db->fetchID("users", intval($_SESSION['name_id']));
   ;?>
	<?php require_once __DIR__ ."/layouts/header.php"; ?>


                    <div class="col-md-9">
                        <section class="box-main1">
                            <h3 class="title-main" ><a href=""> Thông tin tài khoản </a> </h3>         
                              <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Tên thành viên</label>
                                    <div class="col-md-8">
                                        <input type="text" name="vname" readonly=true class="form-control" value="<?php echo $user['name'] ?>">

                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" readonly=true class="form-control" value="<?php echo $user['email'] ?>">
                                       
                                    </div>
                                </div>
                                
                            
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Số điện thoại </label>
                                    <div class="col-md-8">
                                        <input type="number"name="phone" readonly=true class="form-control" value="<?php echo $user['phone'] ?>">
                                        
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Địa chỉ </label>
                                    <div class="col-md-8">
                                        <input type="text"name="address" readonly=true class="form-control" value="<?php echo $user['address'] ?>">
                                        
                                    </div>
                                </div>                               
                                
                            </form>
                            
                        </section>
                    </div>
</div></div></div></div></div></div>
                    

<?php require_once __DIR__ ."/layouts/footer.php"; ?>