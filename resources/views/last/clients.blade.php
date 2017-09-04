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
      @include('includes.AdminNavBar')
	<!-- Left navbar-header end -->



 <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Client registration</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li class="active"><a href="#">Dashboard</a></li>
            <li class="active">Register</li>
			<li class="active"><a href="ClientRegistration.html">Client</a></li>
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
					<div class="alert alert-info"> Please input each forms correctly and completely base on the contract signed between the client and agency. </div>
                        <div id="exampleValidator" class="wizard">
                    <ul class="wizard-steps" role="tablist"  style="border: 1px solid black;">
                        <li class="active" role="tab">
                            <h4><span><i class="ti-user"></i></span>Business details</h4>
                        </li>
												 <li role="tab">
                            <h4><span><i class="fa fa-clock-o"></i></span>Guard's shift</h4>
                        </li>
						<li role="tab">
                            <h4><span><i class="fa fa-file-text-o"></i></span>Terms of contract</h4>
                        </li>
						<li role="tab">
                            <h4><span><i class="fa fa-paperclip"></i></span>Tagging</h4>
                        </li>
                        <li role="tab">
                            <h4><span><i class="ti-check"></i></span>Account</h4>
                        </li>
                    </ul>
							</br>
                    <form id="validation" class="form-horizontal animated fadeInUp"  style="border: 2px solid black; border-radius:15px;">
                      {!! csrf_field() !!}
                        <div class="wizard-content">
                            <div class="wizard-pane active" role="tabpanel">
                                <div class="form-group">
                                    <label class="col-xs-5 control-label">Nature of business</label>
                                    <div class="col-xs-3">
                                     		<select class="form-control">
                  												@foreach($n as $n)
                                          <option>{{$n->name}}</option>
                                          @endforeach
											                   </select>
                                    </div>
                                </div>
																<div class="form-group">
                                    <label class="col-xs-3 control-label">Establishment name</label>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control name"   />
                                    </div>
                                </div>
                      }
                      }
								<div class="form-group">
                                    <label class="col-xs-3 control-label">Client name</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control name"   />
                                    </div>
									<label class="col-xs-2 control-label">Client's contact number</label>
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control"   />
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-xs-3 control-label">Person in charge</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control name"   />
                                    </div>
									<label class="col-xs-2 control-label">Person in charge's contact number</label>
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control"   />
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-xs-1 control-label">Address</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control name"   />
                                    </div>
									     <label class="col-xs-1 control-label">Province</label>
                                    <div class="col-xs-3">
                                             		<select class="form-control">
                                                  @foreach($p as $p)
                                                  <option>{{$p->name}}</option>
                                                  @endforeach
												

											</select>
                                    </div>
									     <label class="col-xs-1 control-label">City</label>
                                    <div class="col-xs-3">
                    		<select class="form-control">
												@foreach($a as $a)
                        <option>{{$a->name}}</option>
                        @endforeach

											</select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-xs-3 control-label">Area Size (approx. in square meters)</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control name"   />
                                    </div>
									<label class="col-xs-2 control-label">Population (approx.)</label>
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control"   />
                                    </div>
                                </div>
								<div class="form-group">
									<label class="col-xs-6 control-label">Number of guards needed</label>
                                    <div class="col-xs-2">
										<input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                                    </div>
                                </div>
								</br>	</br>
								<div class="form-group">
									<label class="col-xs-2 control-label">Image of client</label>
					<div class="col-xs-2">
                                  <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/personincharge.jpg">
							    </div>
																		<label class="col-xs-2 control-label">image of establishment</label>
					<div class="col-xs-2">
                                  <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/establishment.jpg">
							    </div>
														 <label class="col-xs-2 control-label">Image of location</label>
					<div class="col-xs-2">
                                  <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/location.jpg">
						<span class="font-13 text-muted">Recommended: Screenshot from google map<span>


							    </div>


							    </div>

                            </div>

                            <div class="wizard-pane" role="tabpanel">
                                <div class="form-group">
                          <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle table-responsive"
              data-page-size="100">
              <thead>
                <tr>
                  <th data-sort-ignore="true"  data-sort-initial="true" data-toggle="true">Shift</th>
                  <th data-sort-ignore="true" >From</th>
                  <th data-sort-ignore="true" >to</th>
                  <th data-sort-ignore="true" class="min-width" width="50px">Delete</th>
                </tr>
              </thead>
              <div class="form-inline padding-bottom-15">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <button id="demo-btn-addrow" class="btn btn-outline btn-info btn-sm"><i class="icon wb-plus" aria-hidden="true"></i>Add Shift</button>
                      <small>New row will be added in last page.</small> </div>
                  </div>
                  <div class="col-sm-6 text-right m-b-20">
                    <div class="form-group">
                      <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                        autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <tbody>
                <tr>
                  <td id="data1">1</td>
                  <td>
					  <select class="form-control">
										<option value="" disabled="" selected="">---</option>
						  				<option id="0" value="00:00:00">12 AM</option>
						  				<option id="1" value="01:00:00">1 AM</option>
						  				<option id="2" value="02:00:00">2 AM</option>
						  				<option id="3" value="03:00:00">3 AM</option>
						  				<option id="4" value="04:00:00">4 AM</option>
						  				<option id="5" value="05:00:00">5 AM</option>
						  				<option id="6" value="06:00:00">6 AM</option>
						  				<option id="7" value="07:00:00">7 AM</option>
						  				<option id="8" value="08:00:00">8 AM</option>
						  				<option id="9" value="09:00:00">9 AM</option>
						  				<option id="10" value="10:00:00">10 AM</option>
						  				<option id="11" value="11:00:00">11 AM</option>
						  				<option id="12" value="12:00:00">12 PM</option>
						  				<option id="13" value="13:00:00">1 PM</option>
						  				<option id="14" value="14:00:00">2 PM</option>
						  				<option id="15" value="15:00:00">3 PM</option>
						  				<option id="16" value="16:00:00">4 PM</option>
						  				<option id="17" value="17:00:00">5 PM</option>
						  				<option id="18" value="18:00:00">6 PM</option>
						  				<option id="19" value="19:00:00">7 PM</option>
						  				<option id="20" value="20:00:00">8 PM</option>
						  				<option id="21" value="21:00:00">9 PM</option>
						  				<option id="22" value="22:00:00">10 PM</option>
						  				<option id="23" value="23:00:00">11 PM</option>
					  </select>
					</td>
                  <td>
					  <select class="form-control">
										<option value="" disabled="" selected="">---</option>
						  				<option id="0" value="00:00:00">12 AM</option>
						  				<option id="1" value="01:00:00">1 AM</option>
						  				<option id="2" value="02:00:00">2 AM</option>
						  				<option id="3" value="03:00:00">3 AM</option>
						  				<option id="4" value="04:00:00">4 AM</option>
						  				<option id="5" value="05:00:00">5 AM</option>
						  				<option id="6" value="06:00:00">6 AM</option>
						  				<option id="7" value="07:00:00">7 AM</option>
						  				<option id="8" value="08:00:00">8 AM</option>
						  				<option id="9" value="09:00:00">9 AM</option>
						  				<option id="10" value="10:00:00">10 AM</option>
						  				<option id="11" value="11:00:00">11 AM</option>
						  				<option id="12" value="12:00:00">12 PM</option>
						  				<option id="13" value="13:00:00">1 PM</option>
						  				<option id="14" value="14:00:00">2 PM</option>
						  				<option id="15" value="15:00:00">3 PM</option>
						  				<option id="16" value="16:00:00">4 PM</option>
						  				<option id="17" value="17:00:00">5 PM</option>
						  				<option id="18" value="18:00:00">6 PM</option>
						  				<option id="19" value="19:00:00">7 PM</option>
						  				<option id="20" value="20:00:00">8 PM</option>
						  				<option id="21" value="21:00:00">9 PM</option>
						  				<option id="22" value="22:00:00">10 PM</option>
						  				<option id="23" value="23:00:00">11 PM</option>
					  </select>
				</td>

                </tr>
				  <tr></tr>

              </tbody>
            </table>
                                </div>
                            </div>
                            <div class="wizard-pane" role="tabpanel">
                                <div class="form-group">

							<div class="col-xs-12">

									<label class="col-xs-2 control-label">Span (months) </label>
							    <div class="col-xs-2">

										<input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                                    </div>
						<label class="col-xs-2 control-label">Starts from </label>
							<div class="col-xs-2">
                     						                                        <div class="input-group">
											<span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="noblank">
										</div>
                    					</div>
									<label class="col-xs-1 control-label"> Ends to </label>
							<div class="col-xs-2">
                     						                                        <div class="input-group">
											<span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy" name="noblank">
										</div>
                    					</div>
							</div>



                                </div>
								                         <div class="form-group">

							<div class="col-xs-12">

									<label class="col-xs-3	 control-label">Operating Time (hours)</label>
							    <div class="col-xs-1">
									    <p class="form-control-static"> 10</p>
                                    </div>
											<label class="col-xs-2 control-label">Rate per hour</label>
							    <div class="col-xs-1">
									    <p class="form-control-static"> 500</p>
                                    </div>

									<label class="col-xs-2 control-label">Billing date</label>
                                    <div class="col-xs-2">
                                         <input type="number" class="form-control"  min="1"  max="31" required>
                                    </div>
                                </div>
							</div>



                                </div>

                            <div class="wizard-pane" role="tabpanel">
							<center> <h4> <strong>Guns</strong></h4> </center>
								</br>
								<center><button class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#Addtse"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</button> </center>
								</br>	</br>

									<div class="form-group">
									 <div class="table-responsive">
                                		<table class="table color-bordered-table inverse-bordered-table">
											<thead>
												<tr>
													<th>Gun</th>
                                            		<th>Gun type</th>
													<th>Quantity</th>
													<th>Rounds</th>
													<th width="50px">Delete</th>
                                        		</tr>
                                    		</thead>
                                    		<tbody>
                                        		<tr>
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
													<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
												</tr>
												<tr>
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
                            </div>
                            <div class="wizard-pane" role="tabpanel">
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Username</label>
									  <div class="col-xs-5">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div>
								<div class="form-group">
									<label class="col-xs-4 control-label">Password</label>
									  <div class="col-xs-5">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

          </div>
        </div>

		<!-- Add guns Modal -->
    <div id="Addtse" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add guns</h4>
            </div>
            <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					   <div class="form-group col-sm-6">
                       <label class="control-label">Guntype</label>
						 			<select class="form-control" >
                    @foreach($gt as $gt)
                    <option>{{$gt->name}}</option>
                    @endforeach
											</select>
                       <div class="help-block with-errors"></div>
                    </div>
					              <div class="form-group col-sm-6">
                      <label class="control-label">Gun</label>
                       			<select class="form-control" >
												<option></option>
                        @foreach($g as $gt)
                        <option>{{$gt->name}}</option>
                        @endforeach
											</select>
                      <div class="help-block with-errors"></div>
                   </div>
                  <div class="form-group col-sm-6">
                      <label class="control-label  col-md-12">Quantity</label>
					                         <input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
                  </div>
					       <div class="form-group col-sm-6">
                      <label class="control-label  col-md-12">Rounds</label>
					                         <input id="tch2" type="text" value="" name="tch2" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
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
<!-- /Add guns -->
      </div>
      <!--row -->
      <!-- /.row -->






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
		<script src="plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

	<!-- Date range Plugin JavaScript -->
<script src="plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script>
	 // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,


      });
	     jQuery('#datepicker-autoclose2').datepicker({
        autoclose: true,
        todayHighlight: true,


      });
	 //Scrollbar
	  jQuery(document).ready(function() {


	   $("input[name='tch3']").TouchSpin({
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
		var newRow = '<tr><td class="count"></td><td><select class="form-control"><option value="" disabled="" selected="">---</option><option id="0" value="00:00:00">12 AM</option><option id="1" value="01:00:00">1 AM</option><option id="2" value="02:00:00">2 AM</option><option id="3" value="03:00:00">3 AM</option><option id="4" value="04:00:00">4 AM</option><option id="5" value="05:00:00">5 AM</option><option id="6" value="06:00:00">6 AM</option><option id="7" value="07:00:00">7 AM</option><option id="8" value="08:00:00">8 AM</option><option id="9" value="09:00:00">9 AM</option><option id="10" value="10:00:00">10 AM</option><option id="11" value="11:00:00">11 AM</option><option id="12" value="12:00:00">12 PM</option><option id="13" value="13:00:00">1 PM</option><option id="14" value="14:00:00">2 PM</option><option id="15" value="15:00:00">3 PM</option><option id="16" value="16:00:00">4 PM</option><option id="17" value="17:00:00">5 PM</option><option id="18" value="18:00:00">6 PM</option><option id="19" value="19:00:00">7 PM</option><option id="20" value="20:00:00">8 PM</option><option id="21" value="21:00:00">9 PM</option><option id="22" value="22:00:00">10 PM</option><option id="23" value="23:00:00">11 PM</option></select></td><td><select class="form-control"><option value="" disabled="" selected="">---</option><option id="0" value="00:00:00">12 AM</option><option id="1" value="01:00:00">1 AM</option><option id="2" value="02:00:00">2 AM</option><option id="3" value="03:00:00">3 AM</option><option id="4" value="04:00:00">4 AM</option><option id="5" value="05:00:00">5 AM</option><option id="6" value="06:00:00">6 AM</option><option id="7" value="07:00:00">7 AM</option><option id="8" value="08:00:00">8 AM</option><option id="9" value="09:00:00">9 AM</option><option id="10" value="10:00:00">10 AM</option><option id="11" value="11:00:00">11 AM</option><option id="12" value="12:00:00">12 PM</option><option id="13" value="13:00:00">1 PM</option><option id="14" value="14:00:00">2 PM</option><option id="15" value="15:00:00">3 PM</option><option id="16" value="16:00:00">4 PM</option><option id="17" value="17:00:00">5 PM</option><option id="18" value="18:00:00">6 PM</option><option id="19" value="19:00:00">7 PM</option><option id="20" value="20:00:00">8 PM</option><option id="21" value="21:00:00">9 PM</option><option id="22" value="22:00:00">10 PM</option><option id="23" value="23:00:00">11 PM</option></select></td><td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td></tr>';


		//add it
		footable.appendRow(newRow);
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
							default: 'Drag and drop or click to insert picture',
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
