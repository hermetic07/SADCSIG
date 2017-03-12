@extends('maintenance.master')

@section('Maintenance Title')Guns @endsection

@section('addaction')"/Gun-Add"@endsection

@section('addmodaltitle') Add new Guns @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <div class="col-md-12">
      <label  class="control-label" >Choose Gun Type</label>
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
  <div class="row">
    <label class="control-label  col-md-12">Gun Name</label>
    <div class="col-md-12">
    <input type="text" class="form-control" id="name" name="name" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
@endsection

@section('mtitle') Guns  @endsection
@section('mtitle2') <a href="{{url('/Gun')}}">  Guns </a>  @endsection

@section('theads')
    <th>Gun</th>
    <th>Gun Type</th>
    <th data-hide="phone, tablet" data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($Guns as $Gun)
        @if($Gun->status !== "deleted")
        <tr>
           <td>{!!$Gun->id!!}</td>
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
          <div class="col-md-12">
            <label  class="control-label" >Gun Type</label>
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
         <div class="form-group col-sm-12">
            <label class="control-label">Gun Name</label>
            <input type="text" class="form-control" id="edit_size" name="edit_size" required>
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
