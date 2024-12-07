<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<title>Roster</title>
	</head>

	<body>

		{{-- No roster message --}}
		@if(isset($message))
			<div>
				<p>{{ $message }}</p>
			</div>

		{{-- Roster exists --}}
		@else
			<h1>Roster for Date: {{ $data["date"] }}</h1>

			<!-- Display roster data in a table -->
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Supervisor</th>
						<th>Doctor</th>
						<th>Caregiver One</th>
						<th>Caregiver Two</th>
						<th>Caregiver Three</th>
						<th>Caregiver Four</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>{{ $data["supervisor_name"] }}</td>
						<td>{{ $data["doctor_name"] }}</td>
						<td>{{ $data["caregivers"]["caregiver_one_name"] }}</td>
						<td>{{ $data["caregivers"]["caregiver_two_name"] }}</td>
						<td>{{ $data["caregivers"]["caregiver_three_name"] }}</td>
						<td>{{ $data["caregivers"]["caregiver_four_name"] }}</td>
					</tr>
				</tbody>
			</table>
		@endif
	</body>
</html>
