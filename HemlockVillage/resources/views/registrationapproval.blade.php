
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            color: #333;
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
            font-weight: bold;
            font-size: 14px;
            color: #555;
        }

        .radio-group {
            display: flex;
            gap: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .reject-btn {
            background-color: #d9534f;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .reject-btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Registration Approval</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @foreach ($patients as $patient)
            <div class="approval-form">
                <h3>{{ $patient->user->name }}</h3>
                <p>Role: {{ $patient->user->role->role ?? 'N/A' }}</p>
                <p>Email: {{ $patient->user->email }}</p>
                <p>DOB: {{ $patient->user->date_of_birth }}</p>
                <p>Phone Number: {{ $patient->user->phone_number }}</p>

                <form action="{{ route('patients.approve', ['patientId' => $patient->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Approve</button>
                </form>

                <form action="{{ route('patients.reject', ['patientId' => $patient->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Reject</button>
                </form>
            </div>
        @endforeach
    </div>

</body>
</html>
