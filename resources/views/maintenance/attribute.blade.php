@extends('maintenance.master')

@section('Maintenance Title')Attributes @endsection

@section('addaction')"/Attribute-Add"@endsection

@section('addmodaltitle') Add Attribute or Clearance @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Attribute</label>
  <div class="col-md-5">
    <input type="text" class="form-control" id="Attribute_Name" name="Attribute_Name" required>
    <div class="help-block with-errors"></div>
  </div>
  <label class="control-abel col-md-12">Unit of Measurement</label>
  <div class="col-md-5">
    <select class="form-control" id="Attribute_Unit" name="Attribute_Unit">
      @foreach($Measurements as $m)
      <option value="{!!$m->name!!}">{!!$m->name!!}</option>
      @endforeach
    </select>
  </div>
</div>
@endsection

@section('mtitle') Attribute @endsection
@section('mtitle2') Attribute @endsection

@section('theads')
    <th>Name</th>
    <th>Type of Measurement</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($Attributes as $Attribute)
        @if($Attribute->status !== "deleted")
        <tr>
           <td>{!!$Attribute->id!!}</td>
           <td>{!!$Attribute->name!!}</td>
           <td>{!!$Attribute->measurements->name!!}</td>
           <td>
             @if($Attribute->status === "active")
              <input type="checkbox" onchange="fun_status('{!!$Attribute -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
             @else
               <input type="checkbox" onchange="fun_status('{!!$Attribute -> id!!}')" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
             @endif
           </td>
           <td>
               <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Attribute -> id!!}')" ><i class='fa fa-edit'></i></button>
               <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$Attribute -> id!!}')"><i class="fa fa-times"> </i></button>
           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Attribute-view'@endsection
@section('hiddenedeleteurl')'/Attribute-delete'@endsection
@section('hiddenestatusurl')'/Attribute-status'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/Attribute-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-6">
            <label class="control-label">Attribute</label>
            <input type="text" class="form-control" id="edit_Attribute_name" name="edit_Attribute_name" required>
            <div class="help-block with-errors"></div>
         </div>
         <label class="control-abel col-md-12">Unit of Measurement</label>
         <div class="col-md-6">
           <select class="form-control" id="edit_Attribute_Unit" name="edit_Attribute_Unit">
             @foreach($Measurements as $m)
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
        $("#edit_Attribute_name").text(result.name);
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
        $("#edit_Attribute_name").val(result.name);
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
