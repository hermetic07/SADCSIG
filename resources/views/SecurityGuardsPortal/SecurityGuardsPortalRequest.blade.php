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
              @if($employee->deployed===1)
              <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10"  data-toggle="modal" data-target="#leave"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" >Request</a>
              @else
              <label class="col-xs-5 control-label"></label><button class="btn btn-info m-t-10" disabled>You are not yet deployed</button>
              @endif
            </div>
          </div>
        </div>
      </div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-info-circle"></i> Send a Incident Report</div>
<div class="panel-wrapper collapse in">
  <div class="panel-body">

    <p>Send an Incident Report to the agency</p>
          @if($employee->deployed===1)
          <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" onclick="inc()"  type="button" > Compose Report</a>
          @else
          <label class="col-xs-5 control-label"></label><button class="btn btn-info m-t-10" disabled>You are not yet deployed</button>
          @endif
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
                    @if($employee->deployed===1)
                    <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" href="/SwapRequest" >Request</a>
                    @else
                    <label class="col-xs-5 control-label"></label><button class="btn btn-info m-t-10" disabled>You are not yet deployed</button>
                    @endif
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

                    <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10"   type="button" onclick="resignbtn()" > Request</a>

            </div>

        </div>
      </div>
   </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for Ammunition</div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">

              <p>Request for a ammunition to the agency.</p>
                    @if($employee->deployed===1)
                    <label class="col-xs-6 control-label"></label>	<a class="btn btn-info m-t-10" data-toggle="modal" data-target="#ammo"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" > Request</a>
                    @else
                    <label class="col-xs-5 control-label"></label> <button class="btn btn-info m-t-10" disabled>You are not yet deployed</button>
                    @endif
            </div>

        </div>
      </div>
   </div>

      <!-- Leave Modal -->
<div id="leave" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Leave request</strong></center></h4>
                </div>
                <div class="modal-body">
            <form data-toggle="validator">
              <div class="form-group">
                <div class="row">
                  <div class="form-group col-sm-4">
                    <label class="control-label">Leave type</label>
                    <select class="form-control"  name="noblank" id="leaves">
                      <option value="" disabled="" selected="">---</option>
                      @foreach($leave as $l)
                      <option value="{{$l->id}}">{{$l->name}}</option>
                      @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                 </div>
                 <div class="form-group col-sm-5">
                     <label class="control-label">Notification period (days)</label>
                      <p class="form-control-static" id="notif_days">0</p>
                     <div class="help-block with-errors"></div>
                  </div>
                   <div class="form-group col-sm-3">
                     <label class="control-label">Allowable days</label>
                      <p class="form-control-static" id="allow_days"> 0</p>
                     <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-4">
                    <label class="control-label">Notification date</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control thirdcal" id="thirdcal" placeholder="mm/dd/yyyy" name="notifdate"  disabled/>
                    </div>
                    <div class="help-block with-errors"></div>
                 </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label">Date start</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control firstcal" id="firstcal" placeholder="mm/dd/yyyy" name="from"   readonly/>
                    </div>
                    <div class="help-block with-errors"></div>
                 </div>
                 <div class="form-group col-sm-4">
                    <label class="control-label">Date end</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control secondcal" id="secondcal" placeholder="mm/dd/yyyy" name="to" disabled>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group col-sm-12	">
                    <label class="control-label">Reason:</label>
                    <textarea class="form-control" rows="5" id="reason" required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
               </div>
                 <div class="help-block with-errors"></div>
              </div>
          </div>
           <div class="modal-footer">
       <button type="button" id="edd" class="btn btn-info waves-effect waves-light" onclick="save('{{$employee->id}}')">Submit</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
           </div>
          </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
<!-- /leave -->

   <!-- incident Modal -->
<div id="swap" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
       <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Incident Report</strong></center></h4>
      </div>
      <div class="modal-body">
        <label for="">Date if Incident</label>
        <div class="input-group">
         <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control fourthcal" id="repcal" placeholder="yyyy/mm/dd" />
        </div>
        <label for="">Compose your report here:</label>
        <textarea rows="10"  style="overflow:auto;resize:none" id="increport" class="col-sm-12"></textarea>
        <br>
        <br>

      </div>


           <div class="modal-footer">
            <button type="button" id="reportsub" class="btn btn-info waves-effect waves-light" >Submit</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
           </div>
          </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
<!-- /swap -->
      </div>

     <!-- Resign Modal -->
<div id="resign" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Resignation request</strong></center></h4>
                </div>
                <div class="modal-body">
            <form data-toggle="validator">
              <div class="form-group">
                <div class="row">
                  <div class="form-group col-sm-12">
                    <label class="control-label">Resignation date</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control fourthcal" id="fourthcal" placeholder="mm/dd/yyyy" />
                    </div>
                    <div class="help-block with-errors"></div>
                 </div>

                  <div class="form-group col-sm-12	">
                    <label class="control-label">Reason:</label>
                    <textarea class="form-control" id="resreason" rows="5" required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
               </div>
                 <div class="help-block with-errors"></div>
              </div>
          </div>
           <div class="modal-footer">
       <button type="button" id="edd" onclick="sendResign()" class="btn btn-info waves-effect waves-light" >Submit</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
           </div>
          </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
<!-- /Resign -->

     <!-- Ammo Modal -->
<div id="ammo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Ammunition request</strong></center></h4>
                </div>
                <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					<div class="form-group col-sm-6">
                       <label class="control-label">Client name</label>
                          <p class="form-control-static"> Daisy ronquillo </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-6">
                       <label class="control-label">Contact number</label>
                           <p class="form-control-static"> 09123456789 </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  			<div class="form-group col-sm-6">
                       <label class="control-label">Establishment name</label>
                          <p class="form-control-static"> Polytechnic university of the philippines</p>
                       <div class="help-block with-errors"></div>
                    </div>
					  				  			<div class="form-group col-sm-6">
                       <label class="control-label">Address</label>
                          <p class="form-control-static"> Anonas, Santa Mesa, Maynila, Kalakhang Maynila</p>
                       <div class="help-block with-errors"></div>
                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Person in charge</label>
                          <p class="form-control-static"> Ernest john maskarino </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-6">
                       <label class="control-label">Contact number</label>
                           <p class="form-control-static"> 09123456789 </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  					   <div class="form-group col-sm-4">
                       <label class="control-label">Guntype</label>
						 			<select class="form-control" >
												<option></option>
												<option>Pistiol</option>
												<option>Rifle</option>
											</select>
                       <div class="help-block with-errors"></div>
                    </div>
                   <div class="form-group col-sm-4">
                      <label class="control-label">Gun</label>
                       			<select class="form-control" >
												<option></option>
												<option>Dessert eagle</option>
												<option>Glock 49</option>
											</select>
                      <div class="help-block with-errors"></div>
                   </div>
                  <div class="col-md-4">
                      <label class="control-label  col-md-12">Rounds/Ammo</label>
					                         <input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" required>
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
<!-- /ammo -->
@endsection


@section('script')
<script>

$("#leaves").change(function(){
        $('#firstcal').val("");
      $('#secondcal').val('');
  var notifday= 0;
   var allowday= 0;
  $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
  }); 
  $.ajax({
    type: 'post',
    url: '/GetLeaveInfo',
    data: {
        leave:$('#leaves').val(),
    },
    success: function(data){
        $('#notif_days').html(data.notification);
           $('#allow_days').html(data.days);
          notifday = data.notification;
          allowday = data.days;
          $('.firstcal').datepicker('destroy');
          $(".firstcal").datepicker({
          dateFormat: "mm/dd/yy",
          minDate: notifday,
          onSelect: function(dateText, instance) {


             date = $.datepicker.parseDate(instance.settings.dateFormat, dateText, instance.settings);
              date.setDate(date.getDate() + allowday);
             $(".secondcal").datepicker("setDate", date);
         }
     });
    }

  });


});

 $(function() {

     $(".firstcal").datepicker({
         dateFormat: "mm/dd/yy",
         minDate: 0,
         onSelect: function(dateText, instance) {

           var a = $('input[name=span_mo]').val();
         var number = parseInt(a);

             date = $.datepicker.parseDate(instance.settings.dateFormat, dateText, instance.settings);
             date.setMonth(date.getMonth() + number);
             $(".secondcal").datepicker("setDate", date);
         }
     });
     $(".secondcal").datepicker({
         dateFormat: "mm/dd/yy"
     });
     $(".repcal").datepicker({
         dateFormat: "yy/mm/dd"
     });
     $(".thirdcal").datepicker({
         dateFormat: "mm/dd/yy"
     });
     $(".fourthcal").datepicker({
         dateFormat: "yy/mm/dd"
     });
     $("#reportsub").click(function(){
       $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });

       $.ajax({
         url: "/SaveIncidentReport",
         type:"POST",
         data: {
           "data":$('#increport').val(),
           "date":$('#repcal').val(),
         },
         success: function(result){
           swal({
               title: "Success" ,
               text: result,
             }, function(){
               location.reload();
             });
         }
       });
      });
     $(".thirdcal").datepicker().datepicker("setDate", new Date());

 });

 $(".excom").datepicker({
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                top: 555            });
        }, 0);
    }
});

</script>


<script type="text/javascript">

function save(id)
{
  $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
  });

  $.ajax({
    url: "/SaveLeaveRequest",
    type:"POST",
    data: {

      "id":id,
      "leave":$('#leaves').val(),
      "notday":$('#thirdcal').val(),
      "startday":$('#firstcal').val(),
      "endday":$('#secondcal').val(),
      "reason":$('#reason').val(),

    },
    success: function(result){
      swal({
          title: "Success" ,
          text: "Leave Request Sent",
        }, function(){
          location.reload();
        });

    }
  });
}
function inc(){
  $('#swap').modal('show');
}
function resignbtn(){
  $('#resign').modal('show');
}
function sendResign(){
  $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
  });

  $.ajax({
    url: "/SendResignRequest",
    type:"POST",
    data: {

      "date":$('#fourthcal').val(),
      "reason":$('#resreason').val(),

    },
    success: function(result){
      swal({
          title: "Success" ,
          text: "Resignation Request Sent",
        }, function(){
          location.reload();
        });
    }
  });
}

</script>
 @endsection
