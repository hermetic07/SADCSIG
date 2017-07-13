<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Guard pool</title>
        <link rel="stylesheet" href="css/style2.css">

        <!-- Styles -->
        <style>




        h3 {
          text-align: center;
          font-weight: 400;
          margin-bottom: 0;
        }

        .carousel-wrapper {
          position: absolute;
          width: 70%;
          height: 70%;
            top: 56%;
            left: 50%;
          transform: translate(-50%, -50%);
          background-color: #FFFFFF;
          background-image: linear-gradient(#FFFFFF 50%, #FFFFFF 50%, #F0F3FC 50%);
          box-shadow: 0px 12px 39px -19px rgba(0, 0, 0, 0.75);
          overflow: hidden;
        }
        .carousel-wrapper .carousel {
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          width: 100%;
          height: auto;
        }
        .carousel-wrapper .carousel .carousel-cell {
          padding: 10px;
          background-color: #FFFFFF;
          width: 20%;
          height: auto;
          min-width: 120px;
          margin: 0 20px;
          transition: transform 500ms ease;
        }
        .carousel-wrapper .carousel .carousel-cell .more {
          display: block;
          opacity: 0;
          margin: 5px 0 15px 0;
          text-align: center;
          font-size: 10px;
          color: #CFCFCF;
          text-decoration: none;
          transition: opacity 300ms ease;
        }
        .carousel-wrapper .carousel .carousel-cell .more:hover, .carousel-wrapper .carousel .carousel-cell .more:active, .carousel-wrapper .carousel .carousel-cell .more:visited, .carousel-wrapper .carousel .carousel-cell .more:focus {
          color: #CFCFCF;
          text-decoration: none;
        }
        .carousel-wrapper .carousel .carousel-cell .line {
          position: absolute;
          width: 2px;
          height: 0;
          background-color: black;
          left: 50%;
          margin: 5px 0 0 -1px;
          transition: height 300ms ease;
          display: block;
        }
        .carousel-wrapper .carousel .carousel-cell .price {
          position: absolute;
          font-weight: 700;
          margin: 45px auto 0 auto;
          left: 50%;
          transform: translate(-50%);
          opacity: 0;
          transition: opacity 300ms ease 300ms;
        }
        .carousel-wrapper .carousel .carousel-cell .price sup {
          top: 2px;
          position: absolute;
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected {
          transform: scale(1.2);
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected .line {
          height: 35px;
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected .price, .carousel-wrapper .carousel .carousel-cell.is-selected .more {
          opacity: 1;
        }
        .carousel-wrapper .flickity-page-dots {
          display: none;
        }
        .carousel-wrapper .flickity-viewport, .carousel-wrapper .flickity-slider {
          overflow: visible;
        }
        .our-team{
            background: #f5f5f5;
            text-align: center;
        }
        .our-team .pic{
            position: relative;
            overflow: hidden;
            transform: scale(1);
            transition: all 0.3s ease 0s;
        }
        .our-team:hover .pic{
            transform: scale(1.01);
        }
        .our-team .pic:after{
            content: "";
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            box-shadow: 0 0 0 900px rgba(255, 255, 255, 0.5);
            position: absolute;
            bottom: -100px;
            right: -100px;
            opacity: 0;
            transform: scale3d(0.5, 0.5, 1);
            transform-origin: 50% 50% 0;
            transition: all 0.35s ease 0s;
        }
        .our-team:hover .pic:after{
            opacity: 1;
            transform: translate3d(0px, 0px, 0px);
        }
        .our-team .pic img{
            width: 100%;
            height: auto;
        }
        .our-team .read-more{
            width: 100px;
            padding: 0 15px 15px 0;
            font-size: 14px;
            color: #fff;
            letter-spacing: 0.35px;
            text-align: right;
            text-transform: uppercase;
            position: absolute;
            bottom: 0;
            right: 0;
            opacity: 0;
            z-index: 1;
            transform: translate3d(20px, 20px, 0px);
            transition: all 0.35s ease 0s;
        }
        .our-team:hover .read-more{
            opacity: 1;
            transform: translate3d(0px, 0px, 0px);
        }
        .our-team .team-content{
            padding: 20px 0;
        }
        .our-team .title{
            font-size: 22px;
            font-weight: 700;
            color: #3b3b3b;
            text-transform: capitalize;
            margin: 0 0 8px 0;
        }
        .our-team .post{
            font-size: 13px;
            font-weight: 500;
            color: #6e6e70;
            text-transform: capitalize;
        }
        @media only screen and (max-width: 990px){
            .our-team{ margin-bottom: 30px; }
        }
        </style>
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
          <link href="css/flickity.min.css" rel="stylesheet">


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
                        <div class="row  el-element-overlay">
            <div class="carousel-wrapper">
            <div class="carousel" data-flickity>
              <div class="carousel-cell">

        <a href="javascript:void(0)"><img alt="img" class="img-circle img-responsive" src="plugins/images/Clients/establishments/pup.jpg"></a>

              <h3 class="m-t-20 m-b-20">Welcome!</h3>
              <p>On this page you will select your guards to deploy them to your area. You can view their informations and hire them base on your qualifications</p>
            <center>  <span class="label label-rouded label-info">5 more</span> </center>
            </div>


              <div class="carousel-cell">

                <div class="our-team">
                  <div class="el-card-item" style="padding-bottom: 5px;" >
                    <div class="el-card-avatar el-overlay-1">
                           <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user" ></a>
                            <div class="el-overlay">
                              <ul class="el-info">
                                      <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank">More info </a></li>
                              </ul>
                        </div>
                      </div>
                  </div>
                <div class="team-content">
                    <h3 class="title">Ernest John Maskarino</h3>
                    <span class="post">Security guard</span>
                </div>
              </br>

            </div>
          </br>
            <div class="col-xs-12">
           <div class="form-group">
                  <div class="col-xs-6">
         <button class="btn btn-block btn-outline btn-rounded btn-success acc">Accept</button></div>
                <div class="col-xs-6">  <button class="btn btn-block btn-outline btn-rounded btn-danger rej">Reject</button></div>
               </div>  </div>
              </div>
              <div class="carousel-cell">

                <div class="our-team">
                  <div class="el-card-item" style="padding-bottom: 5px;" >
                    <div class="el-card-avatar el-overlay-1">
                           <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/evander.jpg"  alt="user" ></a>
                            <div class="el-overlay">
                              <ul class="el-info">
                                      <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank">More info </a></li>
                              </ul>
                        </div>
                      </div>
                  </div>
                <div class="team-content">
                    <h3 class="title">Evander Macandog</h3>
                    <span class="post">Security officer</span>
                </div>
              </br>

            </div>
          </br>
            <div class="col-xs-12">
           <div class="form-group">
                  <div class="col-xs-6">
         <button class="btn btn-block btn-outline btn-rounded btn-success acc ">Accept</button></div>
                <div class="col-xs-6">  <button class="btn btn-block btn-outline btn-rounded btn-danger rej">Reject</button></div>
               </div>  </div>
              </div>
              <div class="carousel-cell">

                <div class="our-team">
                  <div class="el-card-item"  style="padding-bottom: 5px;">
                    <div class="el-card-avatar el-overlay-1">
                           <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/chris.jpg"  alt="user" ></a>
                            <div class="el-overlay">
                              <ul class="el-info">
                                      <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank">More info </a></li>
                              </ul>
                        </div>
                      </div>
                  </div>
                <div class="team-content">
                    <h3 class="title">Chris jerico albino </h3>
                    <span class="post">Security guard</span>
                </div>
              </br>

            </div>
          </br>
            <div class="col-xs-12">
           <div class="form-group">
                  <div class="col-xs-6">
         <button class="btn btn-block btn-outline btn-rounded btn-success acc  ">Accept</button></div>
                <div class="col-xs-6">  <button class="btn btn-block btn-outline btn-rounded btn-danger rej" type="button">Reject</button></div>
               </div>  </div>
              </div>

  		  </div>
      		  </div>

            </div>


          </div>
          <!-- /.container-fluid -->
          <footer class="footer text-center"> 2017 </footer>

      <!-- jQuery -->
      <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Menu Plugin JavaScript -->
      <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
      <!--slimscroll JavaScript -->
      <script src="js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="js/waves.js" ></script>
        <script src="js/flickity.pkgd.min.js"></script>
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

      <script>

      $(document).ready(function(){

            $('.rej').on('click', function() {
            $(this).closest('.carousel-cell').fadeOut(1000, function () {
         $(this).remove();
     });

            });

            $('.acc').on('click', function() {
            $(this).closest('.carousel-cell').fadeOut(1000, function () {
         $(this).remove();
     });

            });
    });





      </script>

  </body>
</html>
