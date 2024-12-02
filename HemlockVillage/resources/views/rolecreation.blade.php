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
                    <label>Role Name</label>
                    <input type="text" id="role-name" name="role_name" placeholder="Enter a Role Name" required>
                </div>
    
                <div class="flexbox">
                    <label>Access Level</label>
                    <input type="number" id="access-level" name="access_level" placeholder="Enter Access Level" required>
                </div>
    
                <div class="flexbox">
                    <button type="submit">Create Role</button>
                    <button type="button" onclick="cancelAction()">Cancel</button>
                </div>
            </form>
    
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Access Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Admin</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Caregiver</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Patient</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Doctor</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
        <script>
            function cancelAction() {
                window.location.href = '/dashboard'; 
            }
        </script>
    </body>

</html>
