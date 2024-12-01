<html >
    <head>
        <title>Patient Info</title>
        <link rel="stylesheet" href="css/patientinfo.css">
        <style>
            .container {
                max-width: 800px;
                margin: auto;
                padding: 20px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                font-family: Arial, sans-serif;
            }

            .flexbox {
                margin-bottom: 15px;
                display: flex;
                flex-direction: column;
            }

            label {
                font-weight: bold;
                margin-bottom: 5px;
            }

            input, select, button {
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 100%;
            }

            button {
                margin-top: 10px;
                color: black;
                cursor: pointer;
                border: none;
            }

            
        </style>
    </head>

    <body>
        <form action="/submit-patient-info" method="POST">
            <div class="container">
                <h1>Patient Information</h1>

                <div class="flexbox">
                    <label>User ID</label>
                    <input type="text" id="user-id" name="user_id" readonly value="1001">
                </div>

                <div class="flexbox">
                    <label>Patient ID</label>
                    <input type="text" id="patient-id" name="patient_id" readonly value="1" required>
                </div>

                <div class="flexbox">
                    <label>Patient Name</label>
                    <input type="text" id="patient-name" readonly value="Nicholas Helock">
                </div>

                <div class="flexbox">
                    <label>Date of Birth</label>
                    <input type="text" id="dob" readonly value="1995-04-15">
                </div>

                <div class="flexbox">
                    <label>Email</label>
                    <input type="text" id="email" readonly value="nicholas@gmail.com">
                </div>

                <div class="flexbox">
                    <label>Phone Number</label>
                    <input type="text" id="phone" readonly value="717-234-1636">
                </div>

                <div class="flexbox">
                    <label>Emergency Contact Name</label>
                    <input type="text" id="econtact-name" readonly value="Dog Helock">
                </div>

                <div class="flexbox">
                    <label>Emergency Contact Phone</label>
                    <input type="text" id="econtact-phone" readonly value="717-666-6543">
                </div>

                <div class="flexbox">
                    <label>Family Code</label>
                    <input type="text" id="family-code" readonly value="34534">
                </div>

                <div class="flexbox">
                    <label>Group</label>
                    <select id="group" name="group" required>
                        <option value="">Select a Group</option>
                        <option value="Group 1">Group 1</option>
                        <option value="Group 2">Group 2</option>
                        <option value="Group 3">Group 3</option>
                        <option value="Group 4">Group 4</option>
                    </select>
                </div>

                <div class="flexbox">
                    <label>Admission Date</label>
                    <input type="text" id="admission-date" readonly value="2024-02-12">
                </div>

                <div class="flexbox">
                    <button type="submit">Submit</button>
                    <button type="button">Cancel</button>
                    <button type="button">Schedule Appointment</button>
                </div>
            </div>
        </form>
    </body>
</html>
