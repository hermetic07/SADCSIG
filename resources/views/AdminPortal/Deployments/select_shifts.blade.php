
@foreach($shifts as $shift)
	<option value="{{$shift->start}},{{$shift->end}},{{$employeesID}}">From: {{$shift->start}} - To:{{$shift->end}}</option>
@endforeach