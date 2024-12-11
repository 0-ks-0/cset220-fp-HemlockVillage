<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>New Search Patients</title>

    <link rel="stylesheet" href="{{ asset('./css/searchpatient.css') }}">
</head>
<body>
    <div class="container">
        <h1>Search Patients</h1>

        <div class="search-bar">
            <form id="search-form">
                <input type="text" id="user-id" placeholder="User ID"><br>
                <input type="text" id="patient-id" placeholder="Patient ID"><br>
                <input type="text" id="name" placeholder="Name"><br>
                <input type="number" id="age" placeholder="Age"><br>
                <input type="text" id="emergency-contact" placeholder="Emergency Contact"><br>
                <input type="text" id="emergency-contact-name" placeholder="Emergency Contact Name"><br>
                <button type="button" onclick="searchPatients()">Search</button>
            </form>
        </div>

        <div id="patient-list"></div>
    </div>

    <script>
        function searchPatients() {
            const userId = document.getElementById('user-id').value;
            const patientId = document.getElementById('patient-id').value;
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const emergencyContact = document.getElementById('emergency-contact').value;
            const emergencyContactName = document.getElementById('emergency-contact-name').value;

            const params = new URLSearchParams({
                user_id: userId,
                patient_id: patientId,
                name: name,
                age: age,
                emergency_contact: emergencyContact,
                emergency_contact_name: emergencyContactName
            });

            fetch(`/patients/search?${params}`)
                .then(response => response.json())
                .then(data => {
                    const patientList = document.getElementById('patient-list');
                    patientList.innerHTML = ''; 

                    if (data.length === 0) {
                        patientList.innerHTML = '<p>No patients found matching your criteria.</p>';
                        return;
                    }

                    data.forEach(patient => {
                        const card = document.createElement('div');
                        card.classList.add('patient-card');
                        card.innerHTML = `
                            <h3>Patient Name: ${patient.name}</h3>
                            <p>Patient ID: ${patient.patient_id}</p>
                            <p>User ID: ${patient.user_id}</p>
                            <p>Age: ${patient.age}</p>
                            <p>Emergency Contact: ${patient.emergency_contact}</p>
                            <p>Emergency Contact Name: ${patient.emergency_contact_name}</p>
                            <button onclick="window.location.href='/patients/${patient.patient_id}'">View Patient Info</button>
                        `;
                        patientList.appendChild(card);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    const patientList = document.getElementById('patient-list');
                    patientList.innerHTML = '<p>There was an error processing your request. Please try again.</p>';
                });
        }
    </script>
</body>
</html>
