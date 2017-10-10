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

        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th width="150px">Reciept Number</th>
              <th>Status</th>
              <th>Contract Code</th>
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
                      @foreach($all as $a)
                      <tr>
                        @if($a->strStatus==="sent")
                        <td>{{$a->intid}}</td>
                        <td><span class="label label-rouded label-info">SOA SENT</span></td>
                        <td>{{$a->strContractId}}</td>
                        <td>{{$a->dateFrom}} to {{$a->strbillingId}}</td>
                        <td>{{$a->strbillingId}}</td>
                        <td>
                           <button class="btn btn-success"  onclick=" fun_download({{$a->intid}})" ><i class="ti-receipt"></i> View SOA</button>
                            <button class="btn  btn-info" onclick="fun_view({{$a->intid}})"   type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-list"></i> View details</button>
                        </td>
                        @elseif($a->strStatus==="paid")
                        <td>{{$a->intid}}</td>
                        <td><span class="label label-rouded label-success">Paid</span></td>
                        <td>{{$a->strContractId}}</td>
                        <td>{{$a->dateFrom}} to {{$a->strbillingId}}</td>
                        <td>{{$a->strbillingId}}</td>
                        <td>
                           <button class="btn btn-success col-sm-12"  onclick=" fun_download({{$a->intid}})" ><i class="ti-receipt"></i> View SOA</button>
                        </td>
                        @else
                        <td>{{$a->intid}}</td>
                        <td><span class="label label-rouded label-danger">{{$a->strStatus}}</span></td>
                        <td>{{$a->strContractId}}</td>
                        <td>{{$a->dateFrom}} to {{$a->strbillingId}}</td>
                        <td>{{$a->strbillingId}}</td>
                        <td>
                           <button class="btn btn-success col-sm-12"  onclick="fun_download({{$a->intid}})" ><i class="ti-receipt"></i> View SOA</button>
                        </td>
                        @endif
                      </tr>
                      @endforeach
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
                       <p class="form-control-static" id="guards"></p>
                  <div class="help-block with-errors"></div>
               </div>
                                                 <div class="form-group col-sm-6">
                  <label class="control-label">Total amount to pay</label>
                       <p class="form-control-static" id="amount"></p>
                  <div class="help-block with-errors"></div>
               </div>

                            <div class="form-group col-sm-6">
                  <label class="control-label">Payment date</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calender"></i>   </span> <input type="text" class="form-control firstcal" id="firstcal" placeholder="yyyy/mm/dd" name="from"  required />
                  </div>
                  <div class="help-block with-errors"></div>
               </div>
                        <div class="form-group col-sm-6">
                  <label class="control-label">Official receipt number</label>
                        <input type="text" class="form-control" id="receipt" disabled>
                  <div class="help-block with-errors"></div>
               </div>


               <div class="help-block with-errors"></div>
            </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="button" onclick="fun_paid()" class="btn btn-info waves-effect waves-light" >Submit</button>
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
                  <label class="control-label">Total amount paid</label>
                       <p class="form-control-static" >1000.00</p>
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
<script>
 $(function() {


     $(".firstcal").datepicker({
         dateFormat: "yy-mm-dd",

     });

 });
  </script>
  <script>
    function fun_view(id) {
      $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        }); 
        $.ajax({
          type: 'post',
          url: '/GetPaymentInfo',
          data: {
              'id':id,
          },
          success: function(data){
            $( "#receipt" ).val(id);

            $( "#guards" ).html(data.guards);
            $( "#amount" ).html(data.amount);
            $('#Pay').modal('show');
          }
        });
    }

    function fun_paid() {
      $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        }); 
        $.ajax({
          type: 'post',
          url: '/PaymentPaid',
          data: {
              'id': $( "#receipt" ).val(),
              'date':$( "#firstcal" ).val(),
          },
          success: function(data){

            alert(data);
            if(data==="Billing mark as paid"){
              location.reload();
            }
          }
        });
    }
    function fun_download(id) {
    $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    }); 
    $.ajax({
      type: 'post',
      url: '/Client-download-soa',
      data: {
          'id':id,
      },
      success: function(data){
        console.log(data);
        var ur = '/SOA2/'+data.con+'/'+data.col+'/'+data.cli+'/'+data.diff+'/'+data.date+'/'+data.date1+'/'+data.date2+'/'+data.day+'/'+data.night+'/'+data.vat+'/'+data.ewt+'/'+data.ac;
        window.open(ur,"_blank");
      }
    });
    }
  </script>
  @endsection
