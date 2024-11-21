<html>
    <head>
        <title>Patient Info</title>

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
        .flexbox {
            margin-bottom: 15px;
        }
            
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input, button {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

        </style>
    </head>

    <body>
        <form action="/submit-patient-info" method="POST">

            <div class="container">

                <h1>Patient Information</h1>
                <div>
                    <div class="flexbox">
                        <label>Patient-ID</label>
                        <input type="text" id="patient-id" name="patient_id" readonly value="1" required>
                    </div>
    
                </div>
    
                <div class="flexbox">
                    <label>Patient Name</label>
                    <input type="text" id="patient-name" readonly value="Nicholas Helock" >
                </div>
    
                <div class="flexbox">
                    <label>Group</label>
                    <select id="group" name="group" required>
                        <option value="">Select a Group</option>
                        <option value="">Group 1</option>
                        <option value="">Group 2</option>
                        <option value="">Group 3</option>
                        <option value="">Group 4</option>
                        <option value="">Group 5</option>
                    </select>
                </div>
    
                <div class="flexbox">
                    <label>Admission Date</label>
                    <input type="text" id="admission-date" required readonly value="2024-02-12">
                </div>
    
                <div class="flexbox">
                    <label>Submission</label>
                    <button type="submit">Submit</button>
                    <button type="button">Cancel</button>
                </div>
     
                
            </form>
    

            </div>
            
    </body>
</html>