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
  <title>Send Gun</title>

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
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse" id="slimtest4">
        <ul class="nav" id="side-menu">
          <li class="user-pro">
            <a href="#" class="waves-effect"><img src="plugins/images/LandingPage/JUCEBER.png" alt="user-img" class="img-circle"><span class="hide-menu text-white">Jubecer security</span>
            </a>
          </li>
          <li>
            <a href="dashboard.html" class="waves-effect"><i class="fa fa-dashboard fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Dashboard </span> </a>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-wrench fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Maintenance  <span class="fa arrow"></span></a>
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


                <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
            <ul class="nav nav-second-level">
              <li> <a href="ClientRegistration.html" class="waves-effect">Clients</a>
              </li>
              <li> <a href="SecurityGuardsRegistration.html" class="waves-effect">Security guards</a>
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

          <li> <a href="javascript:void(0);" class="waves-effect active"><i class="fa fa-truck fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Delivery <span class="fa arrow"></span></a>
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
        <div class="col-lg-12 ">
          <div class="white-box">
            <h4><center><strong>Clients</strong></center></h4>
              <table id="demo-foo-addrow" class="loadGunReq table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                <thead>
                  <tr>
                    <th data-toggle="true">ID</th>
                    <th>Client Name</th>
                    
                    <th width="150px">Date Requested</th>
                    <th width="100px">Status</th>
                    <th width="495px">Actions</th>
                  </tr>
                </thead>
                <div class="form-inline padding-bottom-15">
                  <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6 text-right m-b-20">
                      <div class="form-group">
                        <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                autocomplete="off">
                     </div>
                    </div>
                   </div>
                </div>
                <tbody>
                 @foreach($gunRequests as $gunRequest)

                  @if($gunRequest->status != 'deleted')
                    @if($gunRequest->status == 'done')
                    <tr  style="background: gray; color: black;">
                      <td> {{ $gunRequest->strGunReqID }}</td>
                      <td>
                        
                       
                       
                      </td>
                      
                      <td>
                        {{ $gunRequest->created_at }}
                      </td>
                      <td>
                        <button type="button" value="{{$gunRequest->strGunReqID}}" class="btn btn-success delStats">Delivery Status</button>
                      </td>
                      <td>
                        {{ $gunRequest->status }}
                      </td>
                      <td>
                        <button class="btn btn-info viewGunReq" value="{{ $gunRequest->strGunReqID }}" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button disabled="true" class="btn btn-danger"  data-toggle="modal" data-target="#decline{{ $gunRequest->strGunReqID }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Decline Request</button>
                        <button disabled="true" class="btn btn-success"  data-toggle="modal" data-target="#{{ $gunRequest->strGunReqID }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver guns</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunRequest->strGunReqID!!}')">X</button>
                      </td>
                    </tr>
                    @else
                    <tr>
                      <td> {{ $gunRequest->strGunReqID }}</td>
                      <td>
                         @foreach($clients as $client)
                          @if($client->id == $gunRequest->strClientID)
                            {{$client->name}}
                          @endif
                         @endforeach
                      </td>
                      
                      <td>
                        {{ $gunRequest->created_at }}
                      </td>
                      <td>
                        <button type="button" value="{{$gunRequest->strGunReqID}}" class="btn btn-success delStats">Delivery Status</button>
                      </td>
                      <td>
                        <button class="btn btn-info viewGunReq" value="{{ $gunRequest->strGunReqID }}" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button class="btn btn-danger"  data-toggle="modal" data-target="#decline{{ $gunRequest->strGunReqID }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Decline Request</button>
                        <button class="btn btn-success"  data-toggle="modal" data-target="#{{ $gunRequest->strGunReqID }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver guns</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunRequest->strGunReqID!!}')">X</button>
                      </td>
                    </tr>
                    
                    @endif
                  @endif
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5"></td>
                </tr>
              </tfoot>
          </table>

            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>

              </div>


             </div>

     

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


 @foreach($gunRequests as $gunRequest)
  @if($gunRequest->status != 'deleted')
    <!-- Deliver guns -->
  <div id="{{ $gunRequest->strGunReqID }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
        </div>
        <div class="modal-body" >
          <form method="POST" action="{{ url('/GunDelivery/Save') }}">
          {!! csrf_field() !!}
            <div class="form-group">
              <div class="row">
                <div class="form-group col-sm-2">
                  <label class="control-label">Order ID</label>
                    <p class="form-control-static">{{ $gunRequest->id }}</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-7">
                  <label class="control-label">Client name</label>
                    <p></p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-3">
                  <label class="control-label">Contact number</label>
                    <p class="form-control-static">  </p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <h4 class="control-label col-md-6">Establishment Name</h4>
                  <h4 class="control-label col-md-6">Establishment Address</h4>
                </div>
                <div class="form-group">
                  <p class="form-control-static col-md-6">
                  
                  </p>
                  <p class="form-control-static col-md-6">
                    
                  <div class="help-block with-errors"></div>
                </div>
                
                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                  <thead>
                    <tr>
                      <th  data-sort-ignore="true">Gun Name</th>
                      <th data-sort-ignore="true" width="120px">Stocks</th>
                      <th width="200px"> Qty.Ordered</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                    $gunCtr = 0;
                  @endphp
                    @foreach($gunRequestsDetails as $gunRequestsDetail)
                            @if($gunRequestsDetail->strGunReqID == $gunRequest->strGunReqID)
                            @php
                              $qty = $gunRequestsDetail->quantity;
                            @endphp
                            <tr>
                              <td>
                                @foreach($guns as $gun)
                                  @if($gunRequestsDetail->strGunID == $gun->strGunID)
                                    {{ $gun->name }}
                                    @php
                                      $avGuns = $gun->quantity;
                                      $gunID = $gun->strGunID;
                                    @endphp
                                  @endif
                                @endforeach
                              </td>
                              <td>
                                {{ $avGuns }}
                              </td>
                              <td>
                              <input id="tch3" type="text" value="" placeholder="{{ $qty }}" name="qty{{ $gunCtr }}" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>

                               <input type="hidden" name="qtyOrder{{ $gunCtr }}" value="{{ $qty }}">
                               <input type="hidden" name="gunID{{ $gunCtr }}" value="{{ $gunID }}">
                              </td>
                            </tr>
                            @php
                              $gunCtr++;
                            @endphp
                            @endif
                          @endforeach
                  </tbody>
                </table>
                <input type="hidden" name="gunReqstID" value="{{ $gunRequest->strGunReqID }}">
                <input type="hidden" name="gunCount" value="{{ $gunCtr }}">
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
                  <br>
                  <button type="button" class="btn btn-info waves-effect waves-light" >Generate code</button>
                </div>
              </div>
            <div class="help-block with-errors"></div>
          </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info waves-effect waves-light" >Deliver</button>
         </div>
        </form>
      </div>
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div><!-- /Add military service modal -->


<div id="view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content view-content">
        
        
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div><!-- /Add military service modal -->

<div id="decline{{ $gunRequest->strGunReqID }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:firebrick;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong style="color: white;">Decline Request</strong></center></h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator">
            <div class="form-group col-sm-12">
            <br>
              <label class="control-label">Please provide reasons for Declining Request of  branch</label>
              <div class="fom-group">
                
                <textarea class="form-control" name="reason" id="body" placeholder=""></textarea>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-info waves-effect waves-light" >Submit</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
            
           </div>
        </form>
      </div>
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div><!-- /Add military service modal -->
  @endif
@endforeach

<input type="hidden" name="hidden_delete" id="hidden_delete" value="GunRequest-remove">


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


     $("input[id='tch3']").TouchSpin({
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

<script>
  function fun_delete(id)
   {

      swal({
          title: "Are you sure?",
          text: "Remove this item?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, remove it!",
          closeOnConfirm: false
      }, function(){
        var delete_url = $("#hidden_delete").val();
                $.ajax({
                  url: delete_url,
                  type:"POST",
                  data: {"id":id,_token: "{{ csrf_token() }}"}
                })
        .done(function(data) {
  swal({
      title: "Removed",
      text: "This item has been successfully removed",
      type: "success"
  },function() {
      location.reload();
  });
})
.error(function(data) {
       swal("Oops", "We couldn't connect to the server!", "error");
     });
      });


     
   }
</script>
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function(){
      $('.viewGunReq').on('click',function(){
        $.ajax({
          url : "{{route('view.gunRequest')}}",
          type : 'GET',
          data : {gunReqstID:this.value},
          success:function(data){
            $('.view-content').text('');
            $('.view-content').append(data);
            $('#view').modal('show');
            console.log(data);
          }
        });
      });
      $('.delStats').on('click',function(){
        //alert(this.value);
        $.ajax({
          url : "{{route('delivery.status')}}",
          type : "GET",
          data : {gunReqstID:this.value},
          success : function(data){
            $('.view-content').text('');
            $('.view-content').append(data);
            $('#view').modal('show');
            console.log(data);
          }
        });
      });
    });
</script>


</body>
</html>
