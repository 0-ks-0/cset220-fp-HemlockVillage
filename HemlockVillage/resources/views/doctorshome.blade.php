<html>
    <head>
        <title>Doctors Home</title>
        <link rel="stylesheet" href="css/doctorshome.css">
    </head>

    <body>
        <div class="container">
            <h1>Doctors Home</h1>

            <h2>Old Appointments</h2>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Morning Meds</th>
                        <th>Afternoon Meds</th>
                        <th>Night Meds</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Nicholas Hemlock</td>
                        <td>2024-01-03</td>
                        <td>-This dude is going to be zooted</td>
                        <td><input type="checkbox" name="morning-meds" id="morning_meds"></td>
                        <td><input type="checkbox" name="afternoon-meds" id="afternoon_meds"></td>
                        <td><input type="checkbox" name="night-meds" id="night_meds"></td>

                    </tr>
                </tbody>
            </table>

            <h2>Upcoming Appointments</h2>
            <div class="flexbox">
                <input type="date" id="date" name="date">

                <table>
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Appointment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Gage Cooper</td>
                            <td>2024-04-12</td>
                            <td><button type="button">View Patient Details</button></td>
                        </tr>
                    </tbody>
                </table>

                <div class="flexbox">
                    <button class="secondbutton">View Dashboard</button>
                </div>
            </div>



        </div>
    </body>




</html>