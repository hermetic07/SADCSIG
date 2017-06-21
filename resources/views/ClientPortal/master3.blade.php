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
<title>JCSGMS - @yield('Title')</title>
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
<!-- Calendar CSS -->
<link href="plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
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
			<li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/Clients/Active/evander.jpg"	 alt="user-img" width="36" class="img-circle"><b class="hidden-xs">@yield('clientName')</b></a>
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

  <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
          <ul class="nav" id="side-menu">

          <li> <a href="{{url('/ClientPortalHome')}}" class="waves-effect"><i class="fa fa-home fa-2x fa-fw"></i> <span class="hide-menu"> Home </span></a>
          </li>
		  <li> <a href="{{url('/ClientPortalEstablishments')}}" class="waves-effect"><i class="fa fa-building-o fa-2x fa-fw"></i> <span class="hide-menu"> Establishments </span></a>
          </li>
		  <li> <a href="{{url('/ClientPortalMessages')}}" class="waves-effect"><i class="fa fa-envelope fa-2x fa-fw"></i> <span class="hide-menu"> Messages </span></a>
          </li>
		  <li> <a href="{{url('/Request')}}" class="waves-effect"><i class="fa fa-location-arrow fa-2x fa-fw"></i> <span class="hide-menu"> Requests </span></a>
          </li>
		  <li> <a href="{{url('/ClientPortalGuardsDTR')}}" class="waves-effect"><i class="fa fa-calendar-o fa-2x fa-fw"></i> <span class="hide-menu"> Guard's DTR </span></a>
          </li>
			  <li> <a href="{{url('/ClientPortalSettings')}}" class="waves-effect"><i class="fa fa-cogs fa-2x fa-fw"></i> <span class="hide-menu"> Settings </span></a>
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
          <h4 class="page-title">@yield('mtitle')</h4>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->

      @yield('content')

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
<!-- Calendar JavaScript -->
<script src="plugins/bower_components/calendar/jquery-ui.min.js"></script>
<script src="plugins/bower_components/moment/moment.js"></script>
<script src="plugins/bower_components/calendar/dist/fullcalendar.min.js"></script>
<script src="plugins/bower_components/calendar/dist/jquery.fullcalendar.js"></script>
	<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
 @yield('script')
</body>
</html>
