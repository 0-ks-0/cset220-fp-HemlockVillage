<html>
    <head>
        <title>Roster</title>
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
            .roster {
                margin-bottom: 30px;
            }
            .roster h2 {
                background-color: gray;
                color: white;
                padding: 10px;
                border-radius: 5px;
            }
            .roster table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
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
            .btn-primary {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 15px;
                background-color: grey;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                text-decoration: none;
                text-align: center;
            }
           
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Roster</h1>

            <div class="roster">
                <h2>Roster for 2024-11-25</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Doctor</td>
                            <td>Dr. Cooper</td>
                        </tr>
                        <tr>
                            <td>Supervisor</td>
                            <td>John Smith</td>
                        </tr>
                        <tr>
                            <td>Caregiver</td>
                            <td>Jane Doe</td>
                        </tr>
                        <tr>
                            <td>Caregiver</td>
                            <td>Emily White</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/edit-roster/2024-11-25" class="btn-primary">Edit Roster</a>

            </div>

            <div class="roster">
                <h2>Roster for 2024-11-26</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Doctor</td>
                            <td>Dr. Helock</td>
                        </tr>
                        <tr>
                            <td>Supervisor</td>
                            <td>Alice Brown</td>
                        </tr>
                        <tr>
                            <td>Caregiver</td>
                            <td>Michael Green</td>
                        </tr>
                        <tr>
                            <td>Caregiver</td>
                            <td>Sarah Johnson</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/edit-roster/2024-11-25" class="btn-primary">Edit Roster</a>

            </div>

            <a href="/create-roster" class="btn-primary">Create Roster</a>

        </div>
    </body>
</html>
