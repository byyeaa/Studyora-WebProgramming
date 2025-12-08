<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Quiz App') }}</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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

        .active-nav {
            color: #0b1846 !important;
            font-weight: 600;
        }

    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg px-4" style="background:#cfe0ff; height:70px;">
    <div class="container-fluid">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="#">
            <img src="{{ asset('images/Logo.png') }}" alt="logo" height="70">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            {{-- Menu --}}
            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active-nav' : '' }}"
                    href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('quiz.index') ? 'active-nav' : '' }}"
                    href="{{ route('quiz.index') }}">Quiz</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('progress') ? 'active-nav' : '' }}"
                    href="{{ route('progress') }}">Progress</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('leaderboard') ? 'active-nav' : '' }}"
                    href="{{ route('leaderboard') }}">Leaderboard</a>
                </li>
            </ul>


            <!-- searchbar -->
            <form class="d-flex mx-auto position-relative" style="width:450px;" method="GET" action="{{ route('quiz.index') }}">
                <i class="bi bi-search position-absolute" 
                style="left:10px; top:50%; transform:translateY(-50%); color:#777;"></i>

                <input class="form-control rounded-pill ps-5" 
                    type="text" 
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="search..." />
            </form>

            <!-- points -->
            <div class="px-3 py-1 rounded-pill text-white me-3 d-flex align-items-center gap-1"
                style="background:#0b1846; font-size:14px;">
                {{ $totalPoints }} Points 
                <i class="bi bi-star-fill" style="color:#FFD700;"></i>
            </div>



           <a href="{{ route('profile.index') }}">
                <img 
                    src="{{ !empty(session('user')) && !empty(session('user')->photo)
                            ? asset('profiles/' . session('user')->photo)
                            : asset('images/default-avatar.png') }}"
                    class="rounded-circle"
                    style="width:40px; height:40px; object-fit:cover;"
                    alt="profile"
                >
            </a>



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
