<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        .container {
            max-width: 900px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: black;
            color: white;
        }
        .form-section {
            margin-top: 30px;
        }
        .flexbox {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        label {
            width: 30%;
            font-weight: bold;
        }
        input[type="text"] {
            width: 65%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Patient Information</h1>

        <table>
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Date of Birth</th>
                    <th>Phone</th>
                    <th>Family Code</th>
                    <th>Emergency Contact</th>
                    <th>Emergency Contact Phone</th>
                    <th>Relation</th>
                    <th>Admission Date</th>
                    <th>Group Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->user->first_name }} {{ $patient->user->last_name }}</td>
                    <td>{{ $patient->user->email }}</td>
                    <td>{{ $patient->user->role->role }}</td>
                    <td>{{ $patient->user->date_of_birth }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->family_code }}</td>
                    <td>{{ $patient->econtact_name }}</td>
                    <td>{{ $patient->econtact_phone }}</td>
                    <td>{{ $patient->econtact_relation }}</td>
                    <td>{{ $patient->admission_date }}</td>
                    <td>{{ $patient->group_num }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Update Emergency Contact Form -->
        <div class="form-section">
            <h2>Update Emergency Contact</h2>
            <form action="{{ route('patients.updateEmergencyContact', $patient->id) }}" method="POST">
                @csrf
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" id="emergency_contact" name="emergency_contact" value="{{ $patient->emergency_contact }}" required>
                <button type="submit">Update Emergency Contact</button>
            </form>

        </div>
    </div>
</body>
</html>
