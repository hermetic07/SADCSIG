@extends('maintenance.master')

@section('Maintenance Title') Leaves @endsection

@section('addaction')"/Leave-Add"@endsection

@section('addmodaltitle') Add new type of leave for guards @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Type of Leave</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="Leave_Name" name="Leave_Name" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Span</label>
    <div class="col-md-12">
      <input type="number" class="form-control" id="Leave_span" name="Leave_span" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-12">
      <label  class="control-label" >Span Type</label>
      <select required class="form-control" id="Leave_type" name="Leave_type">
        <option value="">None</option>
        <option value="Days">Days</option>
        <option value="Weeks">Weeks</option>
        <option value="Months">Months</option>
      </select>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
@endsection

@section('mtitle') Guard's Leaves @endsection
@section('mtitle2') <a href="{{url('/Leave')}}"> Leaves </a> @endsection

@section('theads')
    <th>Type of leave</th>
    <th>Span</th>
    <th data-hide="phone, tablet" data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($Leaves as $Leave)
        @if($Leave->status !== "deleted")
        <tr>
           <td>{!!$Leave->id!!}</td>
           <td>{!!$Leave->name!!}</td>
           <td>{!!$Leave->span!!} {!!$Leave->spantype!!}</td>
           <td>
             @if($Leave->status === "active")
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Leave -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Leave -> id!!}" checked>
    <label class="onoffswitch2-label" for="{!!$Leave -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>

             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Leave -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Leave -> id!!}">
    <label class="onoffswitch2-label" for="{!!$Leave -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
   </div>
             @endif
           </td>
           <td>
          <a class="mytooltip tooltip-effect-7" href="#">  <a class="mytooltip tooltip-effect-7" href="#">       <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Leave -> id!!}')" ><i class='fa fa-edit'></i></button><span class="tooltip-table">Edit</span></a>
&nbsp;
        <a class="mytooltip tooltip-effect-7" href="#">         <button type="button" class="btn btn-danger btn-circle sa-params" onclick="fun_delete('{!!$Leave -> id!!}')"><i class="fa fa-times"> </i></button><span class="tooltip-table">Delete</span></a>
           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Leave-view'@endsection
@section('hiddenedeleteurl')'/Leave-delete'@endsection
@section('hiddenestatusurl')'/Leave-status'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/Leave-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-12">
            <label class="control-label">Type of leave</label>
            <input type="text" class="form-control" id="edit_Leave_name" name="edit_Leave_name" required>
            <div class="help-block with-errors"></div>
         </div>
       </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="form-group col-sm-12">
             <label class="control-label">Span of Leave</label>
             <input type="number" class="form-control" id="edit_Leave_span" name="edit_Leave_span" required>
             <div class="help-block with-errors"></div>
          </div>
        </div>
      </div>
      <div class="form-group col-sm-12">
        <div class="row">
          <label  class="control-label" >Span Type</label>
          <select required class="form-control" id="edit_type" name="edit_type" required>
            <option value="">None</option>
            <option value="Days">Days</option>
            <option value="Weeks">Weeks</option>
            <option value="Months">Months</option>
          </select>
          <div class="help-block with-errors"></div>
        </div>
      </div>
@endsection

@section('ajaxscript')
<script type="text/javascript">
  function fun_view(id)
  {
    var view_url = $("#hidden_view").val();
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
        //console.log(result);
        $("#edit_id").text(result.id);
        $("#edit_Leave_name").text(result.name);
        $("#edit_Leave_span").text(result.span);
      }
    });
  }

  function fun_edit(id)
  {
    var view_url = $("#hidden_view").val();
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
        //console.log(result);
        $("#edit_id").val(result.id);
        $("#edit_Leave_name").val(result.name);
        $("#edit_Leave_span").val(result.span);
      }
    });
  }

  function fun_delete(id)
   {

      swal({
          title: "Are you sure?",
          text: "Delete this item?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
      }, function(){
        var delete_url = $("#hidden_delete").val();
                $.ajax({
                  url: delete_url,
                  type:"POST",
                  data: {"id":id,_token: "{{ csrf_token() }}"}
                })
        .done(function(data) {
  swal({
      title: "Deleted",
      text: "This item has been successfully deleted",
      type: "success"
  },function() {
      location.reload();
  });
})
.error(function(data) {
       swal("Oops", "We couldn't connect to the server!", "error");
     });
      });


     
   }

  function fun_status(id)
   {
        var status_url = $("#hidden_status").val();
        $.ajax({
          url: status_url,
          type:"POST",
          data: {"id":id,_token: "{{ csrf_token() }}"},
          success: function(response){

  $(document).ready(function() {
             $.toast({
              heading: 'Status change',
              position: 'top-right',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 3500,
              stack: 6
            });
  });
          }
        });
   }
</script>
@endsection
