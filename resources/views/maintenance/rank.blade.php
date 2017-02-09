@extends('maintenance.master')

@section('Maintenance Title')Ranks @endsection

@section('addaction')"/Rank-Add"@endsection

@section('addmodaltitle') Add Rank @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Rank</label>
  <div class="col-md-5">
    <input type="text" class="form-control" id="Rank_Name" name="Rank_Name" required>
    <div class="help-block with-errors"></div>
  </div>
  <label class="control-abel col-md-12">Type of Military Service</label>
  <div class="col-md-5">
    <select class="form-control" id="Rank_Unit" name="Rank_Unit">
      @foreach($Militaries as $m)
      <option value="{!!$m->name!!}">{!!$m->name!!}</option>
      @endforeach
    </select>
  </div>
</div>
@endsection

@section('mtitle') Rank @endsection
@section('mtitle2') Rank @endsection

@section('theads')
    <th>Name</th>
    <th>Type of Military Service</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($Ranks as $Rank)
      <tr>
         <td>{!!$Rank->id!!}</td>
         <td>{!!$Rank->name!!}</td>
         <td>{!!$Rank->military_services->name!!}</td>
         <td>
           @if($Rank->status === "active")
            <input type="checkbox" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
           @else
             <input type="checkbox" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
           @endif
         </td>
         <td>
             <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Rank -> id!!}')" ><i class='fa fa-edit'></i></button>
             <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$Rank -> id!!}')"><i class="fa fa-times"> </i></button>
         </td>
      </tr>
      @endforeach
@endsection
@section('hiddenediturl')'/Rank-view'@endsection
@section('hiddenedeleteurl')'/Rank-delete'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/Rank-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-6">
            <label class="control-label">Rank</label>
            <input type="text" class="form-control" id="edit_Rank_name" name="edit_Rank_name" required>
            <div class="help-block with-errors"></div>
         </div>
         <label class="control-abel col-md-12">Type Military Service</label>
         <div class="col-md-6">
           <select class="form-control" id="edit_Rank_Unit" name="edit_Rank_Unit">
             @foreach($Militaries as $m)
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
        $("#edit_Rank_name").text(result.name);
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
        $("#edit_Rank_name").val(result.name);
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
