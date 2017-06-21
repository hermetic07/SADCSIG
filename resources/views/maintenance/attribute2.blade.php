@extends('maintenance.master')
@section('Maintenance Title')Body attributes @endsection
@section('mtitle') My Body @endsection
@section('mtitle2')Body attributes <a href="{{ url('attribute2') }}">Body attributes</a> @endsection

@section('theads') <th>Body attribute</th> <th width="200px">Unit of measurement</th> @endsection
@section('tbodies')
	@foreach($Attributes as $attribute)
		 @if($attribute->status !== "deleted")
        <tr class="item{{$attribute->id}}">
           <td>{!!$attribute->name!!}</td>
          <td>{!!$attribute->measurement!!}</td>
           <td>
             @if($attribute->status === "active")
             <div class="onoffswitch2">
			    <input type="checkbox" onchange="fun_status('{!!$attribute -> id!!}')" name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$attribute -> id!!}" checked>
			    <label class="onoffswitch2-label" for="{!!$attribute -> id!!}">
			        <span class="onoffswitch2-inner"></span>
			        <span class="onoffswitch2-switch"></span>
			    </label>
			</div>

             @else
             <div class="onoffswitch2">
			    <input type="checkbox" onchange="fun_status('{!!$attribute -> id!!}')" name="onoffswitch2" class="onoffswitch2-checkbox" id="{!!$attribute -> id!!}">
			    <label class="onoffswitch2-label" for="{!!$attribute -> id!!}">
			        <span class="onoffswitch2-inner"></span>
			        <span class="onoffswitch2-switch"></span>
			    </label>
			</div>
             @endif
           </td>
           <td>
             &nbsp;
             <button class="btn btn-warning  waves-effect waves-light"   class="model_img img-responsive" data-toggle="modal" data-target="#Edit" onclick="fun_edit('{!!$attribute -> id!!}')"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"   class="model_img img-responsive" onclick="fun_delete('{!!$attribute -> id!!}')"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>
            </td>

        </tr>
        @endif
	@endforeach

@endsection
@section('hiddenediturl')'/Attribute-view' @endsection
@section('hiddendeleteurl')'/Attribute-delete' @endsection
@section('hiddenestatusurl')'/Attribute-status'@endsection

@section('addaction')"/Attribute-Add"@endsection

@section('addmodaltitle')Add new Body Attribute @endsection
@section('addmodalbody') 
	<div class="form-group">
		<div class="row">
			<label class="control-label col-md-12">Body Attribute</label>
			<div class="col-md-12">
				<input type="text" class="form-control" id="Attribute_Name" name="Attribute_Name" pattern="[.,--&\\'a-zA-Z0-9\s]+" maxlength="200" required>
				 <div class="help-block with-errors"></div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-12">
				<label class="control-label">Choose Unit of Measurement</label>
				<select class="form-control" id="measurement" name="measurement" required>
					@foreach($measurements as $measurement)
						<option value="{!! $measurement->name !!}">{!! $measurement->name !!}</option>
					@endforeach
				</select>
				 <div class="help-block with-errors"></div>
			</div>
		</div>
	</div>
@endsection