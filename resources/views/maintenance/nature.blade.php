@extends('maintenance.master')

@section('Maintenance Title')Nature of Business @endsection

@section('addaction')"/Nature-Add"@endsection

@section('addmodaltitle') Add Nature of Business @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Type of Business</label>
  <div class="col-md-5">
    <input type="text" class="form-control" id="Nature_Name" name="Nature_Name" required>
    <div class="help-block with-errors"></div>
  </div>
</div>
@endsection

@section('mtitle') Nature of Business @endsection
@section('mtitle2') Nature of Business @endsection

@section('theads')
    <th>Name</th>
    <th width="100px">Status</th>
@endsection

@section('tbodies')
      @foreach($natures as $nature)
      <tr>
         <td>{!!$nature->id!!}</td>
         <td>{!!$nature->name!!}</td>
         <td>
           @if($nature->status === "active")
            <input type="checkbox" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181" checked=""/>
           @else
             <input type="checkbox" class="js-switch"  data-color="#DF4747" data-secondary-color="#818181"/>
           @endif
         </td>
         <td>
             <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$nature -> id!!}')" ><i class='fa fa-edit'></i></button>
             <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$nature -> id!!}')"><i class="fa fa-times"> </i></button>
         </td>
      </tr>
      @endforeach
@endsection
@section('hiddenediturl')'/Nature-view'@endsection
@section('hiddenedeleteurl')'/Nature-delete'@endsection

@section('tdcolspan')"4"@endsection

@section('editmodalurl')"{{ url('/Nature-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-6">
            <label class="control-label">Nature of Business</label>
            <input type="text" class="form-control" id="edit_Nature_name" name="edit_Nature_name" required>
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
        $("#edit_Nature_name").text(result.name);
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
        $("#edit_Nature_name").val(result.name);
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
