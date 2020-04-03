<br><br>
<div class="container">
  <?php if( !empty($this->session->msg) ){?>
  <center>
      <div class="alert alert-danger" style="width: 500px">
        <strong>Request Failed!</strong> 
        <?= $this->session->msg?> 
      </div>        
  </center>
  <?php } ?>

  <form id="signup" action="<?= base_url('regproc/probus')?>" method="post" class="form-signin" autocomplete="off" enctype="multipart/form-data">
    <h1 class="h3 mb-3 font-weight-normal"><b>Register</b></h1>
    <h2 class="h4 mb-4 font-weight-normal"><b>Professional Business/Trade</b></h2>
    
    <label for="inputFirstname" class="sr-only">Firstname</label>
    <center>
        <input name="firstname" type="text" id="inputFirstname" style= width:500px class="form-control" placeholder="Firstname *" required autofocus>
    </center><br>
    
    <label for="inputLastname" class="sr-only">Lastname</label>
    <center><input name="lastname" type="text" id="inputBusinessname" style= width:500px class="form-control" placeholder="Lastname *" required autofocus><br></center>
    
    <label for="inputBusinessname" class="sr-only">Business Name</label>
    <center><input name="businessname" type="text" id="inputLastname" style= width:500px class="form-control" placeholder="Business Name" ><br></center>
    
    <label for="inputEmail" class="sr-only">Email address</label>
    <center><input name="email" type="email" id="inputEmail" style= width:500px class="form-control" placeholder="Email address *" required autofocus><br></center>
    
    <label for="inputPassword" class="sr-only">Password</label>
    <center>
        <input name="password" type="password" id="inputPassword" 
               style="width:500px" class="form-control" 
               placeholder="Password *" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
               title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required><br>
    </center>

    <center>
        <div id="message" style="width: 500px; text-align: left;">
          <h5>Password must contain the following:</h5>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>6 characters</b></p>
        </div>        
    </center>

    <label for="inputCPassword" class="sr-only">Confirm Password</label>
    <center>
        <input name="confirmpassword" type="password" id="inputCPassword" style= width:500px class="form-control" placeholder="Confirm Password *" required onfocus="$('#alert-danger-pass').css('display', 'none')"><br>
    </center>
    <center>
        <div id="alert-danger-pass" class="alert alert-danger alert-dismissible fade-in" style="width: 500px; display: none; margin-top: -20px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            **Please Confirm Same Password.** 
        </div>        
    </center>
    
    <label for="inputPostalCode" class="sr-only">Zip Code</label>
    <center><input name="postalcode" type="number" id="inputPostalcode" style= width:500px class="form-control" placeholder="Zip Code *" required><br></center>

    <div class="textstyle">
        <label for="myfile"><p>In order to purchse wholesale, upload your reseller certificate<br> (or other appropiate proof of qualification) for review. PDF and JPEG </p></label>
    </div>
    <input type="file" id="myfile" name="myfile"><br><br>
    <script>
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
    </script>
    <label for="inputLink" class="sr-only">Your Website or Social link</label>
    <center><input name="link" type="text" id="inputLink" style= width:500px class="form-control" placeholder="Your website or social media Link *" required><br></center>
    
    <label for="inputInfo" class="sr-only">Information</label>
    <center><input name="info" type="text" style=" width:500px" class="form-control" placeholder="How did you hear about us?"><br></center>
    
    <input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="<?= base_url('termandcondition')?>">Terms and Conditions </a> and <a href="<?= base_url('termandcondition')?>">Privacy Policy</a> <br>
    <br>
    
    <center>
        <div id="alert-danger" class="alert alert-danger alert-dismissible fade-in" style="width: 500px; display: none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong><span id="ErrorContent"> **Please accept our Terms and Conditions.** </span>
        </div>        
    </center>
    
    <center>
        <button class="btn btn-lg btn-primary btn-block" style="width:500px" type="submit">Sign up</button>
    </center><br>
    <a href="<?= base_url('login')?>" class="mt-5 mb-3 text-muted" >Go back to login page</a><br><br>
    <?php $pay_plan = !empty($this->input->get('plan')) ? $this->input->get('plan') : 'free'; ?>
    <input type="hidden" name="pay_plan" value="<?= $pay_plan?>">
  </form>
</div>
<p>Embrace Freebies! For a limited time, ALL Embrace Creatives members receive upgraded benefits for FREE!</p>

<script type="text/javascript">
$(document).ready(()=>{


  $('#signup').submit( (e) => {
      /* >> initialize*/
      $('#alert-danger-pass').css('display', 'none');
      $('#alert-danger').css('display', 'none');

      let html = '<span><i class="fa fa-spinner fa-spin"></i> Checking...</span>';
        $('button.btn.btn-lg.btn-primary.btn-block').html(html);
        $('button.btn.btn-lg.btn-primary.btn-block').prop('disabled', true);

        /* >> retype pasword error */
        if( $('#inputCPassword').val() != $('#inputPassword').val() ){  

            $('button.btn.btn-lg.btn-primary.btn-block').prop('disabled', false);
            $('button.btn.btn-lg.btn-primary.btn-block').html('Sign up');
            $('#alert-danger-pass').css('display', '');
            return false;
        }

        /* >> agree check */
        if( !$('#agree').is(':checked') ){
            $('button.btn.btn-lg.btn-primary.btn-block').prop('disabled', false);
            $('button.btn.btn-lg.btn-primary.btn-block').html('Sign up');

            $('#alert-danger').css('display', '');
            $('#ErrorContent').html(" **Please accept our Terms and Conditions.** ");
            return false;
        }

        /*>> zip code check */
        var zipCodePattern = /^\d{5}$|^\d{5}-\d{4}$/; 
         let zip =  zipCodePattern.test($('#inputPostalcode').val());
        if( !zip ){
          $('button.btn.btn-lg.btn-primary.btn-block').prop('disabled', false);
          $('button.btn.btn-lg.btn-primary.btn-block').html('Sign up');

          $('#alert-danger').css('display', '');
          $('#ErrorContent').html(" **Please use your valid Zip code** ");

          return false;
        }

        return true;
  })


});    
</script>

<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/signup_valid.css')?>">

<script>
var myInput = document.getElementById("inputPassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>