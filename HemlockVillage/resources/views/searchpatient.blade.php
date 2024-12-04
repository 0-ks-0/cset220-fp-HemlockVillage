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
                        <input type="text" id="patient-id" name="patient_id">
                    </div>

                    <div>
                        <label for="user-id">Search by User ID</label>
                        <input type="text" id="user-id" name="user_id">
                    </div>

                    <div>
                        <label for="name">Search by Name</label>
                        <input type="text" id="name" name="name">
                    </div>

                    <div>
                        <label for="DOB">Search by DOB</label>
                        <input type="date" id="DOB" name="DOB">
                    </div>

                    <div>
                        <label for="emergency-contact">Search by Emergency Contact</label>
                        <input type="text" id="emergency-contact" name="emergency_contact">
                    </div>

                    <div>
                        <label for="emergency-contact-name">Search by Emergency Contact Name</label>
                        <input type="text" id="emergency-contact-name" name="emergency_contact_name">
                    </div>

                    <div>
                        <label for="admission-date">Search by Admission Date</label>
                        <input type="date" id="admission-date" name="admission_date">
                    </div>

                    <button>Search</button>
                </div>

                <!-- Format of patient examples -->
                 
                <div id="patient-list">
                    <div class="patient-card">
                        <h3>Patient Name: Gage Cooper</h3>
                        <p>User ID: 234</p>
                        <p>Patient ID: 383</p>
                        <p>Date of Birth: 1999-05-01</p>
                        <button>View Patient Info</button>
                    </div>

                    <div class="patient-card">
                        <h3>Patient Name: Nicholas Helock</h3>
                        <p>User ID: 457</p>
                        <p>Patient ID: 183</p>
                        <p>Date of Birth: 2001-08-20</p>
                        <button>View Patient Info</button>
                    </div>
                </div>
            </div>
        </body>
</html>
