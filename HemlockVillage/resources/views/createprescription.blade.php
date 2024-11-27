<html>
    <head>
        <title>Create Prescription</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f5f5f5;
            }
            .container {
                max-width: 800px;
                margin: auto;
                padding: 20px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input, textarea, button {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            textarea {
                resize: vertical;
            }
            button {
                margin-top: 10px;
                background-color: gray;
                color: white;
                cursor: pointer;
                border: none;
            }
            
            .btn-secondary {
                background-color: #6c757d;
            }
           
        </style>
    </head>
        <body>
            <div class="container">
                <h1>Create Prescription</h1>

                <form action="/create-prescription" method="POST">

                    <div class="form-group">
                        <label>Patient ID:</label>
                        <input type="text" id="patient-id" name="patient_id" required>
                    </div>



                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea id="comment" name="comment" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="morning-meds">Morning Meds:</label>
                        <input type="text" id="morning-meds" name="morning_meds" placeholder="Enter morning medications" required>
                    </div>

                    <div class="form-group">
                        <label for="afternoon-meds">Afternoon Meds:</label>
                        <input type="text" id="afternoon-meds" name="afternoon_meds" placeholder="Enter afternoon medications" required>
                    </div>

                    <div class="form-group">
                        <label for="night-meds">Night Meds:</label>
                        <input type="text" id="night-meds" name="night_meds" placeholder="Enter night medications" required>
                    </div>

                    <div class="form-group">
                        <button type="submit">Create</button>
                        <button type="button" class="btn-secondary">Go Back to Patient Home</button>
                    </div>
                </form>
            </div>

            
        </body>
</html>
