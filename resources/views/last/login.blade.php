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

<title>LogIn</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">

	<div id="f1_container">
<div id="f1_card">
  <div class="front face">
    <div class='slide1'></div>
  <div class='slide2'></div>
  <div class='slide3'></div>
  </div>
  <div class="back face">

  </div>
</div>
</div>




</section>


  <div class="login-box3 login-sidebar">
    <div class="white-box">
      <form class="form-horizontal form-material" id="loginform" method="POST" action = "{{ url('/Client-auth') }}">
      {!! csrf_field() !!}
        <a href="javascript:void(0)" class="text-center db"><img src="plugins/images/users/logoicon2.png" alt="Home" /><br/><img src="plugins/images/users/logotext2.png"  alt="Home" /></a>
		  </br>	  </br>	  	</br>
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" required="" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">

            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
			</br> </br> </br> </br>
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>


      </form>
      <form class="form-horizontal" id="recoverform" action="login2.html">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
		  	<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" onClick="history.go(0)">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
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
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!--Style Switcher -->
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
