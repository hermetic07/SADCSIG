@extends('maintenance.master')

@section('Maintenance Title')Services @endsection

@section('addaction')"/Service-Add"@endsection

@section('addmodaltitle') Add New Service @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Service's Name</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="name" name="name"  pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
      <div class="help-block with-errors"></div>
    </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="control-label  col-md-12">Description</label>
            <div class="col-md-12">
              <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
              <div class="help-block with-errors"></div>
            </div>
                  </div>
                </div>
@endsection

@section('mtitle') Services @endsection
@section('mtitle2')<a href="{{url('/Service')}}"> Services</a> @endsection

@section('theads')
    <th>Service's Name</th>
    <th >Description</th>
    <th  width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($services as $service)
        @if($service->status !== "deleted")
        <tr class="item{{$service->id}}">
           <td>{!!$service->name!!}</td>
           <td>{!!$service->description!!}</td>
           <td>

             @if($service->status === "active")
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$service -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$service -> id!!}" checked>
    <label class="onoffswitch2-label" for="{!!$service -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$service -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$service -> id!!}" >
    <label class="onoffswitch2-label" for="{!!$service -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @endif
           </td>
           <td>
             &nbsp;
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit"  onclick="fun_edit('{!!$service -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$service -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>


           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Service-view'@endsection
@section('hiddenedeleteurl')'/Service-delete'@endsection
@section('hiddenestatusurl')'/Service-status'@endsection


@section('editmodalurl')"{{ url('/Service-Update') }}"@endsection

@section('editmodalcontent')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Service's Name</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="edit_Service_name" name="edit_Service_name"  pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
      <div class="help-block with-errors"></div>
    </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="control-label  col-md-12">Description</label>
            <div class="col-md-12">
              <textarea class="form-control"  id="edit_Service_desc" name="edit_Service_desc" rows="5" required></textarea>
              <div class="help-block with-errors"></div>
            </div>
                  </div>
                </div>
@endsection

@section('ajaxscript')
<script>
$("#add").click(function() {

    $.ajax({
        type: 'post',
        url: '/Service-Add',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val(),
            'description': $('#description').val(),
        },
        success: function(data) {
            if ((data.errors)){
              alert(data.errors);
            }
            else {

                $(document).ready(function() {
                var t = $('#table').DataTable();
                    t.row.add( [
                    $('input[name=name]').val(),
                    $('#description').val(),
                    "  <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
                    " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

                    ] ).draw( false );
                  } );
                  $('#Add').modal('hide');
                  $('.error').addClass('hidden');
                  var text = $('#name').val();
                  $(document).ready(function() {
                      $.toast({
                          heading: text+" has been successfully added",
                          position: 'top-right',
                          loaderBg:'#ff6849',
                          icon: 'success',
                          hideAfter: 3500,
                          stack: 6
                      });
                  });
             }
        },

    });

});

$("#edd").click(function() {

  $.ajax({
      type: 'post',
      url: '/Service-Update',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#edit_id").val(),
          'name': $('#edit_Service_name').val(),
          'description': $('#edit_Service_desc').val(),
      },
      success: function(data) {

        $(document).ready(function() {
        var t = $('#table').DataTable();

        t.row().remove(this);

        t.row.add( [
         $('#edit_Service_name').val(),
         $('#edit_Service_desc').val(),
         " <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
          " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

        ] ).draw( false );
        $('#Edit').modal('hide');
            var text2 = $('#edit_Nature_name').val();
                    $(document).ready(function() {
                               $.toast({
                                heading: text2 +" has been successfully updated",
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                stack: 6
                              });
                    });

          } );
      }
  });
});


</script>


<script type="text/javascript">
        $(document).ready(function(){
          $('#table').DataTable({

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
