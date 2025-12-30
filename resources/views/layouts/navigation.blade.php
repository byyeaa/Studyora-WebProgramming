<nav class="navbar navbar-expand-lg px-4"
     style="background-color:#d9e8ff;border-bottom:1px solid #e6e6e6;height:70px;">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="{{ route('home') }}">
            <img src="{{ asset('images/Logo.png') }}"
                 height="70"
                 width="170"
                 class="me-2"
                 alt="Studyora Logo">
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto ms-4">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}"
                       style="color:#0b1846;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('quiz.*') ? 'active' : '' }}"
                       href="{{ route('quiz.index') }}"
                       style="color:#0b1846;">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->is('progress') ? 'active' : '' }}"
                       href="{{ route('progress') }}"
                       style="color:#0b1846;">Progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->is('leaderboard') ? 'active' : '' }}"
                       href="{{ route('leaderboard') }}"
                       style="color:#0b1846;">Leaderboard</a>
                </li>
            </ul>

            @auth
                <div class="points-display ms-3 fw-bold" style="color:#0b1846;">
                    🏆 Total Points: {{ auth()->user()->total_points }}
                </div>

                <div class="d-flex align-items-center ms-3 position-relative profile-wrapper">
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
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();this.closest('form').submit();">
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

<style>
    .navbar-collapse{visibility:visible!important}
    .navbar-collapse.collapse{display:flex!important}
   @media (max-width: 991px) {
    .profile-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 8px;
    }

    .profile-wrapper button {
        width: 100%;
        text-align: center;
    }

    .profile-wrapper .dropdown-menu {
        position: static !important;
        width: 100% !important;
        margin-top: 10px;
        box-shadow: none;
        border-radius: 10px;
        text-align: center;

        /* PENTING: reset semua positioning */
        left: auto !important;
        right: auto !important;
        transform: none !important;
    }
}





</style>
