{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg px-4"
     style="background-color: #d9e8ff; border-bottom: 1px solid #e6e6e6;">

    <div class="container-fluid">

        {{-- LOGO --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo.png') }}"
                 alt="Studyora Logo"
                 style="height:40px;">
        </a>

        {{-- BURGER --}}
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- LEFT MENU --}}
            <ul class="navbar-nav me-auto ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('quiz.*') ? 'active' : '' }}"
                       href="{{ route('quiz.index') }}">
                        Quiz
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('progress.*') ? 'active' : '' }}"
                       href="{{ route('progress') }}">
                        Progress
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('leaderboard.*') ? 'active' : '' }}"
                       href="{{ route('leaderboard') }}">
                        Leaderboard
                    </a>
                </li>
            </ul>

            {{-- RIGHT USER --}}
            @auth
            <div class="d-flex align-items-center gap-3">
                <span class="fw-bold">🏆 {{ auth()->user()->total_points }}</span>

                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle fw-semibold text-decoration-none"
                            data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                Profile
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm">
                    Login
                </a>
            @endguest

        </div>
    </div>
</nav>

<style>
.navbar-nav .nav-link.active {
    font-weight: 700;
    border-bottom: 2px solid #0b1846;
}
</style>
