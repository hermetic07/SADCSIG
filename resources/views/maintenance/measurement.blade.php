@extends('maintenance.master')

@section('Maintenance Title')Measurements @endsection

@section('addaction')"/measurement-Add"@endsection

@section('addmodaltitle') Add new unit of measurement for body attributes @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Type of Measurement</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="name" name="name" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
@endsection

@section('mtitle') Measurements  @endsection
@section('mtitle2') <a href="{{url('/Measurement')}}">  Measurements </a>  @endsection

@section('theads')
    <th>Measurement</th>
    <th data-hide="phone, tablet" data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($measurements as $measurement)
        @if($measurement->status !== "deleted")
        <tr class="item{{$measurement->id}}">
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
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$measurement -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$measurement -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>
           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/measurement-view'@endsection
@section('hiddenedeleteurl')'/measurement-delete'@endsection
@section('hiddenestatusurl')'/measurement-status'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/measurement-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group col-md-12">
        <div class="row">
            <label class="control-label">Size</label>
            <input type="text" class="form-control" id="edit_size" name="edit_size" required>
            <div class="help-block with-errors"></div>
       </div>
      </div>
@endsection

@section('ajaxscript')

<script>
$("#add").click(function() {

    $.ajax({
        type: 'post',
        url: '/measurement-Add',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#name').val(),
        },
        success: function(data) {
            if ((data.errors)){
              $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
            }
            else {
                $('.error').addClass('hidden');
                $('#table').append("<tr class='item" + data.id + "'><td>" + data.name + "</td><td> <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div> </td><td><button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button></td></tr>");
                $('#name').val('');
            }
        },

    });

    $('#Edit').modal('hide');
});

$("#edd").click(function() {

  $.ajax({
      type: 'post',
      url: '/measurement-Update',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#edit_id").val(),
          'name': $('#edit_size').val(),
      },
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.name + "</td><td> <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div> </td><td><button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button></td></tr>");
          $('#edit_size').val('');
      }
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
        $("#edit_size").text(result.name);
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
        $("#edit_size").val(result.name);
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
