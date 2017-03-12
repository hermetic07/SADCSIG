@extends('maintenance.master')

@section('Maintenance Title')Measurements @endsection

@section('addaction')"/measurement-Add"@endsection

@section('addmodaltitle') Add new unit of measurement for body attributes @endsection

@section('addmodalbody')
<div class="form-group">
  <div class="row">
    <div class="col-md-12">
      <label  class="control-label" >Choose Body Attribute</label>
      <select required class="form-control" id="attribute" name="attribute">
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
    <label class="control-label  col-md-12">Size</label>
    <div class="col-md-12">
      <input type="number" class="form-control" id="size" name="size" required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-12">
      <label  class="control-label" >Unit of Measurement</label>
      <select required class="form-control" id="unit" name="unit">
        <option value="">None</option>
        <option value="Centimeter">Centimeter</option>
        <option value="Feet">Feet</option>
        <option value="Inches">Inches</option>
        <option value="Kilogram">Kilogram</option>
        <option value="Pounds">Pounds</option>
      </select>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
@endsection

@section('mtitle') Measurements  @endsection
@section('mtitle2') <a href="{{url('/Measurement')}}">  Measurements </a>  @endsection

@section('theads')
    <th>Body Attribute</th>
    <th>Measurement</th>
    <th data-hide="phone, tablet" data-sort-ignore=true width="10px">Status</th>
@endsection

@section('tbodies')
      @foreach($measurements as $measurement)
        @if($measurement->status !== "deleted")
        <tr>
           <td>{!!$measurement->id!!}</td>
           <td>{!!$measurement->attributes->name!!}</td>
           <td>{!!$measurement->size!!} {!!$measurement->measurement_type!!}</td>
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
      <a class="mytooltip tooltip-effect-7" href="#">           <button type="button" class="switch btn btn-info btn-circle " data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$measurement -> id!!}')" ><i class='fa fa-edit'></i></button><span class="tooltip-table">Edit</span></a>
        &nbsp;
      <a class="mytooltip tooltip-effect-7" href="#">           <button type="button" class="btn btn-danger btn-circle sa-params" onclick="fun_delete('{!!$measurement -> id!!}')"><i class="fa fa-times"> </i></button><span class="tooltip-table">Delete</span></a>
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
            <label  class="control-label" >Choose Body Attribute</label>
            <select required class="form-control" id="edit_attribute" name="edit_attribute">
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
      <div class="form-group col-md-12">
        <div class="row">
            <label class="control-label">Size</label>
            <input type="number" class="form-control" id="edit_size" name="edit_size" required>
            <div class="help-block with-errors"></div>
       </div>
      </div>
      <div class="form-group col-md-12">
       <div class="row">
         <label  class="control-label" >Unit of Measurement</label>
         <select required class="form-control" id="edit_unit" name="edit_unit">
           <option value="">None</option>
           <option value="Centimeter">Centimeter</option>
           <option value="Feet">Feet</option>
           <option value="Inches">Inches</option>
           <option value="Kilogram">Kilogram</option>
           <option value="Pounds">Pounds</option>
         </select>
          <div class="help-block with-errors"></div>
       </div>
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
        $("#edit_size").text(result.size);
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
        $("#edit_size").val(result.size);
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
