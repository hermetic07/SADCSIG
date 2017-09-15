
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="plugins/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="plugins/images/favicon-16x16.png" sizes="16x16" />

  <!-- title -->
  <title>Initial Deployment</title>

 <!-- Bootstrap Core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


 <!-- Footable CSS -->
  <link href="plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
  <link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<!-- Wizard CSS -->
<link href="plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="css/colors/MyThemeColor.css" id="theme"  rel="stylesheet">
  <!-- Popup CSS -->
  <link href="plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

  <!-- Bootstrap Core JavaScript -->
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- js for flying to object -->
  <script type='text/javascript' src="js/codex-fly.js"></script>

  <!-- js for selecting guards -->
  <script type="text/javascript">

    $(document).ready(function(){
      arry = [];
       id = "";
       guardsReq = "";
        $('.add-guard').on('click', function() {

            var Self = $(this);
            var Thisdiv = $(this).parent();


            var ButtonAddGuard = $(this).parent().find('.AddGuard');
            var ButtonAddedGuard = $(this).parent().find('.AddedGuard');

      ButtonAddGuard.hide();
      $(ButtonAddedGuard).fadeIn("slow");

      //this will be the counts of guard to be seleceted
      //var limit =$("#guardsCount").text();
        var limit = guardsReq;

      //Span for count of selected guards
            var value = parseInt($(".myspan").text(), 10) + 1;
      //Span for the remaining guards that need to be selected to meet the limit
      var value2 = parseInt($(".deploysecu").text(), 10) + 1;

      //Setting text to the blue span the "value"
            $(".myspan").text(value);

      //the value for the limit minus the count of selected guards
      var value3 = limit - value;
      //Setting the text of remaining count to select
       $(".deploysecu").text(value3+" more");

      //disable buttons if you select enough guards
      if(value3 < 1){
              $('#deployguards').removeAttr("disabled");
          $(".deploysecu").hide();
            $('.AddGuard').attr("disabled", "disabled");
        }

      //fly the image to the icon
            var itemImg = $(this).parent().find('img').eq(0);
            flyToElement($(itemImg), $('.navbar-toggler'));

      //guard name
            var guardname = Thisdiv.find('.guard_name').get(0).innerHTML;
          // guard image
            var guardimage = $(this).parent().find('img').attr('src');
            var guardID = this.name;


      //putting the guards to the sidebar
            setTimeout(function() {

                var GuardInfo = "<div class='cart-item'><div class='img-wrap'><img src='" + guardimage + "'  alt='' /></div><span>" + guardname + "</span><div class='cart-item-border'></div><div class='delete-item' name= "+guardID+"></div></div>";

                $("#cart .empty").hide();
                $("#cart").append(GuardInfo);

        //removing guards to the sidebar
                $("#cart .cart-item").last().find(".delete-item").click(function() {
                  //arry.pop(guardID);
                  arry = jQuery.grep(arry, function(value){
                      return value != guardID;
                  });
                  id = arry.join("");
                  //alert(id);
                  ButtonAddedGuard.hide();
                  ButtonAddGuard.show();
                  $(this).parent().fadeOut(300, function() {
                     var remove = parseInt($(".myspan").text(), 10) - 1;
                      $(".myspan").text(remove);
                     value3 = limit - remove;
                      $(".deploysecu").text(value3+" more");
              //if you select not enought guards the deploy guards will be disable
                      if( value3 = 10){
                         $('#deployguards').attr("disabled", "disabled");
                        $(".deploysecu").show();
                        $('.AddGuard').removeAttr("disabled");
                      }
                      $(this).remove();
              //if no guards selected, no guards will show
                      if ($("#cart .cart-item").size() == 0) {
                          $("#cart .empty").fadeIn(500);
                      }
                    })
                  });
        }, 1000);



        });
});



$(document).ready(function(){

  $(".shitshit").click(function(){
    arry.push(this.name)
    id = arry.join("")
    // id = id+",#"+this.name;
     //alert(id);

  });
  $("#deployguards").click(function(){
    //alert("tr:not(#earl"+id+")");
    $("tr:not(#earl"+id+")").hide();

  });
  $(".btnClose").click(function(){
    $("tr").show();
  });
  $(".radioBtn").click(function(){
    var radioVal;
    //guardsReq =  this.id;
    radioVal = this.value.split(",");
    guardsReq = radioVal[2];
    //alert("#"+this.id);
$(".sel").text( " Please select " + guardsReq + " guards to deploy to the client.");
    $('#establishmentID').val(radioVal[1]);
    $('#numGuards').val(radioVal[2]);
    $('#contractID').val(radioVal[0]);
    $('#clientID').val(radioVal[3]);
    //alert(radioVal[3]);
    var notRadio = "#"+this.id;
   // alert(notRadio);
    $(".radioBtn:not("+notRadio+")").prop('checked', false);
    //alert(".radioBtn:not("+notRadio+")");
   //var radioVal = this.value.toArray();

  });
});



</script>

</head>

<body class="fix-header content-wrapper">

<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>



<div id="wrapper">
  <!-- Top Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
      <ul class="nav navbar-top-links navbar-left2 hidden-xs">
            <li><a href="{{ route('dashboard') }}" class="waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i>&nbsp; Back to dashboard</a></li>
      </ul>

      <ul class="nav navbar-top-links navbar-right pull-right">
        <!-- /.dropdown-tasks -->
          <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/users/admin.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Ernest</b> </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
            <li><a href="#"><i class="ti-wallet"></i> Others</a></li>
            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="ti-settings"></i> Account Setting</a> </li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
          </ul>
            <!-- /.dropdown-user -->
        </li>
      </ul>
    <div class="top-left-part">
    <a class="logo" href="index.html"><b><img src="plugins/images/users/logoicon2.png" height="60" alt="home" /></b><span class="hidden-xs"><img src="plugins/images/users/logotext2.png" height="40" alt="home" /></span></a>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>
  <!-- End Top Navigation -->
  <!-- Left navbar-header -->
    <!-- Page Content -->
  <div id="page-wrapper2">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Initial Deployment</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="active">Deploy guards</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
            <div id="exampleValidator" class="wizard">
              <ul class="wizard-steps" role="tablist">
                <li class="active" role="tab">
                  <h4><span><i class="ti-user"></i></span>Choose a client</h4>
                </li>
                <li role="tab">
                  <h4><span><i class="fa fa-shield"></i></span>Select guards</h4>
                </li>
              </ul>
              <form id="validation" class="form-horizontal">
                <div class="wizard-content">
                  <div class="wizard-pane active" role="tabpanel">
                    <div class="row  el-element-overlay">
                      <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                        <thead>
                          <tr>
                            <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="10px" >Establishment
                            </th>
                            <th>Address</th>
                            <th>Client</th>
                            <th >Guard's needed</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th width="80px">Select</th>
                            <th width="190px">Actions</th>
                          </tr>
                        </thead>
                        <div class="form-inline padding-bottom-15">
                          <div class="row">
                            <div class="col-sm-7"></div>
                             <div class="col-sm-5 text-right m-b-20">
                               <div class="form-group">
                                  <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                               </div>
                             </div>
                          </div>
                        </div>
                        @php
                          $ctr = 0;
                          $ctr2 = 0;

                          $establishmentID = "";
                          $shifts;
                          $no_guards;
                          $client_id = "";
                          $clientName = "";
                          $estabImage = "";

                        @endphp

                        <tbody>
                          @foreach($contracts as $contract)
                          @if($contract->status != "active")
                           @foreach($establishments as $establishment)
                              @if($establishment->id == $contract->strEstablishmentID)
                                @php
                                  $establishmentID = $establishment->id;
                                  $estabImage = $establishment->image;
                                @endphp
                              
                            @foreach($clientRegistrations as $clientRegistration)
                                  @if($clientRegistration->contract_id == $contract->id)
                                    @foreach($clients as $client)
                                      @if($client->id == $clientRegistration->client_id)
                                        
                                        @php
                                        $client_id = $client->id;
                                        $clientName = $client->first_name." ".$client->middle_name." ".$client->last_name;
                                        @endphp
                                      @endif
                                    @endforeach
                                  @endif
                                @endforeach
                              @foreach($clientPic as $pic)
                                @if($pic->stringContractId == $contract->id)
                                  
                                @endif
                              @endforeach

                            
                            	<tr>
                              <td>
                               <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1">
                                  <a href="SecurityGuardsProfile.html"><img src="uploads/{{$establishment->image}}" alt="user"  class=" img-responsive"></a>
                                  <div class="el-overlay">
                                    <ul class="el-info">
                                      <li><a class="btn default btn-outline" href="/ClientsDetails-{{$client_id}}+{{$establishmentID}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                    </ul>
                                  </div>
                                </div>
                               </div>
                              </td>
                              <td>
                                {{$contract->id}}
                              </td>
                              <td>
                                <a href="{{route('admin.client.estab',$client_id)}}">{{$clientName}}</a>
                              </td>
                              
                              <td>
                                {{$contract->guard_count}}
                              </td>
                              <td>
                                {{$contract->created_at}}
                              </td>
                              <td>
                                {{$contract->status}}
                                @php
                                  $no_guards = $contract->guard_count;
                                @endphp

                              </td>
                              <td>
                                <div class="radio radio-info">
                                <input type="radio" id="{{ $contract->id }}" class="radioBtn" value="{{ $contract->id }},{{ $establishmentID }},{{ $contract->guard_count }},{{$client_id}}">
                                  <label for="select1"> Select</label>
                                </div>
                              </td>
                              <td>
                                <button class="btn btn-info btnView" value="{{$contract->id}}" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>
                                  
                              </td>
                            </tr>
                            

                            
                            @endif
                            @endforeach
                          @endif
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="8"></td>
                          </tr>
                        </tfoot>
                    </table>
                  </div>
              </div>
              <div class="wizard-pane" role="tabpanel">


<!-- The side bar -->

                <nav class="navbar navbar-fixed-right navbar-minimal animate" role="navigation">
                 <span class="label label-rouded2 label-custom pull-right myspan" id="cnt">0</span>
                   <div class="navbar-toggler animate">
                     <span class="menu-icon"></span>
                  </div>
                    <ul class=" navbar-menu animate">
                      <div id="slimtest4">
                        <div id="cart">
                          <span class="empty">No guards. Select guards to deploy.</span>
                        </div>
                      </div>
                      <button type="button" class="btn btn-block btn-info" id="deployguards"  data-toggle="modal" data-target="#Addtse"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" >
                        <i class="fa fa-plus-circle" ></i>
                          Deploy guards
                        <span class="label label-rouded3 label-danger deploysecu">0</span>
                      </button>
                    </ul>
                </nav>
                <div class="row  el-element-overlay">

             <!-- alert info for the count of guards to be selected -->
                  <div class="alert alert-info sel ">
                    <i class="fa fa-exclamation-circle"></i>  Select 10 guards
                  </div>

                  <div class="row">
                    <div class="col-sm-12" >
                      <div class="white-box search-container">
                        <h3 class="box-title">Search</h3>
                        <form role="form" class="row form-search ">
                          <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                             <input type="text" class="form-control search-query" placeholder="Name" id="target"  />
                            </div>
                          </div>

                          <div class="col-sm-1 col-md-1">
                            <button type="submit" id="target2" class="btn btn-inverse btn-block form-control"><i class="fa fa-search"></i></button>
                          </div>
                         <div id="divtest"></div>
                       </form>
                      </div>
                    </div>
                  </div>

          @foreach($employees as $employee)
            @if($employee->deployed == 0)
              @if($employee->status == 'waiting')
            @php
              $ctr2 = $ctr2+1;
            @endphp
                  <div class="col-md-4 col-sm-4 staff-container">
                    <div class="white-box">
                      <div class="row">
                        <div class="col-md-4 col-sm-4 text-center guard_details">
                           <div class="el-card-item">
                             <div class="el-card-avatar el-overlay-1">
                                <a href="artist-detail.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-circle img-responsive"></a>
                                <div class="el-overlay">
                                  <ul class="el-info">
                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="uploads/{{$employee->image}}"><i class="icon-magnifier"></i></a></li>
                                    <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$employee->id)}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                                          <!-- name of the guard to be fly to the sidebar -->
                            <span style="display: none" class="guard_name">{{ $employee->first_name }}, {{ $employee->last_name }}</span>
                            <span style="display: none" class="location">quezon</span>
                              <button type="button"  id='AddGuard'  class="btn AddGuard btn-block btn-outline btn-info add-guard shitshit" name=",#{{ $employee->id }}"><i class="icon-user-follow"></i> <!--</i>--> Add guard</button>

                              <span class="mytooltip tooltip-effect-5">
                                <button type="button" style='display:none' id='AddedGuard' class="btn AddedGuard btn-block btn-success disabled">
                                  <i class="fa fa-check"></i>
                                  <!--</i>-->  <span class="tooltip-item">added</span>
                                </button>
                                <span class="tooltip-content clearfix">
                                  <span class="tooltip-text">To remove this guard. Remove it to your list.</span>
                                </span>
                              </span>
                            </div>

                            <div class="col-md-8 col-sm-8">
                             <h3 class="box-title m-b-0">{{ $employee->first_name }} {{ $employee->middle_name }},{{ $employee->last_name }}</h3>
                              <small>College Graduate</small>
                              <div class="row m-t-10">
                                <div class="col-md-6 b-r">
                                  <p>{{ $employee->email }}</p>
                                </div>
                              </div>
                              <div class="row m-t-1">
                                <div class="col-md-6 b-r">
                                  <p>{{ $employee->street }},{{ $employee->barangay }}, {{ $employee->city }}</p>
                                </div>
                              </div>
                              <div class="row m-t-1">
                                <div class="col-md-6 b-r">
                                 <strong>Contact number</strong>
                                 <p>{{ $employee->cellphone }}</p>
                                </div>
                                <div class="col-md-6">
                                  <strong>Telephone</strong>
                                  <p>{{ $employee->telephone }}</p>
                               </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
              @endif
            @endif
          @endforeach
            <input type="hidden" name="exceeds" value="{{ $ctr2 }}">
        <!-- Add training, seminars, exams Modal -->
                <div id="Addtse" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Deployment details</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row  el-element-overlay">
                          <center><h5 class="box-title fw-500">List of guards</h5></center>
                          <center><h5>Guards deployed: 2</h5></center>
                          <br>
                            <form id="deploy" data-toggle="validator" method="POST" action="{{ url('/DeployGuards/Save') }}">
                            {!! csrf_field() !!}
                            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                              <thead>
                                <tr id="earl">
                                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                                  <th>Guard's name</th>
                                  <th  data-sort-ignore="true">Shifts</th>
                                  <th data-sort-ignore="true">Role</th>
                                </tr>
                              </thead>
                              <div class="form-inline padding-bottom-15">
                                <div class="row">
                                  <div class="col-sm-6"></div>
                                  <div class="col-sm-6 text-right m-b-20">
                                    <div class="form-group">
                                      <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"autocomplete="off">
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <tbody>
                                @foreach($employees as $employee)
                                  @if($employee->deployed == 0)

                                <tr id="{{ $employee->id }}">
                                  <td>
                                    <div class="el-card-item">
                                       <div class="el-card-avatar el-overlay-1">
                                          <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-circle img-responsive"></a>
                                          <div class="el-overlay">
                                            <ul class="el-info">
                                              <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$employee->id)}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                            </ul>
                                          </div>
                                       </div>
                                    </div>
                                    </td>
                                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                    <td>
                                      <select class="form-control shifts" name="shift{{$ctr}}" id="shift-{{$employee->id}}" >
                                        <option value="" disabled="" selected="">---</option>
                                       
                                      </select>
                                    </td>

                                    <td>
                                      <select class="form-control" name="role{{$ctr}}" id="role">
                                        <option value="" disabled="" selected="">---</option>
                                        @foreach($roles as $role)
                                          @if($role->status == "active")
                                            <option value="{{$role->name}},{{$employee->id}}">{{$role->name}}</option>
                                          @endif
                                        @endforeach
                                      </select>
                                    </td>
                                  </tr>
                                 @php
                                    $ctr = $ctr + 1;
                                  @endphp
                                  @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="4"></td>
                                  </tr>
                                </tfoot>
                              </table>


                             <input type="hidden" name="avGuards" value="{{ $ctr }}">
                             <input type="hidden" id="establishmentID" name="establishmentID" value="">
                             <input type="hidden" id="numGuards" name="numGuards" value="">
                             <input type="hidden" id="contractID" name="contractID" value="">
                             <input type="hidden" id="clientID" name="clientID" value="">
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect btnClose" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" >Deploy</button>
                              </div>
                            </form>
                            <div class="text-right">
                              <ul class="pagination">
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> <!-- /Add training, seminars, exam Modal -->
                 </div> <!-- class="row  el-element-overlay" -->
                </div> <!-- class="wizard-pane" role="tabpanel" -->
              </div> <!-- class="wizard-content" -->
            </form>
          </div> <!-- id="exampleValidator" class="wizard" -->
        </div>  <!-- class="white-box" -->
      </div>  <!-- class="col-lg-12" -->
     </div>   <!--  class="row" -->
    </div>  <!-- class="container-fluid" -->
  </div>    <!-- id="page-wrapper2" -->
</div>  <!-- /#wrapper -->

<!-- View Modal -->
<div id="modalview" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog viewrequest">
  	

  </div> <!-- /.modal-dialog -->
</div> <!-- /Add military service modal -->

<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>

<!-- Magnific popup JavaScript -->
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>

<!-- Form Wizard JavaScript -->
<script src="plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
<!-- FormValidation -->
<link rel="stylesheet" href="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css">
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
<script src="js/guardcart.js"></script>
<!-- Footable -->
<script src="plugins/bower_components/footable/js/footable.all.min.js"></script>
<script src="plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>

<!--FooTable init-->
<script src="js/footable-init.js"></script>

<script src="js/Alert/sweetalert.min.js"></script>
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
<script type="text/javascript">
        (function(){
            $('#exampleBasic').wizard({
                onFinish: function(){
                    alert('finish');
                }
            });
            $('#exampleBasic2').wizard({
                onFinish: function(){
                    alert('finish');
                }
            });
            $('#exampleValidator').wizard({
                onInit: function(){
                    $('#validation').formValidation({
                        framework: 'bootstrap',
                        fields: {
                            username: {
                                validators: {
                                    notEmpty: {
                                        message: 'The username is required'
                                    },
                                    stringLength: {
                                        min: 6,
                                        max: 30,
                                        message: 'The username must be more than 6 and less than 30 characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9_\.]+$/,
                                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                                    }
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
                    $('#validation').submit();
                    alert('finish');
                }
            });


        })();
</script>

<script type="text/javascript">
$('#deployguards').on('click',function(){
  
      contractID = $('#contractID').val();
       $.ajax({
        url:'{{route("select.shifts")}}',
        type:'GET',
        data : {contractID:contractID},
        success:function(data){
         // alert(data);
           $('.shifts').text('');
          $('.shifts').append(data);
          console.log(data);
        }
      });
     
});
  // the count of guards for alert info
   $('#deployguards').attr("disabled", "disabled");
        var limit=$("#guardsCount").text();
                        $(".sel").text( " Please select " + limit + " guards to deploy to the client.");

    //Scrollbar
        $('#slimtest4').slimScroll({
            color: '#00f',
            size: '10px',
            height: '400px',
            alwaysVisible: true
        });


</script>

<input type="hidden" name="hidden_delete" id="hidden_delete" value="AddGuardRequest-remove">
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.shifts').on('click',function(){
      //alert("Earl");
      // employeeID = this.id.split("-")[1];
      // contractID = $('#contractID').val();
      //  $.ajax({
      //   url:'{{route("select.shifts")}}',
      //   type:'GET',
      //   data : {contractID:contractID,employeeID:employeeID},
      //   success:function(data){
      //    // alert(data);
      //      $('select'+'#shift-'+employeeID).text('');
      //     $('select'+'#shift-'+employeeID).append(data);
      //     console.log(data);
      //   }
      // });
    });
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
                }).done(function(data) {
                swal({
                    title: "Removed",
                    text: "This item has been successfully removed",
                    type: "success"
                },function() {
                    location.reload();
                });
              }).error(function(data) {
       swal("Oops", "We couldn't connect to the server!", "error");
     });
      });


     
   }
  $(document).ready(function(){
    $('.btnView').on('click',function(){
    	//alert(this.value);
    	contractID = this.value;

    	$.ajax({
    		url : '{{route("manual.view")}}',
    		type : 'GET',
    		data : {contractID:contractID},
    		success : function(data){
    			console.log(data);
    			$('.viewrequest').text('');
    			$('.viewrequest').append(data);
    			$('#modalview').modal('show');
    		}
    	});
      
    });
    
    // $('.shifts').change(function(){
    //   value = this.value;
    //   //alert(value);
    //   //this.selected(value);
    //   $('.shifts').val(value).attr("selected", "selected");
    // });
  });
  
</script>



</body>
</html>
