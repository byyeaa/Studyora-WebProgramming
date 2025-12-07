<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studyora</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #ffffff;
            font-family: 'Inter', sans-serif;
        }

        /* NAVBAR */
        .navbar-landing {
            background: #d9e8ff; 
            height: 70px;
            border-bottom: 1px solid #e6e6e6;
        }

        .nav-link {
            color: #0b1846 !important;
            font-weight: 500;
            margin-right: 20px;
        }

        .nav-link:hover {
            color: #27408b !important;
        }

        .search-bar {
            width: 250px;
            border-radius: 50px;
            padding-left: 35px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
        }

        .btn-login {
            background: none;
            border: none;
            font-weight: 600;
            color: #0b1846;
            margin-right: 15px;
        }

        .btn-signup {
            border: none;
            background: #0b1846;
            color: white;
            padding: 6px 20px;
            border-radius: 7px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-landing px-4">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="#">
            <img src="/logo-studyora.png" height="28"> 
        </a>

        <div class="collapse navbar-collapse show">

            {{-- AUTH BUTTONS --}}
            <div class="ms-auto d-flex align-items-center">
                <button class="btn-login">Login</button>
                <button class="btn-signup">Sign Up</button>
            </div>

        </div>
    </div>
</nav>


    {{-- MAIN CONTENT --}}
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
