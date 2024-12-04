<html>
    <head>
        <title>Employee Info</title>
        <link rel="stylesheet" href="css/patientinfo.css">
    </head>
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
                    <button type="submit">Update Salary</button><br>
                    <button type="button">Cancel</button>
                </div>
            </div>
        </form>
        @include('navbar')


    </body>
</html>
