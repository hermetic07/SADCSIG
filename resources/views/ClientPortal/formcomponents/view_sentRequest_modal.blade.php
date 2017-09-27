<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
</div>
<div class="modal-body">
  

  <div class="form-group">
    <label>Request ID:</label> {{$requestID}} <br>
    <label>Date Requested: </label> {{$request->created_at}}
    @if($request->status == "done")
      <h2>This request was already done.</h2>
    @elseif($request->status == "c_cancel")
      <h2 style="background-color: firebrick; color : white;">You canceled this request for the following reasons:</h2>
      <p>{{$client_canceled_request->reasons}}</p>
    @elseif($request->status == "a_cancel")
    <h2 style="background-color: firebrick; color : white;">The management cancel this request for the following reasons:</h2>
    @endif
  </div>
  
</div>
<br>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
</div>
</div>