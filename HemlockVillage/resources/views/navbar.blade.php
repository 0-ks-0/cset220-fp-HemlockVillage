<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nav Bar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        nav {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #333;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        nav ul li {
            margin: 20px 0;
        }

        nav ul li a {
            text-decoration: none;
            font-size: 18px;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
        }

        .hamburger {
            font-size: 30px;
            color: black;
            background: #f4f4f4;
            border: none;
            padding: 10px;
            cursor: pointer;
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 1;
            text-align: right;
            width: 50px;
        }

        .hamburger:hover {
            background: none; /
            color: black;
        }

        .hamburger:focus {
            outline: none;
        }

        nav.open {
            width: 250px;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            visibility: hidden;
            transition: visibility 0.3s ease;
        }

        .overlay.show {
            visibility: visible;
        }


        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            .container {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    @auth
        <button class="hamburger" onclick="toggleMenu()">☰</button>

        <nav id="sidebar">
            <ul>
                @php
                    $accessLevel = Auth::user()->role->access_level;
                @endphp


                {{-- MOST TO ALL OF THESE ARE BROKEN BECAUSE YOUR `route` ARE INCORRECT --}}
                {{-- Suggestion: Instead of repeating info, add generic buttons first. then add buttons specific to each access level using if statements --}}
                @if ($accessLevel === 1) {{-- Admin --}}
                    <li><a href="/patients">Patients</a></li>
                    <li><a href="/employees">Employees</a></li>
                    <li><a href="/registration-approval">Registration Approval</a></li>
                    <li><a href="">Roles</a></li>
                    <li><a href="/rosters">Roster</a></li>
                    <li><a href="/report">Admin Report</a></li>

                @elseif ($accessLevel === 2) {{-- Supervisor --}}
                    <li><a href="/patients">Patients</a></li>
                    <li><a href="/employees">Employees</a></li>
                    <li><a href="/rosters">Roster</a></li>

                @elseif ($accessLevel === 3) {{-- Doctor --}}
                    <li><a href="/patientofdoc">Patients</a></li>
                    <li><a href="/rosters">Roster</a></li>
                    <li><a href="/home">Home</a></li>

                @elseif ($accessLevel === 4) {{-- Caregiver --}}
                    <li><a href="/patientofdoc">Patients</a></li>
                    <li><a href="/rosters">Roster</a></li>
                    <li><a href="/home">Home</a></li>

                @elseif ($accessLevel === 5) {{-- Patient --}}
                    <li><a href="/home">Home</a></li>
                    <li><a href="/rosters">Roster</a></li>

                @elseif ($accessLevel === 6) {{-- Family Member --}}
                <li><a href="/home">Home</a></li>
                    <li><a href="/rosters">Roster</a></li>
                    <li><a href="">Make Payment</a></li>
                @endif

                <li><a href="/logout">Logout</a></li>


                {{-- <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> --}}
            </ul>
        </nav>
    @endauth

    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>
</body>
</html>
