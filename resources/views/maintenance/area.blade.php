@extends('maintenance.master')

@section('Maintenance Title')Areas @endsection

@section('addaction')"/Area-Add"@endsection

@section('addmodaltitle') Add Area or Clearance @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Area</label>
  <div class="col-md-5">
    <input type="text" class="form-control" id="Area_Name" name="Area_Name" required>
    <div class="help-block with-errors"></div>
  </div>
  <label class="control-abel col-md-12">Province</label>
  <div class="col-md-5">
    <select class="form-control" id="Area_Unit" name="Area_Unit">
      @foreach($Provinces as $m)
      <option value="{!!$m->name!!}">{!!$m->name!!}</option>
      @endforeach
    </select>
  </div>
</div>
@endsection

@section('mtitle') Area @endsection
@section('mtitle2') Area @endsection

@section('theads')
    <th>Name</th>
    <th>Province</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($Areas as $Area)
      <tr>
         <td>{!!$Area->id!!}</td>
         <td>{!!$Area->name!!}</td>
         <td>{!!$Area->provinces->name!!}</td>
         <td>
           @if($Area->status === "active")
            <input type="checkbox" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
           @else
             <input type="checkbox" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
           @endif
         </td>
         <td>
             <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Area -> id!!}')" ><i class='fa fa-edit'></i></button>
             <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$Area -> id!!}')"><i class="fa fa-times"> </i></button>
         </td>
      </tr>
      @endforeach
@endsection
@section('hiddenediturl')'/Area-view'@endsection
@section('hiddenedeleteurl')'/Area-delete'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/Area-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-6">
            <label class="control-label">Area</label>
            <input type="text" class="form-control" id="edit_Area_name" name="edit_Area_name" required>
            <div class="help-block with-errors"></div>
         </div>
         <label class="control-abel col-md-12">Unit of Province</label>
         <div class="col-md-6">
           <select class="form-control" id="edit_Area_Unit" name="edit_Area_Unit">
             @foreach($Provinces as $m)
             <option value="{!!$m->name!!}">{!!$m->name!!}</option>
             @endforeach
           </select>
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
        $("#edit_Area_name").text(result.name);
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
        $("#edit_Area_name").val(result.name);
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
</script>
@endsection
