<html>
    <head>
        <title>Patient of Doctor</title>
        <link rel="stylesheet" href="css/mainstyle.css">
    </head>
    <body>
        <div class="container">
            <h1>Patient of Doctor</h1>

            <div class="form-group">
                <label>Patient ID Number</label>
                <input type="text" id="patient-id" name="patient_id" placeholder="1">
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" readonly>
            </div>


            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="4" readonly>Patient is not dead yet</textarea>
            </div>

            <h2>Current Prescription</h2>
            <table>
                <thead>
                    <tr>
                        <th>Time of Day</th>
                        <th>Medication</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Morning</td>
                        <td>Perc 30</td>
                    </tr>
                    <tr>
                        <td>Afternoon</td>
                        <td>Adderall</td>
                    </tr>
                    <tr>
                        <td>Night</td>
                        <td>Pepto Bismol</td>
                    </tr>
                </tbody>
            </table>

            <h2>New Prescription</h2>
            <div class="form-group">
                <label for="morning-meds">Morning Meds:</label>
                <input type="text" id="morning-meds" name="morning_meds" placeholder="Enter morning medications">
            </div>
            <div class="form-group">
                <label for="afternoon-meds">Afternoon Meds:</label>
                <input type="text" id="afternoon-meds" name="afternoon_meds" placeholder="Enter afternoon medications">
            </div>
            <div class="form-group">
                <label for="night-meds">Night Meds:</label>
                <input type="text" id="night-meds" name="night_meds" placeholder="Enter night medications">
            </div>

            <div class="form-group">
                <button type="submit">Create New Prescription</button>
                <button type="button">Patient Home</button>
                <button type="button" class="btn-secondary">Dashboard</button>
            </div>
        </div>

        @include('navbar')

    </body>
</html>
