
<div class="category-box">
			<h3><i class="fa fa-list" aria-hidden="true"></i> Danh mục sản phẩm</h3>
			<div class="content-cat">
				<ul>
					<?php foreach($category as $item) :?>
                        <li><a href="danh-muc/<?php echo $item['id']?>-<?php echo $item['slug']?>.html"><i class="fa fa-caret-right"></i><?php echo $item['name']?></a></li>
                                    <?php endforeach;?>
						<li><a href="/codewebbanhang/sale.php?"><i class="fa fa-caret-right"></i>Khuyến mãi</a></li>		
										</ul>
			</div>
</div>