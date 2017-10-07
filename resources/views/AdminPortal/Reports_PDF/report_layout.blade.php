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
		</div>
		<br>
		<center><h4>@yield('report_title')</h4></center>
		<center><b>From: </b>@yield('start_date')<b>To: </b>@yield('end_date')</center>
		
		
		<br>
		@yield('content')
	</div>	
</body>
</html>	