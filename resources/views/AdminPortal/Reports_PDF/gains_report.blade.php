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
	<table>

	</table>
@endsection