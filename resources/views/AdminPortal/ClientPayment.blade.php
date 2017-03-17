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
    <h4><center><strong>Clients</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
            <th data-sort-initial="true" data-toggle="true">ID</th>
              <th>Name</th>
              <th data-sort-ignore="true" width="150px">Actions</th>
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
                          <td>1</td>
                          <td>Daisy ronquillo</td>
                          <td>
                  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-list"></i> View details</button>

                          </td>
                      </tr>
     <tr>
                          <td>2</td>
                          <td>Luigi lacsina</td>
                          <td>
      <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-list"></i> View details</button>
                          </td>
                      </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"></td>
            </tr>
          </tfoot>
      </table>

        <div class="text-right">
          <ul class="pagination">
          </ul>
        </div>

          </div>


         </div>

  <!-- Deliver guns -->
<div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Unpaid bills</strong></center></h4>
              </div>
              <div class="modal-body">
          <form data-toggle="validator">
            <div class="form-group">
              <div class="row">
                        <div class="form-group col-sm-12">
                  <label class="control-label">Official receipt number</label>
                        <input type="text" class="form-control" required>
                  <div class="help-block with-errors"></div>
               </div>

        <div class="col-xs-12">
<label class="control-label">Unpaid bills</label>
<table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="100">
          <thead>
            <tr>

            <th>Date</th>
        <th data-sort-ignore="true" width="150px">Actions</th>
            </tr>
          </thead>



          <tbody>
             <tr>



                          <td>feb 15,2017</td>
                    <td>
               <div class="radio radio-info">
              <input type="radio" id="select1">
              <label for="select1"> Select</label>
                 </td>
                      </tr>
               <tr>



                          <td>March 1,2017</td>
                    <td>
               <div class="radio radio-info">
              <input type="radio" id="select2">
              <label for="select2"> Select</label>
                 </td>
                      </tr>
               <tr>



                          <td>March 15,2017</td>
                    <td>
               <div class="radio radio-info">
              <input type="radio" id="select3">
              <label for="select3"> Select</label>
                 </td>
                      </tr>




          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"></td>
            </tr>
          </tfoot>
      </table>
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
<!-- /Add military service modal -->

 </div>
  @endsection
