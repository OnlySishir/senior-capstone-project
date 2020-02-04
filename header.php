<!DOCTYPE html>
<html>
<head>
	<title><?php  echo get_bloginfo(‘name’);?> | <?php echo get_bloginfo(‘description’);?></title>


<?php wp_head();?>
<header>	
<div class="container-fluid">
<div class='row'>
  <div class='mt-3 col-sm-3'>
    <img class="img-fluid" src='<?php echo get_bloginfo('template_url'); ?>/img/EC_logo-Black.png'>
  </div>
<div class='col-sm-9'>	








<nav class="navbar navbar-expand-lg navbar-light">

  <div class="col-sm-6 main">
    <div class="inner-addon left-addon">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" placeholder="">
    </div>
  <div class="input-group-append">
      
  </div>

  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="col-sm-6 collapse  nav justify-content-center navbar-collapse" id="navbarNavAltMarkup"><!--nav justify-content-center-->
    <div class="navbar-nav  site-nav navtabs">
  
      <?php
wp_nav_menu(array(
'menu' => _('Primary Menu'),
      'container' => _(''),
      'items_wrap' => '%3$s'

));?>
    </div>
  </div>

</nav>

  












</div>

</div>

</header>


</head>
<body>

