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
  <div class="col-md-12">
    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
    <div class="help-block with-errors"></div>
  </div>
</div>
@endsection

@section('mtitle') Services @endsection
@section('mtitle2')<a href="{{url('/Service')}}"> Services</a>@endsection

@section('theads')
    <th>Service Name</th>
    <th>Description</th>
    <th data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($services as $service)
      <tr>
         <td>{!!$service->id!!}</td>
         <td>{!!$service->name!!}</td>
         <td>{!!$service->description!!}</td>
         <td>
           @if($service->status === "active")
           <div class="onoffswitch2">
             <input type="checkbox" name="onoffswitch2" class="onoffswitch2-checkbox sw" id="IDngDataNato" checked>
              <label class="onoffswitch2-label" for="IDngDataNato">
                <span class="onoffswitch2-inner"></span>
                <span class="onoffswitch2-switch"></span>
              </label>
            </div>
           @else
           <div class="onoffswitch2">
             <input type="checkbox" name="onoffswitch2" class="onoffswitch2-checkbox sw" id="IDngDataNato" checked>
              <label class="onoffswitch2-label" for="IDngDataNato">
                <span class="onoffswitch2-inner"></span>
                <span class="onoffswitch2-switch"></span>
              </label>
            </div>
           @endif
         </td>
         <td>
           <a class="mytooltip tooltip-effect-7">      <button type="button" class="btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$service -> id!!}')" ><i class='fa fa-edit'></i></button><span class="tooltip-content2">Edit</span></a>
  &nbsp;
         <a class="mytooltip tooltip-effect-7">    <button type="button" class="btn btn-info btn-circle" onclick="fun_delete('{!!$service -> id!!}')"><i class="fa fa-times"> </i></button><span class="tooltip-content2">Delete</span></a>

         </td>
      </tr>
      @endforeach
@endsection
@section('hiddenediturl')'/Service-view'@endsection
@section('hiddenedeleteurl')'/Service-delete'@endsection

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
                  data: {"id":id,_token: "{{ csrf_token() }}"},
                  success: function(){
          swal({
              title: "Deleted",
              text: "This data has been successfully deleted",
              type: "success"
          },function() {
              location.reload();
          });
                  }
      });
  });

    }
</script>
@endsection
