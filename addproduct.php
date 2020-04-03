<br>
<br>
<div class="container">
<?php if( !empty($this->session->msg) ){?>
<center>
    <div class="alert alert-success" style="width: 500px">
      <strong> Success! </strong> 
      <?= $this->session->msg?> 
    </div>        
</center>
<?php } ?>

<form action="<?= base_url('product/save_product')?>" method="post" enctype='multipart/form-data' autocompleted="off" id="addproduct_form">
<div class="text2" style="text-align: left;">
<h3 class="h3 mb-3 font-weight-strong">Add Artwork/Product</h3>

<!-- <p><span class="required">*</span>= required</p> -->
<br>
    <!-- Grid row -->
<div class="form-group row">
  <!-- Default input -->
  <label class="col-md-2 control-label offset-md-2" for="product_categorie">TYPE<span class="required">*</span></label>
  <div class="col-md-5">
    <select id="product_categorie" name="product_categorie" class="form-control" required="required">
      <option disabled selected value> -- select an option -- </option>
      <?= $options?>    
    </select>
    <input type="hidden" name="product_categorie">
  </div>
</div>

<!-- Text input-->
<div class="form-group ROW">
  <label class="col-sm-2 col-form-label offset-sm-2" for="product_title">TITLE <span class="required">*</span></label>  
  <div class="col-md-5">
  <input id="product_title" name="product_title" placeholder="WHAT IS THE NAME OF THIS PIECE OF ART OR PRODUCT?" class="form-control input-md" required="required" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-sm-2 col-form-label offset-sm-2" for="product_id">STYLE NUMBER/SKU</label>  
  <div class="col-md-5">
  <input id="product_id" name="product_sku"  class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="product_description">DESCRIPTION<span class="required">*</span></label>
  <div class="col-md-5">                     
    <textarea class="form-control" placeholder="BE AS SPECIFIC AS POSSIBLE" id="product_description" required="required" name="product_description"></textarea>
  </div>
</div>



<!-- Text input-->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="product_weight"> SIZE <span class="required">*</span></label>  
  <div class="col-md-5">
  <input id="product_size" name="product_size" placeholder="EXAMPLES: HEIGHT, WIDTH, DEPTH, S, M, L, XL, ONE SIZE, ETC.." class="form-control input-md" required="required" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="product_weight"> WEIGHT <span class="required">*</span></label>  
  <div class="col-md-5">
  <input id="product_weight" name="product_weight" placeholder="BE AS SPECIFIC AS POSSIBLE"class="form-control input-md" required="required" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="Materials_Medium">MATERIALS/MEDIUM<span class="required">*</span></label>  
  <div class="col-md-5">
    <input id="Materials_Medium" name="Materials_Medium" class="form-control input-md" required="required" type="text">    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="color">COLOR <span class="required">*</span></label>  
  <div class="col-md-5">
    <input id="color" name="color" placeholder="CHOOSE ONE OR TWO COLORS" class="form-control input-md" required="required" type="text">   
  </div>
</div>

<!-- number input-->
<div class="form-group row" style="height: 40px">
  <label class="col-md-2 control-label offset-md-2" for="retail">RETAIL $ <span class="required">*</span></label>  
  <div class="col-md-5">
    <input id="retail" name="retail"  class="form-control input-md" required="required" type="number" min="0" step="0.01"><br>
  </div>
</div>


<!-- number input-->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="wholesale">WHOLESALE $ <span class="required">*</span></label>  
  <div class="col-md-5">
    <?php if(strpos($this->session->myRole, 'basic_')):?>
      <a href="<?= base_url('features')?>" id="wholesale">To sell wholesale, upgrade your EC Membership</a> 
    <?php else: ?>
      <input type="number" name="wholesale" class="form-control input-md" min="0" step="0.01">
    <?php endif;?>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="taxable">TAXABLE</label>
  <div class="col-md-5">
    <select id="taxable" name="TAXABLE" class="form-control" required>
      <option disabled selected value> -- select an option -- </option>
      <option value="YES">YES</option>
      <option value="NO">NO</option>
    </select>
  </div>
</div>

<!-- number input-->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="minimum_order">MINIMUM ORDER</label>  
  <div class="col-md-5">
  <input id="minimum_order" name="minimum_order" placeholder="MINIMUM ORDER" class="form-control input-md" type="number">
</div>
</div>

<!-- checkbox input -->
<!-- <fieldset class="form-group row"> -->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="product_title">ORIGINAL OR LIMITED EDITION</label>  
  <div class="col-md-5">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="ORIGINAL" checked>
      <label class="col-md-3 control-label" for="gridRadios1">
        ORIGINAL
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="LIMITED">
      <label class="col-md-3 control-label" for="gridRadios2">
        LIMITED
      </label>
    </div>
  </div>
</div>
<BR>

<!-- number input-->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="quantity_stock">QUANTITY/STOCK</label>  
  <div class="col-md-5">
  <input id="quantity_stock" name="quantity_stock" placeholder="QUANTITY/STOCK" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="customizable">ITEM IS CUSTOMIZABLE</label>
  <div class="col-md-5">
    <select id="customizable" name="customizable" class="form-control" required>
      <option disabled selected value> -- select an option -- </option>
      <option value="YES">YES</option>
      <option value="NO">NO</option>
    </select>
</div>
</div>

<!-- Text input-->
<!-- <div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="product_exchange"> ITEM RETURN AND/OR EXCHANGE<span class="required">*</span></label>  
  <div class="col-md-5">
  <textarea class="form-control" input id="exchange" name="exchange" class="form-control input-md" required="required"></textarea>
    
  </div>
</div> -->

<!-- Select Basic -->
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="shipping">SHIPING OPTIONS <span class="required">*</span></label>
  <div class="col-md-5">
    <select id="shipping" name="pd_shipping" class="form-control" onchange='checkvalue(this.value)' required>
      <option disabled selected value> -- select an option -- </option>
      <option value="1">Fixed Shipping Price</option>
      <option value="2">Free Shipping</option>
      <option value="3">hu</option>
    </select>

<br>
    <div class="width-qrtr">
   <label>If you choose 'Fixed Shipping Price'</label>
    <input id="textbox" disabled="true" type="text"   value=""  name=""/>
    </div>
</div>
</div>

<script>
document.getElementById('shipping').addEventListener('change', function() {
    if (this.value == 1) {
        document.getElementById('textbox').disabled = false;   
    } else {
        document.getElementById('textbox').disabled = true;
    }
});

</script>


  <br>
 <!-- File Button --> 
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="myfile">MAIN IMAGE <span class="required">*</span></label>
  <div class="col-md-5">
  <input name="main_img[]" type="file" accept="image/*" onchange="loadFile(event)">
  <img id="output" style="width: 300px" />
  </div>
</div>

<!-- File Button --> 
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" for="filebutton"> OTHER IMAGES</label>
  <div class="col-md-5">
    <input type="file" accept="image/*" id="myfile" name="myfile[]" multiple>
  </div>
</div>

<script type="text/javascript">
function showfield(name){
  if(name=='Create_new_collection')document.getElementById('div1').innerHTML='<input type="text" name="Create_new_collection" placeholder="New Collection" title="New Collection"/>';
  else document.getElementById('div1').innerHTML='';
}
</script>
<div class="form-group row">
  <label class="col-md-2 control-label offset-md-2" >PLACE IN A COLLECTION</label>
  <div class="col-md-5">
    <select name="collection" class="form-control" onchange="showfield(this.options[this.selectedIndex].value)">
      <option selected="selected" value="">Please select ...</option>
      <?php foreach($collections as $key=>$row){?>
        <option value="<?= $row['id']?>"><?= $row['name']?></option>
      <?php } ?>
      <option value="Create_new_collection">Create New Collection</option>
    </select>    
  </div>
  <div class="col-md-3" id="div1"></div>
</div>
</div>

<!-- Button -->
<div class="form-group row">
    <div class="col-sm-4 offset-sm-4">
      <button type="submit" class="btn btn-lg btn-primary btn-block" id="product_upload_id">Submit</button>
    </div>
</div>
<!-- </div> -->

</form>
<!-- Default horizontal form -->

<hr class="my-5">
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };


$('#myfile').on('change', function(){

  let type = this.files[0].type;

  if( type == 'application/pdf' || type == 'image/jpg' || type =='image/png' ||
      type == 'image/gif' || type =='image/bmp' || type =='image/jpeg'){

    if(this.files[0].size > 1000000){
       alert("File is too big! Please retry less of 1MByte");
       this.value = "";
    }
  }
  else{
      alert('please upload only img/pdf file');
      this.value = "";
  }
});

$('#product_categorie').on('change', function(e){

  $('input[name="product_categorie"]').val( $(this).val() );
});

// Form submit action
$('#addproduct_form').submit( (e) => {
  /* >> initialize*/

  let html = '<span><i class="fa fa-spinner fa-spin"></i> Checking...</span>';
    $('#product_upload_id').html(html);
    $('#product_upload_id').prop('disabled', true);

    /* >> retype pasword error */
    if( $('input[name="product_categorie"]').val()*1 <= 0 ){  

        $('#product_upload_id').prop('disabled', false);
        $('#product_upload_id').html('Submit');
        // $('#alert-danger-pass').css('display', '');
        return false;
    }
});

</script>


