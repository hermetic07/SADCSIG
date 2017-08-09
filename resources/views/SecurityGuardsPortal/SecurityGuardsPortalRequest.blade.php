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



      <!-- Leave Modal -->
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
<!-- /Add military service modal -->
      </div>

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
     $(".thirdcal").datepicker({
         dateFormat: "mm/dd/yy"
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
      alert(result);
      location.reload();
    }
  });
}

</script>
 @endsection
