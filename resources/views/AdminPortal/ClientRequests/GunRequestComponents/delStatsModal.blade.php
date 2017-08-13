<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
</div>
<div class="modal-body" >
	<div class="form-group">
		<label>Delivery Status:</label>
		<h4>{{$gunDelivery->status}}</h4>
	</div>
	<div class="form-group">
		<table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th  data-sort-ignore="true">Gun Name</th>
              <th data-sort-ignore="true" >Quantity Delivered</th>
              <th data-sort-ignore="true" >Quantity Claimed</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($claimedDeliveries as $claimedDelivery)
                    @if($claimedDelivery->strGunDeliveryID == $gunDelivery->strGunDeliveryID)
                    
                    <tr>
                      <td>
                        @foreach($guns as $gun)
                          @if($claimedDelivery->strGunID == $gun->strGunID)
                            {{ $gun->name }}
                          @endif
                        @endforeach
                      </td>
                      <td>
                        @foreach($gunRequestsDetails as $gunRequestsDetail)
			                    @if($gunRequestsDetail->strGunReqID == $gunRequestID)
			                    
			                        @foreach($guns as $gun)
			                          @if($gunRequestsDetail->strGunID == $gun->strGunID)
			                            {{ $gunRequestsDetail->quantity }}
			                          @endif
			                        @endforeach
			                      
			                       
			                     
			                    @endif
			                  @endforeach
                      </td>
                      <td>
                      	{{$claimedDelivery->intQtyClaimed}}
                      </td>
                      <td>
                      	<input type="text" name="" class="form-control" placeholder="gun replacement">
                      </td>
                    </tr>
                    @endif
                  @endforeach
          </tbody>
        </table>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-info">Deliver</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>