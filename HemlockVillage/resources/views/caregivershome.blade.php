<html>
    <head>
        <title>Caregiver's Home</title>
        <link rel="stylesheet" href="css/mainstyle.css">
    </head>

    <body>
        @extends('layouts.app')

        @section('content')

        <div class="container">
            <h1>Caregiver's Home</h1>

            <div class="form-group">
                <label for="caregiver-id">Caregiver ID:</label>
                <input type="text" id="caregiver-id" value="257" readonly>
            </div>

            <h2>List of Patients Today</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Meds</th>
                        <th>Meals</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Perc 30</td>
                        <td>
                            <label><input type="checkbox" checked> Breakfast</label><br>
                            <label><input type="checkbox"> Lunch</label><br>
                            <label><input type="checkbox"> Dinner</label>
                        </td>
                        <td>
                            <button type="button" class="btn-success">Update Task Completion</button>
                            <button type="button" class="btn-primary">Patient Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>Perc 40</td>
                        <td>
                            <label><input type="checkbox" checked> Breakfast</label><br>
                            <label><input type="checkbox" checked> Lunch</label><br>
                            <label><input type="checkbox"> Dinner</label>
                        </td>
                        <td>
                            <button type="button" class="btn-success">Update Task Completion</button>
                            <button type="button" class="btn-primary">Patient Details</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <button type="button" class="btn-secondary">Dashboard</button>
            </div>
        </div>
        @include('navbar')

    </body>
</html>
