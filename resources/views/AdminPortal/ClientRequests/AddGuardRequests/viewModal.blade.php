<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Add Guard Request Details</strong></center></h4>
        </div>
        <div class="modal-body" >
          <div class="form-group">
            <label class="control-lable col-md-3">Request Code</label>
            <div class="col-md-9">
              <label class="from-control"><b>{{$add_guard_request->id}}</b></label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-lable col-md-4">Establishment Name:</label>
            <div class="col-md-8">
              <label class="from-control"><b>{{$add_guard_request->establishment}}</b></label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-lable col-md-4">Address:</label>
            <div class="col-md-8">
              <label class="from-control"><b>
                {{$add_guard_request->address}},{{$add_guard_request->area}},{{$add_guard_request->province}}
              </b></label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-lable col-md-4">Person In Charge:</label>
            <div class="col-md-8">
              <label class="from-control"><b>{{$add_guard_request->client_fname}},{{$add_guard_request->client_mname}},{{$add_guard_request->client_lname}}</b></label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-lable col-md-4">Contact No:</label>
            <div class="col-md-8">
              <label class="from-control"><b></b></label>
            </div>
          </div>
      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="location.href='Deploy-AddGuards-{{$add_guard_request->id}}'">Deployment</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div> 
  