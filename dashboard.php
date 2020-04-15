<!-- MAIN PANEL -->
<div id="main" role="main">
<!-- <div role="main"> -->

	<!-- MAIN CONTENT -->
	<div id="content">

		<!-- widget grid -->
		<section id="widget-grid" class="">

			<!-- row -->
			<div class="row">
				
				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" style="margin-bottom: 50px">
						<!-- widget div-->
						<form action="<?= base_url()?>starter/ordreslt" id="login-form" class="smart-form client-form" method="post">
							<header style="background: #4c4f53; color: white">
								<span style="font-size: 10pt">User Requests</span>
							</header>
							<article class="col-sm-12">
								<?php if(isset($this->session->rType) && $this->session->rType=='Accepted'){?>
								<div class="alert alert-success fade in" id="suss">
									<button class="close" data-dismiss="alert">
										×
									</button>
									<i class="fa-fw fa fa-check"></i>
									<strong>Accepted ! >
										<?= $this->session->content['firstname']." ".$this->session->content['lastname']?>
									</strong>
									- <?= $this->session->content['email']." - ".$this->session->content['lastname']?>
								</div>
								<?php }elseif(isset($this->session->rType) && $this->session->rType!='Accepted'){ ?>
								<div class="alert alert-danger fade in" id="err">
									<button class="close" data-dismiss="alert">
										×
									</button>
									<i class="fa-fw fa fa-times"></i>
									<strong>Rejected ! >
										<?= $this->session->content['firstname']." ".$this->session->content['lastname']?>
									</strong> 
									- <?= $this->session->content['email']." - ".$this->session->content['lastname']?>
								</div>
								<?php } ?>
							</article>

							<?php if( !empty($this->session->msg) ){?>
							<center>
							    <div class="alert alert-success" style="width: 500px; margin: 10px 0">
							      <strong> Approved! </strong> 
							      <?= $this->session->msg?> 							      
							    </div>        
							</center>
							<?php } ?>

							<?php if( !empty($this->session->error_msg) ){?>
							<center>
							    <div class="alert alert-danger" style="width: 500px; margin: 10px 0">
							      <strong> Declined! </strong> 
							      <?= $this->session->error_msg ?> 
							    </div>        
							</center>
							<?php } ?>
							
							<!-- problem inputting here -->
							<fieldset>
								<label class="label">Requests: <strong><?= count($requests)?></strong> user</label>
								<div class="table-responsive">
									<table class="table table-striped table-bordered" width="100%" >
									    <thead>
									      <tr>
									        <th data-class="expand">Full Name</th>
									        <th data-class="expand">Email</th>
									        <th >Business Verify</th>
									        <th data-hide="phone, tablet">Website</th>
									        <th data-hide="phone, tablet">Requested Time</th>
									        <th style="text-align: center;">Action</th>
									      </tr>
									    </thead>
									    <tbody id="orderpushed">									    
									    <?php foreach($requests as $key=>$row){?>
									      <tr>
									        <td><?= $row['firstname'].' '.$row['lastname']?></td>
									        <td><?= $row['email']?></td>
				        <td>
				        	<?php if(!empty($row['file_upload'])):?>
				        	<a href="<?= base_url('upload/').$row['file_upload']?>" target="_blank">View Detail</a>
					        	
					        	<?php if(empty($row['file_ok'])):?>
						        	<label class="btn btn-success" title="OK" onclick="fileok(<?= $row['id']?>)">&nbsp;OK&nbsp;</label>
						        	<label class="btn bg-color-blueDark txt-color-white" title="NO" onclick="fileno(<?= $row['id']?>)">&nbsp;NO&nbsp;</label>
					        	<?php endif;?>

					        	<?php if(!empty($row['file_ok'])):?>
					        		<?php $row['file_ok']=='ok' ? 
					        			  print('<label class="btn-success">Certified</label>') : 
					        			  print('<label class="bg-color-blueDark txt-color-white">Declined</label>')
					        		?>
					        	<?php endif;?>

				        	<?php endif;?>
				        </td>
									        <td><?= $row['link']?></td>
									        <td><?= date('Y-m-d H:i', strtotime($row['date']))?></td>
									        <td align="center">
												<label class="btn btn-success" title="Accept Request" 
													onclick="acceptScript(<?= $row['id']?>)">Accept</label>
												
												<label class="btn bg-color-blueDark txt-color-white" title="Reject Request" 
													onclick="rejectScript(<?= $row['id']?>)">Reject</label>
									        </td>
									      </tr>
									    <?php }?>
									    </tbody>
									</table>																			
								</div>
								<!--  -->
							</fieldset>	
							<!-- problem inputi8ng end -->

							<footer>
								<div class="col-md-12">
									<!-- <button type="submit" class="btn btn-primary" >Order</button> -->
								</div>							
							</footer>
						</form>	
						<!-- end widget content -->

						</div>
						<!-- end widget div -->

					</div>
					<!-- end widget -->

				</article>
				<!-- WIDGET END -->
				
			</div>

			<!-- end row -->

			<!-- row -->

			<div class="row">

				<!-- a blank row to get started -->
				<div class="col-sm-12">
					<!-- your contents here -->
				</div>
					
			</div>

			<!-- end row -->

		</section>
		<!-- end widget grid -->


	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- PAGE FOOTER -->
<div class="page-footer">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<span class="txt-color-white"> Dashboard <span class="hidden-xs"> - Web Application </span> © 2020-02</span>
		</div>

		<div class="col-xs-6 col-sm-6 text-right hidden-xs">
			<div class="txt-color-white inline-block">
				<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
				<div class="btn-group dropup">
					<button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
						<i class="fa fa-link"></i> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right text-left">
						<li>
							<div class="padding-5">
								<p class="txt-color-darken font-sm no-margin">Download Progress</p>
								<div class="progress progress-micro no-margin">
									<div class="progress-bar progress-bar-success" style="width: 50%;"></div>
								</div>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="padding-5">
								<p class="txt-color-darken font-sm no-margin">Server Load</p>
								<div class="progress progress-micro no-margin">
									<div class="progress-bar progress-bar-success" style="width: 20%;"></div>
								</div>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="padding-5">
								<p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
								<div class="progress progress-micro no-margin">
									<div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
								</div>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="padding-5">
								<button class="btn btn-block btn-default">refresh</button>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE FOOTER -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?= base_url()?>static/admin/js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="<?= base_url()?>static/admin/js/libs/jquery-2.1.1.min.js"></script>
<script src="<?= base_url()?>static/admin/js/libs/jquery-ui-1.10.3.min.js"></script>

<!-- IMPORTANT: APP CONFIG -->
<script src="<?= base_url()?>static/admin/js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="<?= base_url()?>static/admin/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="<?= base_url()?>static/admin/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="<?= base_url()?>static/admin/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="<?= base_url()?>static/admin/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="<?= base_url()?>static/admin/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="<?= base_url()?>static/admin/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="<?= base_url()?>static/admin/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="<?= base_url()?>static/admin/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="<?= base_url()?>static/admin/js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="<?= base_url()?>static/admin/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="<?= base_url()?>static/admin/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="<?= base_url()?>static/admin/js/plugin/fastclick/fastclick.min.js"></script>


<!-- MAIN APP JS FILE -->
<script src="<?= base_url()?>static/admin/js/app.min.js"></script>


<script src="<?= base_url()?>static/admin/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>static/admin/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="<?= base_url()?>static/admin/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="<?= base_url()?>static/admin/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url()?>static/admin/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script type="text/javascript">

	$(document).ready(function() {
	 	
		 pageSetUp();
		 
		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

		/* END BASIC */

		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				mileage 	: { required : true},
				notes 		: { required : true},
				textcolor 	: {required : true},
			},

			// Messages for form validation
			messages : {
				location : {
					required : 'Please enter location'
				}				
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		}); 
		
		
	})

</script>
<style type="text/css">
	.jarviswidget-ctrls a{padding-top: 10px !important;}
	.jarviswidget-loader{padding-top: 10px !important;}
	#header div span a{padding-top: 7px !important;}
	/*hearder bar css customizing*/
	#content{padding: 0 10 0 0px !important}
	.login-info{height: 65px}
	.login-info>span{height: 65px;}
	#left-panel ul li.actived { background: #777777;}
	#left-panel ul li.actived span{color: white}
</style>
<script type="text/javascript">
	$('#left-panel ul li').click(function(e){
		// if(e.target != this) return;
		$('#left-panel ul li').removeClass('actived');

		$(this).addClass('actived');
	});

	function acceptScript(id){
		let res = window.confirm('Are you sure Approve ?');
		if(res)
			window.location.href="<?= base_url('admin/dashproc')?>?rqid="+id+"&act=accept" ;	
		
	}

	function rejectScript(id){
		let res = window.confirm('Are you sure to Reject Request?');		
		if(res) 
			window.location.href="<?= base_url('admin/dashproc')?>?rqid="+id+"&act=reject";
	}

	function fileok(id){
		let res = window.confirm('Are you sure to Approve this file?');		
		if(res) 
			window.location.href="<?= base_url('admin/dashproc')?>?rqid="+id+"&fileok=ok";
	}

	function fileno(id){
		let res = window.confirm('Are you sure to Decline this file?');		
		if(res) 
			window.location.href="<?= base_url('admin/dashproc')?>?rqid="+id+"&fileok=no";
	}
</script>
