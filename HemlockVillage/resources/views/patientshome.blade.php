<html>
    <head>
        <title>Patients Home</title>
        <link rel="stylesheet" href="css/patientshome.css">
    </head>
    <body>
        <div class="container">
            <h1>Patients Home</h1>
            <div class="flexbox">
                <label>Patient ID</label>
                <input type="text" id="patient-id" name="patient_id" readonly value = 1>
            </div>

            <div class="flexbox">
                <label>Patient Name</label>
                <input type="text" id="patient-name" name="patient_name" readonly value="Nicholas Helock">
            </div>

            <div class="flexbox">
                <label>Date</label>
                <input type="date" id="date" name="date" readonly value="01-03-2024">
            </div>
            <div class="patient-info">
                <h3>Appointments and Caregivers</h3>
                <table>
                    <tr>
                        <th>Doctors name</th>
                        <th>Doctors appointments</th>
                        <th>Caregivers name</th>
                    </tr>
                    <tr>
                        <td>Dr. Rupert Mclovin</td>
                        <td>2024-05-12</td>
                        <td>Ruberta</td>
                    </tr>
                </table>
                <h3>Medicine</h3>
                <table>
                    <tr>
                        <th>Morning</th>
                        <th>Afternoon</th>
                        <th>Night</th>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="morning-meds" id="morning_meds"></td>
                        <td><input type="checkbox" name="afternoon-meds" id="afternoon_meds"></td>
                        <td><input type="checkbox" name="night-meds" id="night_meds"></td>
                    </tr>
                </table>
                <h3>Meals</h3>
                <table>
                    <tr>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="breakfast" id="breakfast"></td>
                        <td><input type="checkbox" name="lunch" id="lunch"></td>
                        <td><input type="checkbox" name="dinner" id="dinner"></td>
                    </tr>
                </table>
            </div>
            <div class="flexbox">
                <button type="button">View Roster</button>
                <button type="button">Update Roster</button>
            </div>

        </div>

    </body>
</html>