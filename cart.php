<style>
    
    	span {cursor:pointer; }
		.number{
			margin:10px;
		}
		.minus, .plus{
			width:5px;
			height:5px;
			background:#f2f2f2;
			border-radius:5px;
			padding:8px 25px 25px 20px;
			border:1px solid #ddd;
      display: inline-block;
      vertical-align: middle;
      text-align: center;
		}
			
</style>
  
  <br><h1>Your Shopping Cart </h1>
  
  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php foreach($productLists as $key => $row){?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?= base_url('upload/').$row['pro_main_img']?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <?php if($row['sort']=='product'):?>
                          <h5 class="mb-0"> <a href="<?= base_url('product/individual/').$row['id']?>" class="text-dark d-inline-block align-middle"><?= $row['pro_title']?></a></h5>
                        <?php else:?>
                          <h5 class="mb-0"> <a href="javascript:void(0)" class="text-dark d-inline-block align-middle"><?= $row['pro_title']?></a></h5>
                        <?php endif;?>
                        <span class="text-muted font-weight-normal font-italic d-block">Category: <?= $row['category_name']?></span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>$ <?= $row['price']?></strong></td>
                  <td class="border-0 align-middle">
                      <div class="number">
	<span class="minus">-</span>
                    <strong><input type="number" name="" value="<?= $row['qty']?>" min="1" max="100" step="1"
                      onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                      title="Numbers only"  onchange="update_cart_func('<?= $row["rowid"]?>', $(this).val())"></strong>
                      	<span class="plus">+</span>
</div>
                  </td>
                  <td class="border-0 align-middle">
                    <a href="<?= base_url('product/remove_from_cart?row_id=').$row['rowid']?>" class="text-dark">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php }?>

                <?php if( count($productLists)<=0 ):?>
                  <tr style="text-align: center; font-style: italic;">
                    <td class="align-middle" colspan="4"><h5>Nothing Exist !</h5></td>
                  </tr>
                <?php endif;?>
                <!-- <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-2_qxjis2.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Gray Nike running shoe</a></h5><span class="text-muted font-weight-normal font-italic">Category: Fashion</span>
                      </div>
                    </div>
                    <td class="align-middle"><strong>$79.00</strong></td>
                    <td class="align-middle"><strong>3</strong></td>
                    <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                    </td>
                </tr> -->
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>
      
    <div class="text1" style="text-align: left;">
      <a class="btn btn-success" href="shop" role="button">BACK TO SHOP</a>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">The subtotal and additional costs are calculated based on the quantity you entered above.</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom">
                <strong class="text-muted">Order Subtotal </strong>
                <strong>$<?= number_format($this->cart->total()) ?></strong>
              </li>
              <li class="d-flex justify-content-between py-3 border-bottom">
                <strong class="text-muted">Shipping and handling</strong>
                <strong><?php count($productLists)<=0 ? print('$0.00') : print('$10.00') ?></strong>
              </li>
              <li class="d-flex justify-content-between py-3 border-bottom">
                <strong class="text-muted">Tax</strong>
                <strong>$0.00</strong>
              </li>
              <li class="d-flex justify-content-between py-3 border-bottom">
                <strong class="text-muted">Total</strong>
                <?php $add = count($productLists) <= 0 ? 0 : 10?>
                <h5 class="font-weight-bold">US$ <?= number_format( $this->cart->total() + $add )  ?></h5>
              </li>
            </ul><a href="<?= base_url('product/checkout')?>" class="btn btn-dark rounded-pill py-2 btn-block">Proceed to checkout</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  function update_cart_func(id, qty){
    let html = '<tr class="overlay" style="text-align:'+'center'+'"><td colspan="4"><span><i class="fa fa-spinner fa-spin"></i> Checking...</span></td></tr>';
    
    $('#tbody').css('opacity', 0.4);
    jQuery.ajax({
      url: '<?= base_url("product/update_from_cart")?>',
      data: {'row_id':id, 'qty': qty*1},
      type: 'post',
      dataType: 'html',
      success: function(res){
        console.log(res);
        window.location.reload();
      },
      error: function(err){
        console.log(error);
      }
    });
  }
</script>

<script>

	$(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
    
</script>
