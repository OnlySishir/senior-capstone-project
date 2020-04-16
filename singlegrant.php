
<br>
<div class="text" style="text-align: left;">
<h2><?= $single['title']?></h2>
<br>
</div>
    <img src="<?= base_url('upload/').$single['image']?>" class="img-fluid" alt="Responsive image" />


<!-- Page Content -->
<div class="text" style="text-align: right;">
<h6><span class="date">Posted on <?= date('Y-m-d', strtotime($single['regdate']))?>&nbsp;&nbsp;&nbsp;</span><span class="text-info">by:</span> <?= $single['firstname'].' '.$single['lastname']?>&nbsp;&nbsp;</h6>
</div>
<section class="py-5">
  <div class="container">

  <div class="text1" style="text-align: left;">
   <div>
									<p><strong>Category: </strong>Grant</p>
								<p><strong>Open To:  </strong><?= $single['open_to']?></p>
				<p><strong>Who Should Apply:  </strong><?= $single['who_apply']?></p>
				<p><strong>Application Deadline:  </strong><?= $single['deadline']?></p>
				<p><strong>Grant Amount/Range:  </strong><?= $single['amount']?></p>
				<p><strong>Application Fee: </strong><?= $single['fee']?></p>
            </div>
            <h5>Summary</h5>
			<p><?= $single['summary']?></p>

<h5>How to Apply</h5>
<?= $single['how_apply']?>			<div>
				<p><strong>Contact:</strong> </p>
								<p><strong>Website:  </strong> <a href="<?= $single['website']?>">&nbsp;&nbsp;<?php echo $single['website']?></a></p>
			</div>
		</div>

</div>
</div>
</section>