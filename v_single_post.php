
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

      <!-- insert the page content here -->

<?php if(!isset($post))
{
echo "This page was accessed incorrectly";
}

else //display the post
{
?>

        <!-- Title -->
        <h1 class="mt-4"><?=$post['post_title']?></h1>



        <!-- Author -->
        <p class="lead">
          by
          <a href="#"><?= $post['firstname'].' '.$post['lastname']?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <?= date('Y-m-d', strtotime($post['date_added']))?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src=<?= base_url('upload/').$post['image']?> alt="">

        <hr>

        <!-- Post Content -->
        <p><?=$post['post']?></p>

        <hr>

 <?php   if($this->session->userdata('is_user'))//if user is loged in, display comment box
{
?>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
          <form action="<?=  base_url()?>starter/add_comment/<?=$post['post_id']?>" method="post">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="comment"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <?php

}

else {//if no user is loged in, then show the loged in button

?>

<a href="<?=  base_url()?>login">Login to comment</a>

<?php   


}
?>
<hr>

<?php       //if there is comments then print the comments

if(count($comments) > 0)
{

foreach ($comments as $row)
{
?>

        <!-- Single Comment -->
        <div class="media mb-4">
        <div class="text2" style="text-align: left;">
          <div class="media-body">
            <h5 class="mt-0"><?= $row['firstname'].' '.$row['lastname']?></h5>
            <p class="textmuted"><small>commented on <?= date('Y-m-d', strtotime($row['date_added']))?></small></p>
            <?=$row['comment'];?>
          </div>
        </div>
      </div>
  <!-- </div>
  </div>
  </div> -->

      <?php   
}
}
else //when there is no comment
{
echo "<p>Currently, there is no comment.</p>";
}
?>

<?php 
}
?>
</div>
</div>
</div>
</div>
  <!-- /.container -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

