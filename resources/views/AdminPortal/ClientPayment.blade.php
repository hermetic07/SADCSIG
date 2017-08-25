@extends('AdminPortal.master2')

@section('Title') Client Payment @endsection


@section('mtitle') Client Payment  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/ClientPayment')}}"> Client Payment </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


  <div class="row">
          <div class="col-lg-12	">

      <div class="white-box">
          <div class="pd-agent-info text-center">
                                <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
                                <h4>Chris jerico albino</h4>
                                <h6>Client's name</h6> </div>
									   
                            <hr class="m-0">
                            <div class="pd-agent-contact text-center"> <i class="fa fa-phone text-danger" aria-hidden="true"></i> 123456789
                                <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> email@gmail.com 
								</br> </div>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
            <th>Contract code</th>
               <th>Status</th>
              <th>Establishment name</th>
              <th>Service period</th>
              <th>Due date</th>
              <th data-sort-ignore="true" width="280px">Actions</th>
            </tr>
          </thead>
            <div class="form-inline padding-bottom-15">
              <div class="row">
        <div class="col-sm-6">
        </div>
                  <div class="col-sm-6 text-right m-b-20">
                  <div class="form-group">
                      <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
            autocomplete="off">
         </div>
                   </div>
               </div>
            </div>
          <tbody>
                        <tr>
                          <td>CONTRACTz0</td>
                          <td><span class="label label-rouded label-info">SOA sent</span></td>
                          <td>PUP</td>
                          <td>March 01 - 15 2017 </td>
                          <td>March 15 2017</td>
                          <td>
                             <button class="btn btn-success"  onclick=" window.open('{{url('/SOA')}}','_blank')" ><i class="ti-receipt"></i> View SOA</button>
                  <button class="btn  btn-info"  data-toggle="modal" data-target="#Pay"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-list"></i> View details</button>

                          </td>
                      </tr>
                        <tr>
                          <td>CONTRACTz1</td>
                          <td><span class="label label-rouded label-success">Paid</span></td>
                          <td>PUP</td>
                          <td>March 01 - 15 2017 </td>
                          <td>March 15 2017</td>
                          <td>
                             <button class="btn  btn-success"  onclick=" window.open('{{url('/SOA')}}','_blank')" ><i class="ti-receipt"></i> View SOA</button>
                  <button class="btn btn-info"  data-toggle="modal" data-target="#Paid"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-list"></i> View details</button>

                          </td>
                      </tr>
                      <tr>
                          <td>CONTRACTz0</td>
                          <td><span class="label label-rouded label-warning">send SOA</span></td>
                          <td>PUP</td>
                          <td>March 01 - 15 2017 </td>
                          <td>March 15 2017</td>
                          <td>
                             <button class="btn btn-success"  onclick=" window.open('{{url('/SOA')}}','_blank')" ><i class="ti-receipt"></i> View SOA</button>
                  <button class="btn btn-info" ><i class="fa fa-send"></i> Send SOA</button>

                          </td>
                      </tr>
                                   <tr>
                          <td>CONTRACTz0</td>
                          <td><span class="label label-rouded label-danger">Penalize</span></td>
                          <td>PUP</td>
                          <td>March 01 - 15 2017 </td>
                          <td>March 15 2017</td>
                          <td>
                             <button class="btn btn-success"  onclick=" window.open('{{url('/SOA')}}','_blank')" ><i class="ti-receipt"></i> View SOA</button>
                  <button class="btn btn-info"  data-toggle="modal" data-target="#Pay"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-list"></i> View details</button>

                          </td>
                      </tr>


          </tbody>
          <tfoot>
            <tr>
              <td colspan="6"></td>
            </tr>
          </tfoot>
      </table>

        <div class="text-right">
          <ul class="pagination">
          </ul>
        </div>

          </div>


         </div>

  <!-- Pay -->
<div id="Pay" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Payment</strong></center></h4>
              </div>
              <div class="modal-body">
          <form data-toggle="validator">
            <div class="form-group">
              <div class="row">
                                  <div class="form-group col-sm-6">
                  <label class="control-label">Total number of guards</label>
                       <p class="form-control-static">2</p>
                  <div class="help-block with-errors"></div>
               </div>
                                                 <div class="form-group col-sm-6">
                  <label class="control-label">Total amount to pay</label>
                       <p class="form-control-static">1000.00</p>
                  <div class="help-block with-errors"></div>
               </div>

                            <div class="form-group col-sm-6">
                  <label class="control-label">Payment date</label>
                        <input type="text" class="form-control" required>
                  <div class="help-block with-errors"></div>
               </div>
                        <div class="form-group col-sm-6">
                  <label class="control-label">Official receipt number</label>
                        <input type="text" class="form-control" required>
                  <div class="help-block with-errors"></div>
               </div>

 
               <div class="help-block with-errors"></div>
            </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info waves-effect waves-light" >Submit</button>
         </div>
        </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- /Pay -->

 <!-- Paid -->
<div id="Paid" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Payment</strong></center></h4>
              </div>
              <div class="modal-body">
          <form data-toggle="validator">
            <div class="form-group">
              <div class="row">
                                  <div class="form-group col-sm-6">
                  <label class="control-label">Total number of guards</label>
                       <p class="form-control-static">2</p>
                  <div class="help-block with-errors"></div>
               </div>
                                                 <div class="form-group col-sm-6">
                  <label class="control-label">Total amount to pay</label>
                       <p class="form-control-static">1000.00</p>
                  <div class="help-block with-errors"></div>
               </div>

                            <div class="form-group col-sm-6">
                  <label class="control-label">Payment date</label>
      <p class="form-control-static">07/11/28</p>
                  <div class="help-block with-errors"></div>
               </div>
                        <div class="form-group col-sm-6">
                  <label class="control-label">Official receipt number</label>
                 <p class="form-control-static">32423235</p>
                  <div class="help-block with-errors"></div>
               </div>

 
               <div class="help-block with-errors"></div>
            </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
        </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- /Paid -->
 </div>
  @endsection
