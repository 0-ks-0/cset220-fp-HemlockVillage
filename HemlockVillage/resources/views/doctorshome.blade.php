<html >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Doctors Home</title>
        <link rel="stylesheet" href="css/doctorshome.css">

        <script src="{{ asset('./js/navigator.js') }}"></script>
    </head>
        <body>


            @extends('layouts.app')

            @section('content')
                <div class="container">
                    <h1>Doctor's Home</h1>

                    <h2>Old Appointments</h2>

                    @if($data->isEmpty())
                        <p>No past appointments available.</p>
                    @else

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
                                @isset($data)
                                    @foreach($data as $d)
                                        <tr onclick="setTop(`/doctor/patients/{{ $d['patient_id'] }}`)">
                                            <td>{{ $d['patient_id'] }}</td>
                                            <td>{{ $d['patient_name'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($d['appointment_date'])->format('M d, Y') }}</td>
                                            <td>{{ $d['comment'] }}</td>
                                            <td>{{ $d['prescription']['morning'] ?? 'N/A' }}</td>
                                            <td>{{ $d['prescription']['afternoon'] ?? 'N/A' }}</td>
                                            <td>{{ $d['prescription']['night'] ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    @endif

                    <h2>Upcoming Appointments</h2>

                    <div class="flexbox">
                        <label for="date">Date</label>
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
                                @isset($upcoming)
                                    @foreach($upcoming as $u)
                                        <tr>
                                            <td>{{ $u["patient_name"] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($u["appointment_date"])->format("M d, Y") }}</td>
                                            <td><button onclick="setTop(`/doctor/patients/{{ $u['patient_id'] }}`)">View Patient Details</button></td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>

                    <div class="flexbox">
                        <button class="secondbutton" onclick="window.location.href='/home'">View Dashboard</button>
                    </div>
                </div>
            @endsection

        </body>
</html>
