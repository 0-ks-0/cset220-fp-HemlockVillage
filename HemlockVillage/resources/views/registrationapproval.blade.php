<html>

        <head>
            <title>Registration Approval</title>
            <link rel="stylesheet" href="css/mainstyle.css">
        </head>
            <body>
                <div class="container">
                    <h1>Registration Approval</h1>

                    <div class="approval-form">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" readonly value="Nick Helock">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" id="role" readonly value="Nurse">
                        </div>

                        <div class="form-group">
                            <label>Approval Status</label>

                            <div class="checkbox-group">
                                <label><input type="checkbox" id="approved" name="approve"> Approved</label>
                                <label><input type="checkbox" id="reject" name="rejected"> Rejected</label>
                            </div>
                        </div>
                    </div>

                    <div class="approval-form">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" readonly value="Gage Cooper">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" id="role" readonly value="Nurse">
                        </div>

                        <div class="form-group">
                            <label>Approval Status</label>
                            <div class="checkbox-group">
                                <label><input type="checkbox" id="approved" name="approve"> Approved</label>
                                <label><input type="checkbox" id="rejected" name="reject"> Rejected</label>
                            </div>
                        </div>
                    </div>

                    <button class="dashboard-btn">Dashboard</button>
                </div>

                
            </body>
</html>
