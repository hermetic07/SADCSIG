@extends('maintenance.master')

@section('Maintenance Title')Area @endsection

@section('addaction')"/Area-Add"@endsection

@section('addmodaltitle') Add new area for province @endsection

@section('addmodalbody')

<div class="form-group">
  <div class="row">
    <div class="col-md-12">
      <label  class="control-label" >Choose Province</label>
      <select required class="form-control" id="Area_Unit" name="Area_Unit">
        <option value="">None</option>
        @foreach($Provinces as $m)
          @if($m->status === "active")
            <option value="{!!$m->name!!}">{!!$m->name!!}</option>
          @endif
        @endforeach
      </select>
        <div class="help-block with-errors"></div>
    </div>
          </div>
</div>
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Area's name</label>
    <div class="col-md-12">
    <input type="text" class="form-control" id="Area_Name" name="Area_Name" pattern="[.,--&\\'a-zA-Z0-9\s]+" required >
      <div class="help-block with-errors"></div>
              </div>
          </div>

        </div>


@endsection

@section('mtitle') Area @endsection
@section('mtitle2') <a href="{{url('/Area')}}"> Area </a> @endsection

@section('theads')
    <th>Area</th>
    <th>Province</th>
    <th width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($Areas as $Area)
        @if($Area->status !== "deleted")
        <tr class="item{{$Area->id}}">
           <td>{!!$Area->name!!}</td>
           <td>{!!$Area->province!!}</td>
           <td>
             @if($Area->status === "active")
             <div class="onoffswitch2">
                <input type="checkbox" onchange="fun_status('{!!$Area -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Area -> id!!}" checked>
                <label class="onoffswitch2-label" for="{!!$Area -> id!!}">
                    <span class="onoffswitch2-inner"></span>
                    <span class="onoffswitch2-switch"></span>
                </label>
            </div>
             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Area -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Area -> id!!}">
    <label class="onoffswitch2-label" for="{!!$Area -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
   </div>
             @endif
           </td>
           <td>
             &nbsp;
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Area -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$Area -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>

        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Area-view'@endsection
@section('hiddenedeleteurl')'/Area-delete'@endsection
@section('hiddenestatusurl')'/Area-status'@endsection
@section('editmodalurl')"{{ url('/Area-Update') }}"@endsection

@section('editmodalcontent')
<div class="form-group">
  <div class="row">
    <div class="col-md-12">
      <label  class="control-label" >Choose Province</label>
      <select required class="form-control" id="edit_Area_Unit" name="edit_Area_Unit">
        <option value="">None</option>
        @foreach($Provinces as $m)
          @if($m->status === "active")
            <option value="{!!$m->name!!}">{!!$m->name!!}</option>
          @endif
        @endforeach
      </select>
        <div class="help-block with-errors"></div>
    </div>
          </div>
        </div>
<div class="form-group">
  <div class="row">
    <label class="control-label  col-md-12">Area's name</label>
    <div class="col-md-12">
            <input type="text" required class="form-control" id="edit_Area_name" pattern="[.,--&\\'a-zA-Z0-9\s]+" name="edit_Area_name">
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
        url: '/Area-Add',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#Area_Name').val(),
            'selection': $('#Area_Unit').val(),
        },
        success: function(data) {

            if ((data.errors)){
              alert(data.errors);
            }
            else {

              $(document).ready(function() {
              var t = $('#table').DataTable();
                  t.row.add( [
                  $('input[name=Area_Name]').val(),
                  $('#Area_Unit').val(),
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
      url: '/Area-Update',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#edit_id").val(),
          'name': $('#edit_Area_name').val(),
          'selection': $('#edit_Area_Unit').val(),
      },
      success: function(data) {
        $(document).ready(function() {
        var t = $('#table').DataTable();

          t.row('.selected').remove().draw( false );

        t.row.add( [
         $('#edit_Area_name').val(),
         $('#edit_Area_Unit').val(),
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
        $("#edit_Area_name").text(result.name);
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
        $("#edit_Area_name").val(result.name);
        $("#edit_Area_Unit").val(result.province);
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
