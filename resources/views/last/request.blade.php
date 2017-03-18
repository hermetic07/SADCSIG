
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
  <link rel="icon" type="image/png" href="plugins/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="plugins/images/favicon-16x16.png" sizes="16x16" />
<title>JCSGMS - Requests</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- toast CSS -->
<link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style2.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/megna.css" id="theme"  rel="stylesheet">
	  <!-- Popup CSS -->
<link href="plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
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

			 <!-- Admin account-->
			<li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/Clients/Active/evander.jpg"	 alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Evander</b></a>
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
         <div class="top-left-part"><a class="logo" href="index.html"><b><img src="plugins/images/users/logoicon2.png" height="60" alt="Systemlogo" /></b><span class="hidden-xs"><img src="plugins/images/users/logotext2.png" height="40" alt="Systemname" /></span></a>
         </div>

     </div>
      <!-- /.navbar-header -->
    </nav>
   <!-- End Top Navigation -->
   <!-- End Top Navigation -->
  <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
          <ul class="nav" id="side-menu">

          <li> <a href="ClientPortalHome.html" class="waves-effect"><i class="fa fa-home fa-2x fa-fw"></i> <span class="hide-menu"> Home </span></a>
          </li>
		  <li> <a href="ClientPortalEstablishment.html" class="waves-effect"><i class="fa fa-building-o fa-2x fa-fw"></i> <span class="hide-menu"> Establishments </span></a>
          </li>
		  <li> <a href="ClientPortalMessages.html" class="waves-effect"><i class="fa fa-envelope fa-2x fa-fw"></i> <span class="hide-menu"> Messages </span></a>
          </li>
		  <li> <a href="ClientPortalRequests.html" class="waves-effect active"><i class="fa fa-location-arrow fa-2x fa-fw"></i> <span class="hide-menu"> Requests </span></a>
          </li>
		  <li> <a href="ClientPortalGuardsDtr.html" class="waves-effect"><i class="fa fa-calendar-o fa-2x fa-fw"></i> <span class="hide-menu"> Guard's DTR </span></a>
          </li>
			  <li> <a href="ClientPortalSettings.html" class="waves-effect"><i class="fa fa-cogs fa-2x fa-fw"></i> <span class="hide-menu"> Settings </span></a>
          </li>


        </ul>
    </div>
  </div>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Requests</h4>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->

		      <div class="row">





									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for a new service</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Got a new establishment? And want us to serve you? We would like to! Request a service on us and let's talk about it!</p>

                <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" data-toggle="modal" data-target="#Service"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for additional guns</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Request for a additional guns and the agency will process it and when it will be legallize, the agency will process it for you.</p>

                <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>

				  					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for additional guards</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Request for a additional guns and the agency will process it and when it will be legallize, the agency will process it for you.</p>

                <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" data-toggle="modal" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>


						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for guard replacement</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>You don't like the guard that deployed to you? or for other reason? Request for a replacement of that guard and the agency will process it right away.</p>

                <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10">Request</a>

              </div>

          </div>
        </div>

          </div>

					  <!-- Deliver guns -->
  <div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up the following</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
<div class="row">
<div class="form-group col-sm-8">

  <label class="control-label  col-md-12">Gun name</label>
  <div class="col-md-12">
    <input type="text" class="form-control" id="Nature_Name" name="Nature_Name" pattern="[.,--&\\'a-zA-Z0-9\s]+" value="" required>
    <div class="help-block with-errors"></div>
  </div>
</div>

<div class="form-group col-sm-4">

<label class="control-label col-md-12">Quantity</label>
  <div class="col-md-12">
<input type="number" class="form-control"  id="rate" name="rate" min="1"  step="0.01"  required>
<div class="help-block with-errors"></div>
</div>
</div>
					</div>
                </div>
            </div>
             <div class="modal-footer">
				 <button type="button" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
				  	  <!-- Deliver guns -->
  <div id="Service" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up the following</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
					                  <div class="row">
					               <div class="form-group col-sm-12">
                      <label class="control-label">Service</label>
                       <select class="form-control"  name="noblank">
												<option value="" disabled="" selected="">---</option>
												@foreach($services as $s )
                        <option>{{$s->name}}</option>
                        @endforeach
											</select>
                      <div class="help-block with-errors"></div>
                   </div>
					<div class="form-group col-sm-6">
                       <label class="control-label">Meeting place</label>
                             <input type="text" class="form-control" id="Nature_Name" name="Nature_Name" pattern="[.,--&\\'a-zA-Z0-9\s]+" value="" required>
                       <div class="help-block with-errors"></div>
                    </div>

					               <div class="form-group col-sm-6">
                      <label class="control-label">Meeting schedule</label>
                       					                                        <div class="input-group">
											<span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="noblank">
										</div>
                      <div class="help-block with-errors"></div>
                   </div>
					<div class="form-group col-sm-12	">
                       <label class="control-label">Description of service:</label>
                      <textarea class="form-control" rows="5" required></textarea>
                       <div class="help-block with-errors"></div>

                    </div>


                 </div>
                   <div class="help-block with-errors"></div>

                </div>
            </div>
             <div class="modal-footer">
				 <button type="button" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
<!-- /Add military service modal -->
        </div>
      </div>


      </div>


    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2017 </footer>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Counter js -->
<script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<script src="plugins/bower_components/raphael/raphael-min.js"></script>
<script src="plugins/bower_components/morrisjs/morris.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min2.js"></script>
<script src="js/dashboard1.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>

	<!-- Magnific popup JavaScript -->
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

</body>
</html>
