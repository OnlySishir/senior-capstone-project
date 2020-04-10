<style>
  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<div class="container">
  <div class="py-5 text-center">
    <h2>Checkout form</h2>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?= $cnt_products?></span>
      </h4>

      <ul class="list-group mb-3">
        <?php foreach($productLists as $key => $row){?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?= $row['pro_title']?></h6>
            <small class="text-muted"><?= $row['pro_description']?></small>
          </div>
          <span class="text-muted">$<?= $row['price'];?> - <?= $row['qty']?></span>
        </li>
        <?php }?>
        <li class="d-flex justify-content-between py-3 border-bottom">
          <strong class="text-muted">Shipping and handling</strong>
          <strong><?php count($productLists)<=0 ? print('$0.00') : print('$10.00') ?></strong>
        </li>
        <li class="d-flex justify-content-between py-3 border-bottom">
          <strong class="text-muted">Tax</strong>
          <strong>$0.00</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <?php $add = count($productLists) <= 0 ? 0 : 10?>
          <strong>US$ <?= number_format($this->cart->total())+$add?></strong>
        </li>
      </ul>

    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <!-- >> form tag... -->
        <form id="checkout-form" class="needs-validation" action="<?= base_url('product/final_checkout')?>" autocompleted="off">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required>
                <option value="">Choose...</option>
                <?php foreach($countries as $key => $country){?>
                  <option value="<?= $key?>"><?= $country?></option>
                <?php }?>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <!-- <select class="custom-select d-block w-100" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select> -->
              <input type="text" class="form-control" id="state" placeholder="Your state name" required>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="Zip code" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address">
            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>
          <hr class="mb-4">

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="paypal" name="_paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
</form>
        <!--</form>-->
      <!-- << end of form -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#checkout-form').submit(function(){
    let html = '<span><i class="fa fa-spinner fa-spin"></i> Checking...</span>';
    $('button.btn.btn-primary.btn-lg.btn-block').html(html);
    $('button.btn.btn-primary.btn-lg.btn-block').prop('disabled', true);    
  });
</script>

