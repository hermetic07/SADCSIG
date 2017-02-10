@extends('maintenance.master')

@section('Maintenance Title')Unit of Measurement @endsection

@section('addaction')"/measurement-Add"@endsection

@section('addmodaltitle') Add new unit of measurement for body attributes @endsection

@section('addmodalbody')
<div class="row">
  <label class="control-label  col-md-12">Type of Measurement</label>
  <div class="col-md-12">
    <input type="text" class="form-control" id="measurement_Name" name="measurement_Name" required>
    <div class="help-block with-errors"></div>
  </div>
</div>
@endsection

@section('mtitle') Unit of Measurement  @endsection
@section('mtitle2') <a href="{{url('/Measurement')}}">  Unit of Measurement </a>  @endsection

@section('theads')
    <th>Unit of measurement</th>
    <th data-hide="phone, tablet" data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($measurements as $measurement)
        @if($measurement->status !== "deleted")
        <tr>
           <td>{!!$measurement->id!!}</td>
           <td>{!!$measurement->name!!}</td>
           <td>
             @if($measurement->status === "active")
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$measurement -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$measurement -> id!!}" checked>
    <label class="onoffswitch2-label" for="{!!$measurement -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>

             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$measurement -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$measurement -> id!!}">
    <label class="onoffswitch2-label" for="{!!$measurement -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @endif
           </td>
           <td>
      <a class="mytooltip tooltip-effect-7" href="#">           <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$measurement -> id!!}')" ><i class='fa fa-edit'></i></button><span class="tooltip-table">Edit</span></a>
        &nbsp;
      <a class="mytooltip tooltip-effect-7" href="#">           <button type="button" class="btn btn-info btn-circle sa-params" onclick="fun_delete('{!!$measurement -> id!!}')"><i class="fa fa-times"> </i></button><span class="tooltip-table">Delete</span></a>
           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/measurement-view'@endsection
@section('hiddenedeleteurl')'/measurement-delete'@endsection
@section('hiddenestatusurl')'/measurement-status'@endsection

@section('tdcolspan')"4"@endsection

@section('editmodalurl')"{{ url('/measurement-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-12">
            <label class="control-label">Type of measurement</label>
            <input type="text" class="form-control" id="edit_measurement_name" name="edit_measurement_name" required>
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
        $("#edit_measurement_name").text(result.name);
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
        $("#edit_measurement_name").val(result.name);
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
