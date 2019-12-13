 <footer>
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <div class="sub-mail">
                                <div class="mail-text">
                                    <i class="fa fa-envelope"></i>
                                    <p>
                                        <span>Đăng ký nhận email</span>
                                        Nhập mail để nhận thông báo mới nhất khi có khuyễn mãi
                                    </p>
                                </div>
                                <form action="" method="POST" role="form">
                                    <input type="text" placeholder="Email" name="s-mail" class="form-control">
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                </form>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <div class="top-social-footer">
                                <ul>
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#go" class="google"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#tw" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#li" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#li" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <div class="block-ft">
                                <h3>Thông tin liên hệ</h3>
                                <div class="block-content-ft">
                                    <a href="#"><img src="public/giaodien/images/logoweb.png" alt=""></a>
                                    <p>Đồ án lập trình mã nguồn mở. Nhóm Doanh_Vi_Hậu.</p>
                                    <div class="info-contact">
                                        <p><span><i class="fa fa-home"></i> Địa chỉ:</span> Đại học Công Nghiệp Thực Phẩm - TPHCM</p>
                                        <p><span><i class="fa fa-envelope-open"></i> Email:</span> doanhvo2016@gmail.com</p>
                                        <p><span><i class="fa fa-phone"></i> Điện thoại:</span> 0819192955</p>
                                        <p><span><i class="fa fa-globe"></i> Website:</span> http://MyShop.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
                            <div class="block-ft">
                                <h3>Hổ Trợ</h3>
                                <div class="block-content-ft">
                                    <ul>
                                        <li><a href="/codewebbanhang/baiviet.php?id=7"><i class="fa fa-angle-double-right"></i> Giới thiệu</a></li>
                                        <li><a href="/codewebbanhang/taikhoan.php"><i class="fa fa-angle-double-right"></i> Tài khoản</a></li>
                                        <li><a href="/codewebbanhang/gio-hang.php"><i class="fa fa-angle-double-right"></i> Giỏ hàng</a></li>
                                        <li><a href="/codewebbanhang/baiviet.php?id=8"><i class="fa fa-angle-double-right"></i> Liên hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
                            <div class="block-ft">
                                <h3>Khách Hàng</h3>
                                <div class="block-content-ft">
                                    <ul>
                                        <li><a href="/codewebbanhang/chuyenmuc.php?id=1"><i class="fa fa-angle-double-right"></i> Tin tức</a></li>
                                        <li><a href="/codewebbanhang/chuyenmuc.php?id=2"><i class="fa fa-angle-double-right"></i> Dịch vụ</a></li>
                                        <li><a href="/codewebbanhang/bai-viet/15-huong-dan.html"><i class="fa fa-angle-double-right"></i> Hướng dẫn mua hàng</a></li>
                                        <li><a href="/codewebbanhang/sale.php?"><i class="fa fa-angle-double-right"></i> Khuyến mãi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <div class="block-ft">
                                <h3>Facebook</h3>
                                <div class="block-content-ft">
                                    <div class="fb-page" data-href="https://www.facebook.com/myshop07dhth/" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright © 2019 MyShop Rights Reserved. Design by 07DHTH</p>
            </div>
            <a class="back-to-top"><i class="fa fa-angle-up"></i></a>
        </footer>
        <script src="public/giaodien/script/all.js"></script>
        <script src="https://zjs.zdn.vn/zalo/sdk.js"></script>
    </body>
</html>


<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })

    $(function(){
        $updatecart=$(".updatecart");
        $updatecart.click(function(e)
        {
            e.preventDefault();
            $qty=$(this).parents("tr").find("#qty").val();

            $key=$(this).attr("data-key");
            $.ajax
            ({
                url:'cap-nhap-gio-hang.php',
                type:'GET',
                data:{'qty':$qty,'key':$key},
                success:function(data)
                {
                    if(data==1)
                    {
                        alert("Cập nhập giỏ hàng thành công");
                        location.href='gio-hang.php';
                    }
                }
            });
        })
    })
</script>

<!--------css phan trang-------->
<style type="text/css">
.dev-mpt > li >a {
    display: inline;
    border: 1px solid #0089f785;
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
}
.dev-pt {
    text-align: center;
}
ul.dev-mpt {
    display: -webkit-inline-box;
    padding-left: 0;
    margin: 16px 0;
    border-radius: 4px;
}
.dev-mpt>.active>a{
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
</style>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="763369070667377"
  logged_in_greeting="Hi! Bạn cần liên hệ gì ? "
  logged_out_greeting="Hi! Bạn cần liên hệ gì ? ">
</div>
