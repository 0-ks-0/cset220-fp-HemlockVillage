<html>
    <head>
        <title>Edit Roster</title>
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
            input, select, button {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            input[type="date"] {
                background-color: #f9f9f9;
                cursor: not-allowed;
            }
            button {
                margin-top: 10px;
                background-color: grey;
                color: white;
                cursor: pointer;
                border: none;
            }
          
            .btn-danger {
                background-color: red;
            }
            
            .btn-secondary {
                background-color: #6c757d;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Edit Roster</h1>
            <form action="/update-roster" method="POST">
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" value="2024-11-25" readonly>
                </div>

                <div class="form-group">
                    <label for="supervisor">Supervisor:</label>
                    <select id="supervisor" name="supervisor" required>
                        <option value="Nicholas Helcok" selected>Nicholas Helcok</option>
                        <option value="Gage Cooper">Gage Cooper</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="doctor">Doctor:</label>
                    <select id="doctor" name="doctor" required>
                        <option value="Dr. Cooper" selected>Dr. Cooper</option>
                        <option value="Dr. Helock">Dr. Helock</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="caregivers">Caregivers:</label>
                    <select id="caregivers" name="caregivers[]" multiple required>
                        <option value="Jane Doe" selected>Jane Doe</option>
                        <option value="Emily White" selected>Emily White</option>
                        <option value="Michael Green">Michael Green</option>
                        <option value="Sarah Johnson">Sarah Johnson</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit">Save Changes</button>
                    <button type="button" class="btn-danger">Delete Roster</button>
                    <button type="button" class="btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
        
        @includes('navbar')

        
    </body>
</html>
