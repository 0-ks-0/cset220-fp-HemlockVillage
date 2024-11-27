<html>

        <head>
            <title>Registration Approval</title>

            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    background-color: #f0f4f8;
                }

                .container {
                    max-width: 600px;
                    margin: auto;
                    padding: 20px;
                    background: #ffffff;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                h1 {
                    text-align: center;
                    margin-bottom: 30px;
                    font-size: 24px;
                    color: #333333;
                }

                .approval-form {
                    padding: 15px;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    margin-bottom: 20px;
                    background-color: #f9f9f9;
                }

                .form-group {
                    margin-bottom: 15px;
                }

                .form-group label {
                    display: block;
                    font-weight: bold;
                    font-size: 14px;
                    color: #555555;
                    margin-bottom: 5px;
                }

                .form-group input[type="text"] {
                    padding: 10px;
                    font-size: 16px;
                    border: 1px solid #cccccc;
                    border-radius: 5px;
                    background-color: #fafafa;
                    color: #555555;
                    width: 100%;
                    box-sizing: border-box;
                }

                .form-group input[type="checkbox"] {
                    transform: scale(1.2);
                    margin-right: 10px;
                    cursor: pointer;
                }

                .checkbox-group {
                    display: flex;
                    align-items: center;
                    gap: 20px;
                }

                .dashboard-btn {
                    display: block;
                    background-color: #007bff;
                    color: white;
                    font-size: 16px;
                    padding: 10px 20px;
                    border-radius: 8px;
                    cursor: pointer;
                    border: none;
                    text-align: center;
                    margin: 20px auto 0;
                    width: fit-content;
                    transition: background-color 0.3s ease;
                }

                
            </style>
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
