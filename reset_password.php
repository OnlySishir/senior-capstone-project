<div class="container" style="height: 600px; padding-top: 100px">
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
	<form action="<?= base_url('starter/reset_password_proc')?>" autocomplete="off" method="post" id='reset_password'>
	<center>
		<div class="card" style="width: 500px;">			

		  <div class="card-body">
		    <h5 class="card-title">Reset Password</h5>
			<br>
		    <center>
		    <input name="password" type="password" id="inputPassword" 
               class="form-control" 
               placeholder="Password *" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
               title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required><br>
		    <input type="password" class="form-control" name="passconf" placeholder="Confirm Password" required>
		    </center>

		    <center>
		        <div id="message" style="width: 460px; text-align: left; margin-top: -60px">
		          <h5>Password must contain the following:</h5>
		          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
		          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
		          <p id="number" class="invalid">A <b>number</b></p>
		          <p id="length" class="invalid">Minimum <b>6 characters</b></p>
		        </div>        
		    </center>

		    <input type="hidden" name="user_id" value="<?php if(!empty($user_id)){ echo($user_id); }?>">
		    <br>
		    <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
		  </div>

		</div>
	</center>
	</form>
</div>

<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/signup_valid.css')?>">

<script>
$('#reset_password').submit(function(){
  let html = '<span><i class="fa fa-spinner fa-spin"></i> Checking...</span>';
  $('button.btn.btn-lg.btn-primary.btn-block').html(html);
  $('button.btn.btn-lg.btn-primary.btn-block').prop('disabled', true);    
});

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
