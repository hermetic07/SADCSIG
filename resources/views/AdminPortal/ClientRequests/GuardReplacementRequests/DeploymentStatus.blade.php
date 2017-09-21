@extends('AdminPortal.master2')

@section('Title') Deployment status @endsection


@section('mtitle') Deployment status @endsection

@section('mtitle2') <li>Clients</li>
                        <li class="active"><a href="{{url('/PendingDeployment')}}"> Pending request</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">


    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="white-box">




<div id="image-popups" class="row"
            <h4>{{$establishment->name}}</h4>
            <h5><span class="text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>{{$completeAdd}}</span></h5>

<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Client's approval</div>

<form method="GET" action="{{ url('/AddGuard-ChangeGuards') }}">
  <div class="panel-wrapper p-b-10 collapse in">
    <div class="row  el-element-overlay">
<div id="client" class="owl-carousel owl-theme ">
@php
  $rejectCtr = 0;
  $acceptedCtr = 0;
  $changedCtr = 0;
  $changeID = "";
  $rejectID = "";
  $accepted = "";
  $totalGuardsDeployed = 0;
  $shiftTo = "";
  $shiftFrom = "";
  $role = "";
  $refuseCtr = 0;
  $refuseID = "";

@endphp
@foreach($tempDeployments as $tempDeployment)
  @if($tempDeployment->contract_ID == $requestID)
  @foreach($clientDeploymentNotifs as $clientDeploymentNotif)
    @if($clientDeploymentNotif->notif_id == $tempDeployment->messages_ID)
      @foreach($notif_response as $response)
        @if($response->client_deployment_notif_id == $clientDeploymentNotif->client_deloyment_notif_id)
          @foreach($employees as $employee)
            @if($employee->id == $response->guard_id)
              @php
                $totalGuardsDeployed++;
              @endphp
              @if($response->status == "accepted")

                <div class="el-card-item item avatar">
                <span class="accepted-badge">&#10004;</span>
                  <div class="el-card-avatar el-overlay-1 ">
                    <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-responsive"></a>
                      <div class="el-overlay">
                        <ul class="el-info">
                          <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          <li>
                            {{$employee->first_name}}
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>

                @php
                  $accepted = $accepted.",.".$employee->id;
                  $acceptedCtr++;
                @endphp
              @elseif($response->status == "changed")
                @php
                  $changedCtr++;
                  $changeID = $changeID.",.".$employee->id;
                @endphp
              @elseif($response->status == "rejected")
                <div class="el-card-item item avatar">
                    <span class="rejected-badge">&#10006;</span>
                      <div class="el-card-avatar el-overlay-1 ">
                        <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-responsive"></a>
                          <div class="el-overlay">
                            <ul class="el-info">
                              <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                              <li>
                            {{$employee->first_name}}
                          </li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      @php
                        $rejectCtr++;
                        $rejectID = $rejectID.",.".$employee->id;
                      @endphp
              @endif
            @endif
          @endforeach
        @endif
      @endforeach
    @endif
  @endforeach
  @endif
@endforeach

</div>
</div>
<input type="hidden" name="rejectedIDs" value="{{$rejectID}}">
<input type="hidden" name="accepted" value="{{$accepted}}">
<input type="hidden" name="rejectedCtr" value="{{$rejectCtr}}">
<input type="hidden" name="contractID" value="{{$requestID}}">
<input type="hidden" name="clientID" value="{{$client->id}}">

<label class="col-xs-3"></label>        <div class="col-xs-6"> <button type="submit" id="rejected" class="btn btn-block btn-outline btn-rounded btn-danger">Change {{$rejectCtr}} rejected guards</button> </div>
</div>
</form>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Security guard's approval</div>
<form method="GET" action="{{ url('/AddGuard-ChangeGuards') }}">
<div class="panel-wrapper p-b-10 collapse in">
    <div class="row  el-element-overlay">
<div id="secus" class="owl-carousel owl-theme ">

@foreach($tempDeployments as $tempDeployment)
  @if($tempDeployment->contract_ID == $requestID)
  @foreach($clientDeploymentNotifs as $clientDeploymentNotif)
    @if($clientDeploymentNotif->notif_id == $tempDeployment->messages_ID)
      @foreach($acceptedGuards as $acceptedGuard)
        @if($acceptedGuard->client_deployment_notif_id == $clientDeploymentNotif->client_deloyment_notif_id)
          @foreach($employees as $employee)
            @if($employee->id == $acceptedGuard->guard_id)
              @if($acceptedGuard->guard_reponse == "")
                <div class="el-card-item item avatar">
                <span class="rejected-badge"><i class="fa fa-spin fa-circle-o-notch"></i></span>
                  <div class="el-card-avatar el-overlay-1 ">
                    <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-responsive"></a>
                      <div class="el-overlay">
                        <ul class="el-info">
                          <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          <li>
                            {{$employee->first_name}}
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div>
                  </div>
                </div>
              @elseif($acceptedGuard->guard_reponse == "changed")
                @php
                  $changeID = $changeID.",.".$employee->id;
                @endphp
               @elseif($acceptedGuard->guard_reponse == "reject")
               <div class="el-card-item item avatar">
                <span class="rejected-badge">&#10006;</span>
                  <div class="el-card-avatar el-overlay-1 ">
                    <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-responsive"></a>
                      <div class="el-overlay">
                        <ul class="el-info">
                          <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          <li>
                            {{$employee->first_name}}
                          </li>
                        </ul>
                      </div>
                    </div>
            <button type="button" value="{{$acceptedGuard->client_deployment_notif_id}},{{$acceptedGuard->guard_id}}" class="btn btn-block btn-outline btn-rounded btn-danger reason">Reason</button>
                </div>
               @php
                $refuseCtr++;
                $refuseID = $refuseID.",.".$employee->id;
               @endphp
              @elseif($acceptedGuard->guard_reponse == "confirmed")
                <div class="el-card-item item avatar">
                  <span class="accepted-badge">&#10004;</span>
                    <div class="el-card-avatar el-overlay-1 ">
                      <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-responsive"></a>
                        <div class="el-overlay">
                          <ul class="el-info">
                            <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                            <li>
                            {{$employee->first_name}}
                          </li>
                          </ul>
                        </div>
                      </div>
                      <div>
                    <button type="button" class="btn btn-block btn-outline btn-rounded btn-success" id="deploy" value="{{$employee->id}}">Deploy</button>
                  </div>
                </div>
                @foreach($tempDeploymentDetails as $tempDeploymentDetail)
                  @if($tempDeploymentDetail->employees_id == $employee->id)
                    @php
                      $shiftTo =  $tempDeploymentDetail->shift_to;
                      $shiftFrom = $tempDeploymentDetail->shift_from;
                      $role = $tempDeploymentDetail->role;
                    @endphp
                  @endif
                @endforeach
              @endif
            @endif
          @endforeach
        @endif
      @endforeach
    @endif
  @endforeach
  @endif
@endforeach

            </div>
          </div>
          <input type="hidden" name="rejectedIDs" value="{{$rejectID}}">
          <input type="hidden" name="accepted" value="{{$accepted}}">
          <input type="hidden" name="rejectedCtr" value="{{$rejectCtr}}">
          <input type="hidden" name="contractID" value="{{$requestID}}">
          <input type="hidden" name="clientID" value="{{$client->id}}">
          <input type="hidden" name="changeID" value="{{$changeID}}">
          <input type="hidden" name="refuseID" value="{{$refuseID}}">
          <input type="hidden" name="refuseCtr" id="refuseCtr" value="{{$refuseCtr}}">
        </div>
      </div>
      <label class="col-xs-3"></label>
      <div class="col-xs-6">
        <button id="refuse" type="submit" class="btn btn-block btn-outline btn-rounded btn-danger">Change {{$refuseCtr}} rejected guards</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
</div></div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="white-box">
<div class="pd-agent-info text-center">
<a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="uploads/{{$client->image}}"></a>
<h4>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</h4>
<h6>Client's name</h6> </div>

<hr class="m-0">
<div class="pd-agent-contact text-center"> <i class="fa fa-phone text-danger" aria-hidden="true"></i> {{$client->contactNo}}
<br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> {{$client->email}}
</br>   </br></div>
<h5 class="box-title fw-500">Essential Information</h5>
<hr class="m-0">
<div class="table-responsive pro-rd p-t-10">
<table class="table">
    <tbody class="text-dark">
        <tr>
            <td>No. of guards needed</td>
            <td>{{$guardReplacementRequests->no_guards}}</td>
        </tr>
<tr>
            <td>Status (Accepted/rejected)</td>
            <td>{{$acceptedCtr}}/{{$changedCtr}} out of {{$totalGuardsDeployed}}</td>
        </tr>
        <tr>
            <td>Expected complete date</td>
            <td>July 11,2017</td>
        </tr>
<tr>
            <td>Nature of business</td>
            <td>{{$natures->name}}</td>
        </tr>

    </tbody>
</table>
</div>
<button type="button" class="btn btn-block  btn-info" ><i class="fa fa-edit"></i> </i><a href="/ClientsDetails-{{$client->id}}+{{$establishment->id}}">More info</a></button>
</div>

</div>

<input type="hidden" id="rejectedCtr" value="{{$rejectCtr}}">
<input type="hidden" id="addGuardID" value="{{$requestID}}">
<input type="hidden" id="clientID" value="{{$client->id}}">
<input type="hidden" id="estabID" value="{{$establishment->id}}">
<input type="hidden" id="shifts" value="{{$shiftTo}},{{$shiftFrom}}">
<input type="hidden" id="role" value="{{$role}}">



  @endsection
  @section('script')
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      rejectIDs =  [];
      rejectIDs = $('#rejectedIDs').val();

      $(document).ready(function(){
        if($('#rejectedCtr').val() == 0){
          $('#rejected').prop('disabled', true);
        }
        if($('#refuseCtr').val() == 0){
          $('#refuse').prop('disabled', true);
        }
        $('#deploy').on('click',function(){
          clientID = $('#clientID').val();
          estabID = $('#estabID').val();
          requestID = $('#addGuardID').val();
          num_guards = 1;
          shiftFrom = $('#shifts').val().split(",")[0];
          shiftTo = $('#shifts').val().split(",")[1];
          role = $('#role').val();
          employeeID = this.value;
          alert(requestID);

          $.ajax({
            url: '/GuardReplacement-deploy',
            type:'GET',
            data:{clientID:clientID,guardReplID:requestID,estabID:estabID,num_guards:num_guards,shiftFrom:shiftFrom,shiftTo:shiftTo,role:role,employeeID:employeeID},
            success:function(data){
              alert(data);
              console.log(data);
              //location.reload();
            }
          });

        });
        // $('#rejected').on('click',function(){
        //   $.ajax({
        //     url:'{{route("change.rejected")}}',
        //     type:'GET',
        //     data : {rejectedIDs:rejectIDs},
        //     success : function(data){

        //     }
        //   });

        // });
      });
      $('.reason').on('click',function(){
        secuID = this.value.split(",")[1];
        client_deployment_notif_id = this.value.split(",")[0];
        //alert(secuID+"------"+client_deployment_notif_id);
        $.ajax({
          url : '{{route("getreason")}}',
          type : 'GET',
          data : {secuID:secuID,client_deployment_notif_id:client_deployment_notif_id},
          success:function(data){
            alert(data);
          }
        });
      });
    </script>
  @endsection
