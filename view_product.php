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
					  <?php } ?>


					</div>
					<ul class="preview-thumbnail nav nav-tabs">
						<li class="active">
							<a data-target="#pic-0" data-toggle="tab">
								<img src="<?= base_url('upload/').$single['pro_main_img']?>" height="90" width="auto" />
							</a>
						</li>
					  <?php foreach($sndIMG as $key => $row){?>
						  <li>
						  <?php if ($single['pro_other_img'] != 0 ) { ?>
						  	<a data-target="#pic-<?= $key+1?>" data-toggle="tab">
						  		<img src="<?= base_url('upload/').$row?>" height="90" width="auto" />
						  	</a>
						  <?php } else {?>
						  <?php } ?>
						  </li>
					  <?php } ?>
					</ul>
				</div>
				<div class="details col-md-6" style="text-align: left;">
					<h3 class="product-title"><?= $single['pro_title']?></h3>
					<h6><span class="text-info">By </span> <?= $single['firstname'].' '.$single['lastname']?></h6><br>
					<p>
						<span class><strong>Category </strong></span> <?= $single['category_sort']?> , <?= $single['category_name']?>

						<span style="float: right; width: 50%; text-align: left;"><strong>Taxable Yes/No </strong> <?= $single['pro_taxable']?></span> 				
						<br><br><span><strong>Type </strong></span> <?= $single['category_name']?>
						
						<span style="float: right; width: 50%; text-align: left;"><strong>Min. Order</strong> <?= $single['pro_min_order']?></span>
						<br><br><span><strong>Style #/SKU </strong> </span> <?= $single['pro_sku']?>

						<span style="float: right; width: 50%; text-align: left;"><strong>Original/Limited Edition</strong> <?= $single['pro_original_limited']?></span> 


						<br><br><span><strong>Weight </strong></span> <?= $single['pro_weight']?>
						<span style="float: right; width: 50%; text-align: left;"><strong> Quantity/Stock </strong> <?= $single['pro_quantity_stock']?>	</span> 											
						<br><br><span><strong>Materials/Medium </strong></span> <?= $single['pro_materials']?>						
						<span style="float: right; width: 50%; text-align: left;"><strong> Custimizable </strong> <?= $single['pro_item_customizable']?></span>

                        <br><br><span></span> <strong>$<?= $single['pro_retail']?></strong>	

                        </p>
					<p>
					<h6>Description </h6>
					<?= $single['pro_description']?>
					</p>
<br>
<a href="<?= base_url('starter/login')?>"><input class="btn btn-info btn-normal" type="button" value="Add to Cart" /></a>

</div>
</div>

</div>
</div>
</div>
<br>
<br>