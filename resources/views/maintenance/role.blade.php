@extends('maintenance.master')

@section('Maintenance Title') Roles @endsection

@section('addaction')"/Role-Add"@endsection

@section('addmodaltitle') Add new guard's role @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Role</label>
    <div class="col-md-12">
      <input type="text" class="form-control" id="Role_Name" name="Role_Name"  pattern="[.,--&\\'a-zA-Z0-9\s]+" maxlength="200" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="control-label  col-md-12">Description</label>
            <div class="col-md-12">
              <textarea  class="form-control" id="Role_desc"  name="Role_desc"  pattern="[.,--&\\'a-zA-Z0-9\s]+" rows="5" required></textarea>
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>
@endsection

@section('mtitle') Guard's Roles @endsection
@section('mtitle2') <a href="{{url('/Role')}}"> Roles </a> @endsection

@section('theads')
    <th>Role</th>
    <th>Description</th>
@endsection

@section('tbodies')
      @foreach($Roles as $Role)
        @if($Role->status !== "deleted")
        <tr class="item{{$Role->id}}">
           <td>{!!$Role->name!!}</td>
           <td>{!!$Role->description!!}</td>
           <td>
             @if($Role->status === "active")
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Role -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Role -> id!!}" checked>
    <label class="onoffswitch2-label" for="{!!$Role -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Role -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Role -> id!!}" >
    <label class="onoffswitch2-label" for="{!!$Role -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @endif
           </td>
           <td>
             &nbsp;
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit"  onclick="fun_edit('{!!$Role -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$Role -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>


           </td>
        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Role-view'@endsection
@section('hiddenedeleteurl')'/Role-delete'@endsection
@section('hiddenestatusurl')'/Role-status'@endsection

@section('editmodalurl')"{{ url('/Role-Update') }}"@endsection

@section('editmodalcontent')
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Role</label>
    <div class="col-md-12">
            <input type="text" class="form-control" id="edit_Role_name" name="edit_Role_name" pattern="[.,--&\\'a-zA-Z0-9\s]+" maxlength="200" required>
      <div class="help-block with-errors"></div>
    </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="control-label  col-md-12">Description</label>
            <div class="col-md-12">
              <textarea class="form-control" id="edit_Role_desc" name="edit_Role_desc"   pattern="[.,--&\\'a-zA-Z0-9\s]+" rows="5" required></textarea>
              <div class="help-block with-errors"></div>
            </div>
                  </div>
                </div>


@endsection

@section('ajaxscript')
<script>
$("#add").click(function() {
$('.form-group').find('.help-block').show();
    $.ajax({
        type: 'post',
        url: '/Role-Add',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#Role_Name').val(),
            'description': $('#Role_desc').val(),
        },
        success: function(data) {

          if ((data.errors)){
            if ((data.errors)=="ERROR!! The value that you entered is already existing") {
              $.toast({
   heading: 'The value that you entered is already existing',
   position: 'top-right',
   loaderBg:'#ff6849',
   icon: 'error',
   hideAfter: 3500,
   stack: 6
 });
            }
          }
            else {
              $(document).ready(function() {
              var t = $('#table').DataTable();
                  t.row.add( [
                  $('input[name=Role_Name]').val(),
                  $('#Role_desc').val(),
                  "  <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
                  " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

                  ] ).draw( false );
                    } );
                    $('#Add').modal('hide');
                    $('.error').addClass('hidden');
                    var text = $('#Role_Name').val();
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
$('.form-group').find('.help-block').show();
  $.ajax({
      type: 'post',
      url: '/Role-Update',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#edit_id").val(),
          'name': $('#edit_Role_name').val(),
          'description': $('#edit_Role_desc').val(),
      },
      success: function(data) {
        $(document).ready(function() {
        var t = $('#table').DataTable();

          t.row('.selected').remove().draw( false );

        t.row.add( [
         $('#edit_Role_name').val(),
         $('#edit_Role_desc').val(),
         " <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
          " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

        ] ).draw( false );
        $('#Edit').modal('hide');
            var text2 = $('#edit_Role_name').val();
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
        $("#edit_Role_name").text(result.name);
        $("#edit_Role_desc").text(result.description);
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
        $("#edit_Role_name").val(result.name);
        $("#edit_Role_desc").val(result.description);
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
