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
                </div>

                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" id="patient-id" name="patient_id" placeholder="Enter Patient ID" maxlength="16" required>
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
                            <th>Doctor's Appointment</th>
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
                            <td>Dr. Cooper</td>
                            <td>2024-11-20</td>
                            <td>Nicholas Helock</td>
                            <td><input type="checkbox" name="morning-meds" id="morning_meds"></td>
                            <td><input type="checkbox" name="afternoon-meds" id="afternoon_meds"></td>
                            <td><input type="checkbox" name="night-meds" id="night_meds"></td>
                            <td><input type="checkbox" name="breakfast" id="breakfast"></td>
                            <td><input type="checkbox" name="lunch" id="lunch"></td>
                            <td><input type="checkbox" name="dinner" id="dinner"></td>
                        </tr>
                    </tbody>
                </table>
            @endisset
        </div>

        @include('navbar')

    </body>
</html>
