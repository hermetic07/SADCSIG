@extends('maintenance.master')

@section('Maintenance Title') Provinces @endsection

@section('addaction')"/Province-Add"@endsection

@section('addmodaltitle') Add Province @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Province's Name</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="Province_Name" name="Province_Name" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
@endsection

@section('mtitle') Provinces @endsection
@section('mtitle2')<a href="{{url('/Province')}}"> Provinces </a> @endsection

@section('theads')
    <th>Province</th>
    <th data-hide="phone, tablet" data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($Provinces as $Province)
      @if($Province->status !== "deleted")
      <tr>
         <td>{!!$Province->id!!}</td>
         <td>{!!$Province->name!!}</td>
         <td>
           @if($Province->status === "active")
           <div class="onoffswitch2">
  <input type="checkbox" onchange="fun_status('{!!$Province -> id!!}')" name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Province -> id!!}" checked>
  <label class="onoffswitch2-label" for="{!!$Province -> id!!}">
      <span class="onoffswitch2-inner"></span>
      <span class="onoffswitch2-switch"></span>
  </label>
</div>

           @else
           <div class="onoffswitch2">
  <input type="checkbox" onchange="fun_status('{!!$Province -> id!!}')" name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Province -> id!!}">
  <label class="onoffswitch2-label" for="{!!$Province -> id!!}">
      <span class="onoffswitch2-inner"></span>
      <span class="onoffswitch2-switch"></span>
  </label>
</div>
           @endif
         </td>
         <td>
            <a class="mytooltip tooltip-effect-7" href="#">   <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Province -> id!!}')" ><i class='fa fa-edit'></i></button><span class="tooltip-table">Edit</span></a>
&nbsp;
            <a class="mytooltip tooltip-effect-7"  href="#">  <button type="button" class="btn btn-danger btn-circle sa-params" onclick="fun_delete('{!!$Province -> id!!}')"><i class="fa fa-times"> </i></button><span class="tooltip-table">Delete</span></a>
         </td>
      </tr>
      @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Province-view'@endsection
@section('hiddenedeleteurl')'/Province-delete'@endsection
@section('hiddenestatusurl')'/Province-status'@endsection

@section('tdcolspan')"4"@endsection

@section('editmodalurl')"{{ url('/Province-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-12">
            <label class="control-label">Province</label>
            <input type="text" class="form-control" id="edit_Province_name" name="edit_Province_name" required>
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
        $("#edit_Province_name").text(result.name);
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
        $("#edit_Province_name").val(result.name);
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
