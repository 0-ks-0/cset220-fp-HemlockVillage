<html>
    <head>
        <title>Doctors Appointment Scheduling</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f5f5f5;
            }
            .container {
                max-width: 800px;
                margin: auto;
                padding: 20px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input, select, button {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
           
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }
            th {
                background-color: grey;
                color: white;
            }
            button {
                margin-top: 10px;
                background-color: grey;
                color: white;
                cursor: pointer;
                border: none;
            }
            
            .btn-cancel {
                background-color: grey;
            }
            
        </style>

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
                    <button type="submit">Schedule Appointment</button>
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