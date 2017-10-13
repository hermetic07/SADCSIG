@extends('AdminPortal.Reports_PDF.report_layout')
@section('title')
	Number of Guns
@endsection
@section('start_date')
	{{$start}}
@endsection

@section('end_date')
	{{$end}}
@endsection

@section('report_title')
	Number of Guns
@endsection

@section('content')
 	@php
    	$ctr = 0;
    	$totalGuns = 0;
    @endphp
<table>
	@foreach($establishments as $establishment)
		@foreach($clientGuns as $clientGun)
			@if($clientGun->establishments_id == $establishment->id)
    @php
    	$ctr++;
    @endphp
    <tr>
    	<td>
    		{{$ctr}}.) <b>Establishment:</b> <b style="font-size: 14px">{{$establishment->estabName}} </b> <br>
    		
            	<br>
            	Location : {{$establishment->address}}, {{$establishment->area}}, {{$establishment->province}}
            	<br> 
            	<center>Delivered Guns</center>
            	<br>
            	
            		<table style="border: 1px solid black;">
            			<thead>
            				<tr style="border: 1px solid black;">
            					<th></th>
            					<th style="border: 1px solid black;"><center>Gun Name</center></th>
            					<th style="border: 1px solid black;"><center>Type</center></th>
            					<th style="border: 1px solid black;"><center>Serial Number</center></th>
            					<th style="border: 1px solid black;"><center>Date Deivered</center></th>
            					<th style="border: 1px solid black;"><center>Delivery Person</center></th>
            					
            				</tr>
            			</thead>
            			<tbody>
            				@php
	                			
            					$rowCtr = 1;
            				@endphp
            				@foreach($clientGuns as $clientGun)
					           	

					           		<tr style="border: 1px solid black;">
					           			<td style="border: 1px solid black;">
					           				<center>{{$rowCtr}}</center>
					           			</td>
	                					<td style="border: 1px solid black;">
	                						<center>
	                							{{$clientGun->gun}}
	                						</center>
	                					</td>
	                					<td style="border: 1px solid black;">
	                						<center>
	                							{{$clientGun->gunType}}
	                						</center>
	                					</td>
	                					<td style="border: 1px solid black;">
	                						<center>
	                							{{$clientGun->serialNo}}
	                						</center>
	                					</td>
	                					<td style="border: 1px solid black;">
	                						<center>
	                							{{$clientGun->deliveryDate}}
	                						</center>
	                					</td>
	                					<td style="border: 1px solid black;">
	                						<center>
	                							{{$clientGun->deliveryPerson}}
	                						</center>
	                					</td>
	                					
	                					
	                				</tr>
	                				@php
	                					$rowCtr++;
	                					$totalGuns++;
	                				@endphp
								
					        @endforeach
            				
            			</tbody>
            		</table>
            		<div class="pull-right">
						
						<b>Total Guns Delivered:</b> <b style="font-size: 18px">{{$totalGuns}}</b><br>
					</div>
            	<br>
            	<hr>
            
		</td>
	</tr>
			@break
			@endif
		@endforeach
    @endforeach
</table>

@endsection