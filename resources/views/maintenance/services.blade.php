@extends('maintenance.master')

@section('Maintenance Title')Services @endsection

@section('addaction')"/Service-Add"@endsection

@section('addmodaltitle') Add Service @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Name</label>
  <div class="col-md-5">
    <input type="text" class="form-control" id="Service_Name" name="Service_Name" required>
    <div class="help-block with-errors"></div>
  </div>
  <label class="control-label  col-md-12">Description</label>
  <div class="col-md-10">
    <input type="text" class="form-control" id="description" name="description" required>
    <div class="help-block with-errors"></div>
  </div>
</div>
@endsection

@section('mtitle') Services @endsection
@section('mtitle2') Services @endsection

@section('theads')
    <th>Name</th>
    <th>Description</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($services as $service)
      <tr>
         <td>{!!$service->id!!}</td>
         <td>{!!$service->name!!}</td>
         <td>{!!$service->description!!}</td>
         <td>
           @if($service->status === "active")
            <input type="checkbox" onchange="fun_status('{!!$service -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
           @else
             <input type="checkbox" onchange="fun_status('{!!$service -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
           @endif
         </td>
         <td>
             <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$service -> id!!}')" ><i class='fa fa-edit'></i></button>
             <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$service -> id!!}')"><i class="fa fa-times"> </i></button>
         </td>
      </tr>
      @endforeach
@endsection
@section('hiddenediturl')'/Service-view'@endsection
@section('hiddenedeleteurl')'/Service-delete'@endsection
@section('hiddenestatusurl')'/Service-status'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/Service-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-6">
            <label class="control-label">Service Name</label>
            <input type="text" class="form-control" id="edit_Service_name" name="edit_Service_name" required>
            <div class="help-block with-errors"></div>
         </div>
       </div>
       <div class="row">
         <div class="form-group col-sm-12">
            <label class="control-label">Service Description</label>
            <input type="text" class="form-control" id="edit_Service_desc" name="edit_Service_desc" required>
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
        $("#edit_Service_name").text(result.name);
        $("#edit_Service_desc").text(result.description);
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
        $("#edit_Service_name").val(result.name);
        $("#edit_Service_desc").val(result.description);

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
