<style>
    body{
 
}
.main-box.no-header {
    padding-top: 20px;
}
.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.table a.table-link.danger {
    color: #e74c3c;
}
.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}
.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}
.user-list tbody td .user-link {
    display: block;
    font-size: .85em;
    padding-top: 3px;
    margin-left: 60px;
}

.user-list tbody td .paragraph {
    /* display: block; */
    font-size: 1.00em;
    /* padding-top: 3px; */
    margin-left: 1px;
}

a {
    color: #3498db;
    outline: none!important;
}
.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}
.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}
.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}
.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}


</style>



<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<script src="<?= base_url('static/js/jquery.simplePagination.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('static/css/simplePagination.css')?>">

<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                <div class="form-group pull-right">
</div>
<br><br>


<div class="form-group col-md-3">
  <select class="custom-select mr-sm-3" name="department" id="selectJob">
    <option value="" selected="selected">All Members</option>
    <option value="ARTIST/DESIGNER">Artist/Designer</option>
    <option value="BUSINESS/TRADE">Business/Trade</option>
  </select>
</div>

                    <div class="table-responsive">
                      <input type='text' id='txt_searchall' placeholder='Enter search text' class="form-control"><br/>
                      <table class="table user-list" id="myTable">
                        <tbody>
                          <tr><th class="table-header">Members</th></tr>
                          <?php foreach($business_accounts as $key => $row){?>
                            <tr>
                              <td>
                                  <?php if( empty($row['profile_img']) ):?>
                                  <img src="<?= base_url('static/img/profile.png')?>" alt="">
                                  <?php endif;?>
                                  <?php if( !empty($row['profile_img']) ):?>
                                  <img src="<?= base_url('upload/profile/').$row['profile_img']?>" alt="">
                                  <?php endif;?>
                                  <?php if ($row['business_name'] == NULL) { ?>
                                  <p class="paragraph">
                                    <strong><b><?= $row['firstname']." ".$row['lastname'] ?></b></strong><br>
                                  <?php } 
                                  else { ?>
                                    <strong><b><?= $row['business_name']?></b></strong><br>
                                  <?php } ?>
                                  
                                  <?php if ( !empty($row['industry_listing']) ) { ?>
                                    <small><?= $row['industry_listing']?></small><br>
                                  <?php } 
                                  else { ?>
                                  <?php } ?>
                                  <?php if ( !empty($row['state']. $row['country'])) { ?>                                 
                                  <small><?= $row['state']?> &nbsp;<span> <?= $row['country']?></span></small> 
                                  <?php } 
                                  else { ?>
                                  <?php } ?>                                  
                                    <a href="<?= base_url('profile').'?email='.$row['email']?>" class="user-link">View Profile</a>
                                  </p>
                                  <p style="visibility: hidden;">
                                    <?= $row['type']?>
                                  </p>
                              </td>
                            </tr>
                          <?php } ?>   

                          <?php foreach($artist_accounts as $key => $row){?>
                            <tr>
                              <td>
                                  <?php if( empty($row['profile_img']) ):?>
                                  <img src="<?= base_url('static/img/profile.png')?>" alt="">
                                  <?php endif;?>
                                  <?php if( !empty($row['profile_img']) ):?>
                                  <img src="<?= base_url('upload/profile/').$row['profile_img']?>" alt="">
                                  <?php endif;?>
                                 
                                  <?php if ($row['business_name'] == NULL) { ?>
                                  <p class="paragraph">
                                    <strong><b><?= $row['firstname']." ".$row['lastname'] ?></b></strong><br>
                                  <?php } 
                                  else { ?>
                                    <strong><b><?= $row['business_name']?></b></strong><br>
                                  <?php } ?>
                                  
                                  <?php if ( !empty($row['medium_industry']) ) { ?>
                                    <small><?= $row['medium_industry']?></small><br>
                                  <?php } 
                                  else { ?>
                                  <?php } ?>
                                  <?php if ( !empty($row['state']. $row['country'])) { ?>                                 
                                  <small><?= $row['state']?> &nbsp;<span> <?= $row['country']?></span></small> 
                                  <?php } 
                                  else { ?>
                                  <?php } ?> 
                                  
                                    <a href="<?= base_url('profile').'?email='.$row['email']?>" class="user-link">View Profile</a>
                                  </p>
                                  <p style="visibility: hidden;">
                                    <?= $row['type']?>
                                  </p>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                <div class="pagination"></div>
            </div>
        </div>
    </div>
</div>


<!-- <ul id="pagin">
         
</ul> -->
<!-- <script>
function myFunction() {
  const filter = document.querySelector('#myInput').value.toUpperCase();
  const trs = document.querySelectorAll('#myTable tr:not(.header)');
  trs.forEach(tr => tr.style.display = [...tr.children].find(td => td.innerHTML.toUpperCase().includes(filter)) ? '' : 'none');
}
</script> -->

<script>

$( document ).ready(function() {	
	var items = $("table tr");
	var numItems = items.length;
	var perPage = 10;
	items.slice(perPage).hide();
	if(numItems != 0){
		$(".pagination").pagination({
			items: numItems,
			itemsOnPage: perPage,
			cssStyle: "light-theme",
			onPageClick: function(pageNumber) { 
				var showFrom = perPage * (pageNumber - 1);
				var showTo = showFrom + perPage;
				items.hide().slice(showFrom, showTo).show();
			}
		});
	}
});

</script>
<script>
$(document).ready(function(){

// Search all columns
$('#txt_searchall').keyup(function(){
  // Search Text
  var search = $(this).val();

  // Hide all table tbody rows
  $('table tbody tr').hide();

  // Count total search result
  var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;

  if(len > 0){
    // Searching text in columns and show match row
    $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
      $(this).closest('tr').show();
    });
  }else{
    $('.notfound').show();
  }

});

// Search on name column only
$('#txt_name').keyup(function(){
  // Search Text
  var search = $(this).val();

  // Hide all table tbody rows
  $('table tbody tr').hide();

  // Count total search result
  var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("'+search+'")').length;

  if(len > 0){
    // Searching text in columns and show match row
    $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
       $(this).closest('tr').show();
    });
  }else{
    $('.notfound').show();
  }

});

});

// Case-insensitive searching (Note - remove the below script for Case sensitive search )
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
 return function( elem ) {
   return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
 };
});
</script>

<script>
function filterDepartment() {
    var table = document.getElementById("myTable"),
    tr = table.getElementsByTagName("tr"),
    selected = this.value;
  for (var i = 1; i < tr.length; i++) {
    var department = tr[i].cells[0].innerHTML;
    if (department) {
      tr[i].style.display=selected=="" || department.indexOf(selected) > -1 ?"":"none";
    }
  }
}
window.onload=function() { // or addEventListener/attachEvent
  document.getElementById("selectJob").addEventListener("change", filterDepartment);
  
}
</script>

