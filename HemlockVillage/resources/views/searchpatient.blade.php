<html>
    <head>

        <title>List of Patients / Search Patient</title>
        <link rel="stylesheet" href="css/searchpatient.css">
    </head>


        <body>
            <div class="container">
                <h1>Search for a Patient</h1>

        <div class="search-bar">
            <div>
                <label for="patient-id">Search by Patient ID</label>
                <input type="text" id="patient-id" placeholder="Enter Patient ID">
            </div>

            <div>
                <label for="user-id">Search by User ID</label>
                <input type="text" id="user-id" placeholder="Enter User ID">
            </div>

            <div>
                <label for="name">Search by Name</label>
                <input type="text" id="name" placeholder="Enter Name">
            </div>

            <div>
                <label for="dob">Search by Age</label>
                <input type="text" id="dob" placeholder="Enter a Number">
            </div>


            <div>
                <label for="emergency_contact">Search by Emergency Contact</label>
                <input type="text" id="emergency_contact" placeholder="Enter Emergency Contact">
            </div>

            <div>
                <label for="emergency_contact_name">Search by Emergency Contact Name</label>
                <input type="text" id="emergency_contact_name" placeholder="Enter Emergency Contact Name">
            </div>

            <button onclick="searchPatients()">Search</button>
        </div>

        <div id="patient-list"></div>
    </div>

    <script>
        function searchPatients() {
            const patientId = document.getElementById('patient-id').value;
            const userId = document.getElementById('user-id').value;
            const name = document.getElementById('name').value;
            const dob = document.getElementById('dob').value;
            const emergencyContact = document.getElementById('emergency_contact').value;

            const params = new URLSearchParams({
                patient_id: patientId,
                user_id: userId,
                name: name,
                dob: dob,
                emergency_contact: emergencyContact
            });

            fetch(`/patients/search?${params}`)
                .then(response => response.json())
                .then(data => {
                    const patientList = document.getElementById('patient-list');
                    patientList.innerHTML = '';  // Clear previous content

                    if (data.length === 0) {
                        patientList.innerHTML = '<p>No patients found matching your criteria.</p>';
                        return;
                    }

                    data.forEach(patient => {
                        const card = document.createElement('div');
                        card.classList.add('patient-card');
                        card.innerHTML = `
                            <h3>Patient Name: ${patient.user.name}</h3>
                            <p>Patient ID: ${patient.id}</p>
                            <p>Role: ${patient.user.role}</p>
                            <button onclick="window.location.href='/patients/${patient.id}'">View Patient Info</button>
                        `;
                        patientList.appendChild(card);
                    });
                })
                .catch(error => {
                    console.error("Error fetching patients:", error);
                });
        }
    </script>

</body>
</html>
