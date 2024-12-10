<html>
    <head>
        <title>Admin Report</title>
		<link rel="stylesheet" href="{{ asset('./css/mainstyle.css') }}">

        <style>
            body{
                display: flex;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Admin Report</h1>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date"  readonly>
            </div>

            <div class="form-group">
                <button type="button">Generate Report</button>
                <button type="button" class="btn-secondary">Dashboard</button>
            </div>

            <h2>Missed Patient Activity</h2>
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
                        <td>Dr. Helock</td>
                        <td>2024-11-18</td>
                        <td>Michael Green</td>
                        <td><input type="checkbox" name="morning-meds" id="morning_meds"></td>
                        <td><input type="checkbox" name="afternoon-meds" id="afternoon_meds"></td>
                        <td><input type="checkbox" name="night-meds" id="night_meds"></td>
                        <td><input type="checkbox" name="breakfast" id="breakfast"></td>
                        <td><input type="checkbox" name="lunch" id="lunch"></td>
                        <td><input type="checkbox" name="dinner" id="dinner"></td>
                    </tr>
                    <tr>
                        <td>Dr. Cooper</td>
                        <td>2024-11-17</td>
                        <td>Emily White</td>
                        <td><input type="checkbox" name="morning-meds" id="morning_meds"></td>
                        <td><input type="checkbox" name="afternoon-meds" id="afternoon_meds"></td>
                        <td><input type="checkbox" name="night-meds" id="night_meds"></td>
                        <td><input type="checkbox" name="breakfast" id="breakfast"></td>
                        <td><input type="checkbox" name="lunch" id="lunch"></td>
                        <td><input type="checkbox" name="dinner" id="dinner"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        @include('navbar')

    </body>
</html>
