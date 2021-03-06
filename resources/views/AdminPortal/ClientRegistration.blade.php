
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
  <link href="js/Alert/swalExtend.css" rel="stylesheet" type="text/css">
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
     @include('includes.AdminTopNav')
    <!-- End Top Navigation -->

    <!-- Left navbar-header -->
      @include('includes.AdminNavBar')
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
              <h4><span><i class="fa fa-clock-o"></i></span>Guard's shift</h4>
            </li>
            <li role="tab">
              <h4><span><i class="ti-check"></i></span>Qualifications</h4>
            </li>
            <li role="tab">
              <h4><span><i class="ti-check"></i></span>Account</h4>
            </li>
          </ul>
              </br>
          <form id="validation" class="form-horizontal"  style="border: 2px solid black; border-radius:15px;" method="POST" action="/ClientRegistration-Save">
                    {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="wizard-content">
              <div class="wizard-pane active" role="tabpanel">

                    <div class="form-group">

                    <label class="col-xs-3 control-label">Client Code</label>
                    <div class="col-xs-3">
                        <input type="text" class="form-control name"  id="client_code" value="{{$clcode}}"  disabled/>

                    </div>
                    <label class="col-xs-1 control-label">Contract Code</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control name"  id="contract_code" value="{{$cncode}}" disabled/>
                    </div>

                </div>

                <div class="form-group">
                  <label class="col-xs-2 control-label">Client name</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control name "  id="client_fname" name="name" placeholder="First Name" />
                    </div>
                    <div class="col-xs-3">
                      <input type="text" class="form-control name"  id="client_mname" placeholder="Middle Name" />
                    </div>
                    <div class="col-xs-3">
                      <input type="text" class="form-control name"  id="client_lname" name="name" placeholder="last Name" />

                    </div>

                  </div>
                  <div class="form-group">
                    <label class="col-xs-2 control-label">Establishment name</label>
                      <div class="col-xs-6">
                          <input type="text" class="form-control name required" id="estab_name"  name="noblank">
                      </div>
                      <div class="col-xs-4">
                          <select class="form-control" name="nature" id="nature" >
                            <option>Select Nature of Business</option>
                            @foreach($natures as $nature)
                              <option value="{{ $nature->id }}">{{ $nature->name }}</option>
                            @endforeach
                         </select>
                      </div>
                  </div>



                <div class="form-group">
                  <label class="col-xs-1 control-label">Address</label>
                  <div class="col-xs-5">
                      <input type="text" class="form-control name" placeholder="Street Address" id="street_add"  name="noblank" />
                  </div>
                  <div class="col-xs-3">
                  <select class="form-control"   name="noblank" id="province">
                    <option value="" disabled="" selected="">Select Province</option>
                    @foreach($provinces as $province )
                      <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="col-xs-3">
                    <select class="form-control"   name="noblank" id="area">
                      <option value="" disabled="" selected="">Select Area</option>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label class="col-xs-2 control-label">Area Size (approx. in square meters)</label>
                  <div class="col-xs-4">
                    <input type="number" class="form-control name" id="area_size"  name="numonly" />
                  </div>
                <label class="col-xs-2 control-label">Population (approx.)</label>
                <div class="col-xs-4">
                    <input type="number" class="form-control" id="population" name="numonly" />
                </div>
              </div>



                              <div class="form-group">
                                <label class="col-xs-1 control-label">Telephone</label>
                                                    <div class="col-xs-3">
                                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                          <input type="text" class="form-control"  id="clientTelephone" maxlength="11" name="tele">
                                    </div>
                                    <span class="font-13 text-muted">ex. 1234567<span>
                                  </div>
                                <label class="col-xs-1 control-label">Cellphone</label>
                                                    <div class="col-xs-3">
                                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                        <input type="text" class="form-control"   id="clientCellphone" maxlength="11" name="cp">
                                    </div>
                                    <span class="font-13 text-muted">ex. 09123456789<span>
                                  </div>
                                    <label class="col-xs-1 control-label">Email address</label>
                                  <div class="col-xs-3">
                                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="ti-email"></i></div>
                                          <input type="text" class="form-control" name="email" id="clientEmail">
                                    </div>
                                    <span class="font-13 text-muted">ex. myemail@yahoo.com<span>
                                  </div>
                                              </div>

              <div class="form-group">
                <center> <h4> <strong>Person in charge Informations</strong></h4> </center>
              </div>
              <div class="form-group">

                  <div class="col-xs-4">
                      <input type="text" class="form-control name"  name="name"  id="firstName" placeholder="First Name" />
                  </div>
                  <div class="col-xs-4">
                      <input type="text" class="form-control name"  id="middleName" placeholder="Middle Name" />
                  </div>
                  <div class="col-xs-4">
                      <input type="text" class="form-control name" name="name"  id="lastName" placeholder="Last Name" />
                  </div>

              </div>
              <div class="form-group">
                <div class="col-xs-2">

                </div>
                <div class="col-xs-4">
                    <input type="text" class="form-control" id="pic_no" placeholder="Contact Number" maxlength="11" name="cp" />
                </div>
                <div class="col-xs-4">
                    <input type="email" class="form-control" id="pic_email"   name="email" placeholder="Email Address" />
                </div>
              </div>
              <hr>




              </div>
              <div class="wizard-pane" role="tabpanel">
                <div class="form-group">
                      <div class="form-group">
                        <label class="col-xs-2 control-label">Type of Service</label>
                        <div class="col-md-4">
                          <select class="form-control"  name="service" id="service" onchange="getRate(this.value)" required >
                            <option value="" disabled="" selected="">Select Type of Service</option>
                            @foreach($services as $s )
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <label class="col-xs-2 control-label">Operating hours</label>
                         <div class="col-xs-4">
                         <input id="tch1" type="text" value=""  data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" name="operating_hrs" required >
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="col-xs-1 control-label">Span (months) </label>
                      <div class="col-xs-3">
                        <input id="tch3" type="text" name="span_mo" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required >
                      </div>
                      <label class="col-xs-1 control-label">Starts from </label>
                       <div class="col-xs-3">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calender"></i>   </span> <input type="text" class="form-control firstcal" id="firstcal" placeholder="mm/dd/yyyy"  readonly  />
                          </div>
                        </div>
                        <label class="col-xs-1 control-label"> Ends to </label>
                        <div class="col-xs-3">
                           <div class="input-group">
                             <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control secondcal" id="secondcal" placeholder="yyyy/mm/dd"  disabled >
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
                           <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control excom" placeholder="mm/dd/yyyy" id="exp_date" readonly />
                         </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-2 control-label">Monthly CP</label>
                       <div class="col-xs-4">
                         <div class="input-group">
                         <span class="input-group-addon">₱</span> <input id="mcp" type="number" class="form-control" min="0.01" step="0.01" value="1000.00"  name="noblank"/>

                      </div>
                         <span class="font-13 text-muted">per guard<span>
                             </div>
                      <label class="col-xs-2 control-label">Total payment</label>
                       <div class="col-xs-4">
     <div class="input-group">
                         <span class="input-group-addon">₱</span> <input id="tp" type="number" class="form-control" min="0.01" step="0.01"  name="noblank" />
                      </div>
                      <span class="font-13 text-muted">per month<span>
                      </div>




                      <br>
                      <br><br>
                      <br>
                      <b><hr width="100%" style="background-color: black"></b>

                      <center><h3>Guns</h3></center><br>
                      <div class="col-md-12 form-group" style="border: 5px">
                        <label class="col-xs-2 control-label">Gun Type</label>
                          <div class="col-xs-4">
                          <select class="form-control"  name="noblank" onchange="get_gun_list(this.value)">
                            <option disabled> ~~ Choose Gun Type ~~</option>
                            @foreach($gunTypes as $gunType)
                              <option value="{{$gunType->id}}">{{$gunType->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <label class="col-xs-2 control-label">Guns</label>
                          <div class="col-xs-4">
                          <ul>
                            <div class="form-group gun-list">
                              <!-- <li><label for="gun">Gun 1</label> <input type="checkbox" onclick="get_guns('gun1,Gun Type 1')" name="gun" value="Gun 1,Gun Type 1"></li>  -->
                            </div>
                          </ul>
                        </div>
                        <br>
                        <br>

                        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                            <thead>
                              <tr>
                                <th>Gun Name</th>
                                <th>Gun Type</th>
                                <th>Quantity</th>
                                <th>Action</th>

                              </tr>
                            </thead>

                            <tbody id="gun-table-body">
                              <!-- <tr id="gun2">
                                <td>
                                  Gun 2
                                </td>
                                <td>
                                  Gun Type 2
                                </td>
                                <td>
                                  <input type="text" name="gunquantity">
                                </td>
                                <td>
                                  <button type="button" class="btn btn-danger"><i class="fa fa-times" onclick="func_remove('gun2')"></i></button>
                                </td>
                              </tr> -->
                            </tbody>
                           </table>
                      </div>
                      <!-- <button class="btn btn-info" onclick="func_test()">Click Me</button> -->



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
                  <th data-sort-ignore="true"  width="150px"> </th>
                  <th data-sort-ignore="true" class="min-width" width="50px">Delete</th>
                </tr>
              </thead>
              <div class="form-inline padding-bottom-15">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <button id="demo-btn-addrow" class="btn btn-outline btn-info btn-sm"><i class="icon wb-plus" aria-hidden="true"></i>Add Shift</button>
                      <small>New row will be added at the bottom.</small> </div>
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
        <div class="input-group" data-placement="left" data-align="top" data-autoclose="true">
          <input type="time" class="form-control shiftstart" name="noblank" /><span class="input-group-addon"  >
            <span class="glyphicon glyphicon-time"></span></span></div>

          </td>
                  <td>
            <div class="input-group" data-placement="left" data-align="top" data-autoclose="true">
              <input type="time" class="form-control shiftend" name="noblank2"/><span class="input-group-addon"  >
                <span class="glyphicon glyphicon-time"></span></span></div>
          </td>
           <td>
                    <div class="checkbox checkbox-inverse checkbox-circle">
                  <input class="shft" type="checkbox" >
                  <label > Night shift</label>
                </div>

          </td>
          <td>
          </td>


          </tr>

          </tbody>
        </table>
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
                      <div class="col-xs-2">
                         <input type="number" class="form-control" id="pref_age" name="noblank" placeholder="from">
                    </div> -
                       <div class="col-xs-2">
                         <input type="number" class="form-control" id="pref_ageto" name="noblank"  placeholder="to">
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
            <div class="col-xs-3"></div>
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

            </div>

            <div class="form-group">
    <div class="col-xs-3"></div>
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
         <div class="wizard-pane" role="tabpanel">
          <div class="form-group">

            <label for="password" class="col-md-4 control-label">Password</label>
            <div class="col-md-4">
              <input type="text" name="password" id="password" class="form-control">
            </div>
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
                                   <input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" >
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

<script src="js/Alert/swalExtend.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Form Wizard JavaScript -->
<script src="plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
<!-- FormValidation -->
<link rel="stylesheet" href="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css">
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

  function get_gun_list(guntypeID){
    //alert(guntypeID);
    $.ajax({
      url : '/showGunList',
      type : 'GET',
      data : {guntypeID:guntypeID},
      success : function(data){
        //console.log(data);
        $('.gun-list').html('');
        $('.gun-list').append(data);
      }
    });
  }
  function get_guns(id){
    //$(this).attr("disabled", "disabled");
    //alert(id.split(",")[0]);
    if($(this).is(':checked') == false){
      //alert("Checkbox is checked." )
      $('#gun-table-body').append('<tr id="'+id.split(",")[0]+'"><td>'+id.split(",")[1]+'</td><td>'+id.split(",")[2]+'</td><td><input type="text" class="gunQty" id="gun-'+id.split(",")[0]+'"></td><td><button type="button" class="btn btn-danger" onclick="func_remove(\''+id.split(",")[0]+'\')"><i class="fa fa-times"></i></button></td></tr>')
    }else if($(this).prop('checked', true)){
     // alert("Checkbox is unchecked." )
    }else{
      //alert("knhgbhujk is checked." )
    }
  }
  function func_remove(id){
     //alert('#'+id);
    // console.log(id);
    $('#'+id).remove();
  }
  function func_test(){
    $gunIDs = [];
    $qtys = [];
    $.each($(".gunQty"), function(){
        //alert(this.value);
        $gunIDs.push(this.id.split('-')[1]);
        $qtys.push(this.value);
    });
    $.ajax({
      url : '/testRoute',
      type : 'GET',
      data : {gunIDs: $gunIDs,qtys:$qtys},
      success : function(data){
        if(data == 1){
          alert("success");
        }
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
    var newRow = '<tr><td class="count"></td><<td><div class="input-group" data-placement="left" data-align="top" data-autoclose="true"><input type="time" class="form-control shiftstart" name="noblank"><span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span></span></div></td><td><div class="input-group" data-placement="left" data-align="top" data-autoclose="true"><input type="time" class="form-control shiftend" name="noblank2" ><span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span></span></div></td><td><div class="checkbox checkbox-inverse checkbox-circle"><input class="shft" type="checkbox" ><label>Night shift</label></div></td><td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td></tr>';


    //add it
    footable.appendRow(newRow);
  });
 </script>
 <script>
$("#nature").change(function(){
   $.ajaxSetup({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   }); 
   $.ajax({
     type: 'post',
     url: '/GetNatureValue',
     data: {
         id:$('#nature').val(),
     },
     success: function(data){
         //alert(data);
         $('#mcp').val(data);
     }
   });
 });

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
                          noblank2: {
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
                              tele: {
                              validators: {
                                  notEmpty: {
                                      message: 'This field  is required'
                                  },
     regexp: {
            regexp: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]*\.[0-9]*[1-9][0-9]*)$/,
            message: 'Invalid contact number'
        }


                              }
                          },
                                                        cp: {
                              validators: {
                                  notEmpty: {
                                      message: 'This field  is required'
                                  },
     regexp: {
            regexp: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]*\.[0-9]*[1-9][0-9]*)$/,
            message: 'Invalid contact number'
        }


                              }
                          },
                                 bday: {
                                validators: {
                                    notEmpty: {
                                        message: 'This field  is required'
                                    },

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
                  $gunIDs = [];
                  $qtys = [];
                  $.each($(".gunQty"), function(){
                      //alert(this.value);
                      $gunIDs.push(this.id.split('-')[1]);
                      $qtys.push(this.value);
                  });
                  $.ajax({
                    type: 'post',
                    url: '/ClientRegistration-Save',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        client_fname:$('#client_fname').val(),
                        client_mname:$('#client_mname').val(),
                        client_lname:$('#client_lname').val(),
                        client_code:$('#client_code').val(),
                        client_email:$('#clientEmail').val(),
                        client_telephone:$('#clientTelephone').val(),
                        client_cellphone:$('#clientCellphone').val(),
                        contract_code:$('#contract_code').val(),
                        estab_name:$('#estab_name').val(),
                        nature:$('#nature').val(),
                        street_add:$('#street_add').val(),
                        area:$('#area').val(),
                        province:$('#province').val(),
                        area_size:$('#area_size').val(),
                        population:$('#population').val(),
                        firstName:$('#firstName').val(),
                        middleName:$('#middleName').val(),
                        lastName:$('#lastName').val(),
                        pic_no:$('#pic_no').val(),
                        pic_email:$('#pic_email').val(),
                        service:$('#service').val(),
                        no_guards:$('#tch4').val(),
                        span_mo:$('#tch3').val(),
                        from:$('#firstcal').val(),
                        to:$('#secondcal').val(),
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
                        exp_date:$('#exp_date').val(),
                        operating_hrs:$('input[name=operating_hrs]').val(),
                        mcp:$('#mcp').val(),
                        tp:$('#tp').val(),
                        gunIDs: $gunIDs,
                        qtys:$qtys
                    },
                    success: function(data){
                      if(data==="Success")
                      {
                        alert("Registration Success Will now proceed to uploading of your pictures ");
                        window.location.href = "/UploadPics";
                       // swal("Registration Success!", "Will now proceed to uploading of your pictures.", "success");
                      //   swal({
                      //           title: 'Registration Success!',
                      //           text: "Will now proceed to uploading of your pictures.",
                      //           type: 'success',
                                
                      //           confirmButtonColor: '#3085d6',
                                
                      //           confirmButtonText: 'Ok'
                      //         },function(){
                      //           window.location.href = "/UploadPics";
                      //         });

                       }
                      else {
                        alert(data);
                      }
                    }
                  });

                }
            });


        });
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


        </script>
</body>
</html>
