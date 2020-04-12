<?php header('Cache-Control: no cache'); ?>

<br>
<table>
<?php if (!$results){ ?>

  <h1> No results found. </h1>

<?php 
}

else { ?>
 <h2> Search Results </h2>
<br>
<table class="table">


<?php    foreach($results as $row){ 

        if($row->type == 'grant'){ ?>

                <!-- grants search results -->

                <tr>
                 <td><h2>&nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>product/grantindividual/<?=$row->id?>"><?php echo $row->title?><br>
                    </h2></a><br>
                    <div class="text2" style="text-align: left;">
                    <p><?=  substr(strip_tags($row->summary), 0, 200).'...';?></b>
                    <a class="more-link" href="<?=  base_url()?>product/grantindividual/<?=$row->id?>">Read more &rarr;</a>
                    </div>
                 </td>
            
                </tr>

                <!-- art call search results -->

        <?php }elseif($row->type == 'art') { ?>

                <tr>
                  <td><h2>&nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>product/artcallindividual/<?=$row->id?>"><?php echo $row->title?></h2></a><br>
                  <div class="text2" style="text-align: left;">
                  <p><?=  substr(strip_tags($row->summary), 0, 200).'...';?></p>
                  <a class="more-link" href="<?=  base_url()?>product/artcallindividual/<?=$row->id?>">Read more &rarr;</a>
                  </div>
                  </td>
                </tr>

                <!-- product search results -->

        <?php } elseif($row->type == 'pro') { ?>

                <tr>
                <!-- if user is logged in then go to invidual product page or else go to view single product page. -->
                    <?php if ($this->session->userdata('is_user')) { ?>

                  <td><h2>&nbsp;&nbsp;&nbsp;<a href="<?= base_url('product/individual/').$row->id?>"><?php echo $row->title?></h2></a><br>
                <?php } else { ?>

                    <td><h2>&nbsp;&nbsp;&nbsp;<a href="<?= base_url('product/view_product/').$row->id?>"><?php echo $row->title?></h2></a><br>

                  <?php } ?>
                  <div class="text2" style="text-align: left;">
                  <p><?=  substr(strip_tags($row->summary), 0, 200).'...';?></p>
                  <a class="more-link" href="<?=  base_url()?>product/individual/<?=$row->id?>">Read more &rarr;</a>
                  </div>
                </td>
                </tr>

        <?php }
        

         } 
     }
     
    ?>

</table>

<br>