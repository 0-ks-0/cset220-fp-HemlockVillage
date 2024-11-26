<html>
    <head>
        <title>Role Creation</title>
        <link rel="stylesheet" href="css/rolecreation.css">
    </head>


    <body>
        <div class="container">
            <h1>Roles</h1>

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
                        <td><button type="button" class="edit-btn">Edit</button></td>
                        <td><button type="button" class="delete-btn">Delete</button></td>
                    </tr>
                    <tr>
                        <td>James Butler</td>
                        <td>Caregiver</td>
                        <td><button type="button" class="edit-btn">Edit</button></td>
                        <td><button type="button" class="delete-btn">Delete</button></td>
                    </tr>
                    <tr>
                        <td>Jerome Butler</td>
                        <td>Patient</td>
                        <td><button type="button" class="edit-btn">Edit</button></td>
                        <td><button type="button" class="delete-btn">Delete</button></td>
                    </tr>
                </tbody>
             
            </table>



            <form action="/create-role" method="POST">
                <div class="flexbox">
                    <label>Role Name</label>
                <input type="text" id="role-name" name="role_name" placeholder="Enter a Name" required>
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
        </div>
    </body>

</html>>