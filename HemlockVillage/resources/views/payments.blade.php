<html>
    <head>
        <title>Payments</title>

        <link rel="stylesheet" href="css/mainstyle.css">

        <script src="{{ asset("./js/navigator.js") }}"></script>
    </head>

    <body>
        <div class="container">
            <h1>Payments</h1>

            <form action="">
                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" name="patient_id" placeholder="Patient ID" id="patient-id">
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
                </div>
            </form>
        </div>

        @include('navbar')

    </body>
</html>
