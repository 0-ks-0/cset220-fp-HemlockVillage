{{-- <!DOCTYPE html>
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
                color: #333333;
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
                color: #555555;
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

            .submit-btn, .cancel-btn {
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

            .cancel-btn {
                background-color: #6c757d;
            }

            .cancel-btn:hover {
                background-color: #5a6268;
            }
        </style>
    </head>
        <body>
            <div class="container">
                <h1>Registration Approval</h1>
                <div id="patient-list">
                    <p style="text-align: center">Accept or Reject the users!</p>
                </div>
            </div>

            <script>
                // Fetch the list of unapproved patients using AJAX
                async function fetchPatients() {
                    const response = await fetch('/api/patients/unapproved');
                    const patients = await response.json();
                    renderPatients(patients);
                }

                // Render patients to the page dynamically
                function renderPatients(patients) {
                    const container = document.getElementById('patient-list');
                    container.innerHTML = ''; // Clear previous content

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
                                <p>${patient.name}</p>
                            </div>
                            <div class="form-group">
                                <label>Role:</label>
                                <p>${patient.role}</p>
                            </div>
                            <div class="form-group">
                                <label>Approval Status:</label>
                                <div class="radio-group">
                                    <label><input type="radio" name="approval_status_${patient.id}" value="approved" required> Approved</label>
                                    <label><input type="radio" name="approval_status_${patient.id}" value="rejected" required> Rejected</label>
                                </div>
                            </div>
                            <div class="action-buttons">
                                <button class="submit-btn" onclick="approvePatient(${patient.id})">Submit</button>
                            </div>
                        `;

                        container.appendChild(form);
                    });
                }

                // Handle patient approval or rejection via AJAX
                async function approvePatient(patientId) {
                    const approvalStatus = document.querySelector(`input[name="approval_status_${patientId}"]:checked`);

                    if (!approvalStatus) {
                        alert('Please select an approval status.');
                        return;
                    }

                    const status = approvalStatus.value;

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
                        fetchPatients(); // Refresh the patient list
                    } else {
                        alert('Failed to update patient status. Please try again.');
                    }
                }

                // Fetch patients on page load
                fetchPatients();
            </script>
        </body>
</html> --}}


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
            color: #333333;
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
            color: #555555;
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

        .submit-btn, .cancel-btn {
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

        .cancel-btn {
            background-color: #6c757d;
        }

        .cancel-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Approval</h1>
        <div id="patient-list">
            <p style="text-align: center">Accept or Reject the users!</p>
        </div>
    </div>

    <script>
        // Fetch unapproved patients from the API
        async function fetchPatients() {
            const response = await fetch('/api/patients/unapproved');
            const patients = await response.json();
            renderPatients(patients);
        }

        // Render unapproved patients to the page
        function renderPatients(patients) {
            const container = document.getElementById('patient-list');
            container.innerHTML = ''; // Clear any existing content

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
                        <p>${patient.user.name}</p>
                    </div>
                    <div class="form-group">
                        <label>Role:</label>
                        <p>${patient.role}</p>
                    </div>
                    <div class="form-group">
                        <label>Approval Status:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="approval_status_${patient.id}" value="approved" required> Approved</label>
                            <label><input type="radio" name="approval_status_${patient.id}" value="rejected" required> Rejected</label>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button class="submit-btn" onclick="approvePatient(${patient.id})">Submit</button>
                    </div>
                `;

                container.appendChild(form);
            });
        }

        // Call the function to load unapproved patients on page load
        fetchPatients();

        // Approve patient function
        async function approvePatient(patientId) {
            const approvalStatus = document.querySelector(`input[name="approval_status_${patientId}"]:checked`);

            if (!approvalStatus) {
                alert('Please select an approval status.');
                return;
            }

            const status = approvalStatus.value;

            const response = await fetch(`/api/patients/${patientId}/approve`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is included
                },
                body: JSON.stringify({ approval_status: status })
            });

            if (response.ok) {
                alert('Patient status updated successfully.');
                fetchPatients(); // Refresh the list
            } else {
                alert('Failed to update patient status. Please try again.');
            }
        }
    </script>
</body>
</html>

