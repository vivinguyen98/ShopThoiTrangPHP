<?php
    require_once __DIR__ ."/autoload/autoload.php";
  
    $category= $db->fetchAll("category");
    $chuyenmuc= $db->fetchAll("chuyenmuc");

    $sql_order = "SELECT * FROM `transaction` ORDER BY `id` ASC"; //lấy tất cả các oder
    $tongdonhang = count($db->fetchsql($sql_order));
    //tong don hang
    $sql_SP = "SELECT * FROM `product` ORDER BY `ID` ASC";
    $tongsanpham = count($db->fetchsql($sql_SP));
    //tong san pham
    $sql_user = "SELECT * FROM `users`";
    $tongusers = count($db->fetchsql($sql_user));
    //tong san pham
    
?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG -->
            <div class="row">
                <div class="col-lg-12"style="text-align: center;">
                            <h3 class="page-header">
                                Xin chào <?php  echo $_SESSION['admin_name']?> đến với trang quản trị
                                
                            </h3>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $tongdonhang; ?></div>
                                        <div>Đơn Hàng !</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>/admin/modules/transaction/">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gift fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $tongsanpham; ?></div>
                                        <div>SẢN PHẨM !</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>admin/modules/product/">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gift fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $tongusers; ?></div>
                                        <div>NGƯỜI ĐĂNG KÍ !</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>admin/modules/user/">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
                    <!-- /.row -->











<!----------------Nhà sáng lập -------------------->
<div class="row" style="margin-top:10px">
    <!----N 1------>
    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 wow shake">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('https://media.giphy.com/media/10LKovKon8DENq/giphy.gif') center center;">
				<h3 class="widget-user-username"><b class="lue"><font color="black">Team Hỗ Trợ</font></b></h3>
              <h5 class="widget-user-desc"><font color="black"><b>HỖ TRỢ KHÁCH HÀNG</b></font></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://graph.facebook.com/100007300052823/picture?width=100&amp;height=100" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="col-sm-6 col-xs-6 border-right">
                  <div class="description-block">
                    <a href="https://www.facebook.com/100007300052823" target="_blank" class="btn btn-success btn-sm"><b><i class="fa fa-fw fa-facebook-square"></i> LIÊN HỆ</b>
                                        </a>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="description-block">
                    <a href="https://www.facebook.com/messages/t/100007300052823" target="_blank" class="btn btn-danger btn-sm"><b><i class="fa fa-fw fa-envelope-o"></i>
                                            HỖ TRỢ</b>
                                        </a>
                  </div>
                </div>
              </div>
    </div> </div>
    <!----end 1----->

    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 wow shake">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('https://media.giphy.com/media/10LKovKon8DENq/giphy.gif') center center;">
				<h3 class="widget-user-username"><b class="lue"><font color="black">Team Hỗ Trợ</font></b></h3>
              <h5 class="widget-user-desc"><font color="black"><b>HỖ TRỢ KHÁCH HÀNG</b></font></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://graph.facebook.com/100010272300075/picture?width=100&amp;height=100" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="col-sm-6 col-xs-6 border-right">
                  <div class="description-block">
                    <a href="https://www.facebook.com/100010272300075" target="_blank" class="btn btn-success btn-sm"><b><i class="fa fa-fw fa-facebook-square"></i> LIÊN HỆ</b>
                                        </a>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="description-block">
                    <a href="https://www.facebook.com/messages/t/100010272300075" target="_blank" class="btn btn-danger btn-sm"><b><i class="fa fa-fw fa-envelope-o"></i>
                                            HỖ TRỢ</b>
                                        </a>
                  </div>
                </div>
              </div>
    </div> </div>
    <!----end 1----->

    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 wow shake">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('https://media.giphy.com/media/10LKovKon8DENq/giphy.gif') center center;">
				<h3 class="widget-user-username"><b class="lue"><font color="black">Team Hỗ Trợ</font></b></h3>
              <h5 class="widget-user-desc"><font color="black"><b>HỖ TRỢ KHÁCH HÀNG</b></font></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://graph.facebook.com/100008944363930/picture?width=100&amp;height=100" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="col-sm-6 col-xs-6 border-right">
                  <div class="description-block">
                    <a href="https://www.facebook.com/100008944363930" target="_blank" class="btn btn-success btn-sm"><b><i class="fa fa-fw fa-facebook-square"></i> LIÊN HỆ</b>
                                        </a>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="description-block">
                    <a href="https://www.facebook.com/messages/t/100008944363930" target="_blank" class="btn btn-danger btn-sm"><b><i class="fa fa-fw fa-envelope-o"></i>
                                            HỖ TRỢ</b>
                                        </a>
                  </div>
                </div>
              </div>
    </div> </div>
    <!----end 1----->


</div> <!---end row nha sang lap---->    



<?php require_once __DIR__ ."/layouts/footer.php"; ?>
 