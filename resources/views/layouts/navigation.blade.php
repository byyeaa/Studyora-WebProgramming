{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg px-4" style="background-color: #d9e8ff; border-bottom: 1px solid #e6e6e6; height: 70px;">
    <div class="container-fluid">

        {{-- Brand/Logo --}}
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo.png') }}" height="70" width="170" class="me-2" alt="Studyora Logo">
        </a>

        {{-- Hamburger Button (Mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navigation Links & User Menu --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- Menu Navigation (Left side after logo) --}}
            <ul class="navbar-nav me-auto ms-4">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}" 
                       href="{{ route('home') }}" 
                       style="color: #0b1846;">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('quiz.*') ? 'active' : '' }}" 
                       href="{{ route('quiz.index') }}" 
                       style="color: #0b1846;">
                        Quiz
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('progress.*') ? 'active' : '' }}" 
                       href="{{ route('progress') }}" 
                       style="color: #0b1846;">
                        Progress
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('leaderboard.*') ? 'active' : '' }}" 
                       href="{{ route('leaderboard') }}" 
                       style="color: #0b1846;">
                        Leaderboard
                    </a>
                </li>
            </ul>

            <!-- {{-- User Dropdown (Right side) --}}
            <div class="ms-auto d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-link text-decoration-none dropdown-toggle fw-semibold d-flex align-items-center" 
                            type="button" 
                            id="userDropdown" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                            style="color: #0b1846;">
                        <i class="bi bi-person-circle me-2 fs-5"></i>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2"></i>Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div> -->
             <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="btn btn-link text-decoration-none dropdown-toggle fw-semibold d-flex align-items-center"
                            style="color: #0b1846;">
                            <div>{{ Auth::user()->name }}</div>

                            <!-- <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div> -->
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" style="color: #0b1846;">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" style="color: #0b1846;">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            

        </div>

    </div>
</nav>

<style>
    /* Active menu styling */
    .navbar-nav .nav-link.active {
        font-weight: 700;
        border-bottom: 2px solid #0b1846;
    }
    
    /* Hover effect */
    .navbar-nav .nav-link:hover {
        opacity: 0.8;
    }
</style>