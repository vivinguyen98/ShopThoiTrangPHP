<?php 
    require_once __DIR__ ."/autoload/autoload.php";
    // $open = "product";
    
    $id = intval(getInput('id'));
    $view = intval(getInput('view'));

    
    //chi tiet san pham
    $tintuc = $db->fetchID("tintuc", $id);
    
     //Lay danh muc san pham lien quan
    $cateid = intval($tintuc['chuyenmuc_id']);
    
    $sql = "SELECT * FROM tintuc WHERE chuyenmuc_id = $cateid ORDER BY ID DESC LIMIT 6";
    $ttlienquan = $db->fetchsql($sql);

//if (is_numeric($_GET["id"]))
//$id=$_GET["id"];
//$cookieName='article_'.$id;
//if(!isset($_COOKIE["$cookieName"]))
//{
//setcookie("$cookieName","1",time()+10);
//mysqli_query("UPDATE tintuc SET view = view + 1 WHERE id=" .$id );
//}


?>
<?php require_once __DIR__ ."/layouts/header.php"; ?>

<!-------------->
<div class="bread">
                <div class="container">
                    <p id="breadcrumbs"><i class="fa fa-home"></i> <span><span><a href="/codewebbanhang/index.php?">Trang chủ</a> <span><i class="fa fa-angle-double-right"></i> <span class="breadcrumb_last">
                        <?php echo $tintuc['name'];?>
                        </span></span></span></span></p>  
                </div>
</div>
<!-------------->

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="child-page">
                    <div class="category-product">
                        <div class="single-news">
                            <h1><?php echo $tintuc['name'];?></h1>
                            <div class="meta">
                                
                                <span>Lượt xem: <?php echo $tintuc['view']; ?></span>
                                
                            </div>
                            <article class="post-content">
                               <?php echo $tintuc['content'] ?>
                            </article>
                            <div class="share-ico">
                                <span class="like">
                                   <!-----share mxh------>
                                </span>
                            </div>
                            <div class="tags"> 
                                <span><i class="fa fa-tags"></i> Từ khóa: </span>
                                <a href="#" rel="tag">code</a>, <a href="#" rel="tag">web</a> , <a href="#" rel="tag">đồ án</a>  , <a href="#" rel="tag">07DHTH</a>                         
                            </div>
                            <div class="cmt-fb">
                                <!---binh luan face----->
                            </div>
                        </div>
                        <div class="rel-post">
                            <h3><span><i class="fa fa-globe"></i>Bài viết liên quan</span></h3>
                            <div class="content-rel">
                                <div class="row">
                                     <!-------->
                                    <?php foreach ($ttlienquan as $item):?>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                        <div class="detail-post-news">
                                            <a href="bai-viet/<?php echo $item['id'];?>-<?php echo $item['slug']?>.html">
                                            <img src="<?php echo uploads();?>tintuc/<?php echo $item['thunbar']; ?>" alt="<?php echo $item['name'] ?>" alt="<?php echo $item['name'] ?>">
                                            </a>
                                            <h4><a href="bai-viet/<?php echo $item['id'];?>-<?php echo $item['slug']?>.html"><?php echo $item['name'] ?></a></h4>
                                            <div class="meta">
                                                <span>Ngày đăng: 31-04-2019</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>  
                                    <!-------->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <?php include 'layouts/sidebar.php';?>
                </div>
            </div>
        </div>
    </div>
</div>









<?php require_once __DIR__ ."/layouts/footer.php"; ?>
