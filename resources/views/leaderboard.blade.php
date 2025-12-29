<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Leaderboard</h1>

        <div class="card p-4 mb-4">
            <div class="row text-center justify-content-center align-items-end">
                @foreach($leaders->take(3) as $index => $user)
                    @php
                        $rank = $index + 1;
                        $bgClass = match($rank) {
                            1 => 'bg-warning text-white',
                            2 => 'bg-primary text-white',
                            3 => 'bg-success text-white',
                            default => 'bg-light',
                        };
                        $size = ($rank == 1) ? '95px' : '80px';
                        $fontSize = ($rank == 1) ? '26px' : '22px';
                        $trophyColor = match($rank) {
                            1 => 'gold',
                            2 => 'silver',
                            3 => '#cd7f32',
                        };
                    @endphp
                    <div class="col-4">
                        <i class="bi bi-trophy-fill mx-auto mb-2" style="font-size:{{ $size }}; color: {{ $trophyColor }};"></i>

                        <p class="fw-semibold">{{ $user->name }}</p>
                        <p class="text-muted small">{{ $user->final_points }} Points</p>

                        <div class="mt-2 {{ $bgClass }} fw-bold rounded p-3" style="font-size:{{ $fontSize }};">
                            {{ $rank }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($leaders->slice(3) as $index => $user)
            <div class="card p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="fw-bold mb-0">{{ $index + 4 }}. {{ $user->name }}</h5>
                        <small class="text-muted">{{ $user->final_points }} Points</small>
                    </div>

                    <i class="bi bi-trophy-fill" style="font-size:40px; color: lightgray;"></i>

                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
