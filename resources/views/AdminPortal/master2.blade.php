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
  <title>@yield('Title')</title>

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
<!-- Calendar CSS -->
<link href="plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
	<link rel="stylesheet" href="plugins/bower_components/dropify/dist/css/dropify.min.css">
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
			   <a class="waves-effect waves-light" href="{{url('/IncidentReports')}}">
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
			   <a class="waves-effect waves-light" href="{{url('/Messages')}}">
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
				 <a class="waves-effect waves-light" href="{{url('/Announcements')}}">
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

				<li> <a href="{{url('/Dashboard')}}" class="waves-effect"><i class="fa fa-dashboard fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Dashboard </span> </a>
          		</li>

              <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-wrench fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Maintenance  <span class="fa arrow"></span></a>
             		<ul class="nav nav-second-level">
						<li> <a href="javascript:void(0)" class="waves-effect">Clients <span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
                  <li> <a href="{{url('/Nature')}}">Nature of business</a></li>
                <li> <a href="{{url('/Service')}}">Services</a> </li>

                    		</ul>
               			</li>
                		<li> <a href="javascript:void(0)" class="waves-effect">Security guards <span class="fa arrow"></span></a>
                    		<ul class="nav nav-third-level">

                          <li> <a href="{{url('/License')}}">Licences and clearances</a> </li>
                          <li> <a href="{{url('/Attribute')}}">Body attributes</a></li>
                          <li> <a href="{{url('/Military')}}">Military services</a></li>
                          <li> <a href="{{url('/Rank')}}">Rank</a></li>
                          <li> <a href="{{url('/Requirement')}}">Requirements</a></li>
                          <li> <a href="{{url('/Role')}}">Role</a></li>
                          <li> <a href="{{url('/Leave')}}">Leave</a></li>
							</ul>
						</li>
                		<li> <a href="javascript:void(0)" class="waves-effect">Others<span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
                <li> <a href="{{url('/Measurement')}}">Measurements</a></li>
                <li> <a href="{{url('/Province')}}">Provinces</a></li>
                <li> <a href="{{url('/Area')}}">Area</a></li>
                <li> <a href="{{url('/GunType')}}">Gun Type</a></li>
                <li> <a href="{{url('/Gun')}}">Guns</a></li>
              </ul>
						</li>
             		</ul>
					</li>


          			<li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
						<ul class="nav nav-second-level">
							<li> <a href="ClientRegistration.html" class="waves-effect">Clients</a>
							</li>
							<li> <a href="SecurityGuardsRegistration.html" class="waves-effect">Security guards</a>
							</li>
             			</ul>
					</li>

		   	      <li>@yield('Dep')<i class="fa fa-exchange fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Deployment<span class="fa arrow"></span></a>
					  <ul class="nav nav-second-level">
						  <li> <a href="Deploy.html" class="waves-effect">Deploy</a>
						  </li>
						  <li> <a href="{{url('/Replace')}}" class="waves-effect">Replace</a>
						  </li>
						    <li> <a href="{{url('/Swap')}}" class="waves-effect">Swap</a>
						  </li>
             		</ul>
	      		  </li>

				  <li> @yield('Cli')<i class="fa fa-users fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></a>
					 <ul class="nav nav-second-level">
						 <li> <a href="{{url('/ActiveClient')}}" class="waves-effect">Active<span class="label label-rouded label-info pull-right">4</span></a>
						</li>
						<li> <a href="{{url('/PendingClientRequests')}}" class="waves-effect">Pending request<span class="label label-rouded label-info pull-right">3</span></a>
						</li>

					 </ul>
				  </li>

				  <li> @yield('Sec')<i class="fa fa-shield fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Security guards<span class="fa arrow"></span> </a>
					 <ul class="nav nav-second-level">
						<li> <a href="{{url('/SecurityGuards')}}" class="waves-effect">Guards<span class="label label-rouded label-info pull-right">13</span></a>
						</li>
						<li> <a href="{{url('/GuardLicenses')}}" class="waves-effect">Guard licenses<span class="label label-rouded label-info pull-right">13</span></a>
						</li>
						 	<li> <a href="{{url('/GuardsDTR')}}" class="waves-effect">Guard's DTR</a>
						</li>
					 </ul>
				  </li>

				  <li><a href="{{url('/Applicants')}}" class="waves-effect"><i class="icon-user-follow fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Applicants  </a>
				  </li>

				  <li> @yield('Del')<i class="fa fa-truck fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Delivery <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
						<li> <a href="Deliverguns.html" class="waves-effect">Guns</a>
						</li>
						<li> <a href="{{url('/Ammunition')}}" class="waves-effect">Ammunitions</a>
						</li>
						<li> <a href="{{url('/Pickups')}}" class="waves-effect">Pickups</a>
						</li>
					 </ul>
				  </li>



				  <li> <a href="{{url('/Reports')}}" class="waves-effect"><i class="fa fa-file-text fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Reports</span></a>
				  </li>

				  <li> <a href="#" class="waves-effect"><i class="fa fa-search fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Queries</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li> <a href="#" class="waves-effect">Clients</a>
              </li>
              <li> <a href="#" class="waves-effect">Security guards</a>
              </li>
                <li> <a href="#" class="waves-effect">Recapitulation</a>
              </li>
                </ul>
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
          <h4 class="page-title">@yield('mtitle')</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li class="active"><a href="#">Dashboard</a></li>
                  @yield('mtitle2')
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->

      @yield('content')






    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Evacle </footer>
  </div>


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

<!--FooTable init-->
<script src="js/footable-init.js"></script>

<!-- Magnific popup JavaScript -->
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<!-- Sweet-Alert  -->
 <script src="js/Alert/sweetalert.min.js"></script>
    <script src="js/Alert/jquery-alertcustom.js"></script>
    <!-- Calendar JavaScript -->
<script src="plugins/bower_components/calendar/jquery-ui.min.js"></script>
<script src="plugins/bower_components/moment/moment.js"></script>
<script src="plugins/bower_components/calendar/dist/fullcalendar.min.js"></script>
<script src="plugins/bower_components/calendar/dist/jquery.fullcalendar.js"></script>
<script src="js/cbpFWTabs.js"></script>
<!-- validation -->
<script src="js/validator.js"></script>
<script src="plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">

  $( "#target" ).keyup(function( event ) {
$("#target2").trigger('click');
});

$('.form-search').on('submit',function(){return false;});
$('.form-search .btn').on('click', function(e){

  var query = document.getElementById('target').value;
console.log(query);
  $('div.staff-container .guard_name').each(function(){
       var $this = $(this);
       if($this.text().toLowerCase().indexOf(query) === -1)
           $this.closest('div.staff-container').fadeOut();
      else $this.closest('div.staff-container').fadeIn();
  });
});



</script>
 <script>
 $( document ).ready(function() {
	 //Scrollbar
        $('#slimtest4').slimScroll({
            color: '#FFFFFF',
            size: '10px',
            height: '750px',
            alwaysVisible: false
        });
        pageSize = 9;
           pagesCount = $(".content").length;
           var currentPage = 1;

           /////////// PREPARE NAV ///////////////
           var nav = '';
           var totalPages = Math.ceil(pagesCount / pageSize);
           for (var s=0; s<totalPages; s++){
               nav += '<li class="numeros"><a href="#">'+(s+1)+'</a></li>';
           }
           $(".pag_prev").after(nav);
           $(".numeros").first().addClass("active");
           //////////////////////////////////////

           showPage = function() {
               $(".content").hide().each(function(n) {
                   if (n >= pageSize * (currentPage - 1) && n < pageSize * currentPage)
                       $(this).show();
               });
           }
           showPage();


           $(".pagination li.numeros").click(function() {
               $(".pagination li").removeClass("active");
               $(this).addClass("active");
               currentPage = parseInt($(this).text());
               showPage();
           });

           $(".pagination li.pag_prev").click(function() {
               if($(this).next().is('.active')) return;
               $('.numeros.active').removeClass('active').prev().addClass('active');
               currentPage = currentPage > 1 ? (currentPage-1) : 1;
               showPage();
           });

           $(".pagination li.pag_next").click(function() {
               if($(this).prev().is('.active')) return;
               $('.numeros.active').removeClass('active').next().addClass('active');
               currentPage = currentPage < totalPages ? (currentPage+1) : totalPages;
               showPage();
           });
       });


 </script>
 @yield('script')
</body>
</html>
