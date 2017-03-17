@extends('maintenance.master')

@section('Maintenance Title') Leave @endsection

@section('addaction')"/Leave-Add"@endsection

@section('addmodaltitle') Add new type of leave for guards @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Type of Leave</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="Leave_Name" name="Leave_Name" pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
  <div class="row">
<div class="form-group col-sm-6">

    <label class="control-label  col-md-6">Numbers of days allowed</label>
    <div class="col-md-6">
      <input type="number" class="form-control" id="Leave_span" name="Leave_span" min="1" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>

<div class="form-group col-sm-6">

  <label class="control-label col-md-6">Notification period</label>
    <div class="col-md-6">
  <input type="number" class="form-control"  id="Leave_not" name="Leave_not" min="1" required>
  <div class="help-block with-errors"></div>
</div>
</div>
</div>



@endsection

@section('mtitle') Guard's Leave @endsection
@section('mtitle2') <a href="{{url('/Leave')}}"> Leave </a> @endsection

@section('theads')
    <th>Type of leave</th>
    <th>Numbers of days allowed</th>
    <th>Notification period</th>
    <th width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($Leaves as $Leave)
        @if($Leave->status !== "deleted")
        <tr class="item{{$Leave->id}}">
           <td>{!!$Leave->name!!}</td>
           <td>{!!$Leave->days!!}</td>
           <td>{!!$Leave->notification!!}</td>
           <td>
             @if($Leave->status === "active")
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Leave -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Leave -> id!!}" checked>
    <label class="onoffswitch2-label" for="{!!$Leave -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>

             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Leave -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Leave -> id!!}">
    <label class="onoffswitch2-label" for="{!!$Leave -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
   </div>
             @endif
           </td>
           <td>
             &nbsp;
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit"  onclick="fun_edit('{!!$Leave -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$Leave -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>

        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Leave-view'@endsection
@section('hiddenedeleteurl')'/Leave-delete'@endsection
@section('hiddenestatusurl')'/Leave-status'@endsection
@section('editmodalurl')"{{ url('/Leave-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
         <div class="form-group col-sm-12">
            <label class="control-label">Type of leave</label>
            <input type="text" class="form-control" id="edit_Leave_name" name="edit_Leave_name" pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
            <div class="help-block with-errors"></div>
         </div>
       </div>
      </div>
      <div class="row">
    <div class="form-group col-sm-6">

        <label class="control-label  col-md-6">Numbers of days allowed</label>
        <div class="col-md-6">
          <input type="number" class="form-control"  id="edit_Leave_span" name="edit_Leave_span" min="1" required>
          <div class="help-block with-errors"></div>
        </div>
      </div>

    <div class="form-group col-sm-6">

      <label class="control-label col-md-6">Notification period</label>
        <div class="col-md-6">
      <input type="number" class="form-control"  id="edit_Leave_not" name="edit_Leave_not" min="1" required>
      <div class="help-block with-errors"></div>
    </div>
    </div>
    </div>
@endsection

@section('ajaxscript')
<script type="text/javascript">
        $(document).ready(function(){
          $('#table').DataTable({

            "columnDefs": [
              {
"targets": 4,
"orderable": false
},
{
"targets": 3,
"orderable": false
},
            { "searchable": false, "targets": 4 },
          ]
          });


      });
    </script>
<script>
$("#add").click(function() {

    $.ajax({
        type: 'post',
        url: '/Leave-Add',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#Leave_Name').val(),
            'days': $('#Leave_span').val(),
            'notification': $('#Leave_not').val(),

        },
        success: function(data) {
          if ((data.errors)){
            if ((data.errors)=="ERROR!! The value that you entered is already existing") {
              alert(data.errors);
            }
          }
          else {
            $(document).ready(function() {
            var t = $('#table').DataTable();
                t.row.add( [
                $('input[name=Leave_Name]').val(),
                $('#Leave_span').val(),
                $('#Leave_not').val(),
                "  <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
                " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

                ] ).draw( false );
                  } );
                  $('#Add').modal('hide');
                  $('.error').addClass('hidden');
                  var text = $('#Leave_Name').val();
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

    $('#Edit').modal('hide');
});

$("#edd").click(function() {

  $.ajax({
      type: 'post',
      url: '/Leave-Update',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#edit_id").val(),
          'name': $('#edit_Leave_name').val(),
          'days': $('#edit_Leave_span').val(),
          'notification': $('#edit_Leave_not').val(),
      },
      success: function(data) {
        $(document).ready(function() {
        var t = $('#table').DataTable();

      t.row('.selected').remove().draw( false );

        t.row.add( [
         $('#edit_Leave_name').val(),
         $('#edit_Leave_span').val(),
         $('#edit_Leave_not').val(),
         " <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
          " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

        ] ).draw( false );
        $('#Edit').modal('hide');
            var text2 = $('#edit_Leave_name').val();
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
          $('#myTable').DataTable({

            "columnDefs": [
              {
"targets": 4,
"orderable": false
},
{
"targets": 3,
"orderable": false
},
            { "searchable": false, "targets": 4 },
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
        $("#edit_Leave_name").text(result.name);
        $("#edit_Leave_span").text(result.days);
        $("#edit_Leave_not").text(result.notification);
      }
    });
  }

  function fun_edit(id)
  {
    var table = $('#table').DataTable();

    $('#table tbody').on( 'click', 'tr', function () {

            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');

    } );
    var view_url = $("#hidden_view").val();
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
        //console.log(result);
        $("#edit_id").val(result.id);
        $("#edit_Leave_name").val(result.name);
        $("#edit_Leave_span").val(result.days);
        $("#edit_Leave_not").val(result.notification);
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
