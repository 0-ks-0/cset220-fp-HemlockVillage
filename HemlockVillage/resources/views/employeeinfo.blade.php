<html>
    <head>
        <title>Employee Info</title>

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
    </head
    <body>



        <form action="update-employee-salary" method="POST">

            <div class="container">
                <h1>Employee Information / Salary</h1>

                <div class="flexbox">
                    <label>User ID</label>
                    <input type="text" id="user-id" name="user_id" placeholder="1">
                </div>

                <div class="flexbox">
                    <label>Full Name</label>
                    <input type="text" id="full-name" name="fuil_name" placeholder="James Pearson">
                </div>

                <div class="flexbox">
                    <label>Email</label>
                    <input type="text" id="email" name="email" placeholder="pearson@gmail.com">
                </div>

                <div class="flexbox">
                    <label>Phone Number</label>
                    <input type="text" id="number" name="number" placeholder="717-555-2342">
                </div>

                <div class="flexbox">
                    <label>Role</label>
                    <input type="text" id="role" name="role" placeholder="Caregiver">
                </div>
                
                <div class="flexbox">
                    <label>Current Salary</label>
                    <input type="text" id="current-salary" name="current_salary" placeholder="$78,000">
                </div>

                <div class="flexbox">
                    <label>New Salary</label>
                    <input type="text" id="new-salary" name="new_salary" placeholder="Enter New Salary">
                </div>
                
                <div class="flexbox">
                    <label>Update Salary</label>
                    <button type="submit">Update Salary</button>
                    <button type="button">Cancel</button>
                </div>
            </div>
        </form>


    </body>
</html>
