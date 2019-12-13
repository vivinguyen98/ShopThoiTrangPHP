<?php
    
    $open = "tintuc";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    //truy van doi ten cot chuyenmuc name bang chu
    $sql = "SELECT tintuc.*,chuyenmuc.name as namecate FROM tintuc
            LEFT JOIN chuyenmuc on chuyenmuc.id = tintuc.chuyenmuc_id";
    
    $tintuc = $db->fetchJone('tintuc', $sql, $p, 3, true);
    
    if(isset($tintuc['page']))
    {
        $sotrang = $tintuc['page'];
        unset($tintuc['page']);
    }
   // $tintuc = $db->fetchAll("tintuc");
?>
<?php require_once __DIR__ ."/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách bài viết
            <a href="add.php" class="btn btn-success"> Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Chuyên mục
            </li>
        </ol>
        <div class="clearfix"></div>
        <!-- Thong bao loi -->
        <?php require_once __DIR__ ."/../../../partials/notification.php"; ?>
        </div>
</div>
<div class="row">
    <div class="col-md-12">
          <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Slug</th>
                    <th>Hình ảnh</th>
                   
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt=1; foreach ($tintuc as $item): ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['namecate']?></td>
                        <td><?php echo $item['slug']?></td>
                        <td>
                            <img src="<?php echo uploads()?>tintuc/<?php echo $item['thunbar']?>" width="70px" height="70px">
                        </td>
                        
                        <td>
                            <a class="btn btn-xs btn-info" href="edit.php ?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                            <a class="btn btn-xs btn-danger"href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>                     
                        </td>
                    </tr>         
                <?php $stt++; endforeach; ?>
            </tbody>
        </table>
              <div class="pull-right">
              <nav aria-label="Page navigation">
                     <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <!--Phân trang--->
                <?php for ($i = 1; $i <=$sotrang ; $i++) : ?> 
                        <?php 
                            if(isset($_GET['page']))
                        {
                            $p=$_GET['page'];
                        }
                        else
                        {
                            $p=1;
                        }
                        ?>
                        
                        <li class="<?php echo($i==$p) ? 'active' : '' ?>">
                            <a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>                                               
                    <?php endfor; ?>
						</li>
                <li>
                    <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
              </nav>
              </div>
    </div>
</div>
<!-- /.row -->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>