<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<title>Search Patients</title>

		<link rel="stylesheet" href="{{ asset('./css/searchpatient.css') }}">
	</head>
	<body>
		<div class="container">
			<h1>Search Patients</h1>

			<div class="search-bar">
				<form action="/search/patients" method="get">
					<input type="number" name="user_id" placeholder="userioid "><br>
					<input type="text" name="patient_id" placeholder="patinet id"><br>
					<input type="text" name="name" placeholder="name"><br>
					<input type="number" name="age" placeholder="age"><br>
					<input type="text" name="emergency_contact" placeholder="phoen number emergy"><br>
					<input type="text" name="emergency_contact_name" placeholder="emegency name"><br>

					{{-- <div>
						<label for="patient-id">Search by Patient ID</label>
						<input type="text" id="patient-id" placeholder="Enter Patient ID" maxlength="16">
					</div>
					<div>
						<label for="user-id">Search by User ID</label>
						<input type="number" id="user-id" placeholder="Enter User ID">
					</div>
					<div>
						<label for="name">Search by Name</label>
						<input type="text" id="name" placeholder="Enter Name" maxlength="100">
					</div>
					<div>
						<label for="age">Search by Age</label>
						<input type="number" id="age" placeholder="Enter Age">
					</div>
					<div>
						<label for="emergency-contact">Search by Emergency Contact</label>
						<input type="text" id="emergency-contact" placeholder="Enter Emergency Contact" maxlength="20">
					</div>
					<div>
						<label for="emergency-contact-name">Search by Emergency Contact Name</label>
						<input type="text" id="emergency-contact-name" placeholder="Enter Emergency Contact Name" maxlength="20">
					</div> --}}

					<button type="submit">Search</button>
				</form>
			</div>

			@isset($data)
				@if(empty($data))
					No patients found
				@else
					@foreach($data as $p)
					{{-- $p["keyNameFromHere"] --}}
					{{-- 'patient_id' => $patient->patient_id,
					'user_id' => $patient->user_id,
					'name' => "{$patient->first_name} {$patient->last_name}",
					'date_of_birth' => $patient->date_of_birth,
					'emergency_contact' => $patient->econtact_phone,
					'emergency_contact_name' => $patient->econtact_name, --}}

						<h3>Patient Name: {{ $p["patient_id"] }}</h3>
						<h3>Patient Name: {{ $p["user_id"] }}</h3>
						<h3>Patient Name: {{ $p["name"] }}</h3>
						{{-- <h3>Patient Name: ${patient.name}</h3>
						<p>Patient ID: ${patient.patient_id}</p>
						<p>User ID: ${patient.user_id}</p>
						<p>DOB: ${patient.date_of_birth}</p>
						<p>Emergency Contact: ${patient.emergency_contact}</p>
						<p>Emergency Contact Name: ${patient.emergency_contact_name}</p>
						<button onclick="window.location.href='/patients/${patient.patient_id}'">View Patient Info</button> --}}
					@endforeach
				@endif
			@endisset
		</div>
	</body>
</html>
