<html>
    <head>
        <title>Payments</title>
        <link rel="stylesheet" href="css/mainstyle.css">
    </head>
    
        <body>
            <div class="container">
                <h1>Payments</h1>

                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" id="patient-id" >
                </div>

                <div class="form-group">
                    <label for="total-due">Total Due:</label>
                    <input type="text" id="total-due" value="$150.00" readonly>
                </div>

                <div class="form-group">
                    <label for="new-payment">New Payment:</label>
                    <input type="text" id="new-payment" >
                </div>

                <div class="form-group">
                    <button type="button">Update Payment</button>
                    <button type="button">Dashboard</button>
                </div>
            </div>
        </body>
</html>
