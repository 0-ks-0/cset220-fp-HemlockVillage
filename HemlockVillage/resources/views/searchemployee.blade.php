<html>
        <head>
    
            <title>Search for Employees</title>


            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    background-color: #f5f5f5;
                }

                .container {
                    max-width: 1000px;
                    margin: auto;
                    padding: 20px;
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                h1 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .search-bar {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 15px;
                    margin-bottom: 20px;
                }

                .search-bar label {
                    font-weight: bold;
                    margin-bottom: 5px;
                    display: block;
                    font-size: 14px;
                    color: #333;
                }

                .search-bar input {
                    padding: 10px;
                    font-size: 16px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    width: 100%;
                }

                .search-bar button {
                    grid-column: span 4;
                    color: black;
                    font-size: 16px;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    align-self: center;
                }

                .employee-card {
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    padding: 15px;
                    margin-bottom: 15px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    background: #fff;
                }

                .employee-card h3 {
                    margin: 0;
                    font-size: 18px;
                }

                .employee-card p {
                    margin: 5px 0;
                    font-size: 14px;
                    color: #555;
                }

                .employee-card button {
                    margin-top: 10px;
                    color: black;
                    font-size: 14px;
                    padding: 8px 15px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
            </style>
        </head>



        <body>
            <div class="container">
                <h1>Search for an Employee</h1>

                <div class="search-bar">
                    <div>
                        <label for="employee-id">Search by Employee ID</label>
                        <input type="text" id="employee-id" name="employee_id">
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
                        <label for="role">Search by Role</label>
                        <input type="text" id="role" name="role">
                    </div>

                    <div>
                        <label for="salary">Search by Salary</label>
                        <input type="text" id="salary" name="salary">
                    </div>

                    <button>Search</button>
                </div>

                <div>
                    <div class="employee-card">
                        <h3>Employee Name: Nicholas Helock</h3>
                        <p>User ID: 699</p>
                        <p>Employee ID: 34</p>
                        <p>Role: Silly Guy</p>
                        <p>Salary: $15,000</p>
                        <button>View Employee Info</button>
                    </div>

                    <div class="employee-card">
                        <h3>Employee Name: Gage Cooper</h3>
                        <p>User ID: 420</p>
                        <p>Employee ID: 56</p>
                        <p>Role: Escort</p>
                        <p>Salary: $140,000</p>
                        <button>View Employee Info</button>
                    </div>
                </div>
            </div>
        </body>
</html>
