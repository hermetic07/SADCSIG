@extends('SecurityGuardsPortal.master4')

@section('Title') Requests @endsection


@section('mtitle') Requests @endsection

@section('content')


<div class="row">




          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for leave</div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">

              <p>Request for a leave to the agency and wait for their confirmation if it will be confirm. If not, it means there's no one available to relieve you or other reason.</p>

              <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" >Request</a>

            </div>
          </div>
        </div>
      </div>




          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for Swapping</div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">

              <p>Request for a swap to another client but first your client, the security guard that you want to be swap with and his/her client must agree before the agency will confirm and process it.</p>

              <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10">Request</a>

            </div>

        </div>
      </div>

        </div>


          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for Resignation</div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">

              <p>Request for a resignation to notify the agency that you will leave and state your reason then visit the agency for you to process it.</p>

              <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10">Request</a>

            </div>

        </div>
      </div>



      <!-- Deliver guns -->
<div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up following</strong></center></h4>
                </div>
                <div class="modal-body">
            <form data-toggle="validator">
              <div class="form-group">
                <div class="row">
                       <div class="form-group col-sm-7">
                    <label class="control-label">Leave type</label>
                                            <select class="form-control"  name="noblank">
                      <option value="" disabled="" selected="">---</option>
                      <option>Vacation sick</option>
                      <option>ROTC</option>
                    </select>
                    <div class="help-block with-errors"></div>
                 </div>
        <div class="form-group col-sm-5">
                     <label class="control-label">Notification period (days)</label>
                        <p class="form-control-static"> 14</p>
                     <div class="help-block with-errors"></div>
                  </div>

                       <div class="form-group col-sm-6">
                    <label class="control-label">Date start</label>
                                                                      <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="noblank">
                  </div>
                    <div class="help-block with-errors"></div>
                 </div>
        <div class="form-group col-sm-6">
                     <label class="control-label">Date end</label>
                                                            <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy" name="noblank">
                  </div>
                     <div class="help-block with-errors"></div>
                  </div>
        <div class="form-group col-sm-12	">
                     <label class="control-label">Reason:</label>
                    <textarea class="form-control" rows="5" required></textarea>
                     <div class="help-block with-errors"></div>

                  </div>


               </div>
                 <div class="help-block with-errors"></div>
              </div>
          </div>
           <div class="modal-footer">
       <button type="button" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
           </div>
          </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
<!-- /Add military service modal -->
      </div>

@endsection


@section('script')


 @endsection
