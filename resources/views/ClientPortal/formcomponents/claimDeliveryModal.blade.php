<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
        </div>
        <div class="modal-body" >
          <form method="POST" id="confirmClaim" action="/ClaimDelivery">
          {!! csrf_field() !!}
            <div class="form-group">
              <div class="row">
                <div class="form-group col-sm-2">
                  <label class="control-label">Order ID</label>
                    <p class="form-control-static">{{ $gunDelivery->strGunReqID }}</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-10">
                  <label class="control-label">Date Requested</label>
                    <p> </p>
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
                    @if($gunDelivery->strGunDeliveryID == $gunDeliveryDetail->strGunDeliveryID)
                      <tr>
                        <td>
                          @foreach($guns as $gun)
                            @if($gun->id == $gunDeliveryDetail->strGunID)
                              {{ $gun->name }}
                            @endif
                          @endforeach
                        </td>
                        
                        <td>
                          {{ $gunDeliveryDetail->quantity }}
                        </td>
                        <td>
                          <input id="tch4" class="form-control" name="qtyClaimed{{$ctr}}" type="text" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
                          <input type="hidden" name="gunID{{$ctr}}" value="{{$gunDeliveryDetail->strGunID}}">
                          <input type="hidden" name="qtyDelivered{{$ctr}}" value="{{$gunDeliveryDetail->quantity}}">
                        </td>
                      </tr>
                      @php
                        $ctr++;
                      @endphp
                    @endif
                  @endforeach
                   
                  </tbody>
                </table>
                
              </div>
            <div class="help-block with-errors"></div>
          </div>
          <input type="hidden" name="gunDeliveryID" value="{{$gunDelivery->strGunDeliveryID}}">
          <input type="hidden" name="ctr" value="{{$ctr}}">
          <input type="hidden" name="gunRequestsID" value="{{$gunRequests->strClientID}}">
         <div class="modal-footer">
          <button type="submit" class="btn btn-info waves-effect">Claim Delivery</button>
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          
         </div>
        </form>
      </div>