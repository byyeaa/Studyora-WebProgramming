<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Quiz App') }}</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        .content {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .navbar {
            height: 60px;
            border-bottom: 1px solid #e6e6e6;
            background: #ffffff;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg px-4" style="background:#cfe0ff; height:70px;">
    <div class="container-fluid">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="#">
            <img src="/logo.png" alt="logo" height="28">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            {{-- Menu --}}
            <ul class="navbar-nav ms-3">
                <li class="nav-item"><a class="nav-link px-3" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('quiz.index') }}">Quiz</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#">Progress</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold px-3" href="#">Leaderboard</a></li>
            </ul>

            {{-- Search Bar --}}
            <form class="d-flex mx-auto position-relative" style="width:300px;">
                <i class="bi bi-search position-absolute" 
                   style="left:10px; top:50%; transform:translateY(-50%); color:#777;"></i>
                <input class="form-control rounded-pill ps-5" 
                       type="text" placeholder="search..." />
            </form>

            {{-- Points --}}
            <div class="d-flex align-items-center">
                <div class="px-3 py-1 rounded-pill text-white me-3" 
                     style="background:#0b1846; font-size:14px;">
                    3200 Points <i class="bi bi-coin"></i>
                </div>

                {{-- Avatar --}}
                <div class="rounded-circle" 
                     style="width:35px; height:35px; background:#eee;"></div>
            </div>

        </div>

    </div>
</nav>


    {{-- PAGE CONTENT --}}
    <div class="content">
        @yield('content')
    </div>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>
