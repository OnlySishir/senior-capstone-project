<style>
hr.new4 {
  border: 1px solid red;
}
</style>

<br>
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

<br>
<br>

<h2> Featured Listing </h2>
<div class="text" style="text-align: left;">
			
				<h1>
					<a href="">Featured Grant</a>
				</h1>
									<p><strong>Category:</strong> Grant</p>
								<p><strong>Amount:</strong> between $200 and $2,500</p>
				<p><strong>Open To:</strong> Entries from United States (US) only</p>
				<p><strong>Deadline:</strong> Date</p>
</div>
<br>
<hr class="new4">


<?php foreach($grantlist as $key => $row){?>
<div class="text" style="text-align: left;">			
	<h1>
		<a href="<?= $row['website']?>"><?= $row['title']?></a>
	</h1>
	<p><strong>Category:</strong> <?= $row['type_funding']?></p>
	<p><strong>Amount:</strong> <?= $row['amount']?></p>
	<p><strong>Open To:</strong> <?= $row['open_to']?></p>
	<p><strong>Deadline:</strong> <?= date('Y-m-d', strtotime($row['deadline']))?></p>
</div>
<hr width="90%">
<?php }?>

