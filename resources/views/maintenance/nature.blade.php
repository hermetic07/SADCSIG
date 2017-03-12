@extends('maintenance.master')

@section('Maintenance Title')Nature of Business @endsection

@section('addaction')"/Nature-Add"@endsection

@section('addmodaltitle') Add new nature of business @endsection

@section('addmodalbody')

<div class="row">
<div class="form-group col-sm-8">

  <label class="control-label  col-md-12">Nature of Business</label>
  <div class="col-md-12">
    <input type="text" class="form-control" id="Nature_Name" name="Nature_Name" pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
    <div class="help-block with-errors"></div>
  </div>
</div>

<div class="form-group col-sm-4">

<label class="control-label col-md-12">Rate</label>
  <div class="col-md-12">
<input type="number" class="form-control"  min="1" required>
<div class="help-block with-errors"></div>
</div>
</div>
</div>

@endsection

@section('mtitle') Nature of Business @endsection
@section('mtitle2') <a href="{{url('/Nature')}}"> Nature of Business </a> @endsection

@section('theads')
    <th>Type of business</th>
    <th width="100px">Rate</th>
    <th width="150px">Status</th>
@endsection

@section('tbodies')
      @foreach($natures as $nature)
      @if($nature->status !== "deleted")
      <tr>
         <td>{!!$nature->name!!}</td>
         <td>50000</td>
         <td>
           @if($nature->status === "active")
           <div class="onoffswitch2">
  <input type="checkbox" onchange="fun_status('{!!$nature -> id!!}')" name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$nature -> id!!}" checked>
  <label class="onoffswitch2-label" for="{!!$nature -> id!!}">
      <span class="onoffswitch2-inner"></span>
      <span class="onoffswitch2-switch"></span>
  </label>
</div>

           @else
           <div class="onoffswitch2">
  <input type="checkbox" onchange="fun_status('{!!$nature -> id!!}')" name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$nature -> id!!}">
  <label class="onoffswitch2-label" for="{!!$nature -> id!!}">
      <span class="onoffswitch2-inner"></span>
      <span class="onoffswitch2-switch"></span>
  </label>
</div>
           @endif
         </td>
         <td>
           &nbsp;
           <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit"onclick="fun_edit('{!!$nature -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
          <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$nature -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>

         </td>
      </tr>
      @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Nature-view'@endsection
@section('hiddenedeleteurl')'/Nature-delete'@endsection
@section('hiddenestatusurl')'/Nature-status'@endsection

@section('editmodalurl')"{{ url('/Nature-Update') }}"@endsection

@section('editmodalcontent')
<div class="row">
<div class="form-group col-sm-8">

  <label class="control-label  col-md-12">Nature of Business</label>
  <div class="col-md-12">
    <input type="text" class="form-control" id="edit_Nature_name" name="edit_Nature_name" pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
    <div class="help-block with-errors"></div>
  </div>
</div>

<div class="form-group col-sm-4">

<label class="control-label col-md-12">Rate</label>
  <div class="col-md-12">
<input type="number" class="form-control"  min="1" required>
<div class="help-block with-errors"></div>
</div>
</div>
</div>
@endsection

@section('ajaxscript')
<script type="text/javascript">
        $(document).ready(function(){
          $('#myTable').DataTable({

            "columnDefs": [
              {
"targets": 3,
"orderable": false
},
{
"targets": 2,
"orderable": false
},
            { "searchable": false, "targets": 3 },
          ]
          });


      });
    </script>

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
