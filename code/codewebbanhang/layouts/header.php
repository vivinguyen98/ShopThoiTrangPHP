<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?php echo base_url() ?>" />
        <title>Shop bán quần áo Nữ - Đồ án website 07DHTH </title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700&amp;subset=vietnamese" rel="stylesheet">
        <link rel="stylesheet" href="public/giaodien/css/main.css">
        <link href="/public/giaodien/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>public/giaodien/css-new/style.css" rel="stylesheet" type="text/css">
        <script src="public/ckeditor/ckeditor.js"></script>
        <script src="public/ckfinder/ckfinder.js"></script>
        <!---->
        <script  src="<?php echo base_url()?>public/giaodien/libs/bootstrap4/js/bootstrap.min.js"></script>
        <script  src="<?php echo base_url()?>public/giaodien/libs/bootstrap4/css/bootstrap.min.css"></script>
        <!--slide-->
 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
            
    <body>
        <div id="wrapper">
            <header>
                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="top-left pull-left">
                                    <p>Chào mừng bạn đến với MyShop!</p>
                                </div>
                                <div class="top-right pull-right">
                                    <div id="top-links" class="nav pull-right">
                                         <?php if(isset($_SESSION['name_user'])): ?>
                                    <ul class="list-inline">    
                                        <span class="caret"><li style="color: white">Xin chào :  <?php echo $_SESSION['name_user'] ?></li>
                                            <li></span>
                                                <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                            <li>
                                    </ul>            
                                               

                                                <?php else: ?>
                                            <ul class="list-inline">
                                            <li class="dropdown">
                                                <a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <span>Tài khoản</span>   
                                                     </a>      
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="dang-ky.php">Đăng ký</a></li>
                                                    <li><a href="/codewebbanhang/login/index.php?">Đăng nhập admin</a></li>
													<li><a href="dang-nhap.php">Đăng nhập user </a></li>
                                                </ul>
                                            </li>
                                            
                                            <?php endif ?>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="center-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 mobile-style">
                                <div class="logo">
                                    <a href="<?php echo base_url(); ?>"><img src="public/giaodien/images/logoweb.png" alt="Đồ án website bán hàng" style="height: 75px;"></a>
                                    <h1>Sản phẩm</h1>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 mobile-style push-deskop6">
                                <div class="box-cart pull-right">
                                    <a href="gio-hang.php"><span id="cart-total"><span>Giỏ hàng</span><br> - </span></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 pull-deskop6">
                                
                                    <form action="timkiem.php" method="GET" role="form">
                                        <input type="text" class="input-text" name="ketqua" id="ketqua" placeholder="Tìm kiếm sản phẩm">
                                        <button type="submit" class="button-search" >Tìm kiếm</button>
                                        <div class="clear"></div>
                                    </form>

                                



                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-header">
                    <div class="container">
                        <div class="menu-mobile">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="pull-left">MENU</div>
                                    <div class="pull-right click-menu"><span></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li class="active"><a href="/codewebbanhang/">Trang chủ</a></li>
                                <li><a href="/codewebbanhang/baiviet.php?id=7">Giới thiệu</a></li>
                                <li><a href="/codewebbanhang/chuyenmuc.php?id=1">Tin tức</a></li>
                                <li><a href="/codewebbanhang/chuyenmuc.php?id=2">Dịch vụ</a></li>
                                <li><a href="/codewebbanhang/baiviet.php?id=8">Tuyển dụng</a></li>
                                <li><a href="/codewebbanhang/baiviet.php?id=10">Liên hệ</a></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
   </header>

   






