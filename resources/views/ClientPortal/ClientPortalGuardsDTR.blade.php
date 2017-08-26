@extends('ClientPortal.master3')

@section('Title') Guards' DTR @endsection
@section('clientName')
  {{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}
@endsection
@section('link_rqst')
  href="/Request-{{$client->id}}"
@endsection
@section('link_guardsDTR')
  href="/ClientPortalGuardsDTR-{{$client->id}}"
@endsection
@section('link_estab')
   href="/ClientPortalEstablishments-{{$client->id}}"
@endsection
@section('link_home')
  href="/ClientPortalHome-{{$client->id}}"
@endsection
@section('link_messages')
  href="/ClientPortalMessages-{{$client->id}}"
@endsection
@section('mtitle') Your security guards daily time record @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('content')

@php
  $estabID = "";
  $estabName = "";
  $shifts = "";
@endphp

<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay white-box">
        <h4><center><strong>Security guards</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
               <th data-sort-ignore="true" width="90px"></th>
                <th>Name</th>
                <th  width="220px" >Shift</th>
                <th>Post</th>
                <th>Role</th>
                <th>Date Deployed</th>
                <th data-sort-ignore="true">Actions</th>
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
         @foreach($deployments as $deployment)
          @foreach($establishments as $establishment)
            @if($establishment->id == $deployment->establishment_id)
              @php
                $estabID = $establishment->id;
                $estabName = $establishment->name;
              @endphp
            @endif
          @endforeach
            @if($deployment->clients_id == $client->id)
              @foreach($deploymentDetails as $deploymentDetail)
                @if($deploymentDetail->deployments_id == $deployment->id)
                  @php
                    $shifts = $deploymentDetail->shift_from."-".$deploymentDetail->shift_to;
                  @endphp
                  @foreach($employees as $employee)
                    @if($employee->id == $deploymentDetail->employees_id)
                          <tr>
                              <td>                
                                <div class="el-card-item">
                                  <div class="el-card-avatar el-overlay-1">
                                    <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-circle img-responsive"></a>
                                    <div class="el-overlay">
                                      <ul class="el-info">
                                        <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                {{$employee->first_name}}, {{$employee->last_name}}
                              </td>
                              <td>
                               {{$shifts}}
                              </td>
                              <td>
                                <a href="/ClientsDetails-{{$client->id}}+{{$estabID}}" target="_blank">{{$estabName}}</a>
                              </td>
                              <td>
                                {{ $deploymentDetail->role }}
                              </td>
                              <td>
                                {{ $deploymentDetail->created_at }}
                              </td>
                              <td>
                                <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-calendar"></i> Show DTR </button>
                              </td>
                            </tr>
                        @endif
                  @endforeach
                @endif
              @endforeach
            @endif
          @endforeach

          
          </tbody>
          <tfoot>
            <tr>
              <td colspan="7"></td>
            </tr>
          </tfoot>
      </table>

            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>

                           </div>

              </div>


                  <div class="col-lg-6 animated slideInRight guards" style="display:none">

          <div class="white-box">
            <div id="calendar" ></div>
          </div>


                  </div>
             </div>


                </div>

@endsection


@section('script')

<script type="text/javascript">
jQuery(document).ready(function($){
  var click =0;
  $('.show').on('click', function(e){
    if (click == 0){

          click++;
    $(".guards").show();
    $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-6');
    }


  });


});
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
 @endsection
