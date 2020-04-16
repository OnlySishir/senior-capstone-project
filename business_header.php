<head>
<title>EC Landing Page</title>
<!-- Required meta tags -->
<meta charset="utf-8" />
<meta  name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/font-awesome.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/style.css')?>" />
<script src="<?= base_url('static/js/jquery-3.2.1.slim.min.js')?>" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="<?= base_url('static/js/popper.min.js')?>" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?= base_url('static/js/bootstrap.min.js')?>" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?= base_url('static/js/jquery-3.2.1.min.js')?>"></script>

</head>
<body class="text-center">
<!-- Nav Bar Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('')?>">
    <img src="<?= base_url('static/img/EC_logo-Black.png')?>" alt="Logo" />
  </a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarsExample03"
    aria-controls="navbarsExample03"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExample03">
    <form class="form-inline my-2 my-md-0">
      <input class="form-control" type="text" placeholder="Search" />
    </form>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="dropdown01"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          >Shop
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
        <a class="dropdown-item" href="<?= base_url('product/shop')?>">Fine Art</a>
          <a class="dropdown-item" href="#">Craft</a>
          <a class="dropdown-item" href="#">Photography</a>
          <a class="dropdown-item" href="#">Fashion</a>
          <a class="dropdown-item" href="#">Design</a>
          <a class="dropdown-item" href="#">Illustration</a>
          <a class="dropdown-item" href="#">Beauty/Body</a>
          <a class="dropdown-item" href="#">Media</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('main')?>">Home</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Create
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Promotional Ad</a>
          <a class="dropdown-item" href="#">Connections</a>
          <a class="dropdown-item" href="<?= base_url('artcalls')?>">Art Call</a>
          <a class="dropdown-item" href="<?= base_url('product/grantsubmission')?>">Grant</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="fa fa-user"></i> Profile 
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
          <center><p class="dropdown-item"> <?= $this->session->myName ?></p></center>
          <center><p class="dropdown-item"> <?= $this->session->myEmail ?></p></center><hr>
          <a class="dropdown-item" href="#">My Account</a>
          <a class="dropdown-item" href="<?= base_url('logout')?>">Log out</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a href="#" style="color: rgba(0,0,0,.5);" id="navbar-cart" data-toggle="dropdown">
          <span class="p1 fa-stack fa-2x has-badge" data-count="0">
            <i class="p2 fa fa-circle fa-stack-2x"></i>
            <i class="p3 fa fa-shopping-cart fa-stack-1x fa-inverse" data-count="0"></i>
          </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbar-cart" style="margin-left: -80px" id="navbar-cart-lists">
          <?php if(count($this->cart->contents())==0):?>
            <a class="dropdown-item" href="javascript:void(0)">No Product Yet...</a>
          <?php endif;?>
          <?php $qtys=0; ?>
          <?php foreach ($this->cart->contents() as $items) { ?>
              
            <a class="dropdown-item" href="javascript:void(0)"><?= $items['name']?> $<?= $items['price']?> * <?= $items['qty'] ?></a>
            <?php  $qtys += $items['qty']*1; ?>
          <?php } ?>
          <a class="dropdown-item total" href="<?= base_url('product/cart')?>">Total: US$ <?= number_format($this->cart->total()) ?></a>
        </div>
      </li>
      
    </ul>
  </div>
</div>

</div>
</nav>
<!-- Nav Bar End -->
<style type="text/css">
  .fa-stack[data-count]:after{
    position:absolute;
    right:0%;
    top:1%;
    content: attr(data-count);
    font-size:40%;
    padding:.6em;
    border-radius:50%;
    line-height:.8em;
    color: white;
    background: #FF5722;
    text-align: center;
    min-width: 1em;
    font-weight:bold;
  }

  ul.navbar-nav.ml-auto li{
    padding-right: 20px
  }  

  a.dropdown-item.total{
    border-top: 1px solid rgba(172, 171, 171, 0.5);
  }
  i.p3.fa.fa-shopping-cart.fa-stack-1x.fa-inverse{margin-left: -2px}
</style>
<script type="text/javascript">
  $('span.p1.fa-stack.fa-2x.has-badge').attr('data-count', <?= $qtys?>);
</script>