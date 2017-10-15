<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deployment details</strong></center></h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <p>Good Day! You are already deployed! Here are the deployment details:</p>
        </div>

        <div class="form-group">
            <label class="col-md-4">Establishment:</label>
            <h4>{{$tblestabguards->establishment}}</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Person in charge:</label>
            <h4>{{$tblestabguards->pic_fname}},{{$tblestabguards->pic_mname}},{{$tblestabguards->pic_lname}}</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Nature of business:</label>
            <h4>{{$tblestabguards->nature}}</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Address:</label>
            <h4>{{$tblestabguards->address}},{{$tblestabguards->province}},{{$tblestabguards->area}}</h4>
        </div>
        <br>
        <div class="form-group">
            <label class="col-md-4">Shift:</label>
            <h4>{{$tblestabguards->shiftFrom}} am - {{$tblestabguards->shiftTo}} pm</h4>
        </div>
        <div class="form-group">
            <label class="col-md-4">Date deployed:</label>
            <h4>{{$tblestabguards->dateDeployed}}</h4>
        </div>
    </div>     
        
    <div class="modal-footer">
        
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
    </div>
</div>