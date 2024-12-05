<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Approval</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f4f8;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #333;
        }

        .approval-form {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 14px;
            color: #555;
        }

        .radio-group {
            display: flex;
            gap: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Approval</h1>
        <div id="patient-list">
            <p style="text-align: center;">Loading...</p>
        </div>
    </div>

    <script>
        async function fetchPatients() {
            try {
                const response = await fetch('/api/patients/unapproved');
                const patients = await response.json();
                renderPatients(patients);
            } catch (error) {
                document.getElementById('patient-list').innerHTML = '<p>Failed to load patients.</p>';
                console.error('Error fetching patients:', error);
            }
        }

        function renderPatients(patients) {
            const container = document.getElementById('patient-list');
            container.innerHTML = '';

            if (patients.length === 0) {
                container.innerHTML = '<p>No unapproved patients found.</p>';
                return;
            }

            patients.forEach(patient => {
                const form = document.createElement('div');
                form.className = 'approval-form';

                form.innerHTML = `
                    <div class="form-group">
                        <label>Name:</label>
                        <p>${patient.user.name || 'N/A'}</p>
                    </div>
                    <div class="form-group">
                        <label>Role:</label>
                        <p>${patient.role || 'N/A'}</p>
                    </div>
                    <div class="form-group">
                        <label>Approval Status:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="approval_status_${patient.id}" value="approved"> Approved</label>
                            <label><input type="radio" name="approval_status_${patient.id}" value="rejected"> Rejected</label>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button class="submit-btn" onclick="approvePatient(${patient.id})">Submit</button>
                    </div>
                `;

                container.appendChild(form);
            });
        }

        async function approvePatient(patientId) {
            const approvalStatus = document.querySelector(`input[name="approval_status_${patientId}"]:checked`);

            if (!approvalStatus) {
                alert('Please select an approval status.');
                return;
            }

            const status = approvalStatus.value;

            try {
                const response = await fetch(`/api/patients/${patientId}/approve`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ approval_status: status })
                });

                if (response.ok) {
                    alert('Patient status updated successfully.');
                    fetchPatients(); // Refresh list
                } else {
                    alert('Failed to update patient status.');
                }
            } catch (error) {
                alert('An error occurred. Please try again.');
                console.error('Error approving patient:', error);
            }
        }

        fetchPatients(); // Load patients on page load
    </script>
</body>
</html>
