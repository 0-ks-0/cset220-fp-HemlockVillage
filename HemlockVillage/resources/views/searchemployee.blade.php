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
                        <input type="text" id="employee-id" placeholder="Enter Employee ID">
                    </div>

                    <div>
                        <label for="user-id">Search by User ID</label>
                        <input type="text" id="user-id" placeholder="Enter User ID">
                    </div>

                    <div>
                        <label for="name">Search by Name</label>
                        <input type="text" id="name" placeholder="Enter Name">
                    </div>

                    <div>
                        <label for="role">Search by Role</label>
                        <input type="text" id="role" placeholder="Enter Role">
                    </div>

                    <div>
                        <label for="salary">Search by Salary</label>
                        <input type="text" id="salary" placeholder="Enter Salary">
                    </div>

                    <button onclick="searchEmployees()">Search</button>
                </div>

                <div id="employee-list"></div>
            </div>

            <script>
                function searchEmployees() {
                    const employeeId = document.getElementById('employee-id').value;
                    const userId = document.getElementById('user-id').value;
                    const name = document.getElementById('name').value;
                    const role = document.getElementById('role').value;
                    const salary = document.getElementById('salary').value;

                    const params = new URLSearchParams({
                        employee_id: employeeId,
                        user_id: userId,
                        name: name,
                        role: role,
                        salary: salary
                    });

                    fetch(`/employees/search?${params}`)
                        .then(response => response.json())
                        .then(data => {
                            const employeeList = document.getElementById('employee-list');
                            employeeList.innerHTML = ''; 

                            data.forEach(employee => {
                                const card = document.createElement('div');
                                card.classList.add('employee-card');
                                card.innerHTML = `
                                    <h3>Employee Name: ${employee.name}</h3>
                                    <p>User ID: ${employee.user_id}</p>
                                    <p>Employee ID: ${employee.employee_id}</p>
                                    <p>Role: ${employee.role}</p>
                                    <p>Salary: $${employee.salary}</p>
                                    <button>View Employee Info</button>
                                `;
                                employeeList.appendChild(card);
                            });
                        });
                }
            </script>

        @includes('navbar')

        </body>
</html>
