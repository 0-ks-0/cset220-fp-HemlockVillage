<html>
    <head>
        <title>Patient Info</title>
        <link rel="stylesheet" href="css/patientinfo.css">
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
                    <button type="submit">Submit</button><br>
                    <button type="button">Cancel</button>
                </div>
     
                
            </form>
    

            </div>
            
    </body>
</html>