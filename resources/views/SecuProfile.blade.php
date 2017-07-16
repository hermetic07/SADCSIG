<!DOCTYPE html>
<html>
  <head>

    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <!-- Bootstrap Core CSS -->
     <link href="{{URL::asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Footable CSS -->
     <link href="{{URL::asset('plugins/bower_components/footable/css/footable.core.css')}}" rel="stylesheet">
     <link href="{{URL::asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <!-- Menu CSS -->
     <link href="{{URL::asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
     <!-- animation CSS -->
     <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
   <!-- Wizard CSS -->
   <link href="{{URL::asset('plugins/bower_components/jquery-wizard-master/css/wizard.css')}}" rel="stylesheet">
     <!-- Custom CSS -->
     <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
     <!-- color CSS -->
     <link href="{{URL::asset('css/colors/MyThemeColor.css')}}" id="theme"  rel="stylesheet">
     <!--alerts CSS -->
     <link href="{{URL::asset('js/Alert/sweetalert.css')}}" rel="stylesheet" type="text/css">
     <!---switch -->
     <link href="{{URL::asset('plugins/bower_components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
   	<link rel="stylesheet" href="{{URL::asset('plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
   	  <!-- Date picker plugins css -->
   <link href="{{URL::asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- Daterange picker plugins css -->
   <link href="{{URL::asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
   <link href="{{URL::asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
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
   <style>
    #buttons {
      margin: auto;
    }
   </style>
  </head>
  <body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
    <!-- navbar-header -->
      <div class="navbar-header">
    <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="{{URL::asset('javascript:void(0)')}}" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>





     <!-- System logo-->
         <div class="top-left-part"><a class="logo" href="Dashboard.html"><b><img src="{{URL::asset('plugins/images/users/logoicon2.png')}}" height="60" alt="Systemlogo" /></b><span class="hidden-xs"><img src="{{URL::asset('plugins/images/users/logotext2.png')}}" height="40" alt="Systemname" /></span></a>
         </div>

     </div>
      <!-- /.navbar-header -->
    </nav>
    <!-- End Top Navigation -->

    <div class="row">
    <div class="white-box">
      <div class="row bg-title">
    <div class="row">
    <div class="col-md-4 col-xs-12">
    <div class="white-box">
    <div class="user-bg"> <img width="100%" alt="user" src="{{URL::asset('plugins/images/backgrounds/profilebg.png')}}">
      <div class="overlay-box">
          @if ($employee->image)
          <div class="user-content"> <a href="{{URL::asset('javascript:void(0)')}}"><img src="{{URL::asset('uploads/'.$employee->image)}}" class="thumb-lg img-circle" alt="img"></a>
          @else
          <div class="user-content"> <a href="{{URL::asset('javascript:void(0)')}}"><img src="{{URL::asset('default/secu.png')}}" class="thumb-lg img-circle" alt="img"></a>
          @endif
          <h4 class="text-white">{{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</h4>
          <h5 class="text-white">{{$employee->email}}</h5>
        </div>
      </div>
    </div>
    <div class="user-btm-box">
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-6 b-r"><strong>Client</strong>
                                <p>none</p>
                            </div>
                            <div class="col-md-6"><strong>Designation</strong>
                                <p>Security guard</p>
                            </div>
                        </div>
                        <!-- /.row -->
                        <hr>
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-6 b-r"><strong>Telephone</strong>
                                <p>{{$employee->telephone}}</p>
                            </div>
                            <div class="col-md-6"><strong>Phone</strong>
                                <p>{{$employee->cellphone}}</p>
                            </div>
                        </div>
                        <!-- /.row -->
                        <hr>
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-12"><strong>Address</strong>
                                <p>{{$employee->street}}, {{$employee->barangay}}
                                    <br/> {{$employee->city}}</p>
                            </div>
                        </div>
                        <hr>
                        <!-- /.row -->       <div class="row text-center m-t-10">
                <strong>Body attributes</strong>
    </div>
                          </br>

           <div class="table-responsive">
            <table class="table color-bordered-table inverse-bordered-table">
              <thead>
                <tr>
                  <th>Body attribute</th>
                  <th>Specification</th>
                  <th>Measurement</th>
                </tr>
              </thead>
                <tbody>
                  @foreach($attr as $a)
                  <tr>
                    <td>{{$a->attribute or 'none'}}</td>
                    <td>{{$a->size or 'none'}}</td>
                    <td>cm</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
    </div>

    </br>

        <div class="row text-center m-t-10">
                <strong>Location (address)</strong>
    </div>
    </br>
                         <div class="row el-element-overlay  m-b-40">
    <!-- /.usercard -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="white-box">
      <div class="el-card-item">
          <div class="el-card-avatar el-overlay-1">
                  @if ($employee->location_image)
              <img src="{{URL::asset('uploads/'.$employee->location_image)}}">
              @else
              <img src="{{URL::asset('default/location.png')}}">
              @endif
              <div class="el-overlay">
                  <ul class="el-info">
                      <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{URL::asset('plugins/images/Clients/establishments/location.png')}}"><i class="icon-magnifier"></i></a></li>
                  </ul>
              </div>
          </div>
      </div>
    </div>
    </div>

                    </div>

                    </div>
    </div>
    </div>

    <div class="col-md-8 col-xs-12">
    <div class="white-box">
               <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Degree obtained</strong>
                                    <br>
                                    @foreach($d as $d)
                                    <p class="text-muted">{{$d->degree}} </p>
                                    @endforeach
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Marital status</strong>
                                    <br>
                                    <p class="text-muted">{{$employee->marital_status}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Birthday</strong>
                                    <br>
                                    <p class="text-muted">{{$employee->birth}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Gender</strong>
                                    <br>
                                    <p class="text-muted">{{$employee->gender}}</p>
                                </div>
                            </div>

                            <h3 class="m-t-30">Education</h4>
                            <hr>
                               <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny" data-page-size="10">
      <thead>
        <tr>
    <th data-sort-ignore="true" >Level</th>
          <th  data-sort-ignore="true" > Name of school </th>
    <th  data-sort-ignore="true"> Attended from</th>
    <th  data-sort-ignore="true">to</th>

        </tr>
      </thead>
      <tbody>

        @foreach($ed as $ed)
        <tr>

          @if($count===1)
          <td><strong>Primary</strong></td>
          @endif
          @if($count===2)
          <td><strong>Secondary</strong></td>
          @endif
          @if($count===3)
          <td><strong>Tertiary</strong></td>
          @endif
          <td>{{$ed->school_name or 'none'}}</td>
          <td>{{$ed->year_start or 'none'}}</td>
          <td>{{$ed->year_end or 'none'}}</td>
        </tr>
        <div style="display: none;">
          {{$count+=1}}
        </div>
        @endforeach

      </tbody>
    </table>


        <h3 class="m-t-30">Training and exams taken</h4>
        <hr>
         <div class="table-responsive">
           <table class="table color-bordered-table inverse-bordered-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Ratings</th>
                  <th>Date taken</th>
                </tr>
              </thead>
              <tbody>
                @foreach($s as $s)
                <tr>
                  <td>{{$s->name or 'none'}}</td>
                  <td>{{$s->rating or 'none'}}</td>
                  <td>{{$s->date or 'none'}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <h3 class="m-t-30">Military service</h4>
          <hr>

           <div class="table-responsive">
            <table class="table color-bordered-table inverse-bordered-table">
              <thead>
                <tr>
                  <th>Military service</th>
                  <th>Rank</th>
                  <th>Serial number</th>
                  <th>Period of service From</th>
                  <th>To</th>
                </tr>
              </thead>
              <tbody>
                @foreach($m as $m)
                <tr>
                  <td>{{$m->military_services_id or 'none'}}</td>
                  <td>{{$m->ranks_id or 'none'}}</td>
                  <td>{{$m->serial_number or 'none'}}</td>
                  <td>{{$m->from or 'none'}}</td>
                  <td>{{$m->to or 'none'}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <h3 class="m-t-30">Skills</h4>
          <hr>
         <div class="table-responsive">
          <table class="table color-bordered-table inverse-bordered-table">
              <thead>
                <tr>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach($skill as $skill)
                <tr>
                  <td>{{$skill->name or 'none'}}</td>
                </tr>
                @endforeach()
              </tbody>
          </table>
          </div>

      </div>

    </div>
    </div>
    </div>



    </div>
    </div>

  </body>
</html>
