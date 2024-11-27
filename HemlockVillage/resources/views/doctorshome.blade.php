<html>
    <head>
        <title>Doctors Home</title>




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
            
            .flexbox {
                margin-bottom: 15px;

            }
            input, button {
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
            button {
                margin-top: 10px;
                background-color: grey;
                color: white;
                cursor: pointer;
                border: none;
            }
            .secondbutton {
                margin-top: 10px;
                background-color: grey;
                color: white;
                cursor: pointer;
                border: none;
            }


        </style>
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
                            <th>Patient Details</th>
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