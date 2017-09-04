@extends('AdminPortal.master2')

@section('Title') Deliver Guns @endsection


@section('mtitle') Deliver Guns  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/DeliverGuns')}}">Deliver Guns</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect active"> @endsection


@section('content')



<div class="row">
           <div class="col-lg-12">
               <div id="table-container" class="white-box">
                                
			 <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                  <th>Client's name</th>
                  <th>Client's establishment</th>
                  <th>location</th>   
                  <th>Status</th>     
                  <th data-sort-ignore="true" width="310px">Actions</th>
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
              @foreach($gunRequests as $gunRequest)
                @if($gunRequest->strGunReqID == $gunRequestID)

                 <tr style="background-color: gray;">
                              <td>{{$gunRequest->strGunReqID}}</td>
                              <td>{{$gunRequest->establishment}}</td>
                              <td>{{$gunRequest->address}},{{$gunRequest->area}},{{$gunRequest->province}}</td>
                              <td>
                                {{$gunRequest->status}}
                              </td>
                              
                              <td>
                                <button class="btn btn-info viewReq" value="{{$gunRequest->strGunReqID}}" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View order slip</button>
                                @if($gunRequest->status == "ONDELIVERY" || $gunRequest->status == "PARTIALCLAIMED")
                                  <button class="btn  btn-success deliver " value="{{$gunRequest->strGunReqID}}" id="show" type="button" disabled><i class="fa fa-truck" ></i>  Deliver guns</button>
                                @else
                                  <button class="btn  btn-success deliver " value="{{$gunRequest->strGunReqID}}" id="show" type="button"><i class="fa fa-truck"></i>  Deliver guns</button>
                                @endif
                                
                              </td>
                 </tr>
                 @else
                 <tr>
                              <td>{{$gunRequest->strGunReqID}}</td>
                              <td>{{$gunRequest->establishment}}</td>
                              <td>{{$gunRequest->address}},{{$gunRequest->area}},{{$gunRequest->province}}</td>
                              <td>
                                {{$gunRequest->status}}
                              </td>
                              <td>
                              <button class="btn btn-info viewReq" value="{{$gunRequest->strGunReqID}}" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View order slip</button>
                              @if($gunRequest->status == "ONDELIVERY" || $gunRequest->status == "PARTIALCLAIMED")
                                  <button class="btn  btn-success deliver " value="{{$gunRequest->strGunReqID}}" id="show" type="button" disabled><i class="fa fa-truck" ></i>  Deliver guns</button>
                                @else
                                  <button class="btn  btn-success deliver " value="{{$gunRequest->strGunReqID}}" id="show" type="button"><i class="fa fa-truck"></i>  Deliver guns</button>
                                @endif
                              </td>
                 </tr>
                 @endif
                 @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5"></td>
                </tr>
              </tfoot>
          </table>
            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>  

          </div>


    <div class="col-lg-5 animated slideInRight guards" style="display:none">
      <div class="white-box deliverContent">

      </div>
    </div>










    <!-- Reques info by client -->
  


            </div>
              </div>



                               <!-- Gun delivery -->
  <div id="Delgun" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
                  </div>
                  <div class="modal-body deliverModal">
                    
                  
                  
                    </div>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
  @endsection

  @section('script')
 <script type="text/javascript">
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
 $(document).ready(function(){
  gunRequestID = $('#gunRequestID').val();
  //alert(gunRequestID);

  

   $('.viewReq').on('click',function(){
      $.ajax({
        url : "{{route('gun.delivery.view')}}",
        type : 'GET',
        data : {gunReqstID:this.value},
        success : function(data){
          $('.viewrequest').text('');
          $('.viewrequest').append(data);
          $('#modalview').modal('show');
          console.log(data);
        }

      });
      
    });
   $('.deliver').on('click',function(){
      $.ajax({
        url : "{{route('gun.delivery.deliver')}}",
        type : 'GET',
        data : {gunReqstID:this.value},
        success : function(data){
         var click =0;
          console.log(data);
          $('.deliverContent').text('');
          $('.deliverContent').append(data);
          if (click == 0){

               click++;
         $(".guards").show();
         $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-7');
         }
        }

      });
      
    });
   
 });
 var serialNo = "";
 quantity = [];
 function getSerial(id){
    $('#del'+id).removeAttr('disabled'); 
   // var a = $(this).parent().parent().parent().find().text();
    //$('#del'+id).attr('required'); 
    //alert($('#del'+id).val());
    //alert(a);
 }
 function funShowDelivModal(gunReqstID){
    // alert(gunReqstID);
    // console.log(this.value);
    var gunsID = [];
    var a = [];
    
    $.each($(".serialCheck"), function(){
      if($(this).is(':checked')){
       
        gunsID.push($(this).val());
        a.push($(this).attr('name'));
      }
          
    });
    for(var i = 0; i < a.length; i++){
     quantity.push($('#del'+a[i]).val());
    // alert($('#del'+a[i]).val());
    }
    //alert(quantity.length)
    $.ajax({
      url : '{{route("gun.delivery.deliverModal")}}',
      type : 'GET',
      data : {
              gunReqstID:gunReqstID,
              gunsID:gunsID,
              quantity:quantity
            },
      success : function(data){
        $('.deliverModal').text('');
        $('.deliverModal').append(data);
        $('#Delgun').modal('show');
        console.log(data);
      }
    });
  }
  function proceedDelivery(id){

    var qtyToBeDel = 0;
    var gunIDs = [];
    var b = [];
    var serialNos = [];
    var delBoy = "";
    var delBoyContact = "";
    var delCode = "";
    var gunReqstID = id;
    $.each($(".gunsID"), function(){
          qtyToBeDel = qtyToBeDel + 1;
          
          gunIDs.push($(this).val());

          b.push($(this).attr('name'));
          //alert($(this).attr('id'));
    });
    for(var i = 0; i < b.length; i++){
     serialNos.push($('#'+b[i]).val());
     //alert(serialNos[i]);
    }
    delBoy = $('#deliveredBy').val();
    delBoyContact = $('#delBoyContact').val();
    delCode = $('#delCode').val();
    // alert(delBoyContact);
    // alert(quantity.length);
     $.ajax({
       url : '{{route("gun.delivery.save")}}',
        type : 'POST',
        data : {
                qtyToBeDel:qtyToBeDel,
                gunIDs:gunIDs,
                delBoy:delBoy,
                delBoyContact:delBoyContact,
                delCode:delCode,
                gunReqstID:gunReqstID,
                serialNo:serialNos,
                
              },
        success : function(data){
          //alert(data);
          if(data == 0){
            alert("Delivery Sent Successfully!!");
            window.location.href = '/Pickups-'+delCode;
            console.log(data);
          }
          
        }
    });

  }
 // function loadTable(){
 //      $.ajax({
 //          type: 'get',
 //          url: "{{ route('gun.delivery.table') }}",
 //          dataType: 'html',
 //          data : {gunRequestID:gunRequestID},
 //          success:function(data)
 //          {
 //              $('#table-container').html(data);
 //              //$('#dataTable').DataTable();
 //          }
 //      });
 //  }
jQuery(document).ready(function($){
 var click =0;
 $('#show').on('click', function(e){
   if (click == 0){

         click++;
   $(".guards").show();
   $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-7');
   }


 });


});


</script>
  @endsection
