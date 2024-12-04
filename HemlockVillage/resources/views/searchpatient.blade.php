
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
            .search-button {
                padding: 10px 20px;
                background-color: gray;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }
        </style>
    </head>
        <body>
            <div class="container">
                <h1>Search for a Patient</h1>

                <div class="search-bar">
                    <div>
                        <label for="patient-id">Patient ID</label>
                        <input type="text" id="patient-id">
                    </div>
                    <div>
                        <label for="user-id">User ID</label>
                        <input type="text" id="user-id">
                    </div>
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name">
                    </div>
                    <div>
                        <label for="DOB">Date of Birth</label>
                        <input type="date" id="DOB">
                    </div>
                    <div>
                        <label for="emergency-contact">Emergency Contact</label>
                        <input type="text" id="emergency-contact">
                    </div>
                    <div>
                        <label for="admission-date">Admission Date</label>
                        <input type="date" id="admission-date">
                    </div>
                </div>
                <button class="search-button" onclick="searchPatients()">Search</button>

                <div id="patient-list"></div>
            </div>

            <script>
                async function searchPatients() {
                    const patientId = document.getElementById('patient-id').value;
                    const userId = document.getElementById('user-id').value;
                    const name = document.getElementById('name').value;
                    const dob = document.getElementById('DOB').value;
                    const emergencyContact = document.getElementById('emergency-contact').value;
                    const admissionDate = document.getElementById('admission-date').value;

                    const queryString = new URLSearchParams({
                        patient_id: patientId,
                        user_id: userId,
                        name: name,
                        DOB: dob,
                        emergency_contact: emergencyContact,
                        admission_date: admissionDate
                    }).toString();

                    const response = await fetch(`/api/patients?${queryString}`);
                    const patients = await response.json();
                    renderPatients(patients);
                }

                function renderPatients(patients) {
                    const patientList = document.getElementById('patient-list');
                    patientList.innerHTML = '';

                    if (patients.length === 0) {
                        patientList.innerHTML = '<p>No patients found</p>';
                        return;
                    }

                    patients.forEach(patient => {
                        const patientCard = document.createElement('div');
                        patientCard.className = 'patient-card';
                        patientCard.innerHTML = `
                            <h3>Patient Name: ${patient.user.name}</h3>
                            <p>User ID: ${patient.user.id}</p>
                            <p>Patient ID: ${patient.id}</p>
                            <p>Date of Birth: ${patient.user.date_of_birth}</p>
                            <p>Emergency Contact: ${patient.emergency_contact || 'N/A'}</p>
                            <p>Admission Date: ${patient.admission_date}</p>
                        `;
                        patientList.appendChild(patientCard);
                    });
                }
            </script>
        </body>
</html>
