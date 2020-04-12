<style>
hr.new4 {
  border: 1px solid red;
}

</style>

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
						  <?php if ($single['pro_other_img'] != NULL ) { ?>
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
					<?php if   ($this->session->certified =='ok') { 
						if ($single['pro_wholesale'] != NULL) { ?>	
						<span style="float: right; width: 50%; text-align: left;"><strong> Wholesale Price </strong> <?= $single['pro_wholesale']?></span>
						<?php }
						else { ?>
						<span style="float: right; width: 50%; text-align: left;" hidden = true><strong> Wholesale Price </strong> <?= $single['pro_wholesale']?></span>
						<?php } } ?>
						
					

					</p>
					<p>
					<h6>Description </h6><br>
					<?= $single['pro_description']?>
					</p>
				
										<div class="container">

	
	<?php if ($this->session->certified =='ok') { ?>
		<input type="radio" name="optradio<?= $single['id']?>" value="<?= $single["pro_wholesale"]?>" onclick="doDisplay(this);"/>&nbsp;&nbsp;<strong>Buy Wholesale</strong>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span id="wholesales" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;
	<?php if ($single['pro_wholesale'] != NULL) { ?>
			<br><input  class ='txtbx' size="10" type="number" id="txtNumber" value="<?php echo $single['pro_quantity_stock']?>"  disabled />
	<?php }
	else { ?>
			<br><input  class ='txtbx' size="10" type="text" id="txtNumber" value="Not available"  disabled />
	<?php }?>
			</span>
			<input type="radio" name="optradio<?= $single['id']?>" value="<?= $single["pro_retail"]?>" onclick="doDisplay(this);"/>&nbsp;&nbsp;<strong>Buy Retail</strong>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<span id="retails" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br><center>Qty: <input name="qty" class ='txtbx1' size="10" type="number" id="txtNumber1" min="1" value="1" step="1"
                      onkeypress='return event.charCode >= 48 && event.charCode <= 57' /></center>
			</span>
			</div>
			<br />
			<br />
			
			<?php if ($single['pro_quantity_stock'] == 0) { ?>

				<input class="btn btn-info btn-normal" type="button" value="Add to Cart" disabled />

			<?php }
			else { ?>

				<?php  $price = $this->session->certified =='ok' ? $single["pro_wholesale"] : $single["pro_retail"]; ?> 
						<a href="#" class="btn btn-info btn-normal" onclick="add_cart_func(<?= $single['id']?>, 
																							'<?= $single["pro_title"]?>', 
																							'<?= $price?>')">
      						<span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART</a>
						<input type="hidden" name="real-price<?= $single['id']?>" value="<?= $single["pro_retail"]?>">
						
					<?php } 
                	}
					
					 else { ?>
					 <br>
					<h6 class="colors">Qty:
					</h6>
					<input type="radio" name="optradio<?= $single['id']?>" value="<?= $single["pro_wholesale"]?>" onclick="doDisplay(this);" hidden=true/>&nbsp;
			<span id="wholesales" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;
	<?php if ($single['pro_wholesale'] != NULL) { ?>
			<input  class ='txtbx' size="10" type="number" id="txtNumber" value="<?php echo $single['pro_quantity_stock']?>"  disabled />
	<?php }
	else { ?>
			<input  class ='txtbx' size="10" type="text" id="txtNumber" value="Not available"  disabled />
	<?php }?>
			</span>
			<br />
			<input type="radio" name="optradio<?= $single['id']?>" value="<?= $single["pro_retail"]?>" id ="radio" onclick="doDisplay(this);" hidden=true/>
			<span id="retails" style="display:none">
			<input name="qty" class ='txtbx1' size="10" type="number" id="txtNumber1" min="1" value="1" step="1"
                      onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
			</span>
			<br />
			<br />
						<?php if ($single['pro_quantity_stock'] == 0) { ?>

				<input class="btn btn-info btn-normal" type="button" value="Add to Cart" disabled />

			<?php }
			else { ?>

					<h5>
						<?php $price = $this->session->certified=='ok' ? $single["pro_wholesale"] : $single["pro_retail"]; ?>
						<a href="#" class="btn btn-info btn-normal" onclick="add_cart_func(<?= $single['id']?>, 
																							'<?= $single["pro_title"]?>', 
																							'<?= $price?>')">
      						<span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART
    					</a>
						<input type="hidden" name="real-price<?= $single['id']?>" value="<?= $single["pro_retail"]?>">
						
					</h5>
					<?php }
					}?>
				</div>
			</div>
		</div>
</div>
	</div>
</div>
<!-- </div> -->
<br>
<br>
<script type="text/javascript">
	function add_cart_func(id, name){
		// let qty = $("input[name='qty']").val();
		let qty = $("#"+type).val();
		var price = $("input[name='real-price"+id+"']").val();
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



<script type="text/javascript">
    $('input[name="optradio<?= $single['id']?>"]').on('change', function(e){
    $('input[name="real-price<?= $single['id']?>"]').val( $(this).val() );
    });
</script>


<script>
var type = "txtNumber";
function doDisplay(radio)
{
    switch (radio.value)
    {
        case "<?= $single["pro_wholesale"]?>":
            document.getElementById("wholesales").style.display = "inline";
			document.getElementById("retails").style.display = "none";
			type = "txtNumber"; 
			break;

        case "<?= $single["pro_retail"]?>":
            document.getElementById("wholesales").style.display = "none";
			document.getElementById("retails").style.display = "inline";
			type = "txtNumber1"; 
			break;
	}

}
</script>

<script>
document.getElementById('radio').dispatchEvent(new MouseEvent("click"));
</script>


