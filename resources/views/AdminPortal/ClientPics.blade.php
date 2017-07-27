<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="plugins/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="plugins/images/favicon-16x16.png" sizes="16x16" />
  <title>Upload picture</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
 <script src="{{asset('js/jquery.min.js')}}"></script>
   <script src="{{asset('js/jquery.validate.js')}}"></script>
  <script type="text/javascript">

    $(document).ready(function(){



      var shift =1;
      //Span for count of selected guards
             var value = parseInt($(".myspan").text(), 10) + 1;
      //Span for the remaining guards that need to be selected to meet the limit
      var value2 = parseInt($(".deploysecu").text(), 10) + 1;


    });

 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
<body class="fix-header fix-sidebar">
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
            <li> <a href="SecurityGuardsRegistration.html" class="waves-effect active">Security guards</a>
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
        <h4 class="page-title">Ckients registration</h4>
      </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li class="active"><a href="#">Dashboard</a></li>
          <li class="active">Register</li>
    <li class="active"><a href="SecurityGuardsRegistration.html">Clients</a></li>
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
            <div class="alert alert-success">
              <p align="center">Registration Success! Pls upload the client's picture, person-in-charge's picture, establishment and location image. If not available just click upload later.</p>
            </div>
            <br>

                <form id="validation" class="form-horizontal animated fadeInUp" >
         				</br>	</br>
         					<div class="form-group">
                    <label class="col-xs-1 control-label">Client's picture</label>
                      <div class="col-xs-5">
                        <input type="file" name="clientpicture" id="input-file-max-fs" class="dropify-fr" 	  accept="image/*"/  data-default-file="plugins/images/Clients/personincharge.jpg">
                      </div>
                    <label class="col-xs-1 control-label">Person in charge's picture</label>
                      <div class="col-xs-5">
                         <input type="file" name="picpicture" id="input-file-max-fs" class="dropify-fr" 	 accept="image/*"/  data-default-file="plugins/images/Clients/personincharge.jpg">
                      </div>
         					 </div>
          				 </br>
     							<div class="form-group">
  									<label class="col-xs-1 control-label">image of establishment </label>
             					<div class="col-xs-5">
                        <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/establishment.jpg">
                      </div>
              			<label class="col-xs-1 control-label">Image of location</label>
                      <div class="col-xs-5">
                        <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/location.jpg">
                          <span class="font-13 text-muted">Recommended: Screenshot from google map<span>
                      </div>
                   </div>
                   <div class="col-lg-4  col-sm-4 col-xs-12">
           </div>
           <div class="col-lg-2 col-sm-4 col-xs-12">
             <button  type="submit" name="sub" value="Upload Pictures" class="btn btn-block  btn-rounded btn-info">Upload picture</button>
           </div>

             <div class="col-lg-2 col-sm-4 col-xs-12">
               <button type="submit" name="sub" value="Upload Later" class="btn btn-block  btn-rounded btn-info">Continue anyway</button>
             </div>
                 </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>




    <footer class="footer text-center"> 2016 &copy; Evacle </footer>

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

    $('#slimtest4').slimScroll({
        color: '#FFFFFF',
        size: '10px',
        height: '820px',
        alwaysVisible: false
    });
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
