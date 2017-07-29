<form data-toggle="validator">
  <div class="form-group">
    <div class="row">
      <div class="form-group col-sm-12">
        <label class="control-label">Subject:</label>
        <p class="form-control-static">Guard's pool</p>
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group col-sm-12 ">
        <label class="control-label">Content:</label>
        <p class="form-control-static"> Good morning! We got you the best of our security team! Select guards and we will deploy them to you.</p>
        <br>
        <center>
          <button  type="button" onclick="location.href='{{url('/GuardPool')}}'" class="fcbtn btn btn-info btn-outline btn-1e">Select guards</button>
        </center>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="help-block with-errors"></div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
  </div>
</form>