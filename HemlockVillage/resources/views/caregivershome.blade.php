<html>
        <head>
            <title>Caregiver's Home</title>


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
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                th, td {
                    padding: 10px;
                    border: 1px solid #ddd;
                    text-align: left;
                }
                th {
                    background-color: gray;
                    color: white;
                }
                .form-group {
                    margin-bottom: 15px;
                }
                input[type="checkbox"] {
                    margin-right: 10px;
                }
                button {
                    padding: 10px 15px;
                    font-size: 16px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    text-align: center;
                }
                .btn-primary {
                    background-color: gray;
                    color: white;
                }

                .btn-secondary {
                    background-color: #6c757d;
                    color: white;
                }

                .btn-success {
                    background-color: green;
                    color: white;
                }

            </style>
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



            </body>
</html>
