
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
       <!-- Messages-->
       <li class="dropdown">
         <a class="waves-effect waves-light" href="#">
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
         <a class="waves-effect waves-light" href="#">
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
        
        <span class="input-group-btn2">
          <!-- Company logo -->
          <li class="user-pro2"> <a href="#" class="waves-effect"><img src="plugins/images/users/no bg.png" height="80" alt="user-img"> <span class="hide-menu"></span></span ></a></li>
        </span>
    
        <li> <a href="dashboard.html" class="waves-effect"><i class="fa fa-dashboard fa-3x fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
              </li>

              <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-wrench fa-3x fa-fw"></i> <span class="hide-menu"> Maintenance </a>
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
        
        
                <li> <a href="javascript:void(0);" class="waves-effect active"><i class="fa fa-pencil-square-o fa-3x fa-fw"></i> <span class="hide-menu"> Registration </a>
            <ul class="nav nav-second-level">
              <li> <a href="ClientRegistration.html" class="waves-effect">Clients</a>
              </li>
              <li> <a href="SecurityGuardsRegistration.html" class="waves-effect">Security guards</a>
              </li>
                  </ul>
          </li>
        
              <li><a href="javascript:void(0);" class="waves-effect"><i class="fa fa-exchange fa-3x fa-fw"></i> <span class="hide-menu">Manual deployment</a>
            <ul class="nav nav-second-level">
              <li> <a href="Deploy.html" class="waves-effect">Deploy</a>
              </li>
              <li> <a href="Swap.html" class="waves-effect">Swap/Replace/Relieve</a>
              </li>
                </ul>
              </li>
        
          <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users fa-3x fa-fw"></i> <span class="hide-menu"> Clients </a>
           <ul class="nav nav-second-level">
            <li> <a href="PendingClients.html" class="waves-effect">Pending<span class="label label-rouded label-info pull-right">13</span></a>
            </li>
            <li> <a href="ActiveClients.html" class="waves-effect">Active<span class="label label-rouded label-info pull-right">13</span></a>
            </li>
           </ul>
          </li>

          <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shield fa-3x fa-fw"></i> <span class="hide-menu"> Security guards </a>
           <ul class="nav nav-second-level">
            <li> <a href="guards.html" class="waves-effect">Guards<span class="label label-rouded label-info pull-right">13</span></a>
            </li>
            <li> <a href="guardslicenses.html" class="waves-effect">Guard licenses<span class="label label-rouded label-info pull-right">13</span></a>
            </li>
           </ul>
          </li>

          <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-user-follow fa-3x fa-fw"></i> <span class="hide-menu"> Applicants </a>
            <ul class="nav nav-second-level">
            <li> <a href="Availableapplicants.html" class="waves-effect">Available<span class="label label-rouded label-info pull-right">13</span></a>
            </li>
            <li> <a href="PendingApplicants.html" class="waves-effect">Status</a>
            </li>
           </ul>
          </li>

          <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-truck fa-3x fa-fw"></i> <span class="hide-menu"> Delivery </a>
            <ul class="nav nav-second-level">
            <li> <a href="Deliverguns.html" class="waves-effect">Guns</a>
            </li>
            <li> <a href="DeliverAmmunitions.html" class="waves-effect">Ammunitions</a>
            </li>
            <li> <a href="pickups.html" class="waves-effect">Pickups</a>
            </li> 
           </ul>
          </li>



          <li> <a href="#" class="waves-effect"><i class="fa fa-file-text fa-3x fa-fw"></i> <span class="hide-menu">Reports</span></a>
          </li>

          <li> <a href="#" class="waves-effect"><i class="fa fa-search fa-3x fa-fw"></i> <span class="hide-menu">Queries</span></a>
          </li>


          <li> <a href="#" class="waves-effect"><i class="fa fa-cogs fa-3x fa-fw"></i> <span class="hide-menu">Utilities</span></a>
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
              <h4><span><i class="fa fa-clock-o"></i></span>Guard's shift</h4>
            </li>
            <li role="tab">
              <h4><span><i class="ti-check"></i></span>Account</h4>
            </li>
          </ul>
              </br>
          <form id="validation" class="form-horizontal"  style="border: 2px solid black; border-radius:15px;" method="POST" action="NewContract-Save">
                    {{ csrf_field() }}
                        <div class="wizard-content">
                            <div class="wizard-pane active" role="tabpanel">
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Client name:</label>
                                  <div class="col-xs-4">
                                    <input type="text" class="form-control" value="{{$client->name}}" disabled="true">
                                      
                                      <input type="hidden" name="client_name" value="{{ $client->name }}">
                                      
                                      
                                      <input type="hidden" name="service_request_code" value="{{ $serviceRequest->id }}">
                                  </div>
                                  <label class="col-xs-3 control-label">Contract Code:</label>
                                  <div class="col-md-3">
                                    <input type="text" class="form-control name"  name="contract_code" placeholder="CNTRCT-001A-XXX" />
                                  </div>                      
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-2">Client ID:</label>
                                <div class="col-md-4">
                                  <input type="text" class="form-control" value="{{$client->id}}" disabled="true">
                                  <input type="hidden" name="client_code" value="{{ $client->id }}">
                                </div>
                              </div>
                              
                                <div class="form-group">
                                <hr style="background: black;">
                                  <center><h4>Establishment Information</h4></center><br>
                                  <div class="col-md-10">
                                    <div class="form-group">
                                      <label class="control-label col-md-3"> Registered Establishments:</label>
                                      <div class="col-md-8">
                                      @php
                                        $estabID;
                                      @endphp

                                    <select class="form-control" name="regEstab" id="regEstab" onchange="fill(this.value);">
                                            <option value="-">~~Select Registered Establishments</option>
                                      @php
                                        $estabCtr = 0;
                                        $arr = array();
                                        $a = 0;
                                        $l = 0;

                                      @endphp

                                      @foreach($clientRegistrations as $clientRegistration)
                                        @if($clientRegistration->client_id == $client->id)
                                          @foreach($contracts as $contract)
                                            @if($contract->id == $clientRegistration->contract_id)
                                              @foreach($establishments as $establishment)
                                                @if($establishment->contract_id == $contract->id)
                                                  @php
                                                    $estabID = $establishment->id;
                                                      $arr[$a] = $estabID; $a++;
                                                      $l = count($arr);
                                                  @endphp
                                                @endif
                                              @endforeach
                                            @endif
                                          @endforeach
                                        @endif
                                      @endforeach

                                      @php
                                        $e = 0;
                                        for($q = 0; $q < count($arr); $q++){
                                          for($p = $q+1; $p < count($arr); $p++){
                                            if($arr[$q] == $arr[$p]){
                                              $arr[$p]="-";
                                            }
                                          }    
                                        }
                                        for($f = 0; $f < count($arr); $f++){
                                          if($arr[$f] != "-"){

                                            @endphp
                                              @foreach($establishments as $establishment) 
                                                @if($establishment->id == $arr[$f])
                                                  <option value="{{$establishment->id}},{{$establishment->name}},{{$establishment->natures_id}},{{$establishment->address}},{{$establishment->areas_id}},{{$establishment->province_id}},{{$establishment->area_size}},{{$establishment->population}},{{$establishment->person_in_charge}},{{$establishment->contactNo}},{{$establishment->email}}">{{$establishment->name}}</option>
                                                  @break;
                                                @endif
                                              @endforeach
                                              
                                            @php
                                          }
                                        }

                                      @endphp
                                            
                                    </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2 control-label">Establishment name</label>
                                      <div class="col-xs-6">
                                          <input type="text" class="form-control name" id="estab_name" name="estab_name" />
                                      </div>
                                      
                                      <div class="col-xs-4">
                                          <select class="form-control" name="nature" id="estabNature">
                                            <option>Nature of Business ~~~</option>
                                            @foreach($natures as $nature)
                                              <option value="{{ $nature->id }}">{{ $nature->name }}</option>
                                            @endforeach
                                         </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2 control-label">Address</label>
                                      <div class="col-xs-4">
                                          <input type="text" class="form-control name" placeholder="~~ Street Address ~~" name="street_add" id="street_add"/>
                                      </div>
                                      <div class="col-xs-3">
                                        <select class="form-control" id="estabArea" name="area">
                                          <option value="" disabled="" selected="">~~ Select Area ~~</option>
                                          @foreach($areas as $area )
                                          <option value="{{ $area->id }}">{{$area->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                      <select class="form-control" id="estabProvince" name="province">
                                        <option value="" disabled="" selected="">~~ Select Province ~~</option>
                                        @foreach($provinces as $province )
                                          <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                      </div>
                                    </div>     
                                    <div class="form-group">
                                      <label class="col-xs-2 control-label">Area Size (approx. in square meters)</label>
                                      <div class="col-xs-3">
                                          <input type="text" class="form-control name" name="area_size" id="estabSize" />
                                      </div>
                                      <label class="col-xs-2 control-label">Population (approx.)</label>
                                      <div class="col-xs-2">
                                          <input type="text" class="form-control" name="population" id="estabPop" />
                                      </div>
                                    </div>
                                  </div>
                                    
                                  
                                      <div class="col-xs-2">
                                        
                                        <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/establishment.jpg">
                                        <div class="form-group">
                                        <label class="col-xs-2 control-label">Establishment Image</label>
                                      </div>
                                      </div>
                                      <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/location.jpg">
            <span class="font-13 text-muted">Recommended: Screenshot from google map<span>

                                </div>
                                
                               
                          
                                  
                
                                <div class="form-group">
                                <hr style="background: black;">
                                  <center><h4>Person in-Charge Information</h4></center>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-10">
                                    <div class="form-group">
                                      <div class="col-xs-4">
                                      <label class="control-label col-md-4">First Name:</label>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control"  name="firstName" id="pic_fname"  />
                                      </div>
                                    </div>
                                    <div class="col-xs-4">
                                      <label class="control-label col-md-4">Middle Name:</label>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control"  name="middleName" id="pic_mname" />
                                      </div>
                                    </div>
                                    <div class="col-xs-4">
                                      <label class="control-label col-md-4">Last Name:</label>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control"  name="lastName" id="pic_lname" />
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-xs-4">
                                      <label class="control-label col-md-4">Contact Number:</label>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control"  name="pic_no" id="pic_no"/>
                                      </div>
                                    </div>
                                    <div class="col-xs-4">
                                      <label class="control-label col-md-4">Email Address:</label>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control"  name="pic_email" id="pic_email"/>
                                      </div>
                                    </div>
                                    </div>
                                    
                                  </div>
                                  <div class="col-md-2">
                                    <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="noblank" data-default-file="plugins/images/Clients/personincharge.jpg">
                                    <div class="form-group">
                                        <label class="control-label">Person In-charge Image</label>
                                      </div>
                                  </div>
                                </div>
                                
                                <hr style="background: black;">
                
                
                
            
              <div class="form-group">
                <div class="col-xs-12">
                  <center> <h4> <strong>Terms of contract</strong></h4> </center>
                  </br> </br>

                  <div class="form-group">
                    <label class="control-label col-md-2">Type of Service</label>
                      <div class="col-md-4">
                        <select class="form-control"  name="service">
                          <option value="" disabled="" selected="">~~~ Select Type of Service</option>
                          @foreach($services as $s )
                          <option value="{{$s->id}}">{{$s->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <label class="col-xs-3 control-label">Number of guards needed</label>
                      <div class="col-xs-2">
                        <input id="tch3" type="text" value="" name="no_guards" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                      </div>
                  </div>

                  <label class="col-xs-2 control-label">Span (months) </label>
                  <div class="col-xs-2">
                  
                    <input id="tch3" type="text" name="span_mo" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                                    </div>
            <label class="col-xs-2 control-label">Starts from </label>
              <div class="col-xs-2">
                                                                        <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="from">
                    </div>
                              </div>
                  <label class="col-xs-1 control-label"> Ends to </label>
              <div class="col-xs-2">
                                                                        <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="to">
                    </div>
                              </div>
              </div>
                    </div>
                  </br> </br>   </br>

      
            <center> <h4> <strong>Guns</strong></h4> </center>
                </br>
                <center><button class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#Addtse"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</button> </center>
                </br> </br>

                  <div class="form-group">
                   <div class="table-responsive">
                                    <table class="table color-bordered-table inverse-bordered-table">
                      <thead>
                        <tr>
                          <th>Gun</th>
                                                <th>Gun type</th>
                          <th>Quantity</th>
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
                                <div class="form-group">

                                         <center><button class="btn btn-success" type="submit">Create Contract</button></center>
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

  function fill(id){
    if(id === "-"){
      $("#estab_name").attr("enabled", "enabled");  
      
      $('#estabNature').removeAttr("disabled");  
      $('#street_add').removeAttr("disabled");  
      $('#AddGuard').removeAttr("disabled");  
      $('#estabArea').removeAttr("disabled");  
      $('#estabProvince').removeAttr("disabled");  
      $('#estabSize').removeAttr("disabled");  
      $('#estabPop').removeAttr("disabled");  
    }
    name = id.split(",");
    
    $("#estab_name").val(id.split(",")[1]);
    

    $("#estabNature").val(id.split(",")[2]);
    
    $("#street_add").val(id.split(",")[3]);
    

    $("#estabArea").val(id.split(",")[4]);
    

    $("#estabProvince").val(id.split(",")[5]);
    

    $("#estabSize").val(id.split(",")[6]);
    

    $("#estabPop").val(id.split(",")[7]);
    


    $("#pic_fname").val(id.split(",")[8]);
   

    $("#pic_mname").val(id.split(",")[9]);
    
    $("#pic_lname").val(id.split(",")[10]);
    
    $("#pic_no").val(id.split(",")[11]);
    $
    $("#pic_email").val(id.split(",")[12]);
    

    



    
    
    
    
  }

   // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
    
    
      });
   //Scrollbar
    jQuery(document).ready(function() {


     $("input[id='tch3']").TouchSpin({
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
