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

    {{-- Google Fonts Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body style="background-color: #ffffff;">

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg px-4" style="background-color: #d9e8ff; border-bottom: 1px solid #e6e6e6; height: 70px;">
        <div class="container-fluid">

            {{-- Brand --}}
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <img src="{{ asset('images/Logo.png') }}" height="70" class="me-2">
            </a>

            {{-- Auth Buttons --}}
            <div class="ms-auto d-flex align-items-center">
                <button class="btn btn-link fw-semibold text-dark me-3" style="text-decoration: none; color: #0b1846;">Login</button>
                <button class="btn fw-semibold text-white" style="background-color: #0b1846; border-radius: 7px; padding: 6px 20px;">Sign Up</button>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <div class="w-100">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
