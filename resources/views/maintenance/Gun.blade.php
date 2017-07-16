@extends('maintenance.master')

@section('Maintenance Title')Guns @endsection

@section('addaction')"/Gun-Add"@endsection

@section('addmodaltitle') Add new Guns @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
        <label class="control-label" >Choose Gun Type</label>
    <div class="col-md-12">
      <select required class="form-control" id="GunType" name="GunType">
        <option value="">None</option>
        @foreach($A as $m)
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
    <label class="control-label">Gun Name</label>
    <div class="col-md-12">
    <input type="text" class="form-control" id="name" name="name"  maxlength="200" pattern="[.,--&\\'a-zA-Z0-9\s]+" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
</div>
@endsection

@section('mtitle') Guns  @endsection
@section('mtitle2') <a href="{{url('/Gun')}}">  Guns </a>  @endsection

@section('theads')
    <th>Gun</th>
    <th>Gun Type</th>
@endsection

@section('tbodies')
      @foreach($Guns as $Gun)
        @if($Gun->status !== "deleted")
        <tr class="item{{$Gun->id}}">
           <td>{!!$Gun->name!!}</td>
           <td>{!!$Gun->guntype->name!!}</td>
           <td>
             @if($Gun->status === "active")
             <div class="onoffswitch2">
                <input type="checkbox" onchange="fun_status('{!!$Gun -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Gun -> id!!}" checked>
                <label class="onoffswitch2-label" for="{!!$Gun -> id!!}">
                    <span class="onoffswitch2-inner"></span>
                    <span class="onoffswitch2-switch"></span>
                </label>
            </div>

             @else
             <div class="onoffswitch2">
    <input type="checkbox" onchange="fun_status('{!!$Gun -> id!!}')"  name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$Gun -> id!!}">
    <label class="onoffswitch2-label" for="{!!$Gun -> id!!}">
        <span class="onoffswitch2-inner"></span>
        <span class="onoffswitch2-switch"></span>
    </label>
</div>
             @endif
           </td>
           <td>
             &nbsp;
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$Gun -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive"onclick="fun_delete('{!!$Gun -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>

        </tr>
        @endif
      @endforeach
@endsection
@section('hiddenediturl')'/Gun-view'@endsection
@section('hiddenedeleteurl')'/Gun-delete'@endsection
@section('hiddenestatusurl')'/Gun-status'@endsection

@section('tdcolspan')"5"@endsection

@section('editmodalurl')"{{ url('/Gun-Update') }}"@endsection

@section('editmodalcontent')
      <div class="form-group">
        <div class="row">
                <label  class="control-label" >Gun Type</label>
          <div class="col-md-12">
            <select required class="form-control" id="edit_GunType" name="edit_GunType">
              <option value="">None</option>
              @foreach($A as $m)
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
              <label class="control-label">Gun Name</label>
         <div class="col-sm-12">
            <input type="text" class="form-control" id="edit_name" name="edit_name" pattern="[.,--&\\'a-zA-Z0-9\s]+" maxlength="200" required>
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
"targets": 3,
"orderable": false
},
{
"targets": 2,
"orderable": false
},
            { "searchable": false, "targets": 2 },
          ]
          });


      });
    </script>
<script>



$("#add").click(function() {

    $('.form-group').find('.help-block').show();

    $.ajax({
        type: 'post',
        url: '/Gun-Add',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val(),
            'selection': $('#GunType').val(),
        },
        success: function(data) {
            if (data.errors) {
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
                  $('input[name=name]').val(),
                  $('#GunType').val(),
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
    $('.form-group').find('.help-block').show();
  $.ajax({
      type: 'post',
      url: '/Gun-Update',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#edit_id").val(),
          'name': $('#edit_name').val(),
          'selection': $('#edit_GunType').val(),
      },
      success: function(data) {
        if (data.errors) {
          if ((data.errors)=="deleted") {
            $(document).ready(function() {
            var t = $('#table').DataTable();
                t.row.add( [
                $('#edit_name').val(),
                $('#edit_GunType').val(),
                "  <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
                " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

                ] ).draw( false );
                  } );
            $.toast({
               heading: 'The value that you entered is already existing but was deleted last time. Value is now Restored',
               position: 'top-right',
               loaderBg:'#ff6849',
               icon: 'error',
               hideAfter: 3500,
               stack: 6
              });
          }
          else if((data.errors)!="empty"){
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

          t.row('.selected').remove().draw( false );

          t.row.add( [
           $('#edit_name').val(),
           $('#edit_GunType').val(),
           " <div class='onoffswitch2'> <input type='checkbox' onchange=\"fun_status('"+data.id+"')\" name='onoffswitch2' class='onoffswitch2-checkbox' id='"+data.id+"' "+data.status+"> <label class='onoffswitch2-label' for='"+data.id+"'> <span class='onoffswitch2-inner'></span> <span class='onoffswitch2-switch'></span> </label> </div>",
            " &nbsp; <button class='btn btn-warning  waves-effect waves-light' class='model_img img-responsive' data-toggle='modal' data-target='#Edit'  onclick=\"fun_edit('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-edit'></i></span>Edit</button> <button class='btn btn-danger  waves-effect waves-light'  class='model_img img-responsive' onclick=\"fun_delete('"+data.id+"')\" ><span class='btn-label'><i class='fa fa-times'></i></span> Delete</button>",

          ] ).draw( false );
          $('#Edit').modal('hide');
              var text2 = $('#edit_name').val();
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
        $("#edit_name").text(result.name);
        $("#edit_GunType").text(result.guntype);
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
        $("#edit_name").val(result.name);
        $("#edit_GunType").val(result.guntype);
      }
    });
  }

  function fun_delete(id)
   {
  var table = $('#table').DataTable();
  $('#table tbody').on( 'click', 'tr', function () {

          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');

  } );
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
      table.row('.selected').remove().draw( false );
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
