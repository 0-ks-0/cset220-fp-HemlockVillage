<html>
    <head>
        <title>Doctors Appointment Scheduling</title>
        <link rel="stylesheet" href="css/doctorsappointments.css">
    </head>



    <body>
        <div class="container">
            <h1>Doctors Appointment Scheduling</h1>

            <form id="appointment-form">
                <div class="flexbox">
                    <label>Appointment Date</label>
                    <input type="date" id="appointment-date" name="appointment_date" required onchange="redirectToSchedule()">
                </div>

                <div class="flexbox">
                    <label>Patient ID</label>
                    <input type="text" id="patient-id" name="patient_id" placeholder="Enter Patient ID" required>
                </div>

                <div class="flexbox">
                    <label>Doctor</label>
                    <select id="doctor" name="doctor" required>
                        <option value="">Choose a Doctor</option>
                        <option value="Dr. Helock">Dr. Helock</option>
                        <option value="Dr. Cooper">Dr. Cooper</option>
                        <option value="Dr. America">Dr. America</option>
                    </select>
                </div>

]                <div class="flexbox">
                    <label>Patient Name</label>
                    <input type="text" id="patient-name" name="patient_name" placeholder="Enter Patient Name">
                </div>

                <div class="flexbox">
                    <button type="submit">Schedule Appointment</button>
                    <button type="button" onclick="goHome()">Home</button>
                </div>
            </form>

            <h2>Future Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
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

        <script>
            function redirectToSchedule() {
                const date = document.getElementById('appointment-date').value;
                const patientId = document.getElementById('patient-id').value;

                if (date && patientId) {
                    window.location.href = `/schedule?patientId=${patientId}&date=${date}`;
                }
            }

            function goHome() {
                window.location.href = '/doctorshome';
            }
        </script>

        @include('navbar')

    </body>
</html>
