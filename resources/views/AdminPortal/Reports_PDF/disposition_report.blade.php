<!DOCTYPE html>
<html>
<head>
	<title>Contract</title>
	<style>
		table, td, th {
		    border: 1px solid black;
		}

		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th {
		    height: 50px;
		}
	</style>
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<center><h3 class="text-center" style="font-size: 25px"><b>JUBECER SECURITY SERVICE,INC.</b>
		</h3></center>
		<center>RM 301 SUJECO BLDG, 1754 E.RODRIGUEZ SR AVE, BRGY. IMAACULATE CONCEPTION, CUBAO, QUEZON CITY</h4></center>
		<center><b>Tel Nos:</b> 654-9284/415-6804</center>
		<center>LTO PSA-T-000121-2016</center>
		<center><b>Expiry Date:</b> 654-9284/415-6804</center>
		<center><b>email address:</b>cerbitojudy@yahoo.com</center>
		<br>
		<div class="col-md-3">
			<b>To:  </b>Chief,SOSIA<br>
			<b>Thru:  </b>Police Chief Inspector <br>	 Chief, Records Section <br>
			<b>Subject:  </b>Disposition Report
			
		<br>
		<center><h4>Disposition Report</h4></center>
		<center><b>From: </b>{{$start}}<b>To: </b>{{$end}}</center>
		<br>
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
		                	<ol>
		                		@foreach($dispositions as $disposition)
			                		@if($disposition->client_id == $client->id)
			                			<li><div class="row">
			                				<div class="col-md-4">
			                					{{$disposition->first_name}} {{$disposition->middle_name}} {{$disposition->last_name}}
			                				</div>
			                				<div class="col-md-4">
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
			                				</div>
			                			</div></li><br>
			                		@endif
			                	@endforeach
		                	</ol>
		                	
		                
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
		
	</div>
	
	
	</body>
</html>