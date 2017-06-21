@extends('AdminPortal.master2')

@section('Title') Additional Guard Requests @endsection


@section('mtitle') Additional Guard Requests  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/AddGuardRequests')}}">  Additional Guard Requests </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay">
        <h4><center><strong>List of Additional Guard request</strong></center></h4>
          <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th>
              <th >Client's Name</th>
              <th data-hide="phone, tablet" >Location</th>
              <th>Service Requested</th>
              <th >No. of Guards</th>
              <th>Status</th>
              <th>Date Requested</th>
              <th data-sort-ignore="true" width="240px">Actions</th>
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
          	@foreach($addGuardRequests as $addGuardRequest)
            	@if($addGuardRequest->status != 'deleted')
                @if($addGuardRequest->status == 'done')
                  <tr  style="background: gray; color: black;">
                  <td> </td>
                  <td>
                    @foreach($establishments as $establishment)
                          @if($addGuardRequest->establishments_id ==  $establishment->id)
                            @php
                              $dateRequested = $addGuardRequest->created_at;
                            @endphp
                            {{ $establishment->name  }}
                          @endif
                      @endforeach
                  </td>
                  <td>
                    @foreach($establishments as $establishment)
                          @if($addGuardRequest->establishments_id ==  $establishment->id)
                            @foreach($areas as $area)
                              @if($establishment->areas_id == $area->id)
                                @foreach($provinces as $province)
                                  @if($area->provinces_id == $province->id)
                                    {{ $area->name }}, {{ $province->name }}
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                          @endif
                       @endforeach
                  </td>
                  <td>
                    @foreach($services as $service)
                      @if($service->id == $addGuardRequest->guard_for)
                        {{ $service->name }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($establishments as $establishment)
                      @if($establishment->id == $addGuardRequest->establishments_id)
                        {{ $addGuardRequest->no_guards }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($establishments as $establishment)
                      @if($establishment->id == $addGuardRequest->establishments_id)
                        {{ $addGuardRequest->status }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    {{ $dateRequested }}
                  </td>
                  <td>
                    <button class="btn btn-info"  data-toggle="modal" data-target="#{!!$addGuardRequest -> id!!}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>
                      <button class="btn btn-danger" onclick="fun_delete('{!!$addGuardRequest -> id!!}')"><i class="fa fa-times"></i> Remove </button>
                  </td>
                </tr>
                @else
                  <tr>
                  <td></td>
                  <td>
                    @foreach($establishments as $establishment)
                          @if($addGuardRequest->establishments_id ==  $establishment->id)
                            @php
                              $dateRequested = $addGuardRequest->created_at;
                            @endphp
                            {{ $establishment->name  }}
                          @endif
                      @endforeach
                  </td>
                  <td>
                    @foreach($establishments as $establishment)
                          @if($addGuardRequest->establishments_id ==  $establishment->id)
                            @foreach($areas as $area)
                              @if($establishment->areas_id == $area->id)
                                @foreach($provinces as $province)
                                  @if($area->provinces_id == $province->id)
                                    {{ $area->name }}, {{ $province->name }}
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                          @endif
                       @endforeach
                  </td>
                  <td>
                    @foreach($services as $service)
                      @if($service->id == $addGuardRequest->guard_for)
                        {{ $service->name }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($establishments as $establishment)
                      @if($establishment->id == $addGuardRequest->establishments_id)
                        {{ $addGuardRequest->no_guards }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($establishments as $establishment)
                      @if($establishment->id == $addGuardRequest->establishments_id)
                        {{ $addGuardRequest->status }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    {{ $dateRequested }}
                  </td>
                  <td>
                    <button class="btn btn-info"  data-toggle="modal" data-target="#{!!$addGuardRequest -> id!!}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>
                      <button class="btn btn-danger" onclick="fun_delete('{!!$addGuardRequest -> id!!}')"><i class="fa fa-times"></i> Remove </button>
                  </td>
                </tr>
                @endif
            		
            		<!-- Deliver guns -->
    
		            <div id="{!!$addGuardRequest -> id!!}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		                <div class="modal-dialog">
		                  <div class="modal-content">
		                    <div class="modal-header">
		                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                      <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
		                    </div>
		                    <div class="modal-body">
		                      <form method="GET" action="{{ url('/DeployGuards') }}">
                          {!! csrf_field() !!}
                            <div class="form-group">
                              <div class="row">
                                <div class="form-group col-sm-4">
                                   <label class="control-label">Client's name</label>
                                      <p class="form-control-static">
                                           @foreach($establishments as $establishment)
                                             @if($addGuardRequest->establishments_id ==  $establishment->id)
                                                {{$establishment->name }}
                                                @php
                                                  $personInCharge = $establishment->person_in_charge;
                                                  $contactNo = $establishment->contactNo;
                                                  $email = $establishment->email;
                                                  $noGuards = $addGuardRequest->no_guards
                                                @endphp
                                             @endif
                                           @endforeach
                                      </p>
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                   <label class="control-label">Person In Charge</label>
                                      <p class="form-control-static">
                                           {{ $personInCharge }}
                                      </p>
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-8 ">
                                   <label class="control-label">Address</label>
                                      <p class="form-control-static">
                                       @foreach($establishments as $establishment)
                                          @if($addGuardRequest->establishments_id ==  $establishment->id)
                                            @foreach($areas as $area)
                                              @if($establishment->areas_id == $area->id)
                                                @foreach($provinces as $province)
                                                  @if($area->provinces_id == $province->id)
                                                    {{ $area->name }}, {{ $province->name }}
                                                  @endif
                                                @endforeach
                                              @endif
                                            @endforeach
                                          @endif
                                       @endforeach
                                      </p>
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                   <label class="control-label">Contact number</label>
                                       <p class="form-control-static">
                                         {{ $contactNo }}
                                       </p>
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                   <label class="control-label">Email address</label>
                                       <p class="form-control-static"> {{ $email }}</p>
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                   <label class="control-label">No. of Guards Requested</label>
                                      <center>
                                        <p class="form-control-static">
                                        {{ $noGuards }}
                                      </p>
                                      </center>
                                   <div class="help-block with-errors"></div>
                                </div> 
                                <input type="hidden" name="addGuardRequestID" value="{!!$addGuardRequest -> id!!}">
                              </div> <!-- row -->
                              <div class="help-block with-errors"></div>
                            </div> <!-- form-group -->
                            <div class="modal-footer">
                            @if($addGuardRequest->status == 'done')
                              <button disabled="true" type="submit" class="btn btn-info waves-effect waves-light">Process Request</button>
                            @else
                              <button type="submit" class="btn btn-info waves-effect waves-light">Process Request</button>
                            @endif
                              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            </div>
                          </form>
		                    </div>  <!-- /.modal-body -->
		                  </div>  <!-- /.modal-content -->
		                </div>  <!-- /modal dialog -->
		              </div>  <!-- /.Deliver Guns -->
		                
            	@endif
            @endforeach
          </tbody>
        <tfoot>
          <tr>
            <td colspan="8"></td>
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
@endsection
<input type="hidden" name="hidden_delete" id="hidden_delete" value="AddGuardRequest-remove">
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
  function func(){
    document. getElementsByClassName('.done').style.color = 'black';
    alert("shit");

  }
</script>


