<html >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Doctors Home</title>
		<link rel="stylesheet" href="{{ asset('./css/doctorshome.css') }}">
    </head>
        <body>


            @extends('layouts.app')

            @section('content')
                <div class="container">
                    <h1>Doctor's Home</h1>

                    <h2>Old Appointments</h2>

                    <table>
                        <thead>
                            <tr>
                                <th>Patient ID</th>
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
                                <td>1</td>
                                <td>Nicholas Hemlock</td>
                                <td>2024-01-03</td>
                                <td>- This dude is going to be zooted</td>
                                <td>Perc 30</td>
                                <td>Pepto</td>
                                <td>Dogwater</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2>Upcoming Appointments</h2>

                    <div class="flexbox">
                        <label for="date">Select Date</label>
                        <input type="date" id="date" name="date" />

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
                    </div>

                    <div class="flexbox">
                        <button class="secondbutton" onclick="window.location.href='/home'">View Dashboard</button>
                    </div>
                </div>
            @endsection
            @include('navbar')

        </body>
</html>
