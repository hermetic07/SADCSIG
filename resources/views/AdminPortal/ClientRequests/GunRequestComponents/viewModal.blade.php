<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request Details</strong></center></h4>
</div>
<div class="modal-body">
  <div class="form-group">
    <div class="col-md-6">
      <div class="col-md-5">
          <label class="control-label"><b>Client Name:</b></label>
        </div>
        <div class="col-md-7">
          <label class="">{{$client->name}}</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-md-4">
          <label class="control-label"><b>Order No.</b></label>
        </div>
        
        <div class="col-md-8">
          <label class="" style="font-size: 16px; color: black;"><b>{{$gunRequest->strGunReqID}}</b></label>
        </div>
      </div>
  </div>
  <div class="form-group">
    <div class="col-md-6">
      <label class="control-label">Contact No:</label>
      <label class="control-label">{{$client->contactNo}}</label>
    </div>
    <div class="col-md-6">
      <label class="control-label">Establishment:</label>
      <label class="control-label">{{$establishment->name}}</label>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-6">
      <label class="control-label">Email:</label>
      <label class="control-label">{{$client->email}}</label>
    </div>
    <div class="col-md-6">
      <label class="control-label">Address:</label>
      <label class="control-label">{{$establishment->address}},{{$areas->name}},{{$provinces->name}}</label>
    </div>
  </div>
  <br>
  <div class="form-group">
    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th  data-sort-ignore="true">Gun Name</th>
              <th data-sort-ignore="true" width="120px">Quantity</th>
            </tr>
          </thead>
          <tbody>
            @foreach($gunRequestsDetails as $gunRequestsDetail)
                    @if($gunRequestsDetail->strGunReqID == $gunRequest->strGunReqID)
                    @php
                      $qty = $gunRequestsDetail->quantity;
                    @endphp
                    <tr>
                      <td>
                        @foreach($guns as $gun)
                          @if($gunRequestsDetail->strGunID == $gun->strGunID)
                            {{ $gun->name }}
                          @endif
                        @endforeach
                      </td>
                      <td>
                        {{ $qty }}
                      </td>
                    </tr>
                    @endif
                  @endforeach
          </tbody>
        </table>
  </div>
</div>
<br>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
</div>