<html>
    <head>
        <title>Create New Roster</title>
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
            input, select, button {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            input[type="date"] {
                background-color: #fff;
            }
            button {
                margin-top: 10px;
                background-color: grey;
                color: white;
                cursor: pointer;
                border: none;
            }

            .btn-secondary {
                background-color: #6c757d;
            }
            .btn-secondary:hover {
                background-color: #5a6268;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Create New Roster</h1>

            <form action="/roster/create" method="POST">
                {{--  Date--}}
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date"
                        @isset($currentDate) min="{{ $currentDate }}" @endisset
                        required
                    >
                </div>

                {{-- Supervisor --}}
                <div class="form-group">
                    <label for="supervisor">Supervisor:</label>
                    <select id="supervisor" name="supervisor" required>
                        @isset($employees["supervisors"] )
                            @foreach ($employees["supervisors"]  as $s)
                                @isset($s['employee_id'], $s["name"] )
                                    <option value="{{ $s['employee_id'] }}">{{ $s["name"] }}</option>
                                @endisset
                            @endforeach
                        @endisset
                    </select>
                </div>

                {{-- Doctor --}}
                <div class="form-group">
                    <label for="doctor">Doctor:</label>
                    <select id="doctor" name="doctor" required>
                        @isset($employees["doctors"] )
                            @foreach ($employees["doctors"]  as $s)
                                @isset($s['employee_id'], $s["name"] )
                                    <option value="{{ $s['employee_id'] }}">{{ $s["name"] }}</option>
                                @endisset
                            @endforeach
                        @endisset
                    </select>
                </div>

                {{-- Caregiver one --}}
                <div class="form-group">
                    <label for="caregiver_one">Caregiver 1:</label>
                    <select id="caregiver_one" name="caregivers[]" required>
                        <option value="">Lady 1</option>
                        <option value="">Lady 2</option>
                        <option value="">Lady 3</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="form-group">
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>

    </body>
</html>
