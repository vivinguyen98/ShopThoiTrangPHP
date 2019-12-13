<?php 

    require_once __DIR__ ."/autoload/autoload.php"; 
   
    //unset($_SESSION['cart']);
     
    $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY id";
    $CategoryHome = $db->fetchsql($sqlHomecate);
    
    $data = [];
    
    foreach ($CategoryHome as $item)
    {
     
        //ep kieu 
        $cateId = intval($item['id']);
        //Loc ra
        $sql = "SELECT * FROM product WHERE category_id = $cateId ORDER BY ID DESC LIMIT 5"; //LIMIT = số lượng sp muốn hiển thị
        $ProductHome = $db->fetchsql($sql);
     
        // mang 2 chieu
        $data[$item['name']] =$ProductHome; 
       
    }


    //Tin tức
    $sqlTintucTo = 'SELECT * FROM tintuc ORDER BY ID DESC LIMIT 1';
    $sqlTintucBe = 'SELECT * FROM tintuc ORDER BY ID DESC LIMIT 1,3';
    $tintuc = $db->fetchsql($sqlTintucTo);
    $tintuc1 = $db->fetchsql($sqlTintucBe);
?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>

      <div id="content">
        <div class="top-content">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <?php require_once __DIR__ ."/layouts/mega-menu.php"; ?>  
                <!---kéo mega-menu vào -->
              </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <?php require_once __DIR__ ."/layouts/slider.php"; ?>
              </div>
            </div>
          </div>
        </div>

<div class="list-product">
    <?php foreach ($data as $key => $value):?>
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"><?php echo $key?></a>
            </li>
        </ul>
        <div class="block-product">
            <div class="rew">
                <?php foreach ($value as $item):?>
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
                            <a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i> Mua ngay</a>
                        </div>
                    </div>
                </div>
               <?php endforeach; ?>  
             <div class="clear"></div>
           </div>  

        </div>

    </div>
    <?php endforeach; ?> 
</div>
<!---Phần tin tức --->
<div class="list-product news">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <div class="post-news">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active">Tin tức</a>
                                        </li>
                                    </ul>
                                    <div class="row">
                                       
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                             <?php foreach ($tintuc as $item): ?>
                                            <div class="post-one">
                                                <a href="bai-viet/<?php echo $item['id']?>-<?php echo $item['slug'] ?>.html"><img src="<?php echo uploads();?>tintuc/<?php echo $item['thunbar']; ?>" alt="<?php echo $item['name']?>" style="height: 200px;"></a>
                                                <h4><a href="bai-viet/<?php echo $item['id']?>-<?php echo $item['slug'] ?>.html"><?php echo $item['name'] ?></a></h4>
                                                <div class="meta">
                                                    <span>Ngày đăng: 04/11/2019</span>
                                                    <span>Lượt xem: <?php echo $item['view'];?></span>
                                                </div>
                                                <p><?php echo rutgonduc_text($item['content']); ?></p>
                                            </div>
                                        <?php endforeach?>  
                                        </div>
                                        

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                            <div class="list-news">
                                                <ul>
                                                        <?php foreach ($tintuc1 as $item): ?>
                                                    <li>
                                                        <a href="bai-viet/<?php echo $item['id']?>-<?php echo $item['slug'] ?>.html"><img src="<?php echo uploads();?>tintuc/<?php echo $item['thunbar']; ?>" alt="<?php echo $item['name']?>"></a>
                                                        <h4><a href="bai-viet/<?php echo $item['id']?>-<?php echo $item['slug'] ?>.html"><?php echo $item['name'] ?></a></h4>
                                                        <div class="date">14-12-2019</div>
                                                        <div class="clear"></div>
                                                    </li>
                                                        <?php endforeach?>        
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-----Đánh giá khách hàng --->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="review-home">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active">Đánh giá khách hàng</a>
                                        </li>
                                    </ul>
                                    <div class="content-review">
                                        <div class="owl-carousel owl-theme">
                                            <div class="item">
                                                <p>
                                                    "Quần áo ở đây thật là đẹp và tôi rất thích mua những bộ quần áo ở đây vì nó rất là đẹp!"
                                                </p>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="menber">
                                                    <img src="public/uploads/product/quan-kaki.jpg" alt="">
                                                    <h3>-Nguyễn Ngân-</h3>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <p>
                                                    "Áo khoác đẹp, chất liệu tốt, giao hàng nhanh."
                                                </p>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="menber">
                                                    <img src="public/uploads/product/ao-khoac-kaki.jpg" alt="">
                                                    <h3>-Anh Thi-</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!---Thương hiệu --->
<!---The end--->

<?php require_once __DIR__ ."/layouts/footer.php"; ?>