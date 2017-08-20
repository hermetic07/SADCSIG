@php
	$gunCtr = 0;
@endphp
@foreach($guns as $gun)
	@if($gun->status == "active")
		<tr>
          <td >{{$gun->name}}</td>
          <td>
          	<div class="checkbox checkbox-info">
          		<input id="{{ $gun->id }}" type="checkbox"  name="{{ $gunCtr }}" value="{{ $gun->id }}">
          		<label for="checkbox1"> Select </label>
        	</div>
        	</td>
        	<td>
        		<input type="number" class="form-control qty" id="{{ $gun->id }}" name="quantity{{ $gunCtr }}" min="1"  step="0.01"  required>
             </td>
          </td>
        </tr>
        @php
          $gunCtr++;
        @endphp
	@endif
@endforeach
<input type="hidden" name="gunCount" value="{{ $gunCtr }}"> 