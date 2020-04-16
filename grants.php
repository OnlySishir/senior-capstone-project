<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/jquery.multiselect.css')?>" />
<br>
<br>
<div class="col-md-12" >
  <?php if( !empty($this->session->msg) ){?>
  <center>
      <div class="alert alert-success" style="width: 500px">
        <strong> Success! </strong> 
        <?= $this->session->msg?> 
      </div>        
  </center>
  <?php } ?>

  <?php if( !empty($this->session->error_msg) ){?>
  <center>
      <div class="alert alert-danger" style="width: 500px">
        <strong> Failed! </strong> 
        <?= $this->session->error_msg ?> 
      </div>        
  </center>
  <?php } ?>
  <div class="text" style="text-align: left;">
  <p class="h4">Grant uploads are FREE!</p>
  <p>After approval your opportunity will be listed until its deadline date</p>
  <p><strong>Submission rules and recommendations;</strong></p>
	<p>Each opportunity will stay up until its deadline date.
	Check your spelling before you submit.</p>
	<p>Once approved, calls are no longer editable.
	Make sure that your web link works.</p>
	<p>Best image size is 850 pixels wide by 350 pixels tall. (Max file size is 10MB)
	Embrace Creatives, LLC has the right to refuse any application for any reason.</p>

    <a href="mailto:service@embracecreatives.com" target="_top">Questions? Email us.</a>
  </p>
</div>
</div>
<hr>
<div class="col-md-6 offset-md-3" >
  <form action="<?= base_url('product/grants_proc')?>" autocomplete="off" method="post" enctype='multipart/form-data'>
    <div class="form-group row">
      <label class="col-md-4 control-label" for="type">Type of Funding Opportunity<span class="required">*</span></label>
      <div class="col-md-8">
        <select id="type" name="type-funding" class="form-control" required="required">
          <option disabled selected value> -- select an option -- </option>
          <option value="Grant">Grant</option>
          <option value="Scholarship">Scholarship</option>
          <option value="Fellowship">Fellowship</option>
          <option value="General Opportunity">General Opportunity</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-4 control-label" for="type">Country<span class="required">*</span></label>
      <div class="col-md-8">
        <select id="type" name="country" class="form-control" required>
          <option selected value>--Please select the Country--</option>
          <?php foreach($countries as $key => $value) { ?>
            <option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-4 control-label" for="type">Open To<span class="required">*</span></label>
      <div class="col-md-8">
        <select id="open" name="open_to" class="form-control" required="required">
          <option disabled selected value> -- select an option -- </option>
          <option value="International">International</option>
          <option value="National">National</option>
          <option value="Statewide">Statewide</option>
          <option value="Multi-State">Multi-State</option>
        </select>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">Medium/Industry<span class="required">*</span></label>  
      <div class="col-md-8">
      <select id="medium" name="medium_industry[]" multiple="multiple" class="4colactive">

        <option value="Acting">Acting</option>
        <option value="Crafts">Crafts</option>
        <option value="Exhibitions">Exhibitions</option>
        <option value="Festivals">Festivals</option>
        <option value="Literary">Literary</option>
        <option value="Online">Online</option>
        <option value="Public Art">Public Art</option>
        <option value="Unspecified">Unspecified</option>
        <option value="Advertising">Advertising</option>
        <option value="Dance">Dance</option>
        <option value="Film & Video">Film & Video</option>
        <option value="Fine Arts">Fine Arts</option>
        <option value="Modeling">Modeling</option>
        <option value="Projects">Projects</option>
        <option value="Publications">Publications</option>
        <option value="Award & Prize">Award & Prize</option>
        <option value="Design">Design</option>
        <option value="Fashion">Fashion</option>
        <option value="Games">Games</option>
        <option value="Photography">Photography</option>
        <option value="Performance">Performance</option>
        <option value="Social & Networks">Social & Networks</option>
        <option value="Creative Direction">Creative Direction</option>
        <option value="Education">Education</option>
        <option value="Fairs">Fairs</option>
        <option value="Jewelery">Jewelery</option>
        <option value="Member">Member</option>
        <option value="Music">Music</option>
        <option value="Visual Arts">Visual Arts</option>
      </select>
      <p class="text-muted">Please select up to two options.</p>


        <script type="text/javascript">
$(document).ready(function() {

var last_valid_selection = null;

$('#medium').change(function(event) {
  if ($(this).val().length > 2) {
    alert('You can only choose 2!');
    $(this).val(last_valid_selection);
  } else {
    last_valid_selection = $(this).val();
  }
});
});
        </script>

    </div>
  </div>

  <!-- Text input-->
  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="title">Title <span class="required">*</span></label>  
    <div class="col-md-8">
      <input id="title" name="title" class="form-control input-md" required="required" type="text">      
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="title">Summary <span class="required">*</span></label>  
    <div class="col-md-8">
      <textarea id="summary" name="summary" class="form-control input-md" required="required"></textarea>   
    </div>
  </div>

  <!-- number input-->
  <div class="form-group row">
    <label class="col-md-4 control-label" for="retail">Amount <span class="required">*</span></label>  
    <div class="col-md-8">
      <input id="amount" name="amount"  class="form-control input-md" required="required" type="text"><br>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-4 control-label" for="retail">Deadline Date <span class="required">*</span></label>  
    <div class="col-md-8">
      <input id="deadline" name="deadline"/>
      <script>
       $('#deadline').datepicker({
        uiLibrary: 'bootstrap4'
        });
      </script>        
    </div>
  </div>

    <!-- Text input-->
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">Fee </label>  
      <div class="col-md-8">
        <input id="fee" name="fee" class="form-control input-md" type="text">        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">Who Should Apply? </label>  
      <div class="col-md-8">
      <textarea id="applytype" name="who-apply" placeholder="Example: “Early career African American artists.”" class="form-control input-md"></textarea>
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">Website <span class="required">*</span> </label>  
      <div class="col-md-8">
        <input id="website" type="url" name="website" placeholder="Enter a valid URL such as http://www.example.com/" class="form-control input-md" required>        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">How To Apply </label>  
      <div class="col-md-8">
        <input id="apply_way" name="how-apply" class="form-control input-md" type="text">        
      </div>
    </div>

    

    <!-- Text input-->
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">Tags:</label>  
      <div class="col-md-8">
        <input id="tags" name="tag" class="form-control input-md" type="text">        
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">Image </label>  
      <div class="col-md-8">
        <input name="img_file[]" type="file" class="custom-file-input" id="customFile" accept="image/*" onchange="loadFile(event)">
        <label class="custom-file-label" for="customFile">Choose image</label>
      </div>
    </div>
    <p class="text-muted">An image isn’t required but adding one will enhance your opportunity. Best size is 850 pixels wide by 350 pixels tall. (Max file size is 10MB)</p>


    <div class="col-md-12">
      <img id="output" style="width: 300px" />        
    </div>
    <br>
    

    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="title">Listing Options <span class="required">*</span></label>  
      <div class="col-md-8">
        <select id="listing" name="listing-option" class="form-control" required="required">
          <option disabled selected value> -- select an option -- </option>
          <option value="-1, 0">Basic Post (free)</option>
          <option value="14, 40">Highlight on listing page (14 days) $40</option>
          <option value="-1, 30">Highlight in EC Newsletter $30</option>
          <option value="14, 75">Featured on landing page (14 days) $75</option>
          <option value="-1, 50">Featured in EC Newsletter $50</option>
        </select>
        <p class="text-muted" style="text-align: center;">No refunds.</p>
      </div>
    </div>

    <br/>
  <!-- Text input-->
  <div class="form-group row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary btn-normal">Add To Cart</button>    
    </div>
  </div>       

  </form>
</div>

<!-- Socials Start -->
<div class="container">
  <div class="row justify-content-md-center">
    <h6 class="light">Stay up to date, follow us on Social Media!</h6>
  </div>
</div>
<br>
<div class="container">
  <div class="row justify-content-md-center">
    <div>
      <ul class="social-network social-circle">
        <li>
          <a href="https://www.facebook.com/EmbraceCreatives/" target="_blank" class="icoFacebook" title="Facebook">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li>
          <a href="https://twitter.com/EmbraceCreativs" target="_blank" class="icoTwitter" title="Twitter">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/embracecreatives/" target="_blank" class="icoInstagram"
            title="Instagram"><i class="fa fa-instagram"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<br>
<br>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="<?= base_url('static/js/jquery.multiselect.js')?>"></script>
<script>
$('select[multiple]').multiselect({
    columns: 4,
    placeholder: 'Select options'
});
</script>
<style type="text/css">
  form label{ text-align: left; }
</style>