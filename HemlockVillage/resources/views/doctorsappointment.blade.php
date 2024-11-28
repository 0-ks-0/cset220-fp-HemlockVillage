<html>
    <head>
        <title>Doctors Appointment Scheduling</title>
        <link rel="stylesheet" href="css/doctorsappointments.css">
    </head>
    <body>
        <div class="container">
            <h1>Doctors Appointment Scheduling</h1>

            <form action="/schedule-appointment" method="POST">
                
                <div class="flexbox">
                    <label>Doctor</label>
                    <select id="doctor" name="doctor" required>
                        <option value="">Choose a Doctor</option>
                        <option value="">Dr. Helock</option>
                        <option value="">Dr. Cooper</option>
                        <option value="">Dr. America</option>
                    </select>
                </div>
                
                
                <div class="flexbox">
                    <label>Patient ID</label>
                    <input type="text" id="patient-id" name="patient_id" placeholder="Enter Patient ID" required>
                </div>

                <!--Patients name only pops up when id is entered-->
                <div class="flexbox">
                    <label>Patient Name</label>
                    <input type="text" id="patient-name" name="patient_name" placeholder="James Dunken">
                </div>


                <div class="flexbox">
                    <label>Appointment Date</label>
                    <input type="date" id="appointment-date" name="appointment_date" required>
                </div>

                <div class="flexbox">
                    <button type="submit">Schedule Appointment</button><br>
                    <button type="btn-cancel">Cancel</button>
                </div>

            </form>

            <!--Future appointments will pop up once a doctor is selected-->
            <h2>Future Appointments</h2>

            <table>
                <thead>
                    <tr>
                        <th>Patients</th>
                        <th>Doctor</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nick Hemlock</td>
                        <td>Dr. Cooper</td>
                        <td>2024-01-04</td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
    </body>
</html>