<html>
    <head>
        <title>Payments</title>
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
            .form-group {
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

            .hidden {
                display: none;
            }
        </style>
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


            @include('navbar')

        </body>
</html>
