<div class="modal-content">
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
      </div>
      <div class="modal-body">
        <form method="GET" action="">
        {!! csrf_field() !!}
          <div class="form-group">
            <div class="row">
              <div class="form-group col-sm-4">
                <label class="control-label">Client's name</label>
                  <p class="form-control-static">
                   {{$client->name}}
                  </p>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-8 ">
                  <label class="control-label">Address</label>
                    <p class="form-control-static">
                     {{$client->address}}
                  </p>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label">Contact number</label>
                   <p class="form-control-static">
                     
                   </p>
                 <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-4">
                <label class="control-label">Email address</label>
                 <p class="form-control-static"> </p>
                 <div class="help-block with-errors"></div>
              </div>

              <div class="form-group col-sm-4">
                <label class="control-label">Requested service</label>
                <p class="form-control-static">
                  
                </p>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-5">
             <label class="control-label">Description of Requested service</label>
              <p class="form-control-static">
                    
              </p>
             <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-3">
             <label class="control-label">Meeting place</label>
                 <p class="form-control-static">
                    
                 </p>
             <div class="help-block with-errors"></div>
            </div>
              <div class="form-group col-sm-4">
               <label class="control-label">Meeting schedule</label>
                   <p class="form-control-static">
                    
                   </p>
               <div class="help-block with-errors"></div>
              </div>

            </div>
            <div class="help-block with-errors"></div>
          </div>
        
          <div class="modal-footer">
           
              <button type="submit" class="btn btn-info waves-effect waves-light">OK</button>
              <button type="submit" class="btn btn-danger waves-effect waves-light">Cancel</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      </div>