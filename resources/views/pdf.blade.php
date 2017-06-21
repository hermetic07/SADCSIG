<html>
<head>
	<style>
	table{
		border-collapse: collapse;
		width: 100%;

	}
	tr,th{
		font-size: 20px;
	}
	tr,td{
		font-size: 15px;
	}

	td,th{
		border: 2px solid;
	}
	</style>
</head>

<body>

	<h2 >Jubecer Security Agency</h2>
	<h4>Client's Payment Report</h4>
	<table align="center">
		<tr>
			<th>
				ID
			</th>
			<th>
				Name of Business
			</th>
			<th>
				Total Rate
			</th>
			<th>
				Date of Business Started
			</th>
		</tr>
		@foreach($c as $c)
		<tr>
			<td>
				{{$c->id}}
			</td>
			<td>
				{{$c->name}}
			</td>
			<td>
				{{$c->price}}
			</td>
			<td>
				{{$c->created_at}}
			</td>
		</tr>
		@endforeach
	</table>

</body>

</html>
