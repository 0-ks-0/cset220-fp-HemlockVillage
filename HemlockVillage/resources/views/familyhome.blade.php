<html>
    <head>
        <title>Family Home</title>
		<link rel="stylesheet" href="{{ asset('./css/mainstyle.css') }}">
    </head>
    <body>
        <div class="container">
            <h1>Family Home</h1>

            <form action="/home" method="get">
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" readonly
                        value="{{ \Carbon\Carbon::today()->toDateString() }}"
                    >
                </div>

                <div class="form-group">
                    <label for="family-code">Family Code:</label>
                    <input type="text" id="family-code" name="family_code" placeholder="Enter Family Code" maxlength="16" required>

                    {{-- Error --}}
                    @error("family_code") <div>{{ $message }}</div> @enderror

                </div>

                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" id="patient-id" name="patient_id" placeholder="Enter Patient ID" maxlength="16" required>

                    {{-- Error --}}
                    @error("patient_id") <div>{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <button type="submit">Search for Patient</button>
                </div>
            </form>

            @isset($data)
                <h2>Patient Information</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Doctor's Name</th>
                            <th>Appointment Status</th>
                            <th>Caregiver's Name</th>

                            <th>Morning Meds</th>
                            <th>Afternoon Meds</th>
                            <th>Night Meds</th>

                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $data["doctor_name"] ?? "None"}}</td>
                            <td>{{ $data["appointment_status"] ?? "None"}}</td>
                            <td>{{ $data["caregiver_name"] ?? "None"}}</td>

                            {{-- Meds --}}
                            <td>
                                <p>{{ $data["prescriptions"]["morning"] ?? "None" }}</p>
                                <p>{{ $data["prescription_status"]["morning"] ?? "None" }}</p>
                            </td>

                            <td>
                                <p>{{ $data["prescriptions"]["afternoon"] ?? "None" }}</p>
                                <p>{{ $data["prescription_status"]["afternoon"] ?? "None" }}</p>
                            </td>

                            <td>
                                <p>{{ $data["prescriptions"]["night"] ?? "None" }}</p>
                                <p>{{ $data["prescription_status"]["night"] ?? "None" }}</p>
                            </td>

                            {{-- Meals --}}
                            <td>{{ $data["meal_status"]["breakfast"] ?? "None" }}</td>
                            <td>{{ $data["meal_status"]["lunch"] ?? "None" }}</td>
                            <td>{{ $data["meal_status"]["dinner"] ?? "None" }}</td>
                        </tr>
                    </tbody>
                </table>
            @endisset
        </div>

        @include('navbar')

    </body>
</html>
