{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg px-4"
     style="background-color: #d9e8ff; border-bottom: 1px solid #e6e6e6; height: 70px;">

    <div class="container-fluid">

        {{-- Brand/Logo --}}
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="{{ route('home') }}">
            <img src="{{ asset('images/Logo.png') }}"
                 height="70"
                 width="170"
                 class="me-2"
                 alt="Studyora Logo">
        </a>

        {{-- Hamburger Button --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navigation --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto ms-4">

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}"
                       style="color:#0b1846;">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('quiz.*') ? 'active' : '' }}"
                       href="{{ route('quiz.index') }}"
                       style="color:#0b1846;">
                        Quiz
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->is('progress') ? 'active' : '' }}"
                       href="{{ route('progress') }}"
                       style="color:#0b1846;">
                        Progress
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->is('leaderboard') ? 'active' : '' }}"
                       href="{{ route('leaderboard') }}"
                       style="color:#0b1846;">
                        Leaderboard
                    </a>
                </li>

            </ul>

            @auth
                <div class="points-display ms-3 fw-bold" style="color:#0b1846;">
                    🏆 Total Points: {{ auth()->user()->total_points }}
                </div>

                <div class="d-flex align-items-center ms-3">
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

<style>
/* ================= DESKTOP DEFAULT ================= */
.navbar-collapse {
    visibility: visible !important;
}

.navbar-collapse.collapse {
    display: flex !important;
}

/* ================= MOBILE ================= */
@media (max-width: 991px) {

    .navbar-collapse.collapse {
        display: none !important;
    }

    .navbar-collapse.collapse.show {
        display: block !important;
        margin-top: 0.25rem;
        background: #d9e8ff;
        border-radius: 0 0 12px 12px;

        position: relative;   /* penting buat z-index */
        z-index: 1060;
    }

    /* dropdown profile di atas menu */
    .dropdown-menu {
        position: absolute;
        z-index: 1070;
    }

    /* rapihin navbar */
    .navbar {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }

    /* logo center */
    .navbar-brand {
        display: flex;
        align-items: center;
        height: 70px;
    }

    /* kecilin logo biar pas */
    .navbar-brand img {
        height: 50px;
        width: auto;
    }

    /* burger sejajar logo */
    .navbar-toggler {
        align-self: center;
    }
}

/* ================= LINK STYLE ================= */
.navbar-nav .nav-link.active {
    font-weight: 700;
    border-bottom: 2px solid #0b1846;
}

.navbar-nav .nav-link:hover {
    opacity: 0.8;
}
</style>
