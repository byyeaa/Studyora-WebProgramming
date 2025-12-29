{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg px-4"
     style="background-color:#d9e8ff; border-bottom:1px solid #e6e6e6; height:70px;">
    
    <div class="container-fluid d-flex align-items-center">

        {{-- LOGO --}}
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="{{ route('home') }}">
            <img src="{{ asset('images/Logo.png') }}"
                 height="50"
                 class="me-2"
                 alt="Studyora Logo">
        </a>

        {{-- HAMBURGER --}}
        <button class="navbar-toggler"
                type="button"
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
                    <a class="nav-link fw-semibold {{ request()->is('progress') ? 'active' : '' }}"
                       href="{{ route('progress') }}">
                        Progress
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->is('leaderboard') ? 'active' : '' }}"
                       href="{{ route('leaderboard') }}">
                        Leaderboard
                    </a>
                </li>

            </ul>

            {{-- RIGHT MENU --}}
            @auth
                <div class="d-flex align-items-center gap-3">

                    {{-- POINTS --}}
                    <div class="fw-bold" style="color:#0b1846;">
                        🏆 {{ auth()->user()->total_points }}
                    </div>

                    {{-- USER DROPDOWN --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="btn btn-link fw-semibold text-decoration-none"
                                    style="color:#0b1846;">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>

                </div>
            @endauth

        </div>
    </div>
</nav>

{{-- NAVBAR STYLE --}}
<style>
    .navbar-nav .nav-link {
        color: #0b1846;
    }

    .navbar-nav .nav-link.active {
        font-weight: 700;
        border-bottom: 2px solid #0b1846;
    }

    .navbar-nav .nav-link:hover {
        opacity: 0.8;
    }
</style>
