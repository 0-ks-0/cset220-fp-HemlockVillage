<html>
    <head>
        <title>Caregiver's Home</title>
		<link rel="stylesheet" href="{{ asset('./css/mainstyle.css') }}">
    </head>

    <body>
        @extends('layouts.app')

        @section('content')

        @php
            $authUser = Auth::user();
            $caregiverId = $authUser->employees->first()->id ?? null;
            $caregiverName = "{$authUser->first_name} {$authUser->last_name}" ?? null;
        @endphp

        <div class="container">
            <h1>Caregiver's Home</h1>

            <div class="form-group">
                <label for="caregiver-id">Caregiver ID:</label>
                <input type="text" id="caregiver-id" value="{{ $caregiverId ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="caregiver-id">Name:</label>
                <input type="text" id="caregiver-id" value="{{ $caregiverName ?? ''}}" readonly>
            </div>

            {{-- No roster created or not on roster --}}
            @if(isset($message))
                <div>{{ $message }}</div>

            {{-- Display patients --}}
            @else
                <h2>List of Patients Today</h2>

                @isset($data)
                {{-- No patients --}}
                    @if(empty($data))
                        No patients

                    {{-- Display patients --}}
                    @else
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
                                @foreach($data as $d)
                                    <form action="">
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
                                    </form>
                                @endforeach
                            </tbody>
                        @endif
                    @endisset
                </table>
            @endif


            <div class="form-group">
                <button type="button" class="btn-secondary">Dashboard</button>
            </div>
        </div>
        @include('navbar')

    </body>
</html>
