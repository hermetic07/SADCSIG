@extends('maintenance.master')

@section('Maintenance Title') Roles @endsection

@section('addaction')"/Role-Add"@endsection

@section('addmodaltitle') Add Role @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Type of Role</label>
  <div class="col-md-5">
    <input type="text" class="form-control" id="Role_Name" name="Role_Name" required>
    <div class="help-block with-errors"></div>
  </div>
  <label class="control-label  col-md-12">Description</label>
  <div class="col-md-12">
    <input type="text area" class="form-control" id="Role_desc" name="Role_desc" required>
    <div class="help-block with-errors"></div>
  </div>
</div>
@endsection

@section('mtitle') Guard Roles @endsection
@section('mtitle2') Roles @endsection

@section('theads')
    <th>Name</th>
    <th>Description</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($Roles as $Role)
      <tr>
         <td>{!!$Role->id!!}</td>
         <td>{!!$Role->name!!}</td>
         <td>{!!$Role->description!!}</td>
         <td>
           @if($Role->status === "active")
            <input type="checkbox" onchange="fun_status('{!!$Role -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
           @else
             <input type="checkbox" onchange="fun_status('{!!$Role -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
           @endif
         </td>
         <td>
             <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Role -> id!!}')" ><i class='fa fa-edit'></i></button>
             <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$Role -> id!!}')"><i class="fa fa-times"> </i></button>
         </td>
      </tr>
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
         <div class="form-group col-sm-6">
            <label class="control-label">Role</label>
            <input type="text" class="form-control" id="edit_Role_name" name="edit_Role_name" required>
            <div class="help-block with-errors"></div>
         </div>
       </div>
       <div class="row">
        <div class="form-group col-sm-12">
           <label class="control-label">Description</label>
           <input type="text" class="form-control" id="edit_Role_desc" name="edit_Role_desc" required>
           <div class="help-block with-errors"></div>
        </div>
      </div>
         <div class="help-block with-errors"></div>
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
      var conf = confirm("Are you sure want to delete??");
      if(conf){
        var delete_url = $("#hidden_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST",
          data: {"id":id,_token: "{{ csrf_token() }}"},
          success: function(response){
            alert(response);
            location.reload();
          }
        });
      }
      else{
        return false;
      }
    }
function fun_status(id)
   {
        var status_url = $("#hidden_status").val();
        $.ajax({
          url: status_url,
          type:"POST",
          data: {"id":id,_token: "{{ csrf_token() }}"},
          success: function(response){
          alert(response);
          }
        });
   }
</script>
@endsection
