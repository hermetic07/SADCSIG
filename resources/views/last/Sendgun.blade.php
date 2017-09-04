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
  <title>Guard licensess</title>

 <!-- Bootstrap Core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Footable CSS -->
  <link href="plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
  <link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
 <!-- Menu CSS -->
  <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="css/colors/MyThemeColor.css" id="theme"  rel="stylesheet">
  <!--alerts CSS -->
  <link href="js/Alert/sweetalert.css" rel="stylesheet" type="text/css">
  <!---switch -->
  <link href="plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
	    <!-- Popup CSS -->
  <link href="plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">


</head>

<!-- Preloader -->
 <div class="preloader">
   <div class="cssload-speeding-wheel"></div>
 </div>

<!-- fix header and sidebar -->
<body class="fix-sidebar fix-header">
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


 <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Deliver guns</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
			<li>Delivery</li>
            <li class="active">Guns</li>
          </ol>
        </div>
      </div>

      <div class="row">
		          <div class="col-lg-12	">

          <div class="white-box">
			  <h4><center><strong>Clients</strong></center></h4>
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                <th data-sort-initial="true" data-toggle="true">ID</th>
                  <th>Name</th>
				  <th data-hide="phone, tablet" >Location</th>
                  <th data-sort-ignore="true" width="150px">Actions</th>
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
              <tbody>
                 <tr>
                              <td>1</td>
                              <td>Daisy ronquillo</td>
					 		  <td>7</td>
                              <td>
							 			  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver guns</button>

                              </td>
                          </tr>
				 <tr>
                              <td>2</td>
                              <td>Luigi lacsina</td>
					 		  <td>7</td>
                              <td>
       	  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver guns</button>
                              </td>
                          </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4"></td>
                </tr>
              </tfoot>
        	</table>

            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>

			        </div>


					   </div>

		  <!-- Deliver guns -->
  <div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					                  <div class="form-group col-sm-2">
                      <label class="control-label">Order ID</label>
                           <p class="form-control-static"> 2 </p>
                      <div class="help-block with-errors"></div>
                   </div>
					<div class="form-group col-sm-7">
                       <label class="control-label">Client name</label>
                          <p class="form-control-static"> Daisy ronquillo </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-3">
                       <label class="control-label">Contact number</label>
                           <p class="form-control-static"> 09123456789 </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  			<div class="form-group col-sm-6">
                       <label class="control-label">Establishment name</label>
                          <p class="form-control-static"> Polytechnic university of the philippines</p>
                       <div class="help-block with-errors"></div>
                    </div>
					  				  			<div class="form-group col-sm-6">
                       <label class="control-label">Address</label>
                          <p class="form-control-static"> Anonas, Santa Mesa, Maynila, Kalakhang Maynila</p>
                       <div class="help-block with-errors"></div>
                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Person in charge</label>
                          <p class="form-control-static"> Ernest john maskarino </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-6">
                       <label class="control-label">Contact number</label>
                           <p class="form-control-static"> 09123456789 </p>
                       <div class="help-block with-errors"></div>
                    </div>

                   <div class="form-group col-sm-8">
                      <label class="control-label">Gun</label>
                       			<select class="form-control" >
                              @foreach($g as $p)
                              <option>{{$p->name}}</option>
                              @endforeach
											</select>
                      <div class="help-block with-errors"></div>
                   </div>
                  <div class="col-md-4">
                      <label class="control-label  col-md-12">Quantity</label>
					                         <input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
                  </div>
					                  <div class="form-group col-sm-8">
                      <label class="control-label">Delivered by</label>
                       <input type="text" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
					   <div class="form-group col-sm-4">
                       <label class="control-label">Contact number</label>
                       <input type="text" class="form-control" required>
                       <div class="help-block with-errors"></div>
                    </div>
					  		  				  			<div class="form-group col-sm-9">
                       <label class="control-label">Delivery code</label>
                          <p class="form-control-static">6C4NpIo1</p>
                       <div class="help-block with-errors"></div>
					  </div>
					 <div class="col-sm-3">
						 </br>
         <button type="button" class="btn btn-info waves-effect waves-light" >Generate code</button>
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
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
<!-- /Add military service modal -->

     </div>
 </div>
</div>
<!-- /#wrapper -->
</div>
      <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
      <footer class="footer text-center"> 2016 &copy; Evacle </footer>
    </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery and switch -->
<script src="plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
 <!-- Menu Plugin JavaScript -->
 <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!-- Footable -->
<script src="plugins/bower_components/footable/js/footable.all.min.js"></script>
<script src="plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<!--FooTable init-->
<script src="js/footable-init.js"></script>

<!-- Magnific popup JavaScript -->
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<!-- Sweet-Alert  -->
 <script src="js/Alert/sweetalert.min.js"></script>
    <script src="js/Alert/jquery-alertcustom.js"></script>

<!-- validation -->
<script src="js/validator.js"></script>

<script>


	  jQuery(document).ready(function() {


	   $("input[name='tch3']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });



 });
	</script>
	 <script type="text/javascript">


		 $( document ).ready(function() {

			 		$('input[name="radio"]').click(function(){
				if($(this).attr("value")=="2"){
						$(".deploymentdate").show();
					}else{
					 $(".deploymentdate").hide();
					}
				});

			 $('#slimtest4').slimScroll({
            color: '#FFFFFF',
            size: '10px',
            height: '820px',
            alwaysVisible: false
		  });

});

</script>
</body>
</html>
