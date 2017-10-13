@extends('AdminPortal.Reports_PDF.report_layout')
@section('title')
	Dispostion Report
@endsection
@section('start_date')
	{{$start}}
@endsection

@section('end_date')
	{{$end}}
@endsection

@section('content')
	<center>
			<table >
				
				<tbody>
                <!-- @foreach($dispositions as $disposition)
                  <tr>
                    <td>{{$disposition->establishment}}</td>
                    <td>
                      {{$disposition->address}} {{$disposition->area}},{{$disposition->province}}
                    </td>
                    <td>
                      {{$disposition->first_name}} {{$disposition->middle_name}} {{$disposition->last_name}}
                    </td>
                    <td>
                      @php
                        $ctr = 0;
                      @endphp
                      @foreach($employee_educations as $employee_education)
                        @if($employee_education->employees_id == $disposition->empID)
                          @php

                            $ctr++;

                          @endphp
                        @endif
                      @endforeach

                      @if($ctr == 0)

                      @elseif($ctr == 2)
                        HS Grad
                      @elseif($ctr == 3)
                        College level
                      @endif
                    </td>
                    <td>
                      {{$disposition->license_num}}
                    </td>
                    <td>
                      {{$disposition->date_expired}}
                    </td>
                  </tr>
                  
                @endforeach -->
                @php
                	$ctr = 0;
                	$estabAddress = "";
                	$totalGuards = 0;
                @endphp
                @foreach($clients as $client)
                @php
                	$ctr++;
                @endphp
                <tr>
                	<td>
                		{{$ctr}}.) <b>Client:</b> <b style="font-size: 14px">{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</b> <br>
                		Establishment:
		                	@foreach($dispositions as $disposition)
		                		@if($disposition->client_id == $client->id)
		                			@php
					                	
					                	$estabAddress = $disposition->address." ".$disposition->area." ".$disposition->province." ";
					                @endphp
		                			{{$disposition->establishment}} @break
		                		@endif
		                	@endforeach
		                	<br>
		                	Location : {{$estabAddress}}
		                	<br> 
		                	<center>Deployed Guard(s)</center>
		                	<br>
		                	
		                		<table style="border: 1px solid black;">
		                			<thead>
		                				<tr style="border: 1px solid black;">
		                					<th></th>
		                					<th style="border: 1px solid black;"><center>Name</center></th>
		                					<th style="border: 1px solid black;"><center>Address</center></th>
		                					<th style="border: 1px solid black;"><center>Role</center></th>
		                					<th style="border: 1px solid black;"><center>Education</center></th>
		                					<th style="border: 1px solid black;"><center>License</center></th>
		                					<th style="border: 1px solid black;"><center>Exp Date</center></th>
		                				</tr>
		                			</thead>
		                			<tbody>
		                				@php
				                			
		                					$rowCtr = 1;
		                				@endphp
		                				@foreach($dispositions as $disposition)
								           	@if($disposition->client_id == $client->id)

								           		<tr style="border: 1px solid black;">
								           			<td style="border: 1px solid black;">
								           				<center>{{$rowCtr}}</center>
								           			</td>
				                					<td style="border: 1px solid black;">
				                						<center>
				                							{{$disposition->first_name}} {{$disposition->middle_name}} {{$disposition->last_name}}
				                						</center>
				                					</td>
				                					<td style="border: 1px solid black;">
				                						<center>
				                							{{$disposition->street}}, {{$disposition->barangay}}, {{$disposition->city}}
				                						</center>
				                					</td>
				                					<td style="border: 1px solid black;">
				                						<center>
				                							{{$disposition->role}}
				                						</center>
				                					</td>
				                					<td style="border: 1px solid black;">
				                						<center>
				                							@php
									                        $ctr = 0;
									                      @endphp
									                      @foreach($employee_educations as $employee_education)
									                        @if($employee_education->employees_id == $disposition->empID)
									                          @php

									                            $ctr++;

									                          @endphp
									                        @endif
									                      @endforeach

									                      @if($ctr == 0)

									                      @elseif($ctr == 2)
									                        HS Grad
									                      @elseif($ctr == 3)
									                        College level
									                      @endif
				                						</center>
				                					</td>
				                					<td style="border: 1px solid black;">
				                						<center>
				                							{{$disposition->license_num}}
				                						</center>
				                					</td>
				                					<td style="border: 1px solid black;">
				                						<center>
				                							{{$disposition->date_expired}}
				                						</center>
				                					</td>
				                					
				                				</tr>
				                				@php
				                					$rowCtr++;
				                					$totalGuards++;
				                				@endphp
											@endif
								        @endforeach
		                				
		                			</tbody>
		                		</table>
		                	<br>
		                	<hr>
		                
            		</td>
            	</tr>
            	
                @endforeach



                 <!-- @foreach($dispositions as $disposition)
                  <tr>
                    <td>
                    	{{$disposition->establishment}} <br>
                    	{{$disposition->address}} {{$disposition->area}},{{$disposition->province}}<br>
                    	<table>
                    		<thead>
                    			<tr>
                    				<th>Guard</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			<tr>
                    				
                    			</tr>
                    		</tbody>
                    	</table>
                    </td>
                    
                  </tr>
                  
                @endforeach -->
              </tbody>
			</table>
			<div class="pull-right">
				<b>Total No. of Clients:</b> <b style="font-size: 18px">{{$ctr}}</b><br>
				<b>Total Guards. Deployed:</b> <b style="font-size: 18px">{{$totalGuards}}</b><br>
			</div>
		</center>
		<br>
		<br>

@endsection