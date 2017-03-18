<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" type="image/png" href="plugins/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="plugins/images/favicon-16x16.png" sizes="16x16" />

  <!-- title -->
  <title>Client registration</title>

 <!-- Bootstrap Core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Footable CSS -->
  <link href="plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
  <link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
 <!-- Menu CSS -->
  <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="css/animate.css" rel="stylesheet">
<!-- Wizard CSS -->
<link href="plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="css/colors/MyThemeColor.css" id="theme"  rel="stylesheet">
  <!--alerts CSS -->
  <link href="js/Alert/sweetalert.css" rel="stylesheet" type="text/css">
  <!---switch -->
  <link href="plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="plugins/bower_components/dropify/dist/css/dropify.min.css">
	  <!-- Date picker plugins css -->
<link href="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker plugins css -->
<link href="plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
 <script type="text/javascript">

	  $(document).ready(function(){



			var shift =1;
			//Span for count of selected guards
            var value = parseInt($(".myspan").text(), 10) + 1;
			//Span for the remaining guards that need to be selected to meet the limit
			var value2 = parseInt($(".deploysecu").text(), 10) + 1;


	  });

</script>

  </head>


<!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

<!-- fix header and sidebar -->
<body class="fix-header fix-sidebar">

  <div id="wrapper">
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
	  <!-- navbar-header -->
      <div class="navbar-header">
		<a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

          <ul class="nav navbar-top-links navbar-left hidden-xs">
          	<li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
		  </ul>

       	  <ul class="nav navbar-top-links navbar-right pull-right">

			  	 <!-- Incident report -->
			 <li class="dropdown">
			   <a class="waves-effect waves-light" href="IncidentReport.html">
				 <span class="mytooltip tooltip-effect-7">
                    <span class="tooltip-item">
					  <i class="fa fa-warning"></i>
				      <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
					</span>
                    <span class="tooltip-table2 clearfix">
                      <span class="tooltip-texth2">
			 Reports
					  </span>
                    </span>
                 </span>
			   </a>
        	 </li>
			 <!-- Messages-->
			 <li class="dropdown">
			   <a class="waves-effect waves-light" href="Messages.html">
				 <span class="mytooltip tooltip-effect-7">
                    <span class="tooltip-item">
					  <i class="icon-envelope"></i>
				      <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
					</span>
                    <span class="tooltip-table2 clearfix">
                      <span class="tooltip-texth2">
					  Messages
					  </span>
                    </span>
                 </span>
			   </a>
        	 </li>

			 <!-- Announcements-->
			 <li class="dropdown">
				 <a class="waves-effect waves-light" href="Announcement.html">
					 <span class="mytooltip tooltip-effect-7">
						 <span class="tooltip-item">
							 <i class="fa fa-bullhorn"></i>
					 </span>
                      <span class="tooltip-table2 clearfix">
                      <span class="tooltip-texth">
						Announcements
					  </span>
                      </span>
                    </span>
				</a>
             </li>



			 <!-- Admin account-->
             <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/users/admin.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Ernest</b> <small>(Admin)</small>  </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a> </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>

		 <!-- System logo-->
         <div class="top-left-part"><a class="logo" href="Dashboard.html"><b><img src="plugins/images/users/logoicon2.png" height="60" alt="Systemlogo" /></b><span class="hidden-xs"><img src="plugins/images/users/logotext2.png" height="40" alt="Systemname" /></span></a>
         </div>

     </div>
      <!-- /.navbar-header -->
    </nav>
    <!-- End Top Navigation -->
   <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
    	<div class="sidebar-nav navbar-collapse" id="slimtest4">
			<ul class="nav" id="side-menu">

                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="plugins/images/LandingPage/JUCEBER.png" alt="user-img" class="img-circle"><span class="hide-menu text-white">Jubecer security</span>
                        </a>
                    </li>

				<li> <a href="dashboard.html" class="waves-effect"><i class="fa fa-dashboard fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Dashboard </span> </a>
          		</li>

          		<li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-wrench fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Maintenance  <span class="fa arrow"></span></a>
             		<ul class="nav nav-second-level">
						<li> <a href="javascript:void(0)" class="waves-effect">Clients <span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
                       			<li> <a href="Services.html">Services</a> </li>
                        		<li> <a href="NatureOfBusiness.html">Nature of business</a></li>
                    		</ul>
               			</li>
                		<li> <a href="javascript:void(0)" class="waves-effect">Security guards <span class="fa arrow"></span></a>
                    		<ul class="nav nav-third-level">
								<li> <a href="MilitaryServices.html">Military services</a></li>
								<li> <a href="Ranks.html">Rank</a></li>
								<li> <a href="BodyAttributes.html">Body attributes</a></li>
							<li> <a href="Leave.html">Leave</a></li>
							<li> <a href="licensessAndClearances.html">licensess and clearances</a> </li>
							<li> <a href="Guns.html">Guns</a> </li>
							</ul>
						</li>
                		<li> <a href="javascript:void(0)" class="waves-effect">Others<span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
                        		<li> <a href="#">Area</a> </li>
								<li> <a href="Uom.html">Unit of measurement</a> </li>
								<li> <a href="Requirements.html">Requirements</a> </li>
                    		</ul>
						</li>
             		</ul>
					</li>


          			<li> <a href="javascript:void(0);" class="waves-effect active"><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
						<ul class="nav nav-second-level">
							<li> <a href="ClientRegistration.html" class="waves-effect">Clients</a>
							</li>
							<li> <a href="SecurityGuardsRegistration.html" class="waves-effect">Security guards</a>
							</li>
             			</ul>
					</li>

		   	      <li><a href="javascript:void(0);" class="waves-effect"><i class="fa fa-exchange fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Manual deployment<span class="fa arrow"></span></a>
					  <ul class="nav nav-second-level">
						  <li> <a href="Deploy.html" class="waves-effect">Deploy</a>
						  </li>
						  <li> <a href="Replace.html" class="waves-effect">Replace</a>
						  </li>
						    <li> <a href="Swap.html" class="waves-effect">Swap</a>
						  </li>
             		</ul>
	      		  </li>

				  <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></a>
					 <ul class="nav nav-second-level">
						 <li> <a href="ActiveClients.html" class="waves-effect">Active<span class="label label-rouded label-info pull-right">4</span></a>
						</li>
						<li> <a href="PendingClients.html" class="waves-effect">Pending request<span class="label label-rouded label-info pull-right">3</span></a>
						</li>

					 </ul>
				  </li>

				  <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shield fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Security guards<span class="fa arrow"></span> </a>
					 <ul class="nav nav-second-level">
						<li> <a href="guards.html" class="waves-effect">Guards<span class="label label-rouded label-info pull-right">13</span></a>
						</li>
						<li> <a href="guardslicenses.html" class="waves-effect">Guard licenses<span class="label label-rouded label-info pull-right">13</span></a>
						</li>
						 	<li> <a href="guardsdtr.html" class="waves-effect">Guard's DTR</a>
						</li>
					 </ul>
				  </li>

				  <li> <a href="Availableapplicants.html" class="waves-effect"><i class="icon-user-follow fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Applicants  </a>
				  </li>

				  <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-truck fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Delivery <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
						<li> <a href="Deliverguns.html" class="waves-effect">Guns</a>
						</li>
						<li> <a href="DeliverAmmunitions.html" class="waves-effect">Ammunitions</a>
						</li>
						<li> <a href="pickups.html" class="waves-effect">Pickups</a>
						</li>
					 </ul>
				  </li>



				  <li> <a href="#" class="waves-effect"><i class="fa fa-file-text fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Reports</span></a>
				  </li>

				  <li> <a href="#" class="waves-effect"><i class="fa fa-search fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Queries</span></a>
				  </li>


				  <li> <a href="#" class="waves-effect"><i class="fa fa-cogs fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Utilities<span class="fa arrow"></span></span></a>
					<ul class="nav nav-second-level">
					  <li><a href="#">Account settings</a></li>
					</ul>
				  </li>
        	</ul>
      	</div>
    </div>
	<!-- Left navbar-header end -->



 <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Security guards registration</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li class="active"><a href="#">Dashboard</a></li>
            <li class="active">Register</li>
			<li class="active"><a href="SecurityGuardsRegistration.html">Security guards</a></li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->

      <!-- /.row -->
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="white-box">
            <div class="row">
					<div class="alert alert-info"> Please input each forms correctly and completely base on the information of the employee given. </div>
 <div id="exampleValidator" class="wizard">
             <ul class="wizard-steps" role="tablist" style="border: 1px solid black;">
                   		<li class="active" role="tab">
                            <h4><span><i class="ti-user"></i></span>Personal Info</h4>
                        </li>
                        <li role="tab">
                            <h4><span><i class="fa fa-book"></i></span>Educational Background</h4>
                        </li>
                        <li role="tab">
                            <h4><span><i class="ti-file"></i></span>Requirements, licenses and clearances</h4>
                        </li>
				 		<li role="tab">
                            <h4><span><i class="fa fa-info-circle"></i></span>More background informations</h4>
                        </li>
				 		<li role="tab">
                            <h4><span><i class="fa fa-check"></i></span>Summary</h4>
                        </li>
             </ul>

		</br> </br>

                    <form id="validation" class="form-horizontal animated fadeInUp" style="border: 2px solid black; border-radius:15px;">
                        <div class="wizard-content">

                            <div class="wizard-pane active" role="tabpanel">
	                    	</br>
								<div class="form-group">
                                    <label class="col-xs-1 control-label">First name</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control name"  />
                                    </div>
									<label class="col-xs-2 control-label">Middle name</label>
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control"  />
                                    </div>
									 <label class="col-xs-1 control-label">Last name</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control"  />
                                    </div>
                                </div>
                       	     	<div class="form-group">
                                    <label class="col-xs-1 control-label">Place of birth</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" name="noblank"  />
                                    </div>
                                    <label class="col-xs-2 control-label">Date of birth</label>
                                    <div class="col-xs-4">
                                        <div class="input-group">
											<span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="noblank">
										</div>
                                    </div>
                                </div>
								<div class="form-group">
									 <label class="col-xs-2 control-label">Gender</label>
									    <div class="col-xs-3">
											<select class="form-control"  name="noblank">
												<option></option>
												<option>Male</option>
												<option>Female</option>
											</select>
										</div>
									 <label class="col-xs-2 control-label">Marital status</label>
									    <div class="col-xs-3">
											<select class="form-control"  name="noblank">
												<option></option>
                          						<option>Single</option>
                    							<option>Maried</option>
												<option>Seperated</option>
                    							<option>Widowed</option>
											</select>
										</div>
                                </div>
                                <div class="form-group">
									  <label class="col-xs-1 control-label">Address</label>
										<div class="col-xs-11">
											<input type="text" class="form-control" name="noblank" />
										</div>

                                </div>
		          <div class="form-group">

		  														 <label class="col-xs-1 control-label">2x2 picture</label>
					<div class="col-xs-5">
						       <input type="file" id="input-file-max-fs" class="dropify-fr" 	data-max-height="226" data-max-width="226" data-mind-height="224" data-min-width="224" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/personincharge.jpg">

							      </div>

		  														 <label class="col-xs-1 control-label">Image of location</label>
					<div class="col-xs-5">
                                  <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/location.jpg">
						<span class="font-13 text-muted">Recommended: Screenshot from google map<span>

							      </div>
						 </div>
								<div class="form-group">

									<h4> <strong>Contact information </strong></h4>
									</br>
									<label class="col-xs-1 control-label">Telephone</label>
                                    	<div class="col-xs-2">
                               				<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-phone"></i></div>
										        <input type="text" class="form-control"  id="numonly" data-mask="9999999" >
											</div>
											<span class="font-13 text-muted">ex. 1234567<span>
										</div>
									<label class="col-xs-1 control-label">Cellphone</label>
                                    	<div class="col-xs-2">
                               				<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-mobile"></i></div>
											    <input type="text" class="form-control"  name="numonly" data-mask="99999999999">
											</div>
											<span class="font-13 text-muted">ex. 09123456789<span>
										</div>
											<label class="col-xs-2 control-label">Email address</label>
										<div class="col-xs-4">
                               				<div class="input-group">
												<div class="input-group-addon"><i class="ti-email"></i></div>
										        <input type="text" class="form-control" name="email">
											</div>
											<span class="font-13 text-muted">ex. myemail@yahoo.com<span>
										</div>
                                </div>
				<div class="form-group">
								    <h4> <strong>Body attributes</strong></h4>
                                 	</br>

									 <div class="table-responsive">
                                		<table class="table color-bordered-table inverse-bordered-table">
											<thead>
												<tr>
													<th>Body attribute</th>
                                            		<th>Specification</th>
													<th>Measurement</th>
                                        		</tr>
                                    		</thead>
                                    		<tbody>
                                          @foreach($a as $a)
                                          <tr>
                        <td>{{$a->name}}</td>
                        <td><input type="text" class="form-control" name="noblank"  /></td>
                        <td>{{$a->measurement}}</td>
                                          </tr>
                                          @endforeach

                                    		</tbody>
                                		</table>
									</div>

                                </div>
                            </div>

                            <div class="wizard-pane" role="tabpanel">
								 <h4> <strong>Educational background </strong></h4>
								 </br>	</br>   </br>   </br>
                              	 <div class="form-group">
                                    <label class="col-xs-3 control-label"><center><strong>Level</strong> </center></label>
									<label class="col-xs-5 control-label"><center><strong>Name of school</strong> </center></label>
									<label class="col-xs-3 control-label"><strong>Attended From/To</strong></label>
                                </div>
								<div class="form-group">
								</br> </br>
                                    <label class="col-xs-2 control-label"><strong>Primary</strong></label>
        							<label class="col-xs-1 control-label"></label>
										<div class="col-xs-5">
                            				<input type="text" class="form-control"/>
                    					</div>
										<label class="col-xs-1 control-label"></label>
										<div class="col-xs-1">
                     						<input class="form-control" type="text" id="primaryfrom-date-range">
                    					</div>
        								<label class="col-xs-1 control-label"> <center> To </center></label>
										<div class="col-xs-1">
                     						<input class="form-control" type="text" id="primaryto-date-range">
                    					</div>

                         		</div>
								<div class="form-group">

                                  <label class="col-xs-2 control-label"><strong>Secondary</strong></label>
        						  <label class="col-xs-1 control-label"></label>
										<div class="col-xs-5">
                            				<input type="text" class="form-control"/>
										</div>
										<label class="col-xs-1 control-label"></label>
										<div class="col-xs-1">
                     						<input class="form-control" type="text" id="secondaryfrom-date-range">
                    					</div>
										<label class="col-xs-1 control-label"> <center> To </center></label>
										<div class="col-xs-1">
                     						<input class="form-control" type="text" id="secondaryto-date-range">
                    					</div>

                                </div>
							  <div class="form-group">

                                 <label class="col-xs-2 control-label"><strong>Tertiary</strong></label>
        						 <label class="col-xs-1 control-label"></label>
									<div class="col-xs-5">
                            			<input type="text" class="form-control"/>
                    				</div>
									<label class="col-xs-1 control-label"></label>
									<div class="col-xs-1">
                     					<input class="form-control" type="text" id="tertiaryfrom-date-range">
									</div>
									<label class="col-xs-1 control-label"> <center> To </center></label>
									<div class="col-xs-1">
                     					<input class="form-control" type="text" id="tertiaryto-date-range">
                    				</div>

							  </div>

							  <div class="form-group">
								   </br></br>
                                 <label class="col-xs-4 control-label">Degree obtained</label>

									<div class="col-xs-5">
                            			<input type="text" class="form-control"/>
									</div>

							  </div>
                          </div>
                      <div class="wizard-pane" role="tabpanel">
						 <h4> <strong>licensess and clearances</strong></h4>
							</br>
							<div class="form-group">
								@foreach($l as $l)
                <label class="col-xs-5 control-label"></label>
									<div class="col-xs-3">
                           				<div class="checkbox checkbox-success">
											<input id="checkbox1" type="checkbox">
                  							<label for="checkbox1"> {{$l->name}} </label>
										</div>
                    </div>

								</br>
                @endforeach
						 </div>
								<h4> <strong>Requirements</strong></h4>
								</br>

									@foreach($r as $r)
                  <label class="col-xs-5 control-label"></label>
									<div class="col-xs-3">
                           				<div class="checkbox checkbox-success">
											<input id="checkbox16" type="checkbox">
											<label for="checkbox16"> {{$r->name}} </label>
                						</div>
									</div>
									</br>
                  @endforeach
                    </div>
						<div class="wizard-pane" role="tabpanel">
								<h4> <strong>Military service</strong></h4>
								</br>
								<center><button class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#AddMili"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</button> </center>
								</br>	</br>

									<div class="form-group">
									 <div class="table-responsive">
                                		<table class="table color-bordered-table inverse-bordered-table">
											<thead>
												<tr>
													<th>Military service</th>
                                            		<th>Rank</th>
													<th>Serial number</th>
													<th>Period of service From</th>
													<th>To</th>
													<th width="50px">Delete</th>
                                        		</tr>
                                    		</thead>
                                    		<tbody>
                                        		<tr>
													<td>Sample</td>
													<td>Sample</td>
													<td>Sample</td>
														<td>Sample</td>
													<td>Sample</td>
													<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
                                        		</tr>
												<tr>
                                            		<td>Sample</td>
													<td>Sample</td>
                                            		<td>Sample</td>
														<td>Sample</td>
													<td>Sample</td>
													<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
												</tr>
												<tr>
													<td>Sample</td>
													<td>Sample</td>
													<td>Sample</td>
													<td>Sample</td>
													<td>Sample</td>
													<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
                                        		</tr>
                                    		</tbody>
                                		</table>
									</div>
								   </div>
								</br>

								<h4> <strong>Training, Seminars, and Exams taken</strong></h4>
								</br>
								<center><button class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#Addtse"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</button> </center>
								</br>	</br>

									<div class="form-group">
									 <div class="table-responsive">
                                		<table class="table color-bordered-table inverse-bordered-table">
											<thead>
												<tr>
													<th>Name</th>
                                            		<th>Ratings</th>
													<th>Date taken</th>
													<th width="50px">Delete</th>
                                        		</tr>
                                    		</thead>
                                    		<tbody>
                                        		<tr>
													<td>Sample</td>
													<td>Sample</td>
													<td>Sample</td>
													<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
                                        		</tr>
												<tr>
                                            		<td>Sample</td>
													<td>Sample</td>
                                            		<td>Sample</td>
													<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
												</tr>
												<tr>
													<td>Sample</td>
													<td>Sample</td>
													<td>Sample</td>
													<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
                                        		</tr>
                                    		</tbody>
                                		</table>
									</div>
								   </div>
								<h4> <strong>Special skills and other qualifications</strong></h4>
								</br>
								<center><button id="demo-btn-addrow"  class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</button> </center>
								</br>	</br>

									<div class="form-group">
												<label class="col-xs-3 control-label"></label>
											<div class="col-xs-6">


										<table id="demo-foo-addrow" class="table color-bordered-table inverse-bordered-table"
              data-page-size="100">
              <thead>
                <tr>
                  <th data-sort-ignore="true"  data-sort-initial="true" data-toggle="true">No.</th>
                  <th data-sort-ignore="true" >Skills</th>
                  <th data-sort-ignore="true" class="min-width" width="50px">Delete</th>
                </tr>
              </thead>
              <div class="form-inline padding-bottom-15">
                <div class="row">
                  <div class="col-sm-6">
                  </div>
                  <div class="col-sm-6 text-right m-b-20">
                    <div class="form-group">
                      <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                        autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
													</div>
              <tbody>
                <tr>
                  <td id="data1">1</td>

                  <td>
				<input type="text" class="form-control" name="noblank" />
				  </td>
					    <td>
				X
				  </td>
                </tr>


              </tbody>
            </table>
								   </div>
							</div>
	</div>

                      <div class="wizard-pane" role="tabpanel">

						<!--TODO: nakakatamad :( Summary of registration-->

                     </div>


                </div>
			</div>
        </div>
<!-- Add training, seminars, exams Modal -->
    <div id="Addtse" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add trainings/seminars/exams</h4>
            </div>
            <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
                   <div class="form-group col-sm-8">
                      <label class="control-label">Name</label>
                       <input type="text" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
					   <div class="form-group col-sm-4">
                       <label class="control-label">Ratings</label>
                       <input type="text" class="form-control" required>
                       <div class="help-block with-errors"></div>
                    </div>
                  <div class="col-md-12">
                      <label class="control-label  col-md-12">Date taken</label>
                    <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="dp-datetaken" placeholder="mm/dd/yyyy">
                  </div>
                 </div>
                   <div class="help-block with-errors"></div>
                </div>
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info waves-effect waves-light" >Submit</button>
             </div>
            </form>
          </div>
        </div>
      </div>
<!-- /Add training, seminars, exam Modal -->
<!-- Add military service modal -->
    <div id="AddMili" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add military service</h4>
            </div>
            <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
                   <div class="form-group col-sm-6">
                      <label class="control-label">Military service</label>
                       										   	<select class="form-control"  name="noblank">
												<option value="" disabled="" selected="">---</option>
												<option>Military</option>
												<option>ROTC</option>
											</select>
                      <div class="help-block with-errors"></div>
                   </div>
					   <div class="form-group col-sm-6">
                       <label class="control-label">Ranks</label>
                       		  <select class="form-control"  name="noblank">
												<option value="" disabled="" selected="">---</option>
												<option>Major</option>
												<option>Sergeant</option>
											</select>
                       <div class="help-block with-errors"></div>
                    </div>
					    <div class="form-group col-sm-12">
 				<label class="control-label  col-md-12">Serial number</label>
											<input type="text" class="form-control"/>
                       <div class="help-block with-errors"></div>
                    </div>
				                   <div class="form-group col-sm-6">
                      <label class="control-label  col-md-12">Period of service from</label>
                    <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="dp-periodfrom" placeholder="mm/dd/yyyy">
                      <div class="help-block with-errors"></div>
                   </div>
					   <div class="form-group col-sm-6">
                      <label class="control-label  col-md-12">to</label>
                    <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="dp-periodto" placeholder="mm/dd/yyyy">
                       <div class="help-block with-errors"></div>
                    </div>
                 </div>
                   <div class="help-block with-errors"></div>
                </div>
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info waves-effect waves-light" >Submit</button>
             </div>
            </form>
          </div>
        </div>
      </div>
<!-- /Add military service modal -->
      </div>

      <!--row -->
      <!-- /.row -->

			<!--TODO: Validation for each form-->
			<!--TODO: ID for each form-->
			<!--TODO: Date validation (year)-->






    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Evacle </footer>
  </div>


<!-- jQuery and switch -->

<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Form Wizard JavaScript -->
<script src="plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
<!-- FormValidation -->
<link rel="stylesheet" href="plugins/bower_components/jquery-wizard-master/libs/formvalidation/	formValidation.min.css">
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
<script src="plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<!-- Footable -->
<script src="plugins/bower_components/footable/js/footable.all.min.js"></script>
<script src="plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<!--FooTable init-->
<script src="js/footable-init.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

	<!-- Date range Plugin JavaScript -->
<script src="plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
 <script>
	 //Scrollbar
	  jQuery(document).ready(function() {

  $("input[name='tch1']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });
	  $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });
	   $("input[name='tch3']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });
	   $("input[name='tch4']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });


 });
        $('#slimtest4').slimScroll({
            color: '#FFFFFF',
            size: '10px',
            height: '820px',
            alwaysVisible: false
        });

	 // Add & Remove Row
	var addrow = $('#demo-foo-addrow');
	addrow.footable().on('click', '.delete-row-btn', function() {

		//get the footable object
		var footable = addrow.data('footable');

		//get the row we are wanting to delete
		var row = $(this).parents('tr:first');

		//delete the row
		footable.removeRow(row);
	});
	// Add Row Button
	$('#demo-btn-addrow').click(function() {



		//get the footable object
		var footable = addrow.data('footable');

		//build up the row we are wanting to add
		var newRow = '<tr><td class="count"></td><td><input type="text" class="form-control" name="noblank" /></td><td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td></tr>';


		//add it
		footable.appendRow(newRow);
	});
 </script>
<script>

// Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
		      endDate: '+0d',

      });
	    jQuery('#dp-datetaken').datepicker({
        autoclose: true,
        todayHighlight: true,
		      endDate: '+0d',

      });
		    jQuery('#dp-periodfrom').datepicker({
        autoclose: true,
        todayHighlight: true,
		      endDate: '+0d',

      });
		    jQuery('#dp-periodto').datepicker({
        autoclose: true,
        todayHighlight: true,
		      endDate: '+0d',

      });

    jQuery('#primaryfrom-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });
    jQuery('#primaryto-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });
    jQuery('#secondaryfrom-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });
    jQuery('#secondaryto-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });
    jQuery('#tertiaryfrom-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });
    jQuery('#tertiaryto-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });
	    jQuery('#msfrom-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });
	    jQuery('#msto-date-range').datepicker({
        toggleActive: true,
				    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
      });




</script>
		<script type="text/javascript">


         $(document).ready(function(){

            $('#exampleValidator').wizard({
                onInit: function(){
                    $('#validation').formValidation({
                        framework: 'bootstrap',
                        fields: {
							name: {
                                validators: {
                                    notEmpty: {
                                        message: 'This field  is required'
                                    },
									stringLength: {
                                        min: 2,
                                        message: 'Invalid'
                                    },
									regexp: {
                                            regexp: /[A-Za-z ,.'-]/,
                                        message: 'Invalid'
                                    }
                                }
                            },
                        }
                    });
                },
                validator: function(){
                    var fv = $('#validation').data('formValidation');

                    var $this = $(this);

                    // Validate the container
                    fv.validateContainer($this);

                    var isValidStep = fv.isValidContainer($this);
                    if (isValidStep === false || isValidStep === null) {
                        return false;
                    }

                    return true;
                },
                onFinish: function(){
                    $('#validation').submit();
                    alert('Done!');

                }
            });


        })();
</script>

<script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
							default: 'Please insert your 2x2 picture',
							replace: 'Drag and drop or click to replace picture',
                        remove:  'Remove',
                        error:   'Please upload a 2x2 picture'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
</body>
</html>
