<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .search-bar button {
            grid-column: span 4;
            color: black;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .patient-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        .patient-card h3 {
            margin: 0;
            font-size: 18px;
        }
        .patient-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .patient-card button {
            margin-top: 10px;
            color: black;
            font-size: 14px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
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
