@php
	$ctr = 0;
@endphp

@foreach($shifts as $shift)
	
	<option value="{{$shift->start}},{{$shift->end}},{{$employeesID}}">From:{{$shift->start}}am - To:{{$shift->end}}pm</option>
	@php
	$ctr++;
@endphp
@endforeach