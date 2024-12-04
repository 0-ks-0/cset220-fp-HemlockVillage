<html>
    <head>
        <title>Create New Roster</title>
        <link rel="stylesheet" href="css/mainstyle.css">
    </head>
    <body>
        <div class="container">
            <h1>Create New Roster</h1>

            <form action="/create-roster" method="POST">
                <div class="form-group">
                    <label for="date">Future Date Only</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="supervisor">Supervisor:</label>
                    <select id="supervisor" name="supervisor" required>
                        <option value="">Select a Supervisor</option>
                        <option value="">Nicholas Helock</option>
                        <option value="">Gage Cooper</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="doctor">Doctor:</label>
                    <select id="doctor" name="doctor" required>
                        <option value="">Select a Doctor</option>
                        <option value="">Dr. Cooper</option>
                        <option value="">Dr. Helock</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="caregivers">Caregivers:</label>
                    <select id="caregivers" name="caregivers[]" multiple required>
                        <option value="">Lady 1</option>
                        <option value="">Lady 2</option>
                        <option value="">Lady 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit">Create New Roster</button>
                    <button type="button" class="btn-secondary">Dashboard</button>
                </div>
            </form>
        </div>

        
    </body>
</html>
