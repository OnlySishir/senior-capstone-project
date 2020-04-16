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
					<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<header style="background: #4c4f53; color: white; height: 50px; margin-left: -15px; padding: 16px">
							<span style="font-size: 10pt;">Grants Manage</span>
						</header>
						
						<!-- Widget ID (each widget will need unique ID)-->
						<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" style="margin-bottom: 50px">
							<form action="<?= base_url()?>starter/ordreslt" id="login-form" class="smart-form client-form" method="post">
								<header>
									<div class="col-sm-12">
										<?php if(!empty($this->session->grants_id) && $this->session->action=='update'){?>
										<div class="alert alert-success fade in" id="suss">
											<button class="close" data-dismiss="alert">
												×
											</button>
											<i class="fa-fw fa fa-check"></i>
											<strong>Success! </strong> grants_id #<?= $this->session->grants_id ?> Info updated.
										</div>
										<?php }elseif(!empty($this->session->grants_id) && $this->session->action!='update'){?>
										<div class="alert alert-danger fade in" id="err">
											<button class="close" data-dismiss="alert">
												×
											</button>
											<i class="fa-fw fa fa-times"></i>
											<strong>Deleted!</strong> grants_id #<?= $this->session->grants_id ?> was removed.
										</div>
										<?php } ?>
									</div>
								</header>
								
							</form>
							<!-- widget div-->
							<div>
								<!-- widget content -->
								<div class="widget-body no-padding">

									<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
					
								        <thead>
								            <tr>
							                    <th data-class="expand">Title</th>
							                    <th>Summary</th>
							                    <th data-orderable="false">Image</th>
							                    <th data-hide="phone, tablet">Dead Line</th>
							                    <th data-hide="phone, tablet">Regist Date</th>							                    
							                    <th data-hide="phone,tablet">Fee</th>
							                    <th data-hide="phone,tablet">Web Site</th>
							                    <th data-hide="phone,tablet">Tag</th>
							                    <th >Suggester</th>							                    
							                    <th data-hide="phone,tablet" data-orderable="false">Action</th>
								            </tr>
								        </thead>

										<tbody>											
										<?php foreach($grants as $key => $row){?>
											<tr>												
												<td>													
													<a href="#"><?= $row['title']?></a>
												</td>
												<td><?= $row['summary']?></td>
												<td><img src="<?= base_url('upload/').$row['image']?>" width="50"></td>
												<td><?= date('Y-m-d', strtotime($row['deadline']))?></td>
												<td><?= date('Y-m-d', strtotime($row['regdate']))?></td>
												<td><?= $row['fee'] ?></td>
												<td><?= $row['website']?></td>
												<td><?= $row['tag'] ?></td>
												<td><?= trim($row['firstname'].' '.$row['lastname']) ?></td>
												<td align="center">
													<!-- <a  href="" 
														title="Edit Row" data-toggle="modal" data-target="#myModal_" onclick="editAccount(this, <?= $row['id']?>, 'edit')">
														<span class="fa fa-edit"></span>
													</a>
													<a 	href="<?= base_url('admin/usermanproc')?>?rqid=<?= $row['id']?>&act=del" 
														title="Delete selected row" 
														onclick="window.confirm('Are you sure to delete?')">
										        		<i class="fa fa-trash-o"></i>
										        	</a> -->
										        	<label class="btn bg-color-teal txt-color-white"
										        		title="Edit Row" data-toggle="modal" data-target="#myModal_" onclick="editGrants(this, <?= $row['id']?>, 'edit')">
														<span class="fa fa-edit"></span>
													</label>
													<label class="btn bg-color-red txt-color-white"
														title="Delete selected row" onclick="delScript(<?= $row['id']?>)">
										        		<i class="fa fa-trash-o"></i>
										        	</label>
												</td>
											</tr>
										<?php }?>	
										</tbody>

									</table>

								</div>
								<!-- end widget content -->

							</div>
							<!-- end widget div -->

						</div>
						<!-- end widget -->

					</article>
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
			<span class="txt-color-white">Dashboard<span class="hidden-xs"> - Web Application </span> © 2020-02</span>
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

<!-- modal_ -->
<div class="modal fade" id="myModal_" role="dialog">
    <div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title" style="font-weight: bold;">Update Art Call</h4>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-sm-4"><label for="usr">Title:</label><input type="text" class="form-control" id="title" pattern="[A-Za-z0-9]+"></div>
	        		<div class="col-sm-4"><label for="usr">Summary:</label><input type="text" class="form-control" id="summary" pattern="[A-Za-z0-9]+"></div>
	        		<div class="col-sm-4"><label for="usr">Deadline:</label><input type="date" class="form-control" id="deadline"></div>
				</div>	
				<div class="row" style="padding-top: 5px">
	        		<div class="col-sm-4"><label for="usr">Fee:</label><input type="number" class="form-control" id="fee"></div>
	        		<div class="col-sm-4"><label for="usr">Web Site:</label><input type="link" class="form-control" id="website"></div>
	        		<div class="col-sm-4"><label for="usr">Tag:</label><input type="text" class="form-control" id="tag" pattern="[A-Za-z0-9]+"></div>
				</div>	
				<input type="hidden" id="Rid">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateGrants()">&nbsp;Save&nbsp;</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
			</div>					
        </div>
    </div>							      
</div>
<!-- modal_ -->

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
				
				/* COLUMN FILTER  */
			    var otable = $('#datatable_fixed_column').DataTable({
			    	//"bFilter": false,
			    	//"bInfo": false,
			    	//"bLengthChange": false
			    	//"bAutoWidth": false,
			    	//"bPaginate": false,
			    	//"bStateSave": true // saves sort state using localStorage
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
							"t"+
							"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"oLanguage": {
						"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
					},
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_datatable_fixed_column) {
							responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_datatable_fixed_column.respond();
					}		
				
			    });
			    
			    // custom toolbar
			    $("div.toolbar").html('<div class="text-right"><img src="<?= base_url()?>static/admin/img/logo.png" alt="Admin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
			    	   
			    // Apply the filter
			    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
			    	
			        otable
			            .column( $(this).parent().index()+':visible' )
			            .search( this.value )
			            .draw();
			            
			    } );
			    /* END COLUMN FILTER */   
			})
		

		/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
		*/	

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
				school 		: { required : true},
				VIN 		: { required : true},
				CHASSIS 	: {required : true},
				BODY 		: {required : true},
				BUS 		: {required : true}
			},

			// Messages for form validation
			messages : {
				VIN : {
					required : 'Please enter VIN Code'
				}				
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		}); 

		/*Excel form validation*/
		$("#excel-form").validate({
			rules : {
				userfile 	: { required : true},
				email 	: { required : true},
			},

			// Messages for form validation
			messages : {
				userfile : {
					required : 'Please Select the Excel file !'
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

	.jarviswidget-color-blueDark .nav-tabs li:not(.active) a{color: #5f5757 !important}
</style>
<script type="text/javascript">
	$('#left-panel ul li').click(function(e){
		// if(e.target != this) return;
		$('#left-panel ul li').removeClass('actived');

		$(this).addClass('actived');
	});

	//modal update
	function editGrants(e, id, act){
		let dom = $(e).parent().parent().children();
		$('#title').val($(dom[0]).text().trim());
		$('#summary').val($(dom[1]).text().trim());
		$('#deadline').val($(dom[3]).text().trim());
		$('#fee').val($(dom[5]).text().trim());
		$('#website').val($(dom[6]).text().trim());
		$('#tag').val($(dom[7]).text().trim());
		$('#Rid').val(id);
	}

	function updateGrants(){
		let params = {
			'title' 	  : $('#title').val(),
			'summary' 	  : $('#summary').val(),
			'deadline'	  : $('#deadline').val(),
			'fee'         : $('#fee').val(),
			'website'	  : $('#website').val(),
			'tag'	  	  : $('#tag').val(),			
			'id'	      : $('#Rid').val()
		};
		// $.ajax({
		// 	url: '<?= base_url('admin/grantsmanproc/update')?>',
		// 	dataType: 'post',
		// 	data: params,
		// 	success: function(res){
		// 		console.log(res);
		// 		location.reload();
		// 	}

		// });
		window.location.href='<?= base_url('admin/grantsmanproc')?>?act=update&params='+JSON.stringify(params);
	}

	function delScript(id){
		let res = window.confirm('Are you sure to delete?');
		if(res)
			window.location.href='<?= base_url('admin/grantsmanproc')?>?rqid='+id+'&act=del';
	}
</script>
