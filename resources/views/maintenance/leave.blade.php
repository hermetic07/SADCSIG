@extends('maintenance.master')

@section('Maintenance Title') Leaves @endsection

@section('addaction')"/Leave-Add"@endsection

@section('addmodaltitle') Add Leave @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Type of Leave</label>
  <div class="col-md-12">
    <input type="text" class="form-control" id="Leave_Name" name="Leave_Name" required>
    <div class="help-block with-errors"></div>
  </div>
</div>
@endsection

@section('mtitle') Guard Leaves @endsection
@section('mtitle2') Leaves @endsection

@section('theads')
    <th>Name</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($Leaves as $Leave)
      <tr>
         <td>{!!$Leave->id!!}</td>
         <td>{!!$Leave->name!!}</td>
         <td>
           @if($Leave->status === "active")
            <input type="checkbox" onchange="fun_status('{!!$Leave -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
           @else
             <input type="checkbox" onchange="fun_status('{!!$Leave -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
           @endif
         </td>
         <td>
             <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Leave -> id!!}')" ><i class='fa fa-edit'></i></button>
             <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$Leave -> id!!}')"><i class="fa fa-times"> </i></button>
         </td>
      </tr>
      @endforeach
@endsection
@section('hiddenediturl')'/Leave-view'@endsection
@section('hiddenedeleteurl')'/Leave-delete'@endsection
@section('hiddenestatusurl')'/Leave-status'@endsection

@section('tdcolspan')"4"@endsection

@section('editmodalurl')"{{ url('/Leave-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-12">
            <label class="control-label">Leave</label>
            <input type="text" class="form-control" id="edit_Leave_name" name="edit_Leave_name" required>
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
        $("#edit_Leave_name").text(result.name);
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
