<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title')
	</title>
	<style>
		table, td, th {
		    border: 0px;
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
		<span><img src="plugins/images/LandingPage/JUCEBER.png" height="200" width="200" align="left"></span>
		<center><h3 class="text-center" style="font-size: 27px"><b>JUBECER SECURITY SERVICE,INC.</b>
		</h3></center>
		<center>RM 301 SUJECO BLDG, 1754 E.RODRIGUEZ SR AVE,<br> BRGY. IMACULATE CONCEPTION, CUBAO, QUEZON CITY</h4></center>
		<center><b>Tel Nos:</b> 654-9284/415-6804</center>
		<center>LTO PSA-T-000121-2016</center>
		<center><b>Expiry Date:</b> 654-9284/415-6804</center>
		<center><b>email address:</b>cerbitojudy@yahoo.com</center>
		<br>
		<div class="col-md-3">
			<b>To:  </b>Chief,SOSIA<br>
			<b>Thru:  </b>Police Chief Inspector <br>	 Chief, Records Section <br>
			 <center><b style="font-size: 20px">Disposition Report</b></center> 
		</div>
		<br>
		<center><h4>@yield('report_title')</h4></center>
		<center><b>From: </b>@yield('start_date')<b>To: </b>@yield('end_date')</center>
		
		
		<br>
		@yield('content')
		<p>
			I HEREBY CERTIFY the correctness disposition report for the month of <u></u>
			<br>
			<br>
			<div align="left">
				<center>Felix Cerbito</center><br>
				<center><b>Asst. General Manager</b></center>
			</div>
			<div align="center">
				<center>Juel Mar Cerbito</center><br>
				<center><b>General Manager</b></center>
			</div>
		</p>
	</div>
	
</body>
</html>	