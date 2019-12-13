<?php 

    require_once __DIR__ ."/autoload/autoload.php";
    
    $id = intval(getInput('id')); //lấy id
    $EditCategory = $db->fetchID("category", $id);
   
   //Neu Id khong co thi tra ve index
    if(isset($_GET['p']))
    {
        $p=$_GET['p'];
    }
    else
    {
        $p = 1;
    }
    
    $sql = "SELECT * FROM product WHERE category_id = $id"; //lấy tất cả danh mục sp
    $total = count($db->fetchsql($sql)); //tong so bản ghi
    $product = $db->fetchJones('product', $sql, $total, $p, 4, true); //true = phân trang,ngược lại
    $sotrang = $product['page'];
    unset($product['page']);
   
    
    $path = $_SERVER['SCRIPT_NAME'];

?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>

<div class="bread">
        <div class="container">
          <p id="breadcrumbs"><i class="fa fa-home"></i> <span><span>
            <a href="<?php echo base_url(); ?>">Trang chủ</a> 
            <i class="fa fa-angle-double-right"></i> 
            <span><a href="">Sản phẩm</a> <i class="fa fa-angle-double-right"></i> <span class="breadcrumb_last"><?php echo $EditCategory['name']?>
              
            </span></span></span></span></p> 
        </div>
</div>


<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                
                <?php include 'layouts/sidebar.php'?>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="child-page">
                    <h1 class="title-cat">
                        <span><?php echo $EditCategory['name']?></span>
                    </h1>

                    <div class="category-product">
                        <div class="top-pro-list">
                            <div class="woocommerce-notices-wrapper"></div>
                            <p class="woocommerce-result-count">
                                Xem tất cả <?php echo $total; ?> kết quả 
                            </p>
                            <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby">
                                    <option value="menu_order" selected="selected">Thứ tự mặc định</option>
                                    <option value="popularity">Phổ biến nhất</option>
                                    <option value="rating">Đánh giá cao nhất</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price">Giá thấp đến cao</option>
                                    <option value="price-desc">Giá cao xuống thấp</option>
                                </select>
                                <input type="hidden" name="paged" value="1">
                            </form>
                            <div class="clear"></div>
                        </div>
                        <div class="rew">
                           <?php foreach ($product as $item): ?>
                            <div class="list-pro">
                                <div class="detail-pro" style="height: 304.75px;">
                                    <div class="post-img">
                                        <a href="san-pham/<?php echo $item['id']; ?>-<?php echo $item['slug'] ?>.html">
                                        <img src="<?php echo uploads();?>product/<?php echo $item['thunbar']; ?>" alt="<?php echo $item['name'] ?>" style="height: 195.75px;">
                                        </a>
                                        <div class="detail-mask">
                                            <div class="button">
                                                <a href="san-pham/<?php echo $item['id']; ?>-<?php echo $item['slug'] ?>.html"><i class="fa fa-link"></i></a>
                                                <a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="san-pham/<?php echo $item['id']; ?>-<?php echo $item['slug'] ?>.html"><?php echo $item['name'];?></a>
                                    </h4>
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
                                        <a href="addcart.php?id=<?php echo $item['id'] ?>">
                                        <i class="fa fa-shopping-basket"></i> Mua ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?> 

                        <div class="clear"></div>

                                    <!--phan trang--->
                                <div class="clear"></div>
                                <div class="dev-pt">
                                    <ul class="dev-mpt">
                                      <?php for ($i=1; $i <= $sotrang; $i++) :?>
                                        <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id?>&&p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                                          <?php endfor ; ?>
                                    </ul>
                                </div>
                                <!--end phan trang--->
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
                
         
<?php require_once __DIR__ ."/layouts/footer.php"; ?>