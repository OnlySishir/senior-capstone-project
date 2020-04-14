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
                        <p class="font-weight-bold">Business Name: <?= $user["business_name"]?></p>
                        <a>Full Name: <?= $user["firstname"]." ".$user["lastname"]?></a>
                        <br>
                        <a>Title: <?= $user['title']?></a> <!-- replace with current business title -->
                        <br>
                        <a>Street1: <?= $user['street1']?></a> <!-- replace with current business address 1 -->
                        <br>
                        <a>Street2: <?= $user['street2']?></a> <!-- replace with current business address 2 -->
                        <br>
                        <a>City, Country, State: <?= $user['city']?>, <?= $user['country']?>, <?= $user['state']?></a> <!-- replace with current business location -->
                        <br>
                        <a>Industry Listing: <?= $user['industry_listing']?></a> <!-- replace with current business industry listing -->
                        <br>
                        <a>Year Founded: <?= $user['year_founded']?></a> <!-- replace with current business year founded -->
                        <br>
                        <br>
                        <a>About: <?= $user['about']?> </a>
                        <!-- Display "ABOUT" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Number Employees: <?= $user['number_employees']?></a>
                        <!-- DIDSPLAY "Number of employees" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Service & Benefits: <?= $user['service_benefits']?></a>
                        <!-- DISPLAY "Service and Benefits" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Awards: <?= $user['awards']?></a>
                        <!-- DISPLAY "awards" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Associations: <?= $user['associations']?></a>
                        <!-- DISPLAY "Association and affiliations" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Type of Bussiness: <?= $user['type_business_with']?></a>
                        <!-- DISPLAY "business connection" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Type of Artist: <?= $user['type_artist_with']?></a>
                        <!-- DISPLAY "business connection" FOR BUSINESS -->
                        <br>
                        <br>
                        <a>Additional Information: <?= $user['additional_info']?></a>
                        <!-- DISPLAY "additional information" FOR BUSINESS -->
                        <!-- <br>
                        <br>
                        <a>Settings</a> -->
                        <br>
                        <br>
                        <a>Tags: <?= $user['tags']?></a>
                        <br>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- DEFAULT VIDEO. ADD INTRODUCTION VIDEO FROM THE USER FORMS-->
                                    <!-- EMBED THE VIDEO -->
                                    <iframe width="620" height="345" src="https://www.youtube.com/embed/No8-mBek3rs"></iframe>                                                
                                    <h3>Introduction Video</h3>
                                </div>
                            </div>
                            <br>
                            <hr width="100%">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Opportunities</h2>
                                    <br>
                                    <h3>Grants</h3>
                                    <?php foreach($grants as $key=>$row){?>
                                    <div class="text" style="text-align: left;">            
                                            <h4>
                                            <a href="<?= base_url('product/grantindividual/').$row['id']?>">Title: <?= $row['title']?></a>
                                            </h4>
                                            <p>
                                                <strong>Category:</strong>
                                            <?php 
                                                switch($row['listing_option']){ 
                                                    case "-1,0": echo "Basic Post (free)"; break;
                                                    case "14,40": echo "Highlight on listing page (14 days) $40"; break;
                                                    case "-1,30": echo "Highlight in EC Newsletter $30"; break;
                                                    case "14,75": echo "Featured on landing page (14 days) $75"; break;
                                                    case "-1,50": echo "Featured in EC Newsletter $50"; break;
                                                }
                                            ?>
                                            </p>
                                            <p><strong>Amount:</strong> <?= $row['amount']?></p>
                                            <p><strong>Open To:</strong> <?= $row['open_to']?></p>
                                            <p><strong>Deadline:</strong> 
                                                <?= date("Y-m-d", strtotime($row['deadline']))?>
                                            </p>
                                    </div>
                                    <hr width="90%">
                                    <?php }?>
                                    <br>
                                </div>
                            <hr width="100%">
                                <div class="col-md-12">
                                    <br>
                                    <h3>Art Calls</h3>
                                    <?php foreach($artcalls as $key=>$row){?>
                                    <div class="text" style="text-align: left;">            
                                            <h4>
                                            <a href="<?= base_url('product/artcallindividual/').$row['id']?>">Title: <?= $row['title']?></a>
                                            </h4>
                                            <p><strong>Category:</strong>
                                                <?php 
                                                    switch($row['listing_option']){ 
                                                        case "-1,0": echo "Basic Post (free)"; break;
                                                        case "14,40": echo "Highlight on listing page (14 days) $40"; break;
                                                        case "-1,30": echo "Highlight in EC Newsletter $30"; break;
                                                        case "14,75": echo "Featured on landing page (14 days) $75"; break;
                                                        case "-1,50": echo "Featured in EC Newsletter $50"; break;
                                                    }
                                                ?>
                                            </p>
                                            <p><strong>State:</strong>
                                                <?= $row['state_name'] ?>
                                            </p>
                                            <p><strong>Deadline:</strong>
                                                <?= date("Y-m-d", strtotime($row['deadline']))?>
                                            </p>
                                    </div>
                                    <hr width="90%">
                                    <?php }?>
                                </div>
                            <br>
                            <hr width="100%">    
                        </div>
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
