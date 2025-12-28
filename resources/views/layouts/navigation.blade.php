<nav class="navbar navbar-expand-lg navbar-light px-4"
    style="background-color: #d9e8ff; border-bottom: 1px solid #e6e6e6;">

    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo.png') }}" class="navbar-brand-img" height="70" alt="Studyora">
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse bg-white rounded shadow-sm mt-2 mt-lg-0 px-3 px-lg-0"
             id="navbarNav">

            <ul class="navbar-nav me-auto ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('quiz.index') }}">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('progress') }}">Progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboard') }}">Leaderboard</a>
                </li>
            </ul>

        </div>

       @auth
<div class="d-flex align-items-center gap-3 ms-3">

    {{-- POINTS --}}
    <div class="fw-bold text-dark">
        🏆 {{ auth()->user()->total_points }}
    </div>

    {{-- USER DROPDOWN --}}
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button type="button"
                class="btn btn-link text-decoration-none fw-semibold d-flex align-items-center"
                style="color: #0b1846;">
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
</nav>
