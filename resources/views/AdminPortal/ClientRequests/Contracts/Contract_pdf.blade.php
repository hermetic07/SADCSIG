<!DOCTYPE html>
<html>
<head>
	<title>Contract</title>
	<link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<center><h3 class="text-center">Security Services Contract</h3></center>
		<br>
		<b>KNOW ALL MEN BY THESE PRESENTS:</b>
		<br>
		<br>
		<div class="row">
			<div class="col-mg-4"></div>
			<div class="col-md-8">
				<p>
					This contract made and executed this <b>{{$day}}</b> day of <b>{{$month}} {{$year}}</b> at Quezon City, Metro Manila and between.
				</p>
				<br>
				<p>
					<b>{{$establishment->name}}</b>, a company and dully organized and eexisting under and by virtues of Philippines laws, with principal address at {{$establishment->address}}, {{$establishment->area}}, {{$establishment->province}} represented in this act by its Owner-Manager, <b>{{$client->first_name}}, {{$client->middle_name}}, {{$client->last_name}}</b> duly authorized for the purpose herinafter referred to as <b>CLIENT</b>.
				</p>
				<br>
				<center><p>AND</p></center>
				<br>
				<p>
					<b>JUBECER Security Service, Inc.</b>, a single proprietorship duly organized and existing under by the virtue of the laws of the Philipines with business address at Rom 301 SUJECO Building, 1754 E Rodriguez Sr. Ave. Brgy. Immaculate Conception, Cubao, Quezon, City duly represented by its General Manager, <b>Mr. JUDY BENITO L. CERBITO</b> and hereinafter referred to as the <b>SECURITY COMPANY</b>
				</p>
				<br>
				<center>WITNESSETH That:</center>
				<br>
				<p><b>WHEREAS</b>, the <b>CLIENT</b> is desirous of securing its properties against trespassing, usurpation, theft, pilferage, robbery, arson and other unlawful acts against property, persons and guests by strangers or malefactors including assault, harassment, threats or intimidations to person within the <b>CLIENT's</b> premises</p>
				<br>
				<p>
					<b>WHEREAS</b>, the <b>SECURITY COMPANY</b> is duly licensed and bonded security guard agency operating under the provisions of Republic Act No 5487, has represented itself to be qualified and competent and has offered to provide the service required by the <b>CLIENT</b>.
				</p>
				<br>
				<p>
					<b>NOW THEREFORE</b>, for and in consideration of the foregoing premises and of the mutual covenants and provisions hereinafter set forth, the parties here to have agreed mutually agree as follows.
				</p>
				<br><br><br><br><br><br><br>
				<p>CPI Contract</p>
				<p>Page 2</p>
				<br><br>
				<p><b>1. <u>Place and Location</u></b></p>
				<p>
					The <b>SECURITY COMPANY</b> shall provide the <b>CLIENT</b> with {{$contract->guard_count}} security guard(s) to be posted at {{$establishment->address}}, {{$establishment->area}}, {{$establishment->province}}.
				</p>
				<br>
				<p><b>2. <u>Functions and Duties of Guards</u></b></p>
				<p>
					The guards are to watch, safeguard and protect the property of the  <b>CLIENT</b> from theft, robbery, arson and destruction or damages and to protect the owner, visitors and guest from assault, harassment, threat or intimidations, and to enforce and implement rules and regulations, policies of the <b>CLIENT</b> aimed at maintaining security, safety and other threat.
				</p>
				<br>
				<p><b>3. <u>Guard Force</u></b></p>
				<p>
					The <b>SECURITY COMPANY</b> shall provide the <b>CLIENT</b> with {{$contract->guard_count}} Security Guard(s) with twenty four (24) hours of duty per day per month. It is understood that te number of guards may be increased or decreased by mutual consent in writting by the <b>CLIENT</b> and the <b>SECURITY COMPANY</b>.
				</p>
				<br>
				<p><b>4. <u>Qualification of Guards</u></b></p>
				<p>
					Each of the security guards to be assigned by the <b>SECURITY COMPANY</b> to the <b>CLIENT</b> must be:
				</p>
				<p>a.  College level of good moral characters and reputation, courteous, alert and without any criminal or police records. </p>
				<p>b.  Physically and mentally fit and npt less than 22 but not more than 45 years of age and at least five feet seven inches in height </p>
				<br>
			</div>
		</div>
	</div>
	<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>