<?php 
    ini_set('display_errors', 'off'); // hihi
     $open = "transaction";
    require_once __DIR__ ."/autoload/autoload.php";
    $user = $db->fetchID("users", intval($_SESSION['name_id']));
    
     if($_SERVER["REQUEST_METHOD"] == "POST")
    {
		
        $data=
        [
            'amount'  => $_SESSION['total'],
            'vname' => postInput('vname'),
            'note'    => postInput("note"),
            'phone'    => postInput("phone"),
            'address' => postInput('address'),
        ];
        $idtran = $db-> insert("transaction", $data);
        if($idtran > 0)
        {
            foreach ($_SESSION['cart'] as $key => $value) {
                $data2 = 
                       [
                           'transaction_id'  => $idtran,
                           'product_id'      => $key,
                           'qty'             => $value['qty'],//so luong
                           'price'           => $value['price'] // gia
                       ];
                       $id_insert = $db->insert("orders", $data2);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            $_SESSION['success'] = "Lưu thông tin đơn hàng thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất!";
            header("location:thong-bao.php");
        }   
    }
        

?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>


                    <div class="col-md-9">
                        <section class="box-main1">
                            <h3 class="title-main" ><a href=""> Thanh toán đơn hàng </a> </h3>         
                              <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Tên thành viên</label>
                                    <div class="col-md-8">
                                        <input type="text" name="vname" placeholder="Nguyễn Phạm Tường Vi" class="form-control" value="<?php echo $user['name'] ?>">

                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" placeholder="abc@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">
                                       
                                    </div>
                                </div>
                                
                            
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Số điện thoại </label>
                                    <div class="col-md-8">
                                        <input type="number"name="phone" placeholder="0969641652" class="form-control" value="<?php echo $user['phone'] ?>">
                                        
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Địa chỉ </label>
                                    <div class="col-md-8">
                                        <input type="text"name="address" placeholder="TPHCM" class="form-control" value="<?php echo $user['address'] ?>">
                                        
                                    </div>
                                </div>                               

                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Số tiền</label>
                                    <div class="col-md-8">
                                        <input type="text" name="amount" class="form-control" value="<?php echo formatPrice($_SESSION['total'])  ?>">
                                         
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1">Ghi chú</label>
                                    <div class="col-md-8">
                                        <input type="text"   name="note" placeholder="Giao hàng tận nơi" class="form-control" value="">
                                         
                                    </div>
                                </div>
                                   <div> 
                                <!----đang ngâm cứu -
                                <a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=phamminhduc17@gmail.com&product_name=<?php echo $data2['product_id']; ?>&price=<?php echo $dat['price']?>&return_url=/thong-bao.php&comments=<?php echo $data['note']?>">
                                    <img src="https://www.nganluong.vn/css/newhome/img/button/pay-lg.png"border="0" />
                                </a>-->


                                
                                <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Xác nhận</button>
                            </form>
                            
                        </section>
                    </div>
</div></div></div></div></div></div>
                    

<?php require_once __DIR__ ."/layouts/footer.php"; ?>