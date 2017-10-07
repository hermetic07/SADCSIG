@extends('AdminPortal.Reports_PDF.report_layout')

@section('start_date')
	{{$start}}
@endsection

@section('end_date')
	{{$end}}
@endsection

@section('content')
	<center>
			<table style="border: 1">
				
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
                @foreach($clients as $client)
                <tr>
                	<td>
                		<b>Client:</b> <h3>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</h3>
                		Establishment:
		                	@foreach($dispositions as $disposition)
		                		@if($disposition->client_id == $client->id)
		                			{{$disposition->establishment}} @break
		                		@endif
		                	@endforeach
		                	<br> 
		                	Deployed Guard(s)
		                	<br>
		                		<table>
		                			<thead>
		                				<tr>
		                					<th></th>
		                					<th><center>Name</center></th>
		                					<th><center>Education</center></th>
		                					<th><center>License</center></th>
		                					<th><center>Exp Date</center></th>
		                				</tr>
		                			</thead>
		                			<tbody>
		                				@php
		                					$rowCtr = 1;
		                				@endphp
		                				@foreach($dispositions as $disposition)
								           	@if($disposition->client_id == $client->id)
								           		<tr>
								           			<td>
								           				<center>{{$rowCtr}}</center>
								           			</td>
				                					<td>
				                						<center>
				                							{{$disposition->first_name}} {{$disposition->middle_name}} {{$disposition->last_name}}
				                						</center>
				                					</td>
				                					<td>
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
				                					<td>
				                						<center>
				                							{{$disposition->license_num}}
				                						</center>
				                					</td>
				                					<td>
				                						<center>
				                							{{$disposition->date_expired}}
				                						</center>
				                					</td>
				                				</tr>
				                				@php
				                					$rowCtr++;
				                				@endphp
											@endif
								        @endforeach
		                				
		                			</tbody>
		                		</table>
		                	<br>
		                	
		                
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
		</center>
@endsection