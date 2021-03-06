@extends('AdminPortal.master2')

@section('Title') Pickup @endsection


@section('mtitle') Pick up details  @endsection

@section('mtitle2')
                      <li>Delivery</li>
                         <li class="active"><a href="{{url('/Pickups')}}"> Pick up</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect active"> @endsection


@section('content')

<div class="row">
          <div class="col-lg-12	">

      <div class="white-box">
    <h4><center><strong>Delivery history</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
            <th data-sort-initial="true" data-toggle="true">Delivery Code</th>
              <th>Name</th>
              <th>Establsihment</th>
      <th data-hide="phone, tablet" >Location</th>
    <th>Date delivered</th>
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
            @foreach($clients as $client)
              @if($client->deliveryCode == $gunDeliveryId)
                <tr style="background-color: gray">
                  <td>{{$client->deliveryCode}}</td>
                  <td>{{$client->client_fname}} {{$client->client_mname}} {{$client->client_lname}}</td>
                  <td>{{$client->establishment}}</td>
                  <td>{{$client->address}},{{$client->area}},{{$client->province}}</td>
                  <td>{{$client->dateDelivered}}</td>
                  <td>
                    <button type="button" name="{{$client->strGunReqID}}" value="{{$gunDeliveryId}}" class="btn btn-block btn-info show" ><i class="fa fa-list"></i> Show details </button>
                  </td>
                </tr>
              @else
                <tr>
                  <td>{{$client->deliveryCode}}</td>
                  <td>{{$client->client_fname}} {{$client->client_mname}} {{$client->client_lname}}</td>
                  <td>{{$client->establishment}}</td>
                  <td>{{$client->address}},{{$client->area}},{{$client->province}}</td>
                  <td>{{$client->dateDelivered}}</td>
                  <td>
                    <button type="button" name="{{$client->strGunReqID}}" value="{{$gunDeliveryId}}" class="btn btn-block btn-info show" ><i class="fa fa-list"></i> Show details </button>
                  </td>
                </tr>
              @endif
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


          <div class="col-lg-6 animated slideInRight guards" style="display:none">

      
         </div>

  <!-- Add military service modal -->
<div id="Swap" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Luigi lacsina</strong></center></h4>
              </div>
              <div class="modal-body">
          <form data-toggle="validator">
            <div class="form-group">
      <label class="control-label">Choose an option</label>
              <div class="row">

               <div class="form-group col-sm-6">
             <div class="radio radio-info">
              <input type="radio" name="radio" id="radio3" value="1" checked="checked">
              <label for="radio3"> Permanent </label>
            </div>

                  <div class="help-block with-errors"></div>
               </div>
         <div class="form-group col-sm-6">

     <div class="radio radio-info">
              <input type="radio" name="radio" id="radio1" value="2">
              <label for="radio1"> Reliever </label>
            </div>
                   <div class="help-block with-errors"></div>
                </div>
       <label class="col-xs-3 control-label"></label>
              <div class="col-md-6">
              <div class="deploymentdate animated slideInLeft "  style="display:none;">
          <label class="control-label">To</label>
                                    <div class="input-group">
                  <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="noblank">
                </div>
        </div>
              </div>

             </div>
       <div class="row  el-element-overlay">
       <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
      <th data-sort-ignore="true" width="150px">Actions</th>
      <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="80px" ></th>
            <th>Guard's name</th>
              <th  data-sort-ignore="true">Location</th>

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
              <td>
               <div class="radio radio-info">
              <input type="radio" id="select1">
              <label for="select1"> Select</label>
            </div>
                          <td>
            <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                               <a href="{{url('/SecuProfile')}}"><img src="2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                    <div class="el-overlay">
                      <ul class="el-info">
                                                  <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                        </ul>
                    </div>
              </div>
            </div>
             </td>
                          <td>Abel mandap</td>
            <td>Caloocan city</td>
                      </tr>



          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
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
<input type="hidden" name="" id="gunDeliveryID" value="{{$client->deliveryCode}}">
<div id="Delgun" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog  modal-md">
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

  @endsection
  @section('script')

  <script type="text/javascript">
  gunDeliveryID = "";
  gunRequestID = "";
  function proceedDelivery(){
    var qtyToBeDel = 0;
    var gunIDs = [];
    var serialNos = [];
    var delBoy = $('#deliveredBy').val();
    var delBoyContact = $('#delBoyContact').val();
    var delCode = $('#delCode').val();
    var gunReqID = gunRequestID;
   // alert(gunDeliveryID+','+delCode);

    $.each($(".newGunSerial"), function(){
          qtyToBeDel = qtyToBeDel + 1;
          gunIDs.push($(this).attr('id'));
          serialNos.push($(this).val());
          //alert($(this).val());
            
     });

    $.ajax({
       url : '{{route("gun.delivery.save")}}',
        type : 'POST',
        data : {
                '_token': $('input[name=_token]').val(),
                qtyToBeDel:qtyToBeDel,
                gunIDs:gunIDs,
                delBoy:delBoy,
                delBoyContact:delBoyContact,
                delCode:delCode,
                deliveryID:gunDeliveryID,
                gunReqstID:gunReqID,
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

    //alert(gunReqID);
  }
   function funcDeliverRelacement(){
   // alert($('#gunDeliveryID').val());
     var unclaimed_items_id = [];
        var unclaimed_items_serials = [];
        var gunDeliveryID = $('#gunDeliveryID').val();

        $.each($(".UNCLAIMED"), function(){
        
         
          unclaimed_items_id.push($(this).val());
          unclaimed_items_serials.push($(this).attr('name'));
         // alert($(this).attr('name'));
            
     });

        $.ajax({
          url : '{{route("pickups.delRepl")}}',
          type : 'GET',
          data : {
                  unclaimed_items_id:unclaimed_items_id,
                  unclaimed_items_serials:unclaimed_items_serials,
                  gunDeliveryID:gunDeliveryID
                },
          success : function(data){
            $('.deliverModal').text('');
            $('.deliverModal').append(data);
            $('#Delgun').modal('show');
            console.log(data);
          }
        });
   }
    $(document).ready(function(){
      $('.show').on('click',function(){
        //alert($('.show').attr('name'));
        gunDeliveryID = $('.show').val();
        gunRequestID = $('.show').attr('name');
        $.ajax({
          url : "{{route('pickups.show')}}",
          type : 'GET',
          data : {deliveryCode:$(this).val()},
          success : function(data){
            var click =0;
            $('.guards').text('');
            $('.guards').append(data);
           if (click == 0){

                 click++;
           $(".guards").show();
           $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-6');
           }
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
jQuery(document).ready(function($){
 
 

});
    $( document ).ready(function() {

         $('input[name="radio"]').click(function(){
       if($(this).attr("value")=="2"){
           $(".deploymentdate").show();
         }else{
          $(".deploymentdate").hide();
         }
       });

      $('#slimtest4').slimScroll({
           color: '#FFFFFF',
           size: '10px',
           height: '820px',
           alwaysVisible: false
     });

});

</script>
  @endsection
