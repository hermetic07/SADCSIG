@extends('ClientPortal.master3')

@section('Title') Gun Deliveries @endsection
@section('clientName')
  {{  $client->name }}
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
@section('mtitle') Gun Deliveries @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('content')

<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay white-box">
        <h4><center><strong>Security guards</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
                <th>Request ID</th>
                
                <th>Status</th>
                <th>Date Requested</th>
                <th data-sort-ignore="true" width="340px">Actions</th>
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
          @foreach($gunDeliveries as $gunDelivery)
            @if($gunDelivery->status == "ONDELIVERY" || "CLAIMED")
              @foreach($gunRequests as $gunRequest)
                @if($gunRequest->strGunReqID == $gunDelivery->strGunReqID)
                  @if($gunDelivery->status == "CLAIMED")
                    <tr  style="background: gray; color: black;">
                      <td>
                        {{ $gunDelivery->strGunReqID }}
                      </td>
                      <td>
                        {{ $gunDelivery->status }}
                      </td>
                      <td>
                       {{ $gunRequest->created_at }}
                            @php
                              $dateRequested = $gunRequest->created_at;
                            @endphp
                      </td>
                      <td>
                        <button class="btn btn-info"  data-toggle="modal" data-target="#{{ $gunDelivery->id }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button class="btn btn-success claimDel" disabled="true"  type="button"data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Claim Delivery</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunDelivery->id!!}')">X</button>
                      </td>
                    </tr>
                  @elseif($gunDelivery->status == "ONDELIVERY")
                    <tr>
                      <td>
                        {{ $gunDelivery->strGunReqID }}
                      </td>
                      <td>
                        {{ $gunDelivery->status }}
                      </td>
                      <td>
                       {{ $gunRequest->created_at }}
                            @php
                              $dateRequested = $gunRequest->created_at;
                            @endphp
                      </td>
                      <td>
                        <button class="btn btn-info"  data-toggle="modal" data-target="#{{ $gunDelivery->id }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button class="btn btn-success claimDel" value="{{$gunDelivery->strGunDeliveryID}}" type="button" data-target=".bs-example-modal-lg" ><i class="fa fa-truck"></i> Claim Delivery</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunDelivery->id!!}')">X</button>
                      </td>
                    </tr>
                    @else($gunDelivery->status == "PARTIALCLAIMED")
                    <tr  style="background: gray; color: black;">
                      <td>
                        {{ $gunDelivery->strGunReqID }}
                      </td>
                      <td>
                        {{ $gunDelivery->status }}
                      </td>
                      <td>
                       {{ $gunRequest->created_at }}
                            @php
                              $dateRequested = $gunRequest->created_at;
                            @endphp
                      </td>
                      <td>
                        <button class="btn btn-info"  data-toggle="modal" data-target="#{{ $gunDelivery->id }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button class="btn btn-success claimDel" disabled="true"  type="button"data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Claim Delivery</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunDelivery->id!!}')">X</button>
                      </td>
                    </tr>
                  @endif
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


<div id="claim" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content claimModal">
        
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div><!-- /Add military service modal -->

@endsection
@section('script')
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).ready(function(){

    $('.claimDel').on('click',function(){
      
      $.ajax({
        url : "{{route('claim.delivery.modal')}}",
        type : 'GET',
        data : {gunDeliveryID:this.value},
        success : function(data){
          //alert(data);
          $('.claimModal').text('');
          $('.claimModal').append(data);
          $('#claim').modal('show');
          console.log(data);

        }
      });
    });
    $(document).on('submit','#confirmClaim', function(e) {
      
     // alert("Success");
      $.ajax({
        url : '{{route("claim.delivery")}}',
        type : 'POST',
        data: {earl:"earl"},
        success: function(data){
          alert(data);
          //location.reload();
        }
      });
    });
  });
</script>
@endsection