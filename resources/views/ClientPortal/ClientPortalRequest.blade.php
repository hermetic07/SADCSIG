@extends('ClientPortal.master3')
@section('Title') Requests @endsection
@section('clientName')
   {{  $establishment->person_in_charge }}
@endsection
@section('mtitle') Requests @endsection


@section('content')
<form class="form-horizontal" method="GET" action="{{ url('/Request-sent') }}">
  <input type="hidden" name="establishments_id" value="{{ $establishment->id }}">
  <button type="submit" class="btn btn-info pull-right">View Sent Request</button>
</form>
	 <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      
      <!-- /.row -->

		  <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for a new service</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Got a new establishment? And want us to serve you? We would like to! Request a service on us and let's talk about it!</p>

                <label class="col-xs-6 control-label"></label>	<button class="btn btn-info m-t-10" data-toggle="modal" data-target="#Service"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</button>

              </div>
            </div>
          </div>
        </div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for additional guns</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Request for a additional guns and the agency will process it and when it will be legallize, the agency will process it for you.</p>

                <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" data-toggle="modal" data-target="#reqGuns"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for additional guards</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Request for a additional guns and the agency will process it and when it will be legallize, the agency will process it for you.</p>

                <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" data-toggle="modal" data-target="#reqAddGuards" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for guard replacement</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>You don't like the guard that deployed to you? or for other reason? Request for a replacement of that guard and the agency will process it right away.</p>

                <label class="col-xs-6 control-label"></label>  <a class="btn btn-info m-t-10" data-toggle="modal" data-target="#guardReplacement" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
      <footer class="footer text-center"> 2017 </footer>
    </div>    <!-- /#page-wrapper -->
  </div>    <!-- /#wrapper -->

<!-- Deliver guns -->
  <div id="reqGuns" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up the following</strong></center></h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator" method="POST" action="{{ url('/GunRequest-Save',$establishment->id) }}">
            <div class="form-group">
              <div class="row">
                {!! csrf_field() !!}
                  <div class="form-group">
                    <div class="row">
                      <div class="form-group col-sm-8">
                        <label class="control-label">Gun Name</label>
                         <select class="form-control"  name="gun">
                          <option value="" disabled="" selected="">---</option>
                          @foreach($guns as $gun )
                          <option>{{$gun->name}}</option>
                          @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group col-sm-4">
                        <label class="control-label col-md-12">Quantity</label>
                        <div class="col-md-12">
                          <input type="number" class="form-control"  id="rate" name="quantity" min="1"  step="0.01"  required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="form-group col-sm-8">
                        <label class="control-label">Service Requested</label>
                         <select class="form-control"  name="service_requested">
                          <option value="" disabled="" selected="">---</option>

                          <!-- TAKE NOTE !!!!!  Dapat sa contract table manggagaling ung data neto hindi sa service_requests table -->

                          @foreach($serviceRequests as $serviceRequest )
                            @if($serviceRequest->establishments_id == $establishment->id)
                              @foreach($services as $service)
                                @if($service->id == $serviceRequest->services_id)
                                  <option value="{{ $service->id }}">{{$service->name}}</option>
                                @endif
                              @endforeach
                            @endif
                          @endforeach
                          
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>

                   </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Deliver guns -->

  <!-- Request Service -->
  <div id="Service" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up the following</strong></center></h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator" method="POST" action="{{ url('/Request-Save',$establishment->id) }}">
              {!! csrf_field() !!}
            <div class="form-group">
               <div class="row">
                 <div class="form-group col-sm-12">
                      <label class="control-label">Service</label>
                       <select class="form-control"  name="service">
                        <option value="" disabled="" selected="">---</option>
                        @foreach($services as $s )
                        <option>{{$s->name}}</option>
                        @endforeach
                      </select>
                      <div class="help-block with-errors"></div>
                  </div>

                 <div class="form-group col-sm-6">
                  <label class="control-label">Meeting place</label>
                    <input type="text" class="form-control" id="Nature_Name" name="meeting" pattern="[.,--&\\'a-zA-Z0-9\s]+" value="" required>
                    <div class="help-block with-errors"></div>
                </div>

                 <div class="form-group col-sm-6">
                  <label class="control-label">Meeting schedule</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="meetSched">
                    </div>
                    <div class="help-block with-errors"></div>
                 </div>
                 <div class="form-group col-sm-12 ">
                    <label class="control-label">Description of service:</label>
                    <textarea class="form-control" rows="5" required name="servDesc"></textarea>
                    <div class="help-block with-errors"></div>
                 </div>
              </div>
              <div class="help-block with-errors"></div>
            </div>
            
            <div class="modal-footer">
              <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>      <!-- modal-body -->
        </div>        <!-- /.modal-content -->
      </div>          <!-- /.modal-dialog -->
    </div>          <!-- /request service modal -->

    <!-- Additional Guards -->
  <div id="reqAddGuards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up the following</strong></center></h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator" method="POST" action="{{ url('/AddGuardRequests-Save',$establishment->id) }}">
            <div class="form-group">
              <div class="row">
                {!! csrf_field() !!}
                  <div class="form-group">
                    <div class="row">

                      <div class="form-group col-sm-4">
                        <label class="control-label col-md-12">Number of Guards</label>
                        <div class="col-md-12">
                          <input type="number" class="form-control"  id="no_guards" name="no_guards" min="1"  step="0.01"  required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="form-group col-sm-8">
                        <label class="control-label">Service Requested</label>
                         <select class="form-control"  name="service_requested">
                          <option value="" disabled="" selected="">---</option>

                          <!-- TAKE NOTE !!!!!  Dapat sa contract table manggagaling ung data neto hindi sa service_requests table -->

                          @foreach($serviceRequests as $serviceRequest )
                            @if($serviceRequest->establishments_id == $establishment->id)
                              @foreach($services as $service)
                                @if($service->id == $serviceRequest->services_id)
                                  <option value="{{ $service->id }}">{{$service->name}}</option>
                                @endif
                              @endforeach
                            @endif
                          @endforeach
                          
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                   </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Additional Guards -->

 <!-- Guard Replacement -->
  <div id="guardReplacement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Choose Guards to Replace</strong></center></h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator" >
            {!! csrf_field() !!}
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr id="earl">
                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                  <th width="300px">Guard's Info</th>
                  
                  <th  data-sort-ignore="true">Reasons</th>  
                  <th data-sort-ignore="true">Action</th>
                </tr>
                <tbody>
                  @php
                    $ctr = 0;
                  @endphp
                    @foreach($deploymentDetails as $deploymentDetail)
                      @foreach($deployments as $deployment)
                        @if($deploymentDetail->deployments_id == $deployment->id)
                          @foreach($serviceRequests as $serviceRequest)
                            @if($deployment->service_requests_id == $serviceRequest->id)
                              @if($serviceRequest->establishments_id == $establishment->id)
                                @if($deploymentDetail->status == 'active')
                                @php
                                  $ctr = $ctr+1;
                                @endphp
                                <tr>
                                  <td>
                                    <div class="el-card-item">
                                      <div class="el-card-avatar el-overlay-1">
                                        <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                                        <div class="el-overlay">
                                          <ul class="el-info">
                                              <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                                        </div>
                                      </div>
                                   </div>
                                  </td>
                                  <td>
                                  @php
                                    $empFirstName;
                                    $empLastName;
                                  @endphp
                                    @foreach($employees as $employee)
                                      @if($employee->id == $deploymentDetail->employees_id)
                                        {{ $employee->first_name }}  {{ $employee->last_name }}
                                        @php
                                          $empFirstName = $employee->first_name;
                                          $empLastName = $employee->last_name;
                                        @endphp
                                      @endif
                                    @endforeach <br> <b>Shift: </b>
                                    From: {{ $deploymentDetail->shift_from }}  To: {{ $deploymentDetail->shift_to }}
                                    <br> <b>Role: </b>
                                      {{ $deploymentDetail->role }}
                                  </td>
                                  
                                  <td>
                                    <textarea id="{{ $ctr }}" name="text{{ $ctr }}" class="form-control" rows="3" placeholder="Reasons for replacing {{ $empFirstName }}  {{ $empLastName }}"></textarea>
                                  </td>
                                  <td>
                                    <input class="selectGuard" type="checkbox" name="{{ $ctr }}" value="{{ $deploymentDetail->employees_id }}">
                                  </td>
                                </tr>
                                @endif
                              @endif
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endforeach
                </tbody>
              </thead>
            </table>
            <input type="hidden" name="numGuards" value="{{ $ctr}}">
            <div class="modal-footer">
              <button type="button" id="edd" data-target="#replaceGuards" data-toggle="modal" data-dismiss="modal" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Guard Replacement-->

  <div id="replaceGuards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: firebrick;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong style="color: white;">Are you sure you really want to replace these Guards??</strong></center></h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator" >
            {!! csrf_field() !!}
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr id="earl">
                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                  <th>Guard's Name</th>
                  <th>Action</th>
                  
                </tr>
                <tbody>
                 @php
                    $ctr = 0;
                  @endphp
                    @foreach($deploymentDetails as $deploymentDetail)
                      @foreach($deployments as $deployment)
                        @if($deploymentDetail->deployments_id == $deployment->id)
                          @foreach($serviceRequests as $serviceRequest)
                            @if($deployment->service_requests_id == $serviceRequest->id)
                              @if($serviceRequest->establishments_id == $establishment->id)
                                @if($deploymentDetail->status == 'active')
                                @php
                                  $ctr = $ctr+1;
                                @endphp
                                <tr>
                                  <td>
                                    <div class="el-card-item">
                                      <div class="el-card-avatar el-overlay-1">
                                        <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                                        <div class="el-overlay">
                                          <ul class="el-info">
                                              <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                                        </div>
                                      </div>
                                   </div>
                                  </td>
                                  <td>
                                  
                                    @foreach($employees as $employee)
                                      @if($employee->id == $deploymentDetail->employees_id)
                                        {{ $employee->first_name }}  {{ $employee->last_name }}
                                        
                                      @endif
                                    @endforeach <br> <b>Shift: </b>
                                    
                                  </td>
                                  
                                  
                                  <td>
                                    <button type="button" class="btn btn-info waves-effect waves-light" >Don't Replace</button>
                                  </td>
                                </tr>
                                @endif
                              @endif
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endforeach
                </tbody>
              </thead>
            </table>
            <input type="hidden" name="numGuards" value="{{ $ctr}}">
            <div class="modal-footer">
              <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Guard Replacement-->
  <script type="text/javascript">
    $(document).ready(function(){
      $(".selectGuard").click(function(){
        //$("#"+this.name).enable();
        alert(this.name);
      });
    });
  </script>
@endsection
@section('script')
@endsection
