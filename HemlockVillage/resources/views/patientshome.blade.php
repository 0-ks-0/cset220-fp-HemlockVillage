<html>
    <head>
        <title>Patients Home</title>
        <link rel="stylesheet" href="css/patientshome.css">

    </head>



    <body>

        {{-- @extends('layouts.app')

        @section('content') --}}


        <div class="container">
            <h1>Patients Home</h1>

            <div class="flexbox">
                <label>Patient ID</label>
                <input type="text" id="patient-id" name="patient_id" readonly value="1">
            </div>

            <div class="flexbox">
                <label>Patient Name</label>
                <input type="text" id="patient-name" name="patient_name" readonly value="Nicholas Helock">
            </div>

            <div class="flexbox">
                <label>Date</label>
                <input type="date" id="date" name="date" readonly value="2024-01-03">
            </div>

            <div class="patient-info">
                <h3>Appointments and Caregivers</h3>
                <table>
                    <tr>
                        <th>Doctor's Name</th>
                        <th>Doctor's Appointment</th>
                        <th>Caregiver's Name</th>
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
                        <td class="status-completed">Completed</td>
                        <td class="status-pending">Pending</td>
                        <td class="status-missing">Missing</td>
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
                        <td class="status-completed">Completed</td>
                        <td class="status-pending">Pending</td>
                        <td class="status-completed">Completed</td>
                    </tr>
                </table>
            </div>

            <div class="flexbox">
                <button type="button">View Roster</button>
            </div>
        </div>
        @include('navbar')

    </body>

</html>
