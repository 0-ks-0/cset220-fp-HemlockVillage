<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Information</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 20px;
            }
            .container {
                max-width: 600px;
                background: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                margin: auto;
            }
            .info-box {
                margin-bottom: 20px;
                padding: 10px;
                background-color: #e9ecef;
                border-radius: 5px;
            }
            .info-box label {
                font-weight: bold;
            }
            button {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                margin-top: 20px;
            }
            button:hover {
                background-color: #218838;
            }
        </style>
    </head>
        <body>
            <div class="container">
                <h1>Employee Information</h1>

                <div class="info-box">
                    <label>Employee ID:</label>
                    <p>{{ $employee->id }}</p>
                </div>

                <div class="info-box">
                    <label>Name:</label>
                    <p>{{ $employee->user->name ?? 'N/A' }}</p>
                </div>

                <div class="info-box">
                    <label>Email:</label>
                    <p>{{ $employee->user->email ?? 'N/A' }}</p>
                </div>

                <div class="info-box">
                    <label>Role:</label>
                    <p>{{ $employee->user->role->role ?? 'N/A' }}</p>
                </div>

                <div class="info-box">
                    <label>Current Salary:</label>
                    <p>${{ number_format($employee->salary, 2) ?? 'N/A' }}</p>
                </div>

                <form method="POST" action="{{ route('employees.updateSalary') }}">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    <div class="info-box">
                        <label for="new-salary">New Salary:</label>
                        <input type="text" id="new-salary" name="new_salary" required>
                    </div>
                    <button type="submit">Update Salary</button>
                </form>
            </div>

            <script>
                async function fetchEmployeeDetails() {
                    const employeeId = window.location.pathname.split('/').pop();
                    const response = await fetch(`/api/employees/${employeeId}`);
                    const employee = await response.json();
            
                    if (response.ok) {
                        const tbody = document.querySelector('#employee-info tbody');
                        tbody.innerHTML = `
                            <tr>
                                <td>${employee.id}</td>
                                <td>${employee.name || 'N/A'}</td>
                                <td>${employee.email || 'N/A'}</td>
                                <td>${employee.role || 'N/A'}</td>
                                <td>${employee.salary !== 'N/A' ? `$${parseFloat(employee.salary).toFixed(2)}` : 'N/A'}</td>
                            </tr>
                        `;
                    } else {
                        alert('Employee not found');
                    }
                }
            
                fetchEmployeeDetails();
            </script>
        @include('navbar')

        </body>
</html>



