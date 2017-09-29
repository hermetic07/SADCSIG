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
				<br><br><br><br><br>
				<p>CPI Contract</p>
				<p>Page 2</p>
				<br>
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
				<p>c.  Dully licensed and properly screened and cleared by the PNP, NBI, Police and other government offices issuing clearances for employment. </p>
				<p>d.  In proper uniform and armed with riffle, shot-gun, revolver, with sufficient ammunitions at all times during his hour of duty.  </p>
				<p>d.  In possesion of such other qualifications as required by the Republic Act No. 5487, as amended. </p>
				<p>e.  In possession of such other qualifications as required by Republic Act No. 5487, as amended.</p>
				<br>
				<p>CPI Contract</p>
				<p>Page 3</p>
				
				<p><b>5. <u>Mode of Payment</u></b></p>
				<p>
					For and in consideration of the above services and during the effectivity of the above services and during the effectivity of the contract, <b>CLIENT</b> shall pay for Two ({{$contract->guard_count}}) security guards to the <b>SECURITY COMPANY</b> the sum of PESOS: ________________________ (P {{$contract->monthlyCP}}) per guard with twelve (12) hours duty per day per month. Payment and shall be paid every 15th and end of the month three (3) days upon presentation of invoice
					The <b>CLIENT</b> hereby agrees that it shall pay interest charges on the ongoing legal rate for unpaid overdue accounts (over 60 days). This shall be without prejudice to the right of the <b>SECURITY COMPANY</b> to terminate the contract immediately for failure of the <b>CLIENT</b> to pay the afore stated consideration in accordance with its terms.
					The <b>SECURITY COMPANY</b> shall be entitled to an automatic adjustment in the stipulated contract price in the event that the minimum wage, cost of living allowance and/or fringe benefit in favour of the employees are increased by law, executive order, decree or wage order subsequent to the execution of the contract. Said adjustment shall be equivalent to the amount of increases as dictated by law.

				</p>
				<br>
				<p><b>6. <u>Supervision and Control</u></b></p>
				<p>
					The <b>SECURITY COMPANY</b> shall exercise discipline, supervision, control, and administration over its guards in accordance with law, ordinance, and pertinent government rules and regulations, as well as the riles and policies laid down by the CLIENT on the matter.

				</p>
				<br>
				<p><b>7. <u>Equipment and Uniform</u></b></p>
				<p>
					The guards that the <b>SECURITY COMPANY</b> shall provide are equipped with duly licensed firearm 38 cal./ shotgun/ 9mm with complete ammunitions, flashlights, nightsticks, and complete uniform.

				</p>
				<br>
				<p><b>8. <u>Liability to Guards and Third Parties</u></b></p>
				<p>
					The <b>SECURITY COMPANY</b> is not an agent or employee of the <b>CLIENT</b> and the guards to be assigned by the <b>SECURITY COMPANY</b> to the <b>CLIENT</b> are in no sense employees of the latter as they are for all intents and purposes under contract with the <b>SECURITY COMPANY</b>. Accordingly, the <b>CLIENT</b> shall not be responsible for any and all claims for personal injury or death caused to any of the guards or to any third party where such injury or death arising out of or in the course of the performance of guard duties.

				</p>
				<br>
				
				<p>
					9.  The <b>SECURITY COMPANY</b> shall be responsible for the losses and damages to the property of the <b>CLIENT</b>, except those which can be easily transported or disposed or of which cannot be considered as, but not limited to, pocket calculators, jewelries and cash, occurring or taking place during the tour of duty of the guards of the <b>SECURITY COMPANY</b>.

				</p>
				<br>
				<p>CPI Contract</p>
				<p>Page 4</p>
				<p>and make known in writing to the latter within forty-eight (48) hours from the time of occurrence; and provided, that such losses or damages are due to and traceable solely to the negligence of the security guards without any contributory negligence on the part of the <b>CLIENT</b>; and provided further that the <b>SECURITY COMPANY</b> shall be responsible only for the losses or damages to the reported property of the <b>CLIENT</b> whenever there is a clear showing that the door, window, or other points of entrance/exit were subjected to force. The <b>CLIENT</b> shall have no authority to automatically deduct its claims for losses and/or damages from the agreed compensation for guard services due to <b>SECURITY COMPANY</b> or withhold payment of the same without the approval of the <b>SECURITY COMPANY</b>.</p>
				<br>
				
				<p>
					10. The <b>SECURITY COMPANY</b> shall not be liable for losses and/ or damages due to (a) fortuitous events or force majeure beyond the control or competence of the guards to prevent and to (b) orders of the <b>CLIENT</b>.

				</p>
				<br>
				<p><b>11. <u>Replacement of any guards:</u></b></p>
				<p>
					The <b>CLIENT</b> may have a guard replaced anytime whose work it finds or believes to be below standard, or whose conduct is unsatisfactory, or is prejudicial to its interest, as determined by the <b>CLIENT</b>. The judgment of the <b>CLIENT</b> on such matter shall be final, binding and should the <b>SECURITY COMPANY</b> refuse, the former may consider the same as valid cause for the termination of the contract.

				</p>
				<br>
				<p><b>12. <u>Terms of Contract:</u></b></p>
				<p>
					This contract shall take effect on November 20, 2013 to November 30, 2015 and is deemed renewed from the client or unless terminated under paragraph 14 hereof.

				</p>
				<br>
				
				<p>
					13. All judicial and extra – judicial expenses which will be incurred by the <b>SECURITY COMPANY</b> in connection with the performance by its guards of their duties and functions particularly those in accordance with the others of the <b>CLIENT</b> shall be prorated between parties.
				</p>
				<br>
				
				<p>
					14. Either party may terminate the contract for whatever cause or causes at anytime by written notice given to the other party not later than thirty (30) days prior to the intended date of termination.
				</p>
			</div>
		</div>
	</div>
	<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>