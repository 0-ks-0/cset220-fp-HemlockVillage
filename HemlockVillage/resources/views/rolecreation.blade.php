<html>
    <head>
        <title>Role Creation</title>
        <link rel="stylesheet" href="css/rolecreation.css">
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
                        <th></th>
                        <th></th>
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
