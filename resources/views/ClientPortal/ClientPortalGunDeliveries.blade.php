@extends('ClientPortal.master3')

@section('Title') Gun Deliveries @endsection
@section('clientName')
  {{  $client->name }}
@endsection
@section('link_rqst')
  href="/Request-{{$client->id}}"
@endsection
@section('link_guardsDTR')
  href="/ClientPortalGuardsDTR-{{$client->id}}"
@endsection
@section('link_estab')
   href="/ClientPortalEstablishments-{{$client->id}}"
@endsection
@section('link_home')
  href="/ClientPortalHome-{{$client->id}}"
@endsection
@section('link_messages')
  href="/ClientPortalMessages-{{$client->id}}"
@endsection
@section('mtitle') Gun Deliveries @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('content')

<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay white-box">
        <h4><center><strong>Security guards</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
                <th>Order number</th>
                <th>Date and time Requested</th>
                <th>Deliver by</th>               
                <th>Status</th>
                <th data-sort-ignore="true" width="340px">Actions</th>
            </tr>
          </thead>
          <div class="form-inline padding-bottom-15">
            <div class="row">
              <div class="col-sm-6"></div>
                <div class="col-sm-6 text-right m-b-20">
                  <div class="form-group">
                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                autocomplete="off">
                  </div>
                </div>
              </div>
          </div>
          <tbody>
          @foreach($gunDeliveries as $gunDelivery)
            @if($gunDelivery->status == "ONDELIVERY" || "CLAIMED")
              @foreach($gunRequests as $gunRequest)
                @if($gunRequest->strGunReqID == $gunDelivery->strGunReqID)
                  @if($gunDelivery->status == "CLAIMED")
                    <tr  style="background: gray; color: black;">
                      <td>
                        {{ $gunDelivery->strGunReqID }}
                      </td>
                      <td>
                        {{ $gunDelivery->status }}
                      </td>
                      <td>
                       {{ $gunRequest->created_at }}
                            @php
                              $dateRequested = $gunRequest->created_at;
                            @endphp
                      </td>
                      <td>
                        <button class="btn btn-info"  data-toggle="modal" data-target="#{{ $gunDelivery->id }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button class="btn btn-success claimDel" disabled="true"  type="button"data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Claim Delivery</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunDelivery->id!!}')">X</button>
                      </td>
                    </tr>
                  @elseif($gunDelivery->status == "ONDELIVERY")
                    <tr>
                      <td>
                        {{ $gunDelivery->strGunReqID }}
                      </td>
                      <td>
                        {{ $gunDelivery->status }}
                      </td>
                      <td>
                       {{ $gunRequest->created_at }}
                            @php
                              $dateRequested = $gunRequest->created_at;
                            @endphp
                      </td>
                      <td>
                        <button class="btn btn-info"  data-toggle="modal" data-target="#{{ $gunDelivery->id }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button class="btn btn-success claimDel" value="{{$gunDelivery->strGunDeliveryID}}" type="button" data-target=".bs-example-modal-lg" ><i class="fa fa-truck"></i> Claim Delivery</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunDelivery->id!!}')">X</button>
                      </td>
                    </tr>
                    @else($gunDelivery->status == "PARTIALCLAIMED")
                    <tr  style="background: gray; color: black;">
                      <td>
                        {{ $gunDelivery->strGunReqID }}
                      </td>
                      <td>
                        {{ $gunDelivery->status }}
                      </td>
                      <td>
                       {{ $gunRequest->created_at }}
                            @php
                              $dateRequested = $gunRequest->created_at;
                            @endphp
                      </td>
                      <td>
                        <button class="btn btn-info"  data-toggle="modal" data-target="#{{ $gunDelivery->id }}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> View Details</button>
                        <button class="btn btn-success claimDel" disabled="true"  type="button"data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Claim Delivery</button>
                        <button class="btn btn-danger" type="button" data-target=".bs-example-modal-lg" onclick="fun_delete('{!!$gunDelivery->id!!}')">X</button>
                      </td>
                    </tr>
                  @endif
                @endif
              @endforeach
            @endif
          @endforeach
          </tr>

        </tbody>
        <tfoot>
          <tr>
            <td colspan=5></td>
          </tr>
        </tfoot>
      </table>

            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>
    </div>
    </div>
    
  </div>
</div>




   <!-- delivery slip -->
  <div id="DelSlip" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Delivery slip</strong></center></h4>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator">
                    <div class="form-group">
                    <div class="row">  
                       <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td>
              <p style="margin-top:0px;">Deliver by</p>
                  <b>Luigi Lacsina</b></td>
          
            <td align="right" width="100"> 07/11/28 07:25 </td>
          </tr>
          <tr>
            <td colspan="2" style="padding:20px 0; border-top:1px solid #f6f6f6;"><div>
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;">Dessert eagle
                      </br>
                      -131231242
                      </br>
                      -131231242                      
                      </td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;"  align="right">x2</td>
                    </tr>
                    <tr>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;">m4a1
                        </br>
                      -131231242  
                        </br>
                      -131231242  
                        </br>
                      -131231242  
                      </td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;"  align="right">x3</td>
                    </tr>
                                        <tr class="total">
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" width="80%">Total</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" align="right">x5</td>
                    </tr>

                  </tbody>
                </table>
              </div></td>
          </tr>
          <tr>
            <td colspan="2">
          </tr>
        </tbody>
      </table>
    </div>


                </div>
                 </div>
                          <div class="modal-footer">
      
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
             </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
              </div>

                  <!-- Claim delivery -->
  <div id="ClaimDel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator">
                    <div class="form-group">
                    <div class="row">  
                             <div class="table-responsive">
                                 <table class="table color-bordered-table dark-bordered-table">
                                    <thead>
                                        <tr>
                                            <th width="10px">Claimed</th>
                                            <th>Gun type</th>
                                            <th>Gun name</th>
                                            <th>Serial No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                              <div class="checkbox checkbox-success checkbox-circle">
                                                <input id="gun1" type="checkbox" >
                                                 <label for="gun1"></label>
                                              </div>
                                            </td>
                                             <td>Pistol</td>
                                            <td>Dessert eagle</td>
                                            <td>
                                                 134224343234
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                              <div class="checkbox checkbox-success checkbox-circle">
                                                <input id="gun2" type="checkbox" >
                                                 <label for="gun2"></label>
                                              </div>
                                            </td>
                                             <td>Pistol</td>
                                            <td>Dessert eagle</td>
                                            <td>
                                                 134224343234   
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </br>
                            <div class="form-group col-sm-8">
                      <label class="control-label">Delivered by</label>
                       <p class="form-control-static">Luigi Lacsina</p>
                      <div class="help-block with-errors"></div>
                   </div>
					   <div class="form-group col-sm-4">
                       <label class="control-label">Contact number</label>
                       <p class="form-control-static">1231311414</p>
                       <div class="help-block with-errors"></div>
                    </div>

					
                 </div>
                   <div class="help-block with-errors"></div>
                </div>
                          <div class="modal-footer">
                        <button  type="button" class="btn btn-success waves-effect waves-light" onclick="claim();" >Claim</button>
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
                        </div>







<div id="claim" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content claimModal">
        
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div><!-- /Add military service modal -->

@endsection
@section('script')
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).ready(function(){

    $('.claimDel').on('click',function(){
      
      $.ajax({
        url : "{{route('claim.delivery.modal')}}",
        type : 'GET',
        data : {gunDeliveryID:this.value},
        success : function(data){
          //alert(data);
          $('.claimModal').text('');
          $('.claimModal').append(data);
          $('#claim').modal('show');
          console.log(data);

        }
      });
    });
    $(document).on('submit','#confirmClaim', function(e) {
      
     // alert("Success");
      $.ajax({
        url : '{{route("claim.delivery")}}',
        type : 'POST',
        data: {earl:"earl"},
        success: function(data){
          alert(data);
          //location.reload();
        }
      });
    });
  });

   function claim()
{
    $('#ClaimDel').modal('hide');
  swal({
    title: "Delivery code",
     type: "input",
  html: true,
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    inputPlaceholder: "Write something"
  },
  function(inputValue){
    if (inputValue === false) return false;
    if (inputValue === "") {
      swal.showInputError("You need to write something!");
      return false
    }
       if (inputValue !== "123") {
      swal.showInputError("wrong delivery code!");
      return false
    }
           if (inputValue === "123") {
     swal("Delivery Clamed!", "Thank you for your efforts!", "success");
    }
  });
}
</script>
@endsection