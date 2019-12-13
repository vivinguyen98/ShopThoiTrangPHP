<?php 
    require_once __DIR__ ."/autoload/autoload.php";
    // $open = "product";
    
    $id = intval(getInput('id'));
   // $slug = postInput('slug');
    
    //chi tiet san pham
    $product = $db->fetchID("product", $id);
    
     //Lay danh muc san pham lien quan
    $cateid = intval($product['category_id']);
    
    $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 5";
    $spkemtheo = $db->fetchsql($sql);
    
    
    
    ?>
<?php require_once __DIR__ ."/layouts/header.php"; ?>

<!-------breadcrumbs--------->
<div class="bread">
        <div class="container">
          <p id="breadcrumbs"><i class="fa fa-home"></i> <span><span>
            <a href="<?php echo base_url(); ?>">Trang chủ</a> 
            <i class="fa fa-angle-double-right"></i> 
            <span><a href="">Sản phẩm</a> <i class="fa fa-angle-double-right"></i> <span class="breadcrumb_last"><?php echo $product['name']?>
              
            </span></span></span></span></p> 
        </div>
</div>

<!-------Nội dung--------->
<div id="content">
    <div class="container">
        <div class="detail-product">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="images-product">
                        <div class="levante">
                            <div class="big-imgsss">
                                <div style="height:496px;width:521px;" class="zoomWrapper"><img id="img_01" width="500" height="500" data-zoom-image="<?php echo uploads()?>product/<?php echo $product['thunbar']?>" src="<?php echo uploads()?>product/<?php echo $product['thunbar']?>" alt="<?php echo $product['name']?>" style="position: absolute;"></div>
                            </div>
                            <div id="gal1sss">
                                <a data-image="<?php echo uploads()?>product/<?php echo $product['thunbar']?>" data-zoom-image="<?php echo uploads()?>product/<?php echo $product['thunbar']?>">
                                <img id="img_01" src="<?php echo uploads()?>product/<?php echo $product['thunbar']?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="info-product">
                        <h1 class="title-product">
                            <h4><?php echo $product['name']?></h4>
                        </h1>
                        <div class="star">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="meta-post">
                            <!-----Nếu Sale > 0 thì in ra 2 giá , ngược lại------>
                            <?php if($product['sale'] > 0): ?> 
                            <span class="price"><?php echo formatpricesale($product['price'], $product['sale'])?></span>
                            <span class="price-old"><?php echo formatPrice($product['price'])?></span>
                        </div>
                        <?php  else: ?>
                        <span class="price"><?php echo formatPrice($product['price'])?></span>
                        <?php endif ?>
                        <div class="decs-info">
                            <h4>Mô tả</h4>
                            <p><?php echo $product['info'];?></p>
                        </div>
                        
                        <?php require_once __DIR__ ."/layouts/info-lh.php"; ?>
                        
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
							 <div class="add-to-cart">
                                <button type="button" class="btn btn-success"><a href="addcart.php?id=<?php echo $id ?>" style="color: white;"> <i class="fa fa-shopping-basket"></i> &nbsp; Thêm vào giỏ hàng</a><br></button>
                            </div>
							</div>
                            
                            <div class="call-in">
                                <span><p>Gọi <a href="tel:0819192955">0819192955</a></span> để được tư vấn (miễn phí cuộc gọi)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="content-post-detail">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Chi tiết sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bình luận</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="product-common">
                                <article class="post-content">
                                    <p style="display: block;"><?php echo $product['content'] ?></p>
                                </article>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" style="opacity: 1; overflow: visible;">
                            <div class="product-common">
                                <div class="cmt">
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=834475223396731&autoLogAppEvents=1';
                                        fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>
                                    <div class="fb-comments" data-href="<?php echo base_url();?>chi-tiet-san-pham.php?id=<?php echo $item['id']?>" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                    
                    <?php include 'layouts/sidebar.php'?>

                  </div>
                </div>
                </div>
                <style>
                    #content .sidebar .widget h3 {
                    background: #2196F3;
                    font-size: 16px;
                    line-height: inherit;
                    position: relative;
                    }
                    #content .sidebar .widget h3 span {
                    font-size: 14px;
                    font-weight: 400;
                    color: #fff;
                    display: inline-block;
                    text-transform: uppercase;
                    padding: 8px 50px;
                    }
                    #content .sidebar .widget .content-w.content-contact p .fa {
                    color: #2196F3;
                    width: 20px;
                    }
                </style>
          
    

<div class="list-product">
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active">Sản phẩm liên quan</a>
            </li>
        </ul>
        <div class="block-product">
            <div class="rew">
                <?php foreach ($spkemtheo as $item):?>
                <div class="list-pro">
                    <div class="detail-pro">
                        <div class="post-img">
                            <span class="new">Mới</span>
                            <img src="<?php echo uploads()?>product/<?php echo $item['thunbar']?>">
                            <div class="detail-mask">
                                <div class="button">
                                    <a href="san-pham/<?php echo $item['id']?>-<?php echo $item['slug']?>.html"><i class="fa fa-link"></i></a>
                                    <a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <h4><a href="san-pham/<?php echo $item['id']?>-<?php echo $item['slug']?>.html"><?php echo $item['name']?></a></h4>
                        <div class="meta-post">
                            <!-----Nếu Sale > 0 thì in ra 2 giá , ngược lại------>
                            <?php if($item['sale'] > 0): ?> 
                            <span class="price"><?php echo formatpricesale($item['price'], $item['sale'])?></span>
                            <span class="price-old"><?php echo formatPrice($item['price'])?></span>
                        </div>
                        <?php  else :?>
                        <span class="price"><?php echo formatPrice($item['price'])?></span>
                    </div>
                    <?php endif ?>
                    <div class="add-to-cart">
                       <a href="addcart.php?id=<?php echo $item['id'] ?><i class="fa fa-shopping-basket"></i> Mua ngay</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>  
            <div class="clear"></div>
        </div>
    </div>
</div>
</div></div></div></div></div>
<?php require_once __DIR__ ."/layouts/footer.php"; ?>