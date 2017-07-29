@foreach($shifts as $shift)
	
	<option id="0" value="{{$shift->start}},{{$shift->end}},{{$employeeID}}">From:{{$shift->start}} - To:{{$shift->end}}</option>
	
@endforeach