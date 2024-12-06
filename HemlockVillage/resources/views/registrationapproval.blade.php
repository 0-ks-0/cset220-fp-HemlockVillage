<html>
    <head>
        <title>Registration Approval</title>
        <link rel="stylesheet" href="css/mainstyle.css">
    </head>
    <body>
        <div class="container">
            <h1>Registration Approval</h1>

            <div class="approval-form">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" readonly value="Nick Helock">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" id="role" readonly value="Nurse">
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
