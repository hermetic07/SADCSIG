@extends('maintenance.master')

@section('Maintenance Title')Requirements @endsection

@section('addaction')"/Requirement-Add"@endsection

@section('addmodaltitle') Add New requirement @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Requirement's Name</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="Requirements_Name" name="Requirements_Name"  pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
@endsection

@section('mtitle') Requirements @endsection
@section('mtitle2')<a href="{{url('/Requirement')}}"> Requirements</a> @endsection

@section('theads')
    <th>Requirement's name</th>
    <th width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($requirements as $requirement)
        @if($requirement->status !== "deleted")
        <tr class="item{{$requirement->id}}">
           <td>{!!$requirement->name!!}</td>
           <td>
             @if($requirement->status === "active")
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$requirement -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$requirement -> id!!}" checked>
    <label class="onoffswitch2-label" for="{!!$requirement -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$requirement -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$requirement -> id!!}" >
    <label class="onoffswitch2-label" for="{!!$requirement -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @endif
           </td>
           <td>
             &nbsp;
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$requirement -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$requirement -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>


           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Requirement-view'@endsection
@section('hiddenedeleteurl')'/Requirement-delete'@endsection
@section('hiddenestatusurl')'/Requirement-status'@endsection


@section('editmodalurl')"{{ url('/Requirement-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-12">
            <label class="control-label">Requirement's name</label>
            <input type="text" class="form-control" id="edit_Requirements_name" name="edit_Requirements_name"  pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
            <div class="help-block with-errors"></div>
         </div>
       </div>
         <div class="help-block with-errors"></div>
      </div>
@endsection

@section('ajaxscript')

<script>
$("#add").click(function(e) {
    $.ajax({
        type: 'post',
        url: '/Requirement-Add',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#Requirements_Name').val(),
        },
        success: function(data) {
            if ((data.errors)){

              $('.error').removeClass('hidden');

                $('.error').text(data.errors.name);
            }
            else {
                $('#Add').modal('hide');
                $('.error').addClass('hidden');
                $('#table').append("<tr class='item" + data.id + "'><td>" + data.name + "</td><td> <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div> </td><td><button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button></td></tr>");
                $('#Requirements_Name').val('');
            }
        },

    });

    $('#Edit').modal('hide');
});

$("#edd").click(function() {

  $.ajax({
      type: 'post',
      url: '/Requirement-Update',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#edit_id").val(),
          'name': $('#edit_Requirements_name').val(),
      },
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.name + "</td><td> <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div> </td><td><button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button></td></tr>");
          $('#edit_Requirements_name').val('');
      }
  });
});


</script>

<script type="text/javascript">
        $(document).ready(function(){
          $('#table').DataTable({

            "columnDefs": [
              {
"targets": 2,
"orderable": false
},
{
"targets": 1,
"orderable": false
},
            { "searchable": false, "targets": 2 },
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
