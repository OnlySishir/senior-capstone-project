<div class="container">
	<div class="card">
		<div class="container-fliud">
			<div class="wrapper row">
				<div class="preview col-md-6">
					<div class="preview-pic tab-content">
					  <div class="tab-pane active" id="pic-0">
					  	<img src="<?= base_url('upload/').$single['pro_main_img']?>" height="450" width="auto" />
					  </div>
					  <?php $sndIMG = explode(",", $single['pro_other_img']); ?>
					  <?php foreach($sndIMG as $key => $row){?>
					  <div class="tab-pane"  id="pic-<?= $key+1?>">
					  	<img src="<?= base_url('upload/').$row?>" height="450" width="auto">
					  </div>
					  <?php }?>
					</div>
					<ul class="preview-thumbnail nav nav-tabs">
						<li class="active">
							<a data-target="#pic-0" data-toggle="tab">
								<img src="<?= base_url('upload/').$single['pro_main_img']?>" height="90" width="auto" />
							</a>
						</li>
					  <?php foreach($sndIMG as $key => $row){?>
						  <li>
						  	<a data-target="#pic-<?= $key+1?>" data-toggle="tab">
						  		<img src="<?= base_url('upload/').$row?>" height="90" width="auto" />
						  	</a>
						  </li>
					  <?php } ?>
					</ul>
				</div>
				<div class="details col-md-6" style="text-align: left;">
					<h3 class="product-title"><?= $single['pro_title']?></h3>
					<h6><span class="text-info">Seller:</span> <?= $single['firstname'].' '.$single['lastname']?></h6>
					<h6>
						<span class="text-info">Category Sort: </span> <?= $single['category_sort']?><br>
						<span class="text-info">Category Name: </span> <?= $single['category_name']?>
					</h6>
					<h6>
						<span class="text-info">Original Or Limited: </span> <?= $single['pro_original_limited']?><br>
						<span class="text-info">Quantity available: </span> <?= $single['pro_quantity_stock']?>
					</h6>
					<p class="product-description">
						<span class="text-info">Product Description:</span> <?= $single['pro_description']?>
					</p>
					<h6 class="product-material">
						<span class="text-info">Materials/Medium:</span> <?= $single['pro_materials']?>
					</h6>
					<h4 class="price">Price: <span>$ <?= $single['pro_retail']?></span></h4>
					<h4 class="price" style="text-decoration-line: line-through;">Wholesale Price: 
						<span>$ <?= $single['pro_wholesale']?></span>
					</h4>
					<h5 class="sizes">Product Size: <?= $single['pro_size']?></h5>
					<h6 class="product-material">Item is Custimizable: <?= $single['pro_item_customizable']?></h6>
					<h6 class="colors">colors:
						<span class=""><?= $single['pro_color']?></span>
					</h6>
					<h6 class="colors">Qty:
						<input type="number" name="qty" min="1" value="1">
					</h6>
					<h5>
						<?php $price = $this->session->certified=='ok' ? $single["pro_wholesale"] : $single["pro_retail"]; ?>
						<a href="#" class="btn btn-info btn-normal" onclick="add_cart_func(<?= $single['id']?>, 
																							'<?= $single["pro_title"]?>', 
																							'<?= $price?>')">
      						<span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART
    					</a>
					</h5>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- </div> -->
<br>
<br>
<script type="text/javascript">
	function add_cart_func(id, name, price){
		let qty = $("input[name='qty']").val();
		jQuery.ajax({
			url: '<?= base_url("product/add_to_cart")?>',
			data: {'id':id, 'name':name, 'price': price, 'qty': qty},
			type: 'post',
			dataType: 'html',
			success: function(res){
				let _res = JSON.parse(res);
				$('span.p1.fa-stack.fa-2x.has-badge').attr('data-count', _res['qtys']);
				$('#navbar-cart-lists').html(_res['contents']);
			},
			error: function(err){
				console.log(error);
			}
		});
	}
</script>
