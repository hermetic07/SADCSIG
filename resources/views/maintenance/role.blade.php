@extends('maintenance.master')

@section('Maintenance Title') Roles @endsection

@section('addaction')"/Role-Add"@endsection

@section('addmodaltitle') Add new guard's role @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Role</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="Role_Name" name="Role_Name" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="control-label  col-md-12">Description</label>
            <div class="col-md-12">
              <textarea  class="form-control" id="Role_desc" name="Role_desc" rows="5" required></textarea>
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>
@endsection

@section('mtitle') Guard's Roles @endsection
@section('mtitle2') <a href="{{url('/Role')}}"> Roles </a> @endsection

@section('theads')
    <th>Role</th>
    <th data-hide="phone, tablet" >Description</th>
    <th data-hide="phone, tablet" data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($Roles as $Role)
        @if($Role->status !== "deleted")
        <tr>
           <td>{!!$Role->id!!}</td>
           <td>{!!$Role->name!!}</td>
           <td>{!!$Role->description!!}</td>
           <td>
             @if($Role->status === "active")
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Role -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Role -> id!!}" checked>
    <label class="onoffswitch2-label" for="{!!$Role -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Role -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Role -> id!!}" >
    <label class="onoffswitch2-label" for="{!!$Role -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @endif
           </td>
           <td>
            <a class="mytooltip tooltip-effect-7" href="#">     <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Role -> id!!}')" ><i class='fa fa-edit'></i></button><span class="tooltip-table">Edit</span></a>

            <a class="mytooltip tooltip-effect-7" href="#">     <button type="button" class="btn btn-danger btn-circle sa-params" onclick="fun_delete('{!!$Role -> id!!}')"><i class="fa fa-times"> </i></button><span class="tooltip-table">Delete</span></a>
           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Role-view'@endsection
@section('hiddenedeleteurl')'/Role-delete'@endsection
@section('hiddenestatusurl')'/Role-status'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/Role-Update') }}"@endsection

@section('editmodalcontent')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Role</label>
    <div class="col-md-12">
            <input type="text" class="form-control" id="edit_Role_name" name="edit_Role_name" required>
      <div class="help-block with-errors"></div>
    </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="control-label  col-md-12">Description</label>
            <div class="col-md-12">
              <textarea class="form-control" id="edit_Role_desc" name="edit_Role_desc"  rows="5" required></textarea>
              <div class="help-block with-errors"></div>
            </div>
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
        $("#edit_Role_name").text(result.name);
        $("#edit_Role_desc").text(result.description);
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
        $("#edit_Role_name").val(result.name);
        $("#edit_Role_desc").val(result.description);
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
