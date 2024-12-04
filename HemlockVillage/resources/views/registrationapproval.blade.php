<html>
    <head>
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
                color: #333333;
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
                display: block;
                font-weight: bold;
                font-size: 14px;
                color: #555555;
                margin-bottom: 5px;
            }

            .form-group input[type="text"] {
                padding: 10px;
                font-size: 16px;
                border: 1px solid #cccccc;
                border-radius: 5px;
                background-color: #fafafa;
                color: #555555;
                width: 100%;
                box-sizing: border-box;
            }

            .form-group input[type="radio"] {
                margin-right: 10px;
                cursor: pointer;
            }

            .radio-group {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .action-buttons {
                display: flex;
                gap: 20px;
                justify-content: center;
                margin-top: 20px;
            }

            .submit-btn, .cancel-btn {
                background-color: #007bff;
                color: white;
                font-size: 16px;
                padding: 10px 20px;
                border-radius: 8px;
                cursor: pointer;
                border: none;
                text-align: center;
                transition: background-color 0.3s ease;
            }

            .submit-btn:hover, .cancel-btn:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Registration Approval</h1>

            @foreach ($patients as $patient)
                <form method="POST" action="{{ route('patients.approve', $patient->id) }}">
                    @csrf
                    @method('POST')
                    <div class="approval-form">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" readonly value="{{ $patient->user->name }}">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" readonly value="{{ $patient->role }}">
                        </div>

                        <div class="form-group">
                            <label>Approval Status</label>
                            <div class="radio-group">
                                <label><input type="radio" name="approval_status" value="approved" required> Approved</label>
                                <label><input type="radio" name="approval_status" value="rejected" required> Rejected</label>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <button type="submit" class="submit-btn">Submit</button>
                            <a href="{{ route('patients.index') }}" class="cancel-btn">Cancel</a>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>

        @include('navbar')

    </body>
</html>
