<head>
    <title>Blog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main Stylesheet File -->
    <link href="<?= base_url('static/css/blog.css')?>" rel="stylesheet" />

  </head>
  <body>


<section class="blog-list px-3 py-5 p-md-5">
<div class="text2" style="text-align: left;">
            <div class="container">

            <?php  
                        if (($this->session->myRole == "member,basic_artist,author") || ($this->session->myRole == "member,basic_business,author") || ($this->session->myRole == "member,pro_artist,author") || ($this->session->myRole == "member,pro_business,author") ) {?>
                        <h2><a style="color: green" href="<?=  base_url()?>starter/new_post/"><span class="fa fa-pencil"></span> Create a new post</a></h2>

                        <?php } ?>
                        <br>
                        <br>
                        <?php foreach($posts as $key => $row){?>


                <div class="item mb-5">
                    <div class="media">
                        <img class="mr-3 img-fluid post-thumb d-none d-md-flex"
                            src="<?= base_url('upload/').$row['image']?>" alt="image">
                        <div class="media-body">

                            <h3 class="title mb-1"><a href="<?=  base_url()?>starter/post/<?=$row['post_id']?>"><?=$row['post_title'];?></a></h3>


                            <?php if (($this->session->myRole == "member,basic_artist,author") || ($this->session->myRole == "member,basic_business,author") || ($this->session->myRole == "member,pro_artist,author"))

                            { ?>


<a href="<?=  base_url()?>starter/editpost/<?=$row['post_id']?>"> <span class="fa fa-pencil-square-o" title="Edit post"></span></a> | 

<a href="<?=  base_url()?>starter/deletepost/<?=$row['post_id']?>"><span class="fa fa-trash" title="Delete post"></span></a>

</p>
                            <?php  } ?>

                            <div class="meta mb-1"><span class="date">Posted on <?= date('Y-m-d', strtotime($row['date_added']))?></span></div>
                            <div class="intro"><p><?=  substr(strip_tags($row['post']), 0, 200).'...';?></p></div>
                            <a class="more-link" href="<?=  base_url()?>starter/post/<?=$row['post_id']?>">Read more &rarr;</a>
                        </div>
                        <!--//media-body-->
                    </div>
                    <br>
                    <hr>

                

                    <?php

}

?>

<?=$pages?>
            


                    <!--//media-->
                </div>
                <!--//item-->
                    <!--//media-->
                </div>
    
                <!-- <nav class="blog-nav nav nav-justified my-5">
                    <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i
                            class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                    <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i
                            class="arrow-next fas fa-long-arrow-alt-right"></i></a>
                </nav> -->
    
            </div>
        </section>


    </div>

</div>



