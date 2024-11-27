<html>
    <head>
        <title>Role Creation</title>

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
            
            button {
                margin-top: 10px;
                background-color: grey;
                color: white;
                cursor: pointer;
                border: none;
            }
            td {
                text-align: center
            }
            .create-btn {
                color: white;
                background-color: grey;
            }
            .dashboard-btn {
                color: white;
                background-color: grey;
            }
            .delete-btn {
                color: white;
                background-color: red;
            }
            .edit-btn {
                color: white;
                background-color: grey;
            }
        </style>



    </head>


    <body>
        <div class="container">
            <h1>Roles</h1>

            <form action="/create-role" method="POST">

                <div class="flexbox">
                    <label>Employee Name</label>
                    <input type="text" id="employee-name" name="employee_name" placeholder="Enter a Name">
                </div>
                <div class="flexbox">
                    <label>Role Name</label>
                <input type="text" id="role-name" name="role_name" placeholder="Enter a Role" required>
                </div>

                <div class="flexbox">
                    <label>Access Level</label>
                    <input type="text" id="access-level" name="access_level" required>
                </div>

                <div class="flexbox">
                    <button type="submit" class="create-btn">Create Role</button>
                    <button type="button" class="dashboard-btn">Dashboard</button>
                </div>


            </form> 


            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Role</th>
                        <th>Access Level</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jimmy Butler</td>
                        <td>Admin</td>
                        <td>5</td>
                        <td><button type="button" class="edit-btn">Edit</button></td>
                        <td><button type="button" class="delete-btn">Delete</button></td>
                    </tr>
                    <tr>
                        <td>James Butler</td>
                        <td>Caregiver</td>
                        <td>2</td>
                        <td><button type="button" class="edit-btn">Edit</button></td>
                        <td><button type="button" class="delete-btn">Delete</button></td>
                    </tr>
                    <tr>
                        <td>Jerome Butler</td>
                        <td>Patient</td>
                        <td>1</td>
                        <td><button type="button" class="edit-btn">Edit</button></td>
                        <td><button type="button" class="delete-btn">Delete</button></td>
                    </tr>
                </tbody>
             
            </table>

        </div>
    </body>

</html>>