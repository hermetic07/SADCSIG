<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
    </div>
    <div class="modal-body">
        @if($serviceRequests->status == "c_cancel")
          <h2 style="background-color: firebrick; color:white">This request was canceled by the client for the following reasons:</h2>
          <p>
            {{$clientCancelRequest->reasons}}
          </p>
        @elseif($serviceRequests->status == "a_cancel")
          <h2 style="background-color: firebrick; color:white">This request was canceled by the management</h2>
        @endif
        <div class="form-group">
            <label class="col-md-4">Request Code:</label>
            <h4>{{$serviceRequests->id}}</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Date Requested:</label>
            <h4>{{$serviceRequests->created_at}}</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Description of Service:</label>
            <h4>{{$serviceRequests->desc_of_service}}</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Meeting Place:</label>
            <h4>{{$serviceRequests->meetingPlace}}</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Meeting Schedule:</label>
            <h4>{{$serviceRequests->meetingSchedule}}</h4>
        </div>
    </div>     
        
    <div class="modal-footer">
          @if($serviceRequests->status == "c_cancel" || $serviceRequests->status == "a_cancel" || $serviceRequests->status == "done")
              <button type="button" disabled class="btn btn-info waves-effect waves-light">Accept</button>
              <button type="button" disabled class="btn btn-danger waves-effect waves-light">Reject</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          @else
              <button type="button" class="btn btn-info waves-effect waves-light">Accept</button>
              <button type="button" class="btn btn-danger waves-effect waves-light">Reject</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          @endif
          
    </div>
</div>