<html>
    <head>
        <title>Search for Patients</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f5f5f5;
            }
            .container {
                max-width: 1000px;
                margin: auto;
                padding: 20px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .search-bar {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 15px;
                margin-bottom: 20px;
            }
            .search-bar label {
                font-weight: bold;
                margin-bottom: 5px;
            }
            .search-bar input {
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 100%;
            }
            .patient-card {
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 15px;
                margin-bottom: 15px;
                background: #fff;
            }
            .patient-card h3 {
                margin: 0;
                font-size: 18px;
            }
        </style>
    </head>



        <body>
            <div class="container">
                <h1>Search for a Patient</h1>
                
                <form method="GET" action="{{ route('patients.index') }}">
                    <div class="search-bar">
                        <div>
                            <label for="patient-id">Patient ID</label>
                            <input type="text" id="patient-id" name="patient_id" value="{{ request('patient_id') }}">
                        </div>
                        <div>
                            <label for="user-id">User ID</label>
                            <input type="text" id="user-id" name="user_id" value="{{ request('user_id') }}">
                        </div>
                        <div>
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ request('name') }}">
                        </div>
                        <div>
                            <label for="DOB">Date of Birth</label>
                            <input type="date" id="DOB" name="DOB" value="{{ request('DOB') }}">
                        </div>
                        <div>
                            <label for="emergency-contact">Emergency Contact</label>
                            <input type="text" id="emergency-contact" name="emergency_contact" value="{{ request('emergency_contact') }}">
                        </div>
                        <div>
                            <label for="admission-date">Admission Date</label>
                            <input type="date" id="admission-date" name="admission_date" value="{{ request('admission_date') }}">
                        </div>
                    </div>
                    <button type="submit">Search</button>
                </form>

                <div id="patient-list">
                    @forelse($patients as $patient)
                        <div class="patient-card">
                            <h3>Patient Name: {{ $patient->user->name }}</h3>
                            <p>User ID: {{ $patient->user->id }}</p>
                            <p>Patient ID: {{ $patient->id }}</p>
                            <p>Date of Birth: {{ $patient->user->date_of_birth }}</p>
                            <p>Emergency Contact: {{ $patient->emergency_contact }}</p>
                            <p>Admission Date: {{ $patient->admission_date }}</p>
                        </div>
                    @empty
                        <p>No patients found. Please try a different search.</p>
                    @endforelse
                </div>
                
            </div>
        </body>
</html>
