<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/jquery.multiselect.css')?>" />
<head>
  <title>Basic Artist/Designer Profile</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
  <br>
  <h2 style="padding-top: 10px">Basic Artist/Designer Profile</h2>
  <br>

<form action="<?= base_url('starter/profile_proc').'?email='.$this->input->get('email')?>" autocomplete="off" method="post" enctype='multipart/form-data'>
<!-- Business Name -->
<!-- 30 CHARACTERS MAX -->
<input type="hidden" name="fType" value="artist">
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Business Name </label>  
  <div class="col-md-8">
    <input id="BusinessName" name="BusinessName" class="form-control input-md" type="text" value="<?= $profile['business_name']?>">
  </div>
</div>

<!-- Country -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Country<span class="required">*</span></label>
  <div class="col-md-8">
    <select id="type" name="countries" class="form-control" required>
      <?php foreach(config_item('country_list') as $key => $value) { ?>
        <option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
      <?php } ?>
    </select>
  </div>
</div>

<!-- State -->
<!-- text box with 30 characters max. ONLY SHOWS UP WHEN USA COUNTRY IS SELECTED-->
<!-- IF NON USA MAKE STATE A TEXT BOX-->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">State<span class="required">*</span></label>
  <div class="col-md-8">
    <input type="text" name="state" class="form-control input-md" required value="<?= $profile['state']?>">    
  </div>
</div>

<!-- City -->
<!-- text box with 30 characters max. ONLY SHOWS UP WHEN USA COUNTRY IS SELECTED -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">City <span class="required">*</span></label>  
  <div class="col-md-8">
  <input id="city" name="city" class="form-control input-md" required="required" type="text" value="<?= $profile['city']?>">    
  </div>
</div>

<!-- About -->
<!-- Up to 2500 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">About <span class="required">*</span></label>  
  <div class="col-md-8">
    <input id="about" name="about" class="form-control input-md" required="required" type="text" value="<?= $profile['about']?>">    
  </div>
</div>

<!-- Primary Medium/Industry -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Primary Medium/Industry<span class="required">*</span></label>
  <div class="col-md-8">
    <select id="industry" name="medium_industry" class="form-control" required="required">
      <option disabled selected value> -- select an option -- </option>
      <option value="Animation">Animation</option>
      <option value="Body/Beauty">Body/Beauty</option>
      <option value="Culinary">Culinary</option>
      <option value="Design">Design</option>
      <option value="Digital/Graphics">Digital/Graphics</option>
      <option value="Fashion/Accessory/Jewelry">Fashion/Accessory/Jewelry</option>
      <option value="Fiber/Textiles">Fiber/Textiles</option>
      <option value="Fine Art">Fine Art</option>
      <option value="Fine Craft">Fine Craft</option>
      <option value="Furniture/Lighting">Furniture/Lighting</option>
      <option value="Gifts/Pet/Toy">Gifts/Pet/Toy</option>
      <option value="Illustration/Calligraphy">Illustration/Calligraphy</option>
      <option value="Music">Music</option>
      <option value="Photography/Videography">Photography/Videography</option>
      <option value="Printmaking/Paper">Printmaking/Paper</option>
      <option value="Public Art/Installation">Public Art/Installation</option>
      <option value="Sculpture">Sculpture</option>
      <option value="Words">Words</option>
    </select>
  </div>
</div>

<!-- Experience Level -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Experience Level<span class="required">*</span></label>
  <div class="col-md-8">
    <select id="experience" name="experience_level" class="form-control" required="required">
      <option disabled selected value> -- select an option -- </option>
      <option value="Emerging">Emerging</option>
      <option value="Intermediate">Intermediate</option>
      <option value="Advanced">Advanced</option>
      <option value="Master">Master</option>
    </select>
  </div>
</div>

<!-- Secondary Medium/Industry -->
<!-- GREY OUT FOR BASIC MEMBERS -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Secondary Medium/Industry</label>
  <div class="col-md-8">
    <select id="industry2" name="secondary_medium" class="form-control">
      <option disabled selected value> -- select an option -- </option>
      <option value="Animation">Animation</option>
      <option value="Body/Beauty">Body/Beauty</option>
      <option value="Culinary">Culinary</option>
      <option value="Design">Design</option>
      <option value="Digital/Graphics">Digital/Graphics</option>
      <option value="Fashion/Accessory/Jewelry">Fashion/Accessory/Jewelry</option>
      <option value="Fiber/Textiles">Fiber/Textiles</option>
      <option value="Fine Art">Fine Art</option>
      <option value="Fine Craft">Fine Craft</option>
      <option value="Furniture/Lighting">Furniture/Lighting</option>
      <option value="Gifts/Pet/Toy">Gifts/Pet/Toy</option>
      <option value="Illustration/Calligraphy">Illustration/Calligraphy</option>
      <option value="Music">Music</option>
      <option value="Photography/Videography">Photography/Videography</option>
      <option value="Printmaking/Paper">Printmaking/Paper</option>
      <option value="Public Art/Installation">Public Art/Installation</option>
      <option value="Sculpture">Sculpture</option>
      <option value="Words">Words</option>
    </select>
  </div>
</div>

<!-- Commissions -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Commissions</label>
  <div class="col-md-8">
    <select id="commissioins" name="commissions" class="form-control">
      <option disabled selected value> -- select an option -- </option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
</div>

<!-- Exhibition/Shows -->
<!-- 2500 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Exhibition/Shows</label>  
  <div class="col-md-8">
    <input id="exhibition" name="exhibition" class="form-control input-md" type="text" value="<?= $profile['exhibition']?>">    
  </div>
</div>

<!-- Education -->
<!-- 500 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Education</label>  
  <div class="col-md-8">
    <input id="education" name="education" class="form-control input-md" type="text" value="<?= $profile['education']?>">    
  </div>
</div>

<!-- Awards and Distinctions -->
<!-- 500 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Awards and Distinctions</label>  
  <div class="col-md-8">
    <input id="awards" name="awards" class="form-control input-md" type="text" value="<?= $profile['awards']?>">    
  </div>
</div>


<!-- Associations and affiliations -->
<!-- 500 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Associations and Affiliations</label>  
  <div class="col-md-8">
    <input id="association" name="associations" class="form-control input-md" type="text" value="<?= $profile['associations']?>">    
  </div>
</div>

<!-- Type of Artist/Designer I Want To Connect With -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Type of Artist/Designer I Want To Connect With</label>
  <div class="col-md-8">
    <select id="artistConnect" name="type_artist_with" class="form-control">
      <option disabled selected value> -- select an option -- </option>
      <option value="Animation">Animation</option>
      <option value="Body/Beauty">Body/Beauty</option>
      <option value="Culinary">Culinary</option>
      <option value="Design">Design</option>
      <option value="Digital/Graphics">Digital/Graphics</option>
      <option value="Fashion/Accessory/Jewelry">Fashion/Accessory/Jewelry</option>
      <option value="Fiber/Textiles">Fiber/Textiles</option>
      <option value="Fine Art">Fine Art</option>
      <option value="Fine Craft">Fine Craft</option>
      <option value="Furniture/Lighting">Furniture/Lighting</option>
      <option value="Gifts/Pet/Toy">Gifts/Pet/Toy</option>
      <option value="Illustration/Calligraphy">Illustration/Calligraphy</option>
      <option value="Music">Music</option>
      <option value="Photography/Videography">Photography/Videography</option>
      <option value="Printmaking/Paper">Printmaking/Paper</option>
      <option value="Public Art/Installation">Public Art/Installation</option>
      <option value="Sculpture">Sculpture</option>
      <option value="Words">Words</option>
    </select>
    <p>What type of Artist do you want to meet? Choose so they can find you more easily!</p>
  </div>
</div>


<!-- Type of Business/Trade I Want To Connect With -->
<!-- GREY OUT FOR BASIC MEMBERS -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Type of Business/Trade I Want To Connect With</label>
  <div class="col-md-8">
    <select id="businessConnect" name="type_business_with" class="form-control">
      <option disabled selected value> -- select an option -- </option>
      <option value="Animation">Animation</option>
      <option value="Body/Beauty">Body/Beauty</option>
      <option value="Culinary">Culinary</option>
      <option value="Design">Design</option>
      <option value="Digital/Graphics">Digital/Graphics</option>
      <option value="Fashion/Accessory/Jewelry">Fashion/Accessory/Jewelry</option>
      <option value="Fiber/Textiles">Fiber/Textiles</option>
      <option value="Fine Art">Fine Art</option>
      <option value="Fine Craft">Fine Craft</option>
      <option value="Furniture/Lighting">Furniture/Lighting</option>
      <option value="Gifts/Pet/Toy">Gifts/Pet/Toy</option>
      <option value="Illustration/Calligraphy">Illustration/Calligraphy</option>
      <option value="Music">Music</option>
      <option value="Photography/Videography">Photography/Videography</option>
      <option value="Printmaking/Paper">Printmaking/Paper</option>
      <option value="Public Art/Installation">Public Art/Installation</option>
      <option value="Sculpture">Sculpture</option>
      <option value="Words">Words</option>
    </select>
    <p>Signal to Buyers and Businesses that you're looking for them. Upgrade your account</p>
  </div>
</div>



<!-- Introduction Video -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Introduction Video</label>  
  <div class="col-md-8">
    <input id="introVid" name="intro_video" class="form-control input-md" type="text" value="<?= $profile['intro_video']?>">  
    <p>Enter the web address for your video (http://www.example.com/)</p>  
  </div>
</div>


<!-- Additional Information -->
<!-- GREY OUT FOR BASIC MEMBERS -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Additional Information</label>  
  <div class="col-md-8">
    <input id="additional" name="addtional_info" class="form-control input-md" type="text" value="<?= $profile['addtional_info']?>">  
    <p>To showcase even MORE information about yourself and your art. Upgrade your account</p>  
  </div>
</div>


<!-- Tags -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Tags</label>  
  <div class="col-md-8">
    <input id="tags" name="tags" class="form-control input-md" type="text" value="<?= $profile['tags']?>">   
    <p>Get more eyes on you with tags. Use the enter/return key to add 3-5 words max</p> 
  </div>
</div>

<h3>Shop Policy</h3>
<br>

<!-- Return and Exchange Policy -->
<!-- Up to 1500 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Return and Exchange Policy<span class="required">*</span></label>  
  <div class="col-md-8">
    <input id="return" name="return_policy" class="form-control input-md" required="required" type="text" value="<?= $profile['return_policy']?>">    
  </div>
</div>

<!-- Preferred Shipping Method -->
<!-- Up to 50 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Preferred Shipping Method<span class="required">*</span></label>  
  <div class="col-md-8">
    <input id="return" name="prefered_shipping_method" class="form-control input-md" required type="text" value="<?= $profile['prefered_shipping_method']?>">
  </div>
</div>

<h3>Wholesale Terms</h3>
<br>

<!-- Opening Order Minimum -->
<!-- Up to 50 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Opening Order Minimum</label>  
  <div class="col-md-8">
    <input id="orderMin" name="opening_order_min" class="form-control input-md" type="text" value="<?= $profile['opening_order_min']?>">    
  </div>
</div>

<!-- Reorder Minimum -->
<!-- Up to 50 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Reorder Minimum</label>  
  <div class="col-md-8">
  <input id="reOrderMin" name="reorder_min" class="form-control input-md" type="text" value="<?= $profile['reorder_min']?>"> 
  <p>Remember to specify either dollar ($) or number minimum per order</P>
  <p>- $250 minimum opening order</p>
  <p>- $150 minimum, reorder</p>
  <p>- 50 pieces minimum, opening order</p>
  <p>- 25 pieces minimum, reorder</p>
  <p>- No minimums</p>   
  </div>
</div>

<!-- Payment Terms -->
<!-- CAN CHOOSE MORE THAN ONE-->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Payment Terms</label>
  <div class="col-md-8">
    <select id="payment" name="payment_terms[]" multiple="multiple" class="col-md-12">
      <option disabled selected value> -- select an option -- </option>
      <option value="COD">COD (cash on delivery)</option>
      <option value="proforma">Proforma (ship upon full payment)</option>
      <option value="consignment">Consignment (only paid for sold merchandise)</option>
      <option value="net15">Net15</option>
      <option value="net30">Net30</option>
      <option value="net90">Net90</option>
      <option value="extend">Extended terms with prompt payment discount</option>
    </select>
  </div>
</div>

<!-- Return and Exchange Policy -->
<!-- Up to 1500 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Return and Exchange Policy</label>  
  <div class="col-md-8">
    <input id="return" name="return_exchange_policy" class="form-control input-md" type="text" value="<?= $profile['return_exchange_policy']?>">    
  </div>
</div>



<!-- Save Changes-->
<div class="form-group col-md-6 offset-md-3">
    <div class="col-md-12" style="text-align: center;">
      <button type="submit" class="btn btn-primary btn-normal">Save Changes</button>    
    </div>
  </div> 
</div>

</form>


</div>
</div>

<style type="text/css">
  /*div .form-group.col-md-6.offset-md-3 div{*/
  div.col-md-8{
    display: inline-block;
  }
  div.form-group.col-md-6.offset-md-3{
    text-align: left;
  }
</style>



