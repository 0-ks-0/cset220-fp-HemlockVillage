<html>
    <head>
        <title>Family Home</title>
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
            input, button, table {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            input[readonly] {
                background-color: #f9f9f9;
                cursor: not-allowed;
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
                background-color: gray;
                color: white;
            }
            button {
                margin-top: 10px;
                background-color: gray;
                color: white;
                cursor: pointer;
                border: none;
            }
           
            .btn-secondary {
                background-color: #6c757d;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Family Home</h1>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" >
            </div>

            <div class="form-group">
                <label for="family-code">Family Code:</label>
                <input type="text" id="family-code" placeholder="Enter Family Code">
            </div>

            <div class="form-group">
                <label for="patient-id">Patient ID:</label>
                <input type="text" id="patient-id" placeholder="Enter Patient ID">
            </div>

            <div class="form-group">
                <button type="button">Search for Patient</button>
                <button type="button" class="btn-secondary">Dashboard</button>
            </div>

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
        </div>

        @includes('navbar')

    </body>
</html>
