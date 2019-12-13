<?php 

    require_once __DIR__ ."/autoload/autoload.php";
    $id = intval(getInput('id')); //lấy id
    $EditChuyenmuc = $db->fetchID("chuyenmuc", $id);

   
   //Neu Id khong co thi tra ve index
    if(isset($_GET['p']))
    {
        $p=$_GET['p'];
    }
    else
    {
        $p = 1;
    }
    
    $sql = "SELECT * FROM tintuc WHERE chuyenmuc_id = $id"; //lấy tất cả danh mục sp
    $total = count($db->fetchsql($sql)); //tong so bản ghi
    $tintuc = $db->fetchJones('tintuc', $sql, $total, $p, 4, true); //true = phân trang,ngược lại
    $sotrang = $tintuc['page'];
    unset($tintuc['page']);
    $path = $_SERVER['SCRIPT_NAME']; //trả về đường dẫn 
      

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

<div class="bread">
	<div class="container">
		<p id="breadcrumbs"><i class="fa fa-home"></i> <span><span><a href="/codewebbanhang/index.php?">Trang chủ</a> <i class="fa fa-angle-double-right"></i> <span class="breadcrumb_last"><?php echo $EditChuyenmuc['name']?>
			
		</span></span></span></p>	
	</div>
</div>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
				<div class="child-page">
					<h1 class="title-cat"><span><?php echo $EditChuyenmuc['name']?></span></h1>
					<div class="category-product">
						<div class="category-news">
							<?php foreach ($tintuc as $item): ?>
								<div class="list-news">
									<a href="bai-viet/<?php echo $item['id']?>-<?php echo $item['slug'] ?>.html">
										<img src="<?php echo uploads();?>tintuc/<?php echo $item['thunbar']; ?>" alt="<?php echo $item['name'] ?>">
									</a>
									<h4><a href="bai-viet/<?php echo $item['id']?>-<?php echo $item['slug'] ?>.html"><?php echo $item['name'] ?></a></h4>
									<div class="meta">
										<span>Lượt xem: <?php echo $item['view']; ?></span>
									</div>
									<p><?php echo rutgonduc_text($item['content']); ?></p>
									<div class="more"><a href="bai-viet/<?php echo $item['id']?>-<?php echo $item['slug'] ?>.html">Xem chi tiết</a></div>

									<div class="clear"></div></div>

								<?php endforeach ?> 
							</div>
									
												
								
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
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
				
			<?php include 'layouts/sidebar.php';?>
			</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ .'/layouts/footer.php' ?>
