@extends('AdminPortal.Reports_PDF.report_layout')
@section('title')
	Incident Report
@endsection
@section('start_date')
	{{$start}}
@endsection

@section('end_date')
	{{$end}}
@endsection

@section('report_title')
	Incident Reports
@endsection

@section('content')
	<table style="border: 1px solid black;">
		<thead>
			<tr style="border: 1px solid black;">
				<th></th>
				<th style="border: 1px solid black;"><center>Sender</center></th>
				<th style="border: 1px solid black;"><center>Post</center></th>
				<th style="border: 1px solid black;"><center>Location</center></th>
				<th style="border: 1px solid black;"><center>Date</center></th>
				<th style="border: 1px solid black;"><center>Date Hired</center></th>
				
			</tr>
		</thead>
		<tbody>
			@php
				$ctr = 0;
			@endphp
			@foreach($incidents as $incident)
				@php
					$ctr++;
				@endphp
				<tr style="border: 1px solid black;">
           			<td style="border: 1px solid black;">
           				<center>{{$ctr}}</center>
           			</td>
					<td style="border: 1px solid black;">
           				<center>
           					{{$incident->first_name}} {{$incident->middle_name}} {{$incident->last_name}}
           				</center>
           			</td>
           			<td style="border: 1px solid black;">
           				<center>{{$incident->estabName}}</center>
           			</td>
           			<td style="border: 1px solid black;">
           				<center>
           					{{$incident->address}}, {{$incident->area}}, {{$incident->province}}
						</center>
           			</td>
           			<td style="border: 1px solid black;">
           				<center>{{$incident->date}}</center>
           			</td>
					<td style="border: 1px solid black;">
           				<center>{{$ctr}}</center>
           			</td>
				</tr>
			@endforeach
			</tbody>
			</table>
			<br>
			<div class="pull-right">
								
				<b>Total No. of Incidents</b> <b style="font-size: 18px">{{$ctr}}</b><br>
			</div>
			<br>
			<br>
@endsection