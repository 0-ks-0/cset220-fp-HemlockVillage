<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Approval</title>

    <link rel="stylesheet" href="{{ asset('./css/mainstyle.css') }}">
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
