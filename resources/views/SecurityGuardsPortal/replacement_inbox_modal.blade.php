<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deployment details</strong></center></h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <p>Greetings! Sorry to tell you that your client: {{$tblestabguards->pic_fname}},{{$tblestabguards->pic_mname}},{{$tblestabguards->pic_lname}} at {{$tblestabguards->establishment}} replaced you for these reasons: .</p>
        </div>

        <div class="row">
            <p>
                @forelse($reasons as $reason)
                    <h3>{{$reason}}</h3>
                    @empty
                        <h3>No Reasons Provided. </h3>
                @endforelse

            </p>
        </div>
    </div>     
        
    <div class="modal-footer">
        
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
    </div>
</div>