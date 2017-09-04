

@foreach($shifts as $shift)
	
	<option value="{{$shift->start}},{{$shift->end}}">From:{{$shift->start}}am - To:{{$shift->end}}pm</option>
	
@endforeach