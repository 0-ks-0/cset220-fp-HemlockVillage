<html>
        <head>
            <title>Edit Role</title>


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
                input[readonly] {
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

            </style>
        </head>
            <body>
                <div class="container">
                    <h1>Edit Role</h1>

                    <form action="/update-role" method="POST">


                        <div class="flexbox">
                            <label for="employee-name">Employee Name:</label>
                            <input type="text" id="employee-name" name="employee_name" value="Jimmy Butler" readonly>
                        </div>

                        <div class="flexbox">
                            <label for="role-name">Role Name:</label>
                            <input type="text" id="role-name" name="role_name" value="Admin" required>
                        </div>

                        <div class="flexbox">
                            <label for="access-level">Access Level:</label>
                            <input type="text" id="access-level" name="access_level" value="5" required>
                        </div>

                        <div class="flexbox">
                            <button type="submit">Save Changes</button>
                            <button type="button" class="btn-danger">Delete Role</button>
                            <button type="button">Cancel</button>
                        </div>
                    </form>
                </div>
                @include('navbar')

            </body>
</html>
