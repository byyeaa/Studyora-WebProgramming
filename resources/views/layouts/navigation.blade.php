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
                           <button class="btn btn-link fw-semibold text-decoration-none d-flex align-items-center gap-1"
                                    style="color:#0b1846;">
                                {{ Auth::user()->name }}
                                <i class="bi bi-caret-down-fill dropdown-caret"></i>
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
    .dropdown-caret {
        font-size: 0.65rem;
        margin-top: 2px;
    }

    .navbar-collapse{
        visibility:visible!important
    }
    .navbar-collapse.collapse{
        display:flex!important
    }
   
    @media(max-width:991px){
        
    .navbar-collapse.collapse{
        display:none!important
    }
   
    .navbar-collapse.collapse.show{
        display:block!important;
        margin-top:.25rem;
        background:#ffffff;
        border-radius:0 0 12px 12px;
        position:relative;
        z-index:1060;
    }
        
    .profile-wrapper .dropdown-menu a{
        text-align:center
    }
        
    .navbar{
        padding-top:0!important;
        padding-bottom:0!important
    }
   
    .navbar-brand{
        display:flex;
        align-items:center;
        height:70px
    }
        
    .navbar-brand img{
        height:50px;
        width:auto
    }
    .navbar-toggler{
        align-self:center}
    }
    .navbar-nav .nav-link.active {
    font-weight: 700;
    position: relative;
    }
    
    .navbar-nav .nav-link.active::after {
        content: "";
        position: absolute;
        bottom: -4px;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 2px;
        background-color: #0b1846;
        border-radius: 2px;
    }

    .navbar-nav .nav-link:hover{opacity:.8}
    .profile-wrapper {
        overflow: visible;
    }

    @media (max-width: 991px) {
    .navbar-collapse.show {
        overflow-x: visible;
    }

    .points-display {
        margin-left: 0 !important;
        margin-top: 12px;
        text-align: center;
        width: 100%;
    }

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
        margin-bottom: 18px;
        box-shadow: none;
        border-radius: 10px;
        text-align: center;
        left: auto !important;
        right: auto !important;
        transform: none !important;
    }
}
</style>
