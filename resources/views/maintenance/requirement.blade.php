@extends('maintenance.master')

@section('Maintenance Title')Guard Requirements of Business @endsection

@section('addaction')"/Requirement-Add"@endsection

@section('addmodaltitle') Add New Requirement @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Requirement Name</label>
  <div class="col-md-5">
    <input type="text" class="form-control" id="Requirements_Name" name="Requirements_Name" required>
    <div class="help-block with-errors"></div>
  </div>
</div>
@endsection

@section('mtitle') Requirements @endsection
@section('mtitle2') Requirements @endsection

@section('theads')
    <th>Name</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($requirements as $requirement)
      <tr>
         <td>{!!$requirement->id!!}</td>
         <td>{!!$requirement->name!!}</td>
         <td>
           @if($requirement->status === "active")
            <input type="checkbox" onchange="fun_status('{!!$requirement -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
           @else
             <input type="checkbox" onchange="fun_status('{!!$requirement -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
           @endif
         </td>
         <td>
             <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$requirement -> id!!}')" ><i class='fa fa-edit'></i></button>
             <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$requirement -> id!!}')"><i class="fa fa-times"> </i></button>
         </td>
      </tr>
      @endforeach
@endsection
@section('hiddenediturl')'/Requirement-view'@endsection
@section('hiddenedeleteurl')'/Requirement-delete'@endsection
@section('hiddenestatusurl')'/Requirement-status'@endsection

@section('tdcolspan')"4"@endsection

@section('editmodalurl')"{{ url('/Requirement-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-6">
            <label class="control-label">Requirement</label>
            <input type="text" class="form-control" id="edit_Requirements_name" name="edit_Requirements_name" required>
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
        $("#edit_Requirements_name").text(result.name);
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
        $("#edit_Requirements_name").val(result.name);
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
