
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

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
    <link href="css/jquery-ui.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="css/colors/MyThemeColor.css" id="theme"  rel="stylesheet">
  <!--alerts CSS -->
  <link href="js/Alert/sweetalert.css" rel="stylesheet" type="text/css">
  <!---switch -->
  <link href="plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="plugins/bower_components/dropify/dist/css/dropify.min.css">
    <!-- Date picker plugins css -->
<link href="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
<link href="plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

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


                  <li> <a href="javascript:void(0);" class="waves-effect active"><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
              <ul class="nav nav-second-level">
                <li> <a href="{{url('/ClientsRegistration')}}" class="waves-effect active">Clients</a>
                </li>
                <li> <a href="{{url('/Guard-Registration')}}" class="waves-effect">Security guards</a>
                </li>
                    </ul>
            </li>

                <li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-exchange fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Deployment<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li> <a href="{{route('manual.deployment')}}" class="waves-effect">Deploy</a>
                </li>
                <li> <a href="{{url('/Replace')}}" class="waves-effect">Replace</a>
                </li>
                  <li> <a href="{{url('/Swap')}}" class="waves-effect">Swap</a>
                </li>
                  </ul>
                </li>

            <li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-users fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
               <li> <a href="{{url('/ActiveClient')}}" class="waves-effect">Active<span class="label label-rouded label-info pull-right">4</span></a>
              </li>
              <li> <a href="{{url('/PendingClientRequests')}}" class="waves-effect">Pending request<span class="label label-rouded label-info pull-right">3</span></a>
              </li>
              <li> <a href="{{url('/ServiceRequest')}}" class="waves-effect">Client Requests<span class="label label-rouded label-info pull-right"><a href="javascript:void(0);" class="waves-effect"> </span></a>
              </li>
              <li> <a href="{{url('/GunRequest')}}" class="waves-effect">Gun Requests<span class="label label-rouded label-info pull-right"><a href="javascript:void(0);" class="waves-effect"> </span></a>
              </li>

             </ul>
            </li>

            <li> <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-shield fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Security guards<span class="fa arrow"></span> </a>
             <ul class="nav nav-second-level">
              <li> <a href="{{url('/SecurityGuards')}}" class="waves-effect">Guards<span class="label label-rouded label-info pull-right"></span></a>
              </li>
              <li> <a href="{{url('/GuardLicenses')}}" class="waves-effect">Guard licenses<span class="label label-rouded label-info pull-right"></span></a>
              </li>
                <li> <a href="{{url('/GuardsDTR')}}" class="waves-effect">Guard's DTR</a>
              </li>
             </ul>
            </li>

            <li><a href="{{url('/Applicants')}}" class="waves-effect"><i class="icon-user-follow fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Applicants  </a>
            </li>

            <li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-truck fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Delivery <span class="fa arrow"></span></a>
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
        <div class="alert alert-info"> Please input each forms correctly and completely base on the contract signed between the client and agency.
        </div>
        <div id="exampleValidator" class="wizard">
          <ul class="wizard-steps" role="tablist"  style="border: 1px solid black;">
            <li class="active" role="tab">
              <h4><span><i class="ti-user"></i></span>Business details</h4>
            </li>
            <li role="tab">
              <h4><span><i class="fa fa-file-text-o"></i></span>terms of contract</h4>
            </li>
           
            <li role="tab">
              <h4><span><i class="ti-check"></i></span>Qualifications</h4>
            </li>
            
          </ul>
              </br>
          <form id="validation" class="form-horizontal"  style="border: 2px solid black; border-radius:15px;" method="POST" >
                    {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="wizard-content">
              <div class="wizard-pane active" role="tabpanel">
                <div class="form-group">
                  <label class="col-xs-1 control-label">Client name</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control name"  name="client_name" value="{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}" disabled="true" />
                    </div>
                    <label class="col-xs-1 control-label">Client Code</label>
                    <div class="col-xs-3">
                        <input type="text" class="form-control name"  name="client_code" value="{{$clcode}}"  disabled/>
                    </div>
                    <label class="col-xs-1 control-label">Contract Code</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control name"  name="contract_code" value="{{$cncode}}" disabled/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-xs-2 control-label">Establishment name</label>
                      <div class="col-xs-6">
                          <input type="text" class="form-control name" name="estab_name" value="{{$establishment->name}}" disabled />
                      </div>
                      <div class="col-xs-4">
                          <input type="text" class="form-control name" name="estab_name" value="{{$nature->name}}" disabled />
                      </div>
                  </div>



                <div class="form-group">
                  <label class="col-xs-1 control-label">Address</label>
                  <div class="col-xs-5">
                      <input type="text" class="form-control name" placeholder="Street Address" name="street_add" value="{{$establishment->address}}" disabled/>
                  </div>
                  <div class="col-xs-3">
                    <input type="text" class="form-control name" name="province" value="{{$province->name}}" disabled />
                  </div>
                  <div class="col-xs-3">
                    <input type="text" class="form-control name" name="{{$area->id}}" id="area" value="{{$area->name}}" disabled />
                  </div>
              </div>

              <div class="form-group">
                <label class="col-xs-2 control-label">Area Size (approx. in square meters)</label>
                  <div class="col-xs-4">
                    <input type="text" class="form-control name" name="area_size" value="{{$establishment->area_size}}" disabled />
                  </div>
                <label class="col-xs-2 control-label">Population (approx.)</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control" name="population" value="{{$establishment->population}}" disabled />
                </div>
              </div>



                              <div class="form-group">
                                <label class="col-xs-1 control-label">Telephone</label>
                                                    <div class="col-xs-3">
                                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                          <input type="number" value="{{$client->contactNo}}" class="form-control"  id="numonly" name="clientTelephone" maxlength="9" disabled>
                                    </div>
                                    <span class="font-13 text-muted">ex. 1234567<span>
                                  </div>
                                <label class="col-xs-1 control-label">Cellphone</label>
                                                    <div class="col-xs-3">
                                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                        <input type="number" value="{{$client->cellphoneNo}}" class="form-control"  id="numonly" name="clientCellphone" maxlength="11" disabled>
                                    </div>
                                    <span class="font-13 text-muted">ex. 09123456789<span>
                                  </div>
                                    <label class="col-xs-1 control-label">Email address</label>
                                  <div class="col-xs-3">
                                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="ti-email"></i></div>
                                          <input type="text" value="{{$client->email}}" class="form-control" name="email" id="clientEmail" disabled>
                                    </div>
                                    <span class="font-13 text-muted">ex. myemail@yahoo.com<span>
                                  </div>
                                              </div>

              <div class="form-group">
                <center> <h4> <strong>Person in charge Informations</strong></h4> </center>
              </div>
              <div class="form-group">

                  <div class="col-xs-4">
                      <input type="text" class="form-control name"  name="firstName" placeholder="First Name" value="{{$pic_fname}}" disabled/>
                      
                  </div>
                  <div class="col-xs-4">
                      
                      <input type="text" class="form-control name"  name="middleName" placeholder="First Name" value="{{$pic_mname}}" disabled/>
                      
                  </div>
                  <div class="col-xs-4">
                      
                      <input type="text" class="form-control name"  name="lastName" placeholder="First Name" value="{{$pic_lname}}" disabled/>
                  </div>

              </div>
              <div class="form-group">
                <div class="col-xs-2">

                </div>
                <div class="col-xs-4">
                    <input type="number" class="form-control" name="pic_no" placeholder="Contact Number" value="{{$establishment->contactNo}}" disabled/>
                </div>
                <div class="col-xs-4">
                    <input type="email" class="form-control" name="pic_email" placeholder="Email Address" value="{{$establishment->email}}" disabled/>
                </div>
              </div>
              <hr>




              </div>
              <div class="wizard-pane" role="tabpanel">
                <div class="form-group">
                      <div class="form-group">
                        <label class="col-xs-2 control-label">Type of Service</label>
                        <div class="col-md-4">
                          <select class="form-control"  name="service" id="service" onchange="getRate(this.value)" required>
                            <option value="" disabled="" selected="">Select Type of Service</option>
                            @foreach($services as $s )
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <label class="col-xs-2 control-label">Operating hours</label>
                         <div class="col-xs-4">
                         <input id="tch1" type="text" value="{{$establishment->operating_hrs}}"  data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" name="operating_hrs" required disabled>
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="col-xs-1 control-label">Span (months) </label>
                      <div class="col-xs-3">
                        <input id="tch3" type="text" name="span_mo" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
                      </div>
                      <label class="col-xs-1 control-label">Starts from </label>
                       <div class="col-xs-3">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calender"></i>   </span> <input type="text" class="form-control firstcal" id="firstcal" placeholder="mm/dd/yyyy" name="from"   readonly required />
                          </div>
                        </div>
                        <label class="col-xs-1 control-label"> Ends to </label>
                        <div class="col-xs-3">
                           <div class="input-group">
                             <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control secondcal" id="secondcal" placeholder="yyyy/mm/dd" name="to" disabled required>
                           </div>
                         </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-2 control-label">Number of guards needed</label>
                       <div class="col-xs-4">
                       <input id="tch4" type="text" name="no_guards" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
                      </div>
                      <label class="col-xs-2 control-label">Expected complete date</label>
                       <div class="col-xs-4">
                         <div class="input-group">
                           <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control excom" placeholder="mm/dd/yyyy" name="exp_date" required />
                         </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-2 control-label">Monthly CP</label>
                       <div class="col-xs-4">
                         <div class="input-group">
                         <span class="input-group-addon">₱</span> <input id="mcp" type="number" class="form-control" min="0.01" step="0.01" value="1000.00" />
                      
                      </div>
                         <span class="font-13 text-muted">per guard<span>
                             </div>
                      <label class="col-xs-2 control-label">Total payment</label>
                       <div class="col-xs-4">
     <div class="input-group">
                         <span class="input-group-addon">₱</span> <input id="tp" type="number" class="form-control" min="0.01" step="0.01" />
                      </div>
                      <span class="font-13 text-muted">per month<span>
                      </div>
                    </div>
                  </div>
              </div>
              
        <div class="wizard-pane" role="tabpanel">
          <div class="form-group">
                   <label class="col-xs-2 control-label">School level</label>
                      <div class="col-xs-4">
                      <select class="form-control"  name="noblank" id="school_level">
                        <option disabled></option>
                        <option value="none">none</option>
                        <option value="Grade School">Grade School</option>
                        <option value="High School">High school level</option>
                        <option value="College">College level</option>
                      </select>
                    </div>
                   <label class="col-xs-1 control-label">Age</label>
                      <div class="col-xs-4">
                         <input type="number" class="form-control" id="pref_age">
                    </div>
                  </div>

</br>
          <center> <h4> <strong>Body attributes of guards</strong></h4> </center>
            <br>
            <div class="table-responsive">
             <table class="table color-bordered-table inverse-bordered-table">
               <thead>
                 <tr>
                   <th>Body attribute</th>
                   <th><center>Specification</center></th>
                   <th>Measurement</th>
                </tr>
              </thead>
              <tbody>
                @foreach($attributes as $a)
                <tr>
                   <td>{{$a->name}}</td>
                   <td>
                   <div class="form-group">
                    <div class="col-xs-6">
                       <input type="text" class="form-control attrib_less" name="attrib_less"  placeholder="not less than"/>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control attrib_great" name="attrib_great"   placeholder="not greater than"/>
                    </div>
                    </div>
                   </td>
                   <td>{{$a->measurement}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
           </div>
         </br>
           <div class="form-group">
              <div class="col-xs-6">
                <center> <h4> <strong>Licences and clearances</strong></h4> </center>
                <br>
                <div class="form-group">
                      @foreach($licenses as $l)
                      <div class="col-xs-4">
                        <div class="checkbox checkbox-success">
                          <input id="{{$l->name}}" class="licenses" type="checkbox" value="{{$l->id}}">
                            <label for="{{$l->name}}"> {{$l->name}} </label>
                        </div>
                      </div>
                      @endforeach
                </div>
              </div>

              <div class="col-xs-6">
                <center> <h4> <strong>Requirements</strong></h4> </center>
                <br>
                <div class="form-group">
                      @foreach($requirements as $r)
                      <div class="col-xs-4">
                        <div class="checkbox checkbox-success">
                          <input id="{{$r->name}}" class="requirements" type="checkbox" value="{{$r->id}}">
                            <label for="{{$r->name}}"> {{$r->name}} </label>
                        </div>
                      </div>
                      @endforeach
                </div>
              </div>
            </div>
              <br>
              <center> <h4> <strong>Notes</strong></h4> </center>
              <br>
              <textarea id="txtArea" name="pref_note" class="form-control pref_note" rows="8"></textarea>
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
                      <label class="control-label">Gun</label>
                            <select class="form-control" >
                        <option></option>
                        <option>Dessert eagle</option>
                        <option>Glock 49</option>
                      </select>
                      <div class="help-block with-errors"></div>
                   </div>
             <div class="form-group col-sm-6">
                       <label class="control-label">Guntype</label>
                  <select class="form-control" >
                        <option></option>
                        <option>Pistiol</option>
                        <option>Rifle</option>
                      </select>
                       <div class="help-block with-errors"></div>
                    </div>
                  <div class="col-md-12">
                      <label class="control-label  col-md-12">Quantity</label>
                                   <input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
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

<input type="hidden" name="estabID" value="{{$estabID}}">

@if($errors->any())
        <ul class="alert alert-danger col-md-6">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif


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
<link rel="stylesheet" href="plugins/bower_components/jquery-wizard-master/libs/formvalidation/ formValidation.min.css">
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
<script src="plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<!-- Footable -->
<script src="plugins/bower_components/footable/js/footable.all.min.js"></script>
<script src="plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<!--FooTable init-->
<script src="js/footable-init.js"></script>
<script src="js/jquery-ui.js"></script>
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
    <script src="plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>




 <script>

function getRate(id){
    //alert(id);
    $.ajax({
          url : "{{route('getservrate')}}",
          type : 'GET',
          data : {serviceID:id},
          success : function(data){
             // alert(typeof data);
            // console.log(data);
            $('#mcp').val(parseFloat(data));
            
          }
        });
  }

 $('.clockpicker').clockpicker({
    donetext: 'Done',

})
  .find('input').change(function(){
    console.log(this.value);
});

 $(function() {


     $(".firstcal").datepicker({
         dateFormat: "mm/dd/yy",
         onSelect: function(dateText, instance) {
           var a = $('input[name=span_mo]').val();
         var number = parseInt(a);

             date = $.datepicker.parseDate(instance.settings.dateFormat, dateText, instance.settings);
             date.setMonth(date.getMonth() + number);
             $(".secondcal").datepicker("setDate", date);
         }
     });
     $(".secondcal").datepicker({
         dateFormat: "mm/dd/yy"
     });
     $(".excom").datepicker({
         dateFormat: "mm/dd/yy"
     });
 });

 $(".excom").datepicker({
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                top: 555            });
        }, 0);
    }
});
  $('.firstcal').attr("disabled", "disabled")
   //Scrollbar
    jQuery(document).ready(function() {
          var guardnum = $('#tch4').val();
    var mcp = $('#mcp').val();
      $("input[id='tch1']").TouchSpin({
                 min: 1  ,
                 max: 24,
                 stepinterval: 50,
                 maxboostedstep: 10000000,
             });
             $("input[id='tch2']").TouchSpin({
                        min: 1  ,
                        max: 1000000000,
                        stepinterval: 50,
                        maxboostedstep: 10000000,
                    });

     $("input[id='tch4']").TouchSpin({
                min: 1  ,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            }).on('change', function () {
                          var guardnum = $('#tch4').val();
    var mcp = $('#mcp').val();
              var tp = guardnum * mcp;
 
              document.getElementById("tp").value = tp.toFixed(2); 

            });

$('#mcp').keyup(function() {
                          var guardnum = $('#tch4').val();
    var mcp = $('#mcp').val();
              var tp = guardnum * mcp;
 
              document.getElementById("tp").value = tp.toFixed(2); 
});

     $("input[id='tch3']").TouchSpin({
                min: 1  ,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            }).on('change', function () {
$('#firstcal').removeAttr("disabled");
      $('#firstcal').val("");
      $('#secondcal').val('');
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
  ctr = 0;
  $('#demo-btn-addrow').click(function() {

    $('.reg').attr("disabled", "false");

    //get the footable object
    var footable = addrow.data('footable');
    ctr++;

    //build up the row we are wanting to add
    var newRow = '<tr><td class="count"></td><<td><div class="input-group" data-placement="left" data-align="top" data-autoclose="true"><input type="time" class="form-control shiftstart" ><span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span></span></div></td><td><div class="input-group" data-placement="left" data-align="top" data-autoclose="true"><input type="time" class="form-control shiftend" ><span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span></span></div></td><td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td></tr>';


    //add it
    footable.appendRow(newRow);
  });
 </script>
 <script>
 $("#province").change(function(){
   $.ajaxSetup({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   }); 
   $.ajax({
     type: 'post',
     url: '/GetProvinceAreas',
     data: {
         prov:$('#province').val(),
     },
     success: function(data){
         $('#area').html(data);
     }
   });
 });
 </script>
<script type="text/javascript">


         $(document).ready(function(){
           $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
           });



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
                                        message: '2 or more characters only'
                                    },
                  regexp: {
                                            regexp: /^[a-zA-Z\s,-.]+$/,
                                        message: 'Invalid characters'
                                    }
                                }
                            },
                            noblank: {
                                validators: {
                                    notEmpty: {
                                        message: 'This field  is required'
                                    },

                                }
                            },
                            req: {
                                validators: {
                                    notEmpty: {
                                        message: 'This field  is required'
                                    },

                                }
                            },
                            bday: {
                                validators: {
                                    notEmpty: {
                                        message: 'This field  is required'
                                    },

                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'The email address is required'
                                    },
                                    emailAddress: {
                                        message: 'The input is not a valid email address'
                                    }
                                }
                            },
                                numonly: {
                                validators: {
                                    notEmpty: {
                                        message: 'This field  is required'
                                    },

                                    regexp: {
                                            regexp: /^[0-9]/,
                                        message: 'Numbers only'
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    },
                                    different: {
                                        field: 'username',
                                        message: 'The password cannot be the same as username'
                                    }
                                }
                            }
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
                  var allstart = [];
                  var allend = [];
                  var allLicense = [];
                  var allReq = [];
                  var allAttrib = [];
                  $.each($(".requirements"), function(){
                      allReq.push($(this).val());
                  });

                  $.each($(".licenses"), function(){
                      allLicense.push($(this).val());
                  });

                  $.each($(".attrib_less"), function(){
                      var Something = $(this).parent().parent().find('.attrib_great').val();
                      allAttrib.push($(this).val()+'/'+Something);
                  });

                  $.each($(".shiftstart"), function(){
                      allstart.push($(this).val());
                  });

                  $.each($(".shiftend"), function(){
                      allend.push($(this).val());
                  });
                 // alert($('#area').attr('name')+"ddddddddddd");
                  $.ajax({
                    type: 'post',
                    url: "{{route('newcontract.existing.save')}}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        client_fname:$('input[name=client_fname]').val(),
                        client_mname:$('input[name=client_mname]').val(),
                        client_lname:$('input[name=client_lname]').val(),
                        client_code:$('input[name=client_code]').val(),
                        client_email:$('#clientEmail').val(),
                        client_telephone:$('input[name=clientTelephone]').val(),
                        client_cellphone:$('input[name=clientCellphone]').val(),
                        contract_code:$('input[name=contract_code]').val(),
                        estab_name:$('input[name=estab_name]').val(),
                        nature:$('#nature').val(),
                        street_add:$('input[name=street_add]').val(),
                        area:$('#area').attr('name'),
                        province:$('#province').val(),
                        area_size:$('input[name=area_size]').val(),
                        population:$('input[name=population]').val(),
                        firstName:$('input[name=firstName]').val(),
                        middleName:$('input[name=middleName]').val(),
                        lastName:$('input[name=lastName]').val(),
                        pic_no:$('input[name=pic_no]').val(),
                        pic_email:$('input[name=pic_email]').val(),
                        service:$('#service').val(),
                        no_guards:$('input[name=no_guards]').val(),
                        span_mo:$('input[name=span_mo]').val(),
                        from:$('input[name=from]').val(),
                        to:$('input[name=to]').val(),
                        client_username:$('input[name=username]').val(),
                        client_password:$('input[name=password]').val(),
                        allend:allend,
                        allstart:allstart,
                        prefSchool: $('#school_level').val(),
                        prefAge:$('#pref_age').val(),
                        prefNote:$('.pref_note').val(),
                        prefBody:allAttrib,
                        prefLicense:allLicense,
                        prefReq:allReq,
                        exp_date:$('input[name=exp_date]').val(),
                        estabID:$('input[name=estabID]').val(),
                        operating_hrs:$('input[name=operating_hrs]').val(),
                        mcp:$('#mcp').val(),
                        tp:$('#tp').val()
                    },
                    success: function(data){
                      if(data==="Success")
                      {
                        alert("Registration Success!");
                        window.location.href = '/Dashboard';
                      }
                      else {
                        alert(data);
                      }
                    }
                  });

                }
            });


        })();
</script>
<script>

$("#txtArea").on("keypress",function(e) {
    var key = e.keyCode;
    // If the user has pressed enter
    if (key == 13) {
        document.getElementById("txtArea").value =document.getElementById("txtArea").value + "\n--- ";
        return false;
    }
    else {
        return true;
    }
});

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
