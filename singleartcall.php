
<br>
<div class="text" style="text-align: left;">
<h2><?= $single['title']?></h2>
<br>
</div>
    <img src="<?= base_url('upload/').$single['img']?>" class="img-fluid" alt="Responsive image" />


<!-- Page Content -->
<div class="text" style="text-align: right;">
<h6><span class="date">Posted on <?= date('Y-m-d', strtotime($single['regdate']))?>&nbsp;&nbsp;&nbsp;</span><span class="text-info">by:</span> <?= $single['firstname'].' '.$single['lastname']?>&nbsp;&nbsp;</h6>
</div>
<section class="py-5">
  <div class="container">

  <div class="text1" style="text-align: left;">
   <div>
									<!-- <p><strong>Category: </strong>Grant</p> -->
								<p><strong>Country:  </strong><?= $single['country_name']?></p>
				<p><strong>State:  </strong><?= $single['state_name']?></p>
				<p><strong>City:  </strong><?= $single['city_name']?></p>
                <p><strong>Open To:  </strong><?= $single['open_type']?></p>
                <p><strong>Fee:  </strong><?= $single['fee']?></p>
				<p><strong>Application Deadline: </strong><?= $single['deadline']?></p>
            </div>
            <h5>Summary</h5>
            <p><?= $single['description']?></p>
            
            <h5>Eligibility</h5>
            <p><?= $single['eligibility']?></p>
            
            <h5>Awards</h5>
			<p><?= $single['awards']?></p>

<h5>How to Apply</h5>
<?= $single['how_apply']?>			<div>
				<p><strong>Contact:</strong> </p>
								<p><strong>Website:  </strong> <a href="<?= $single['website']?>">&nbsp;&nbsp;<?php echo $single['website']?></a></p>
			</div>
		</div>

</div>
</div>
</section>