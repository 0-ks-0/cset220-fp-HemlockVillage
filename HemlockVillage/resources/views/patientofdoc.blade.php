<html>
    <head>
        <title>Patient of Doctor</title>

        <link rel="stylesheet" href="{{ asset('./css/mainstyle.css') }}">
    </head>

    <body>
        <div class="container">
            <h1>Patient of Doctor</h1>

            <div class="form-group">
                <label>Patient ID Number</label>
                <input type="text" id="patient-id" name="patient_id" readonly
                    value="{{ $patientId ?? '' }}"
                >
            </div>

            <div>
                <p>First Name: {{ $first_name ?? "" }}</p>
                <p>Last Name: {{ $last_name ?? "" }}</p>
                <p>Date of Birth: {{ $date_of_birth ?? "" }}</p>
            </div>

            @foreach($appointments as $a)
                {{-- Date section --}}
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" readonly
                        @isset($a['appointment_date']) value="{{ $a['appointment_date'] }}" @endisset
                    >
                </div>

                {{-- Comment section --}}
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" rows="4" readonly>{{ $a['comment'] ?? "No comment" }}</textarea>
                </div>

                <h2>Prescription</h2>

                {{-- Prescription table --}}
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
                            <td>{{ $a['morning'] ?? 'Nothing prescribed' }}</td>
                        </tr>

                        <tr>
                            <td>Afternoon</td>
                            <td>{{ $a['afternoon'] ?? 'Nothing prescribed' }}</td>
                        </tr>

                        <tr>
                            <td>Night</td>
                            <td>{{ $a['night'] ?? 'Nothing prescribed' }}</td>
                        </tr>
                    </tbody>
                </table>
            @endforeach

            {{-- New prescription if appointment date --}}
            @if($isAppointmentDay)
                <h2>New Prescription</h2>

                <form action="">
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
                </form>
            @endif
        </div>

        {{-- Pagination -- not showing up --}}
        @if($pagination)
            <div class="pagination">
                @if($pagination['prev_page_url'])
                    <a href="{{ $pagination['prev_page_url'] }}">Previous</a>
                @endif

                <span>Page {{ $pagination['current_page'] }} of {{ $pagination['last_page'] }}</span>

                @if($pagination['next_page_url'])
                    <a href="{{ $pagination['next_page_url'] }}">Next</a>
                @endif
            </div>
        @endif

        @include('navbar')

    </body>
</html>
