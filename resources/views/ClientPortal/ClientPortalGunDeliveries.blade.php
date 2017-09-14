@extends('ClientPortal.master3')

@section('Title') Gun Deliveries @endsection
@section('clientName')
  {{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}
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
                <th>Date and time Delivered</th>
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
            @foreach($gunDeliveryDetails as $gunDeliveryDetail)
              @if($gunDeliveryDetail->deliveryStatus == "CLAIMED" || $gunDeliveryDetail->deliveryStatus == "PARTIALCLAIMED" || $gunDeliveryDetail->deliveryStatus == "REDELIVERED")
                <tr style="background-color: gray;">
                    <td> 
                      {{$gunDeliveryDetail->deliveryCode}}
                    </td>
                    <td>
                    {{$gunDeliveryDetail->dateDelivered}}
                    </td>
                    <td>
                    {{$gunDeliveryDetail->deliveryPerson}}
                    </td>
                    <td>
                    {{$gunDeliveryDetail->deliveryStatus}}
                    
                    </td>
                    
                      <td>
                        <button class="btn btn-info view" type="button" value="{{$gunDeliveryDetail->deliveryCode}}" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View Delivery slip</button>
                        <button disabled class="btn btn-success claimDel" value="{{$gunDeliveryDetail->deliveryCode}}" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Claim Delivery</button>
                       
                      </td>
                    </tr>
              @else
              <tr>
                    <td> 
                      {{$gunDeliveryDetail->deliveryCode}}
                    </td>
                    <td>
                    {{$gunDeliveryDetail->dateDelivered}}
                    </td>
                    <td>
                    {{$gunDeliveryDetail->deliveryPerson}}
                    </td>
                    <td>
                    {{$gunDeliveryDetail->deliveryStatus}}
                    
                    </td>
                    
                      <td>
                        <button class="btn btn-info view" type="button" value="{{$gunDeliveryDetail->deliveryCode}}" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View Delivery slip</button>
                        <button class="btn btn-success claimDel" value="{{$gunDeliveryDetail->deliveryCode}}" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Claim Delivery</button>
                       
                      </td>
                    </tr>
              @endif
              
            @endforeach
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
  <div id="ClaimDel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog viewGunDel">
                
    </div>
  </div>

                  <!-- Claim delivery -->









@endsection
@section('script')
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  
  $(document).ready(function(){
    deliveryCode = "";
    $('.view').on('click',function(){
      
      $.ajax({
        url : "{{route('client.view.gunDel')}}",
        type : 'GET',
        data : {gunDeliveryID:this.value},
        success : function(data){
         
          $('.viewGunDel').text('');
          $('.viewGunDel').append(data);
          $('#ClaimDel').modal('show');
          console.log(data);

        }
      });
    });

    $('.claimDel').on('click',function(){
      deliveryCode = this.value;
      $.ajax({
        url : "{{route('client.claim.modal')}}",
        type : 'GET',
        data : {gunDeliveryID:this.value},
        success : function(data){
          //alert(data);
          $('.viewGunDel').text('');
          $('.viewGunDel').append(data);
          $('#ClaimDel').modal('show');
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

   function claim(id)
{
  var serialNos = [];
  
  var gunIDs = [];
  var unchecked_serialNos = [];
  
  var unchecked_gunIDs = [];
  $.each($(".claimChckBx"), function(){
      if($(this).is(':checked')){
        gunIDs.push($(this).attr('id'));
        serialNos.push($(this).val());
      //  alert($(this).val());
      }else {
        unchecked_gunIDs.push($(this).attr('id'));
        unchecked_serialNos.push($(this).val());
        alert($(this).val());

      }
          
    });
  
  
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
       if (inputValue !== deliveryCode) {
      swal.showInputError("wrong delivery code!");
      return false
    }
           if (inputValue === deliveryCode) {
            $.ajax({
              url:"{{route('client.save.claim')}}",
              type : 'POST',
              data : {serialNos:serialNos,gunIDs:gunIDs,gunDeliveryID:id,unchecked_gunIDs:unchecked_gunIDs,unchecked_serialNos:unchecked_serialNos},
              success : function(data){
                 swal("Delivery ClaImed!", "Thank you for your efforts!", "success");
                 location.reload();
              }
            });
    
    }
  });
}
</script>
@endsection