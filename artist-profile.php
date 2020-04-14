<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/custom.css')?>">
<style>
.bus-profile{
    padding: 0.1%;
    margin-top: 1%;
    margin-bottom: 1%;
    margin-left: 1%;
    margin-right: 1%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: left;
}
.profile-img img{
    width: 70%;
    /*height: 100%;*/
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -15%;
    width: 70%;
    border: none;
    border-radius: 10;
    font-size: 15px;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}

.profile-work{
    padding-left: 30px;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
</style>
<br>

<div class="container bus-profile" style="margin: 0 auto;">
        <form method="post" >
            <div class="row">
                <div class="col-md-4">                        
                    <div class="avatar-upload">
                    <?php if($this->session->myEmail == $this->input->get('email')): ?>
                      <div class="avatar-edit">
                          <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                          <label for="imageUpload"></label>
                      </div>
                    <?php endif;?>
                      <div class="avatar-preview">
                        <?php if( empty($user['profile_img']) ):?>
                          <div id="imagePreview" style="background-image: url(static/img/avatars/sunny-big.png);" >
                          </div>
                        <?php endif;?>
                        <?php if( !empty($user['profile_img']) ):?>
                          <div id="imagePreview" style="background-image: url('<?= base_url('upload/profile/').$user['profile_img']?>');">
                          </div>
                        <?php endif;?>
                        
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head"></div>
                </div>
                <div class="col-md-2" style="margin-top: 6px;">
                    <?php if($this->session->myEmail == $this->input->get('email')): ?>
                    <a href="<?= base_url('starter/edit_profile').'?email='.$user['email']?>" class="btn btn-info" role="button">Edit Profile</a>
                    <?php endif;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work" style="text-align: left;"> 
                        <!-- ONLY SHOW INFORMATION IF THEY ENTERED IT -->
                        <p class="font-weight-bold">Name of Artist: <?= $user["firstname"]." ".$user["lastname"]?></p>
                        <br>                        
                        <a>City, Country, State: <?= $user['city']?>, <?= $user['country']?>, <?= $user['state']?></a> <!-- replace with current business location -->
                        <br>
                        <a>Type of Artist: <?= $user['role'] ?></a> <!-- replace with current business industry listing -->
                        <br>
                        <a>About: <?= $user['about']?></a> <!-- replace with current business year founded -->
                        <br>
                        <br>
                        <a>Education: <?= $user['education']?> </a>
                        <!-- Display "ABOUT" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Exhibitions: <?= $user['exhibition']?></a>
                        <!-- DIDSPLAY "Number of employees" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Awards/Distinctions: <?= $user['awards']?></a>
                        <!-- DISPLAY "Service and Benefits" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Association and Affiliations: <?= $user['associations']?></a>
                        <!-- DISPLAY "awards" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Commissions: <?= $user['commissions']?></a>
                        <!-- DISPLAY "Association and affiliations" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Type of Artist/Designer: <?= $user['type_artist_with']?></a>
                        <!-- DISPLAY "business connection" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Type of Buyer/Trade: <?= $user['type_business_with']?></a>
                        <!-- DISPLAY "business connection" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Additional Information: <?= $user['addtional_info']?></a>
                        <br>
                        <br>
                        <a>Wholesale</a>
                        <p>Minimum Orders: <?= $user['opening_order_min']?></p>
                        <p>payment Terms: <?= $user['payment_terms']?></p>
                        <p>Returns and Policy: <?= $user['return_policy']?></p>
                        <br>
                        <br>
                        <a>Retail</a>
                        <p>Returns and Exchanges: <?= $user['return_exchange_policy']?></p>
                        <p>Preferred Shipping Method: <?= $user['prefered_shipping_method']?></p>
                        <br>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <h2 style="text-align: center;">Art/Projects</h2>                                    
                                </div>
                                <div class="<?php count($productLists) < 3 ? print('col-md-12') : print('row')?>">
                                    <!-- product preview -->
                                        <?php if(count($productLists) == 0): ?>
                                            <h6 class="col-md-4 offset-md-4" style="text-align: center; padding-top:50px">No Products...</h6>
                                        <?php endif; ?>

                                    <?php foreach($productLists as $key=>$row){ ?>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="product-grid2" style="padding-bottom: 10px;">
                                                <div class="product-image2">
                                                    <a href="<?= base_url('product/individual/').$row['id']?>">
                                                        <img class="pic-1" src="<?= base_url('upload/').$row['pro_main_img']?>" style="height: 200px">
                                                        <?php $sndIMG = explode(",", $row['pro_other_img'])[0]; ?>
                                                        <?php if( isset($sndIMG) && ($sndIMG!="") ){?>
                                                        <img class="pic-2" src="<?= base_url('upload/').explode(",", $row['pro_other_img'])[0]?>" height="200">
                                                        <?php } ?>
                                                    </a>
                                                    <ul class="social">
                                                        <li>
                                                            <a href="<?= base_url('product/individual/').$row['id']?>" data-tip="Quick View"><i class="fa fa-eye" style="margin-top: 15px"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <?php $price = $user['file_ok']=='ok' ? $row["pro_wholesale"] : $row["pro_retail"]; ?>
                                                            <a href="javascript:void(0)" data-tip="Add to Cart">
                                                                <i class="fa fa-shopping-cart" style="margin-top: 15px"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <a class="add-to-cart" href="javascript:void(0)" >Add to cart</a>
                                                    <input type="hidden" name="real-price<?= $row['id']?>" value="<?= $row["pro_retail"]?>">
                                                </div>
                                                <div class="product-content" style="background-color: #f2f2f2; text-align: center; padding: 0px;">
                                                    <h3 class="title"><a href="<?= base_url('product/individual/').$row['id']?>"><?= $row['pro_title']?></a></h3>

                                                    <?php if( $user['file_ok'] == 'ok' ){?>
                                                        <div class="row">
                                                            <div class="col-sm-6 radio">
                                                                <label>
                                                                    <input type="radio" name="optradio<?= $row['id']?>" checked value="<?= $row['pro_retail']?>"> $ <?= $row['pro_retail']?>
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-6 radio">
                                                                <label>
                                                                    <input type="radio" name="optradio<?= $row['id']?>" value="<?= $row['pro_wholesale']?>"> $ <?= $row['pro_wholesale']?>
                                                                </label>
                                                            </div>                            
                                                        </div>
                                                        <script type="text/javascript">
                                                            $('input[name="optradio<?= $row['id']?>"]').on('change', function(e){
                                                                $('input[name="real-price<?= $row['id']?>"]').val( $(this).val() );
                                                            });
                                                        </script>
                                                    <?php }else{ ?>

                                                        <span class="price">$ <?= $row['pro_retail']?></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                                                         
                                                        <span class="fa fa-lock" data-toggle="tooltip" title="To purchase wholesale, you have to provide a reseller certificate or other appropriate proof. " aria-hidden="true"></span>
                                                    <?php } ?>

                                                    <h6 class="name"><?= $row['firstname'].' '.$row['lastname']?></h6>
                                                    <span class="type"><?= $row['category_sort'].' '.$row['category_name']?></span><br>
                                                    <span class="size"><?= $row['pro_size']?></span><br>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- << end of product preview --> 
                                </div>
                                <hr width="100%">
                            </div>

                            <!-- product collection lists here -->
                            <div class="row">
                                
                                <div class="container-fluid">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;">Collections</h2>
                                    </div>
                                    <div class="container text-center my-3">
                                        <div class="row mx-auto my-auto">
                                            <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                                                <div class="carousel-inner" role="listbox">
                                                <?php foreach($collectionLists as $key => $row){?>
                                                    <div class="carousel-item py-5 <?php if($key==0) print('active')?>" style="padding-top: 0px!important;">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <a href="<?= base_url('product/shop').'?col_id='.$row['pro_collection'].'&u_id='.$row['accounts_id']?>" target="_blank">
                                                                            <img src="<?= base_url('upload/').$row['pro_main_img']?>" alt="Image 1" height="150px">                
                                                                        </a>
                                                                        <h4 class="card-title"><?= $row['collection_name']?></h4>
                                                                        <h6 class="card-subtitle">Category: <?= $row['category_name']?></h6>
                                                                        <p class="card-text">
                                                                            <i>Reg Date: <?= date('Y-m-d', strtotime($row['regdate']))?></i>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if(!empty($collectionLists[$key+1])):?>
                                                            <div class="col-sm-6">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <a href="<?= base_url('product/shop').'?col_id='.$collectionLists[$key+1]['pro_collection'].'&u_id='.$collectionLists[$key+1]['accounts_id']?>" target="_blank">
                                                                            <img src="<?= base_url('upload/').$collectionLists[$key+1]['pro_main_img']?>" alt="Image 1" height="150px">                
                                                                        </a>
                                                                        <h4 class="card-title"><?= $collectionLists[$key+1]['collection_name']?></h4>
                                                                        <h6 class="card-subtitle">Category: <?= $collectionLists[$key+1]['category_name']?></h6>
                                                                        <p class="card-text">
                                                                            <i>Reg Date: <?= date('Y-m-d', strtotime($collectionLists[$key+1]['regdate']))?></i>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                <?php }?>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <a class="carousel-control-prev text-dark" href="#myCarousel" role="button" data-slide="prev">
                                                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next text-dark" href="#myCarousel" role="button" data-slide="next">
                                                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr width="100%">
                            </div>
                            <!-- << end of product collection list -->

                            <!-- introduce video -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Introduction Video</h3>                                    
                                </div>
                                <div class="col-md-12">
                                    <!-- DEFAULT VIDEO. ADD INTRODUCTION VIDEO FROM THE USER FORMS-->
                                    <!-- EMBED THE VIDEO -->
                                    <iframe width="620" height="345" src="https://www.youtube.com/embed/No8-mBek3rs"></iframe>
                                </div>
                            </div>
                            <br>
                            <hr width="100%">
                        </div>
                </div>
            </div>
        </div>
    </form>           
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
        //File upload
        var fd = new FormData();
        var files = $('#imageUpload')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: '<?= base_url("starter/ajax_upload")?>',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                }else{
                    alert('file not uploaded');
                }
            },
        });

    });
</script>
