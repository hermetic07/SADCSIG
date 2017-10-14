@extends('AdminPortal.Reports_PDF.report_layout')
@section('title')
	Gains
@endsection
@section('start_date')
	{{$start}}
@endsection

@section('end_date')
	{{$end}}
@endsection

@section('report_title')
	Gains
@endsection

@section('content')
 	@php
    	$ctr = 0;
    	$totalGuns = 0;
    @endphp
	<table style="border: 1px solid black;">
		<thead>
			<tr style="border: 1px solid black;">
				<th></th>
				<th style="border: 1px solid black;"><center>Guard Name</center></th>
				<th style="border: 1px solid black;"><center>Address</center></th>
				<th style="border: 1px solid black;"><center>Contact Number</center></th>
				<th style="border: 1px solid black;"><center>Email Address</center></th>
				<th style="border: 1px solid black;"><center>Date Hired</center></th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($gains_employees as $employee)
				@php
					$ctr++;
				@endphp
				<tr style="border: 1px solid black;">
           			<td style="border: 1px solid black;">
           				<center>{{$ctr}}</center>
           			</td>
					<td style="border: 1px solid black;">
						<center>
							{{$employee->first_name}}, {{$employee->last_name}}, {{$employee->middle_name}}
						</center>
					</td>
					<td style="border: 1px solid black;">
						<center>
							{{$employee->street}}, {{$employee->barangay}}, {{$employee->city}}
						</center>
					</td>
					<td style="border: 1px solid black;">
						<center>
							{{$employee->cellphone}}
						</center>
					</td>
					<td style="border: 1px solid black;">
						<center>
							{{$employee->email}}
						</center>
					</td>
					
					<td style="border: 1px solid black;">
						<center>
							{{$employee->updated_at}}
						</center>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<div class="pull-right">
						
		<b>Total No. of Guards Hired</b> <b style="font-size: 18px">{{$ctr}}</b><br>
	</div>
	<br>
	<br>
@endsection