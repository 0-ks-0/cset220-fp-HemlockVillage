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
                            @foreach ($employees["doctors"]  as $d)
                                @isset($d['employee_id'], $d["name"] )
                                    <option value="{{ $d['employee_id'] }}">{{ $d["name"] }}</option>
                                @endisset
                            @endforeach
                        @endisset
                    </select>
                </div>

                {{-- Caregiver one --}}
                <div class="form-group">
                    <label for="caregiver_one">Caregiver 1:</label>
                    <select id="caregiver_one" name="caregivers[]" required>
                        @isset($employees["caregivers"] )
                            @foreach ($employees["caregivers"]  as $c)
                                @isset($c['employee_id'], $c["name"] )
                                    <option value="{{ $c['employee_id'] }}">{{ $c["name"] }}</option>
                                @endisset
                            @endforeach
                        @endisset
                    </select>
                </div>

                {{-- Caregiver two --}}
                <div class="form-group">
                    <label for="caregiver_two">Caregiver 2:</label>
                    <select id="caregiver_two" name="caregivers[]" required>
                        @isset($employees["caregivers"] )
                            @foreach ($employees["caregivers"]  as $c)
                                @isset($c['employee_id'], $c["name"] )
                                    <option value="{{ $c['employee_id'] }}">{{ $c["name"] }}</option>
                                @endisset
                            @endforeach
                        @endisset
                    </select>
                </div>

                {{-- Caregiver three --}}
                <div class="form-group">
                    <label for="caregiver_three">Caregiver 3:</label>
                    <select id="caregiver_three" name="caregivers[]" required>
                        @isset($employees["caregivers"] )
                            @foreach ($employees["caregivers"]  as $c)
                                @isset($c['employee_id'], $c["name"] )
                                    <option value="{{ $c['employee_id'] }}">{{ $c["name"] }}</option>
                                @endisset
                            @endforeach
                        @endisset
                    </select>
                </div>

                {{-- Caregiver four --}}
                <div class="form-group">
                    <label for="caregiver_four">Caregiver 4:</label>
                    <select id="caregiver_four" name="caregivers[]" required>
                        @isset($employees["caregivers"] )
                            @foreach ($employees["caregivers"]  as $c)
                                @isset($c['employee_id'], $c["name"] )
                                    <option value="{{ $c['employee_id'] }}">{{ $c["name"] }}</option>
                                @endisset
                            @endforeach
                        @endisset
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
