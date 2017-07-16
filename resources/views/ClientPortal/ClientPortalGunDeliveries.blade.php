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
@section('mtitle') Gun Deliveries @endsection

@section('content')

<div class="row">
	<div class="col-lg-12	">
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
                @if($gunRequest->id == $gunDelivery->gun_request_id)
                  @if($gunDelivery->status == "CLAIMED")
                    <tr  style="background: gray; color: black;">
                      <td>
                        {{ $gunDelivery->gun_request_id }}
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
                        <button class="btn btn-success"  data-toggle="modal" disabled="true"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="claim_delivery('{!!$gunDelivery->id!!}')"><i class="fa fa-truck"></i> Claim Delivery</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunDelivery->id!!}')">X</button>
                      </td>
                    </tr>
                  @elseif($gunDelivery->status == "ONDELIVERY")
                    <tr>
                      <td>
                        {{ $gunDelivery->gun_request_id }}
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
                        <button class="btn btn-success"  data-target="#claim{{ $gunDelivery->id }}"   type="button" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-truck"></i> Claim Delivery</button>
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

@foreach($gunDeliveries as $gunDelivery)
	@if($gunDelivery->status == "ONDELIVERY" || "CLAIMED")
		<div id="{{ $gunDelivery->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                    <p class="form-control-static">{{ $gunDelivery->gun_request_id }}</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-10">
                  <label class="control-label">Date Requested</label>
                    <p> {{ $dateRequested }} </p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-6">
                   <label class="control-label">Delivery Details</label>
                   <div class="help-block with-errors"></div>
                </div>
                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                  <thead>
                    <tr>
                      <th  data-sort-ignore="true">Gun Name</th>
                      <th width="200px"> Qty.Ordered</th>
                      <th>Qty. Delivered</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  	$ctr = 0;
                  @endphp
                 	@foreach($gunDeliveryDetails as $gunDeliveryDetail)
                 		@if($gunDelivery->id == $gunDeliveryDetail->gun_delivery_id)
                 			<tr>
                 				<td>
                 					@foreach($guns as $gun)
                 						@if($gun->id == $gunDeliveryDetail->gun_id)
                 							{{ $gun->name }}
                 						@endif
                 					@endforeach
                 				</td>
                 				<td>
                 					{{ $gunDeliveryDetail->qtyOrdered }}
                 				</td>
                 				<td>
                 					{{ $gunDeliveryDetail->quantity }}
                 				</td>
                 			</tr>
                 		@endif
                 	@endforeach
                   
                  </tbody>
                </table>
                
              </div>
            <div class="help-block with-errors"></div>
          </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          
         </div>
        </form>
      </div>
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div><!-- /Add military service modal -->




<div id="claim{{ $gunDelivery->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                    <p class="form-control-static">{{ $gunDelivery->gun_request_id }}</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-10">
                  <label class="control-label">Date Requested</label>
                    <p> {{ $dateRequested }} </p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-6">
                   <label class="control-label">Delivery Details</label>
                   <div class="help-block with-errors"></div>
                </div>
                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                  <thead>
                    <tr>
                      <th  data-sort-ignore="true">Gun Name</th>
                      
                      <th>Qty. Delivered</th>
                      <th>Claim</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                    $ctr = 0;
                  @endphp
                  @foreach($gunDeliveryDetails as $gunDeliveryDetail)
                    @if($gunDelivery->id == $gunDeliveryDetail->gun_delivery_id)
                      <tr>
                        <td>
                          @foreach($guns as $gun)
                            @if($gun->id == $gunDeliveryDetail->gun_id)
                              {{ $gun->name }}
                            @endif
                          @endforeach
                        </td>
                        
                        <td>
                          {{ $gunDeliveryDetail->quantity }}
                        </td>
                        <td>
                          <input id="tch4" type="text" value=""  data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
                        </td>
                      </tr>
                    @endif
                  @endforeach
                   
                  </tbody>
                </table>
                
              </div>
            <div class="help-block with-errors"></div>
          </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          
         </div>
        </form>
      </div>
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div><!-- /Add military service modal -->
	@endif
@endforeach
<input type="hidden" name="hidden_delete" id="hidden_delete" value="GunDelivery-remove">
<script type="text/javascript">
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
@endsection

<input type="hidden" name="claimdelivery" id="claimdelivery" value="GunDelivery-claim">

<script type="text/javascript">
  function claim_delivery(id)
   {

      swal({
          title: "Are you sure?",
          text: "Claim this Delivery?",
          type: "info",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, claim it!",
          closeOnConfirm: false
      }, function(){
        var delete_url = $("#claimdelivery").val();
                $.ajax({
                  url: delete_url,
                  type:"POST",
                  data: {"id":id,_token: "{{ csrf_token() }}"}
                })
        .done(function(data) {
  swal({
      title: "Claimed",
      text: "You claimed thid delivery",
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

<script>


    jQuery(document).ready(function() {


     $("input[id='tch4']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });



 });
  </script>
