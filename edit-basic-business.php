<head>
  <title>Business/Trade Profile</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/css/jquery.multiselect.css')?>" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>      
  
  <br>
  <h2 style="padding-top: 10px">Business/Trade Profile</h2>
  <br>
  
<form action="<?= base_url('starter/profile_proc').'?email='.$this->input->get('email')?>" autocomplete="off" method="post" enctype='multipart/form-data'>
<!-- Text input-->
<!-- Business Name -->
<input type="hidden" name="fType" value="business">
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 col-form-label" for="title">Business Name </label>  
  <div class="col-md-8" style="display: inline-block;">
    <input id="BusinessName" name="BusinessName" class="form-control input-md" type="text" value="<?= $profile['business_name']?>">
  </div>
</div>

<!-- Title -->
<!-- Up to 50 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 col-form-label" for="title">Title<span class="required">*</span></label>  
  <div class="col-md-8">
    <input id="title" name="title" class="form-control input-md" required="required" type="text" value="<?= $profile['title']?>">    
  </div>
</div>

<!-- Country -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Country<span class="required">*</span></label>
  <div class="col-md-8">
    <select id="type" name="countries" class="form-control" required="required">
      <?php foreach(config_item('country_list') as $key => $value) { ?>
        <option value="<?= $value ?>" title="<?= $key ?>"><?= htmlspecialchars($value) ?></option>
      <?php } ?>
    </select>
  </div>
</div>

<!-- State -->
<!-- text box with 30 characters max. ONLY SHOWS UP WHEN USA COUNTRY IS SELECTED -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">State<span class="required">*</span></label>
  <div class="col-md-8">
    <input type="text" name="state" value="<?= $profile['state']?>" class="form-control input-md">
  </div>
</div>

<!-- City -->
<!-- text box with 30 characters max. ONLY SHOWS UP WHEN USA COUNTRY IS SELECTED -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">City<span class="required">*</span></label>  
  <div class="col-md-8">
    <input id="city" name="city" class="form-control input-md" type="text" value="<?= $profile['city']?>" required>
  </div>
</div>

<!-- Street 1 -->
<!-- 50 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Street 1</label>  
  <div class="col-md-8">
  <input id="street1" name="street1" class="form-control input-md" type="text" value="<?= $profile['street1']?>">    
  </div>
</div>

<!-- Street 2 -->
<!-- 50 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Street 2</label>  
  <div class="col-md-8">
  <input id="street2" name="street2" class="form-control input-md" type="text" value="<?= $profile['street2']?>">    
  </div>
</div>

<!-- About -->
<!-- Up to 2500 characters max -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">About <span class="required">*</span></label>  
  <div class="col-md-8">
  <input id="about" name="about" class="form-control input-md" required type="text" value="<?= $profile['about']?>">    
  </div>
</div>

<!-- Industry Listing -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Industry Listing<span class="required">*</span></label>
  <div class="col-md-8">
    <select id="industry" name="industry_listing" class="form-control" required="required">
      <option disabled selected value> -- select an option -- </option>
      <option value="Architecture">Architecture</option>
      <option value="Business Support">Business Support</option>
      <option value="Culinary">Culinary</option>
      <option value="Display/Merchendising">Display/Merchendising</option>
      <option value="Events">Events</option>
      <option value="E-Commerce">E-Commerce</option>
      <option value="Fashion">Fashion</option>
      <option value="Financial Accounting">Financial Accounting</option>
      <option value="Fine Art/Fine Craft">Fine Art/Fine Craft</option>
      <option value="Gallery/Exhibitions">Gallery/Exhibitions</option>
      <option value="Graphics/Branding">Graphics/Branding</option>
      <option value="Insurance">Insurance</option>
      <option value="Interior Design">Interior Design</option>
      <option value="Legal">Legal</option>
      <option value="Manufacturing">Manufacturing</option>
      <option value="Marketing/PR">Marketing/PR</option>
      <option value="Motion/Sound">Motion/Sound</option>
      <option value="Municipality">Municipality</option>
      <option value="Non Profit">Non Profit</option>
      <option value="Packing/Shipping">Packing/Shipping</option>
      <option value="Representation/Curation">Representation/Curation</option>
      <option value="Retail">Retail</option>
      <option value="Studio/Live-WorkFacility">Studio/Live-WorkFacility</option>
    </select>
  </div>
</div>

<!-- Number of Employees -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Number of Employees</label>
  <div class="col-md-8">
    <select id="employee" name="employee" class="form-control" required="required">
      <option disabled selected value> -- select an option -- </option>
      <option value="1-5">1-5</option>
      <option value="6-10">6-10</option>
      <option value="11-20">11-20</option>
      <option value="21+">21+</option>
    </select>
  </div>
</div>

<!-- Year Founded -->
<!-- 4 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Year Founded</label>  
  <div class="col-md-8">
    <input id="founded" name="year_founded" class="form-control input-md" type="text" value="<?= $profile['year_founded']?>">    
  </div>
</div>

<!-- Service and Benefits -->
<!-- 1000 CHARACTER MAX -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Service and Benefits</label>  
  <div class="col-md-8">
    <input id="service" name="service_benefits" class="form-control input-md" type="text" value="<?= $profile['service_benefits']?>">    
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

<!-- Type of Business/Trade I Want To Connect With -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Type of Business/Trade I Want To Connect With</label>
  <div class="col-md-8">
    <select id="businessConnect" name="type_business_with" class="form-control" required="required">
      <option disabled selected value> -- select an option -- </option>
      <option value="Architecture">Architecture</option>
      <option value="Business Support">Business Support</option>
      <option value="Culinary">Culinary</option>
      <option value="Display/Merchendising">Display/Merchendising</option>
      <option value="Events">Events</option>
      <option value="E-Commerce">E-Commerce</option>
      <option value="Fashion">Fashion</option>
      <option value="Financial Accounting">Financial Accounting</option>
      <option value="Fine Art/Fine Craft">Fine Art/Fine Craft</option>
      <option value="Gallery/Exhibitions">Gallery/Exhibitions</option>
      <option value="Graphics/Branding">Graphics/Branding</option>
      <option value="Insurance">Insurance</option>
      <option value="Interior Design">Interior Design</option>
      <option value="Legal">Legal</option>
      <option value="Manufacturing">Manufacturing</option>
      <option value="Marketing/PR">Marketing/PR</option>
      <option value="Motion/Sound">Motion/Sound</option>
      <option value="Municipality">Municipality</option>
      <option value="Non Profit">Non Profit</option>
      <option value="Packing/Shipping">Packing/Shipping</option>
      <option value="Representation/Curation">Representation/Curation</option>
      <option value="Retail">Retail</option>
      <option value="Studio/Live-WorkFacility">Studio/Live-WorkFacility</option>
    </select>
    <p>What type of business do you want to meet? Choose so they can find you more easily</p>
  </div>
</div>

<!-- Type of Artist/Designer I Want To Connect With -->
<!-- GREY OUT FOR BASIC MEMBERS -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-md-3 control-label" for="type">Type of Artist/Designer I Want To Connect With</label>
  <div class="col-md-8">
    <select id="artistConnect" name="type_artist_with" class="form-control" required="required">
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
    <p>Signal to Artist and Designers that you're looking for them. Upgrade your account</p>
  </div>
</div>


<!-- Introduction Video -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Introduction Video</label>  
  <div class="col-md-8">
    <input id="introVid" name="introduce_video" class="form-control input-md" type="text" value="<?= $profile['introduce_video']?>">   
    <p>Enter the web address for your video (http://www.example.com/)</p> 
  </div>
</div>



<!-- Additional Information -->
<!-- GREY OUT FOR BASIC MEMBERS -->
<div class="form-group col-md-6 offset-md-3">
  <label class="col-sm-3 col-form-label" for="title">Additional Information</label>  
  <div class="col-md-8">
    <input id="additional" name="additional_info" class="form-control input-md" type="text" value="<?= $profile['additional_info']?>">   
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


<!-- Save Changes-->
  <div class="form-group col-md-6 offset-md-3">
    <div class="col-md-12" style="text-align: center;">
      <button type="submit" class="btn btn-primary btn-normal">Save Changes</button>    
    </div>
  </div> 
</form>

</div>

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

