<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Leaderboard</h1>

        <div class="card p-4 mb-4">
            <div class="podium-wrapper d-flex justify-content-center align-items-end text-center gap-4 flex-wrap">

                @php
                    $top3 = $leaders->take(3)->values();
                @endphp

                @if(isset($top3[1]))
                <div class="podium-item rank-2">
                    <i class="bi bi-trophy-fill trophy silver"></i>
                    <p class="fw-semibold">{{ $top3[1]->name }}</p>
                    <p class="text-muted small">{{ $top3[1]->final_points }} Points</p>
                    <div class="podium-box bg-primary">2</div>
                </div>
                @endif

                @if(isset($top3[0]))
                <div class="podium-item rank-1">
                    <i class="bi bi-trophy-fill trophy gold"></i>
                    <p class="fw-semibold">{{ $top3[0]->name }}</p>
                    <p class="text-muted small">{{ $top3[0]->final_points }} Points</p>
                    <div class="podium-box bg-warning">1</div>
                </div>
                @endif

                @if(isset($top3[2]))
                <div class="podium-item rank-3">
                    <i class="bi bi-trophy-fill trophy bronze"></i>
                    <p class="fw-semibold">{{ $top3[2]->name }}</p>
                    <p class="text-muted small">{{ $top3[2]->final_points }} Points</p>
                    <div class="podium-box bg-success">3</div>
                </div>
                @endif

            </div>
        </div>

        @foreach ($leaders->slice(3) as $index => $user)
            <div class="card p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0">{{ $index + 4 }}. {{ $user->name }}</h5>
                        <small class="text-muted">{{ $user->final_points }} Points</small>
                    </div>
                    <i class="bi bi-trophy-fill text-secondary fs-3"></i>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>

<style>
.podium-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 180px;
}

.rank-1 { order: 2; }
.rank-2 { order: 1; margin-top: 40px; }
.rank-3 { order: 3; margin-top: 40px; }

.trophy {
    font-size: 90px;
}
.gold { color: gold; }
.silver { color: silver; }
.bronze { color: #cd7f32; }

.podium-box {
    margin-top: 8px;
    width: 180px;
    height: 90px;
    font-size: 24px;
    font-weight: bold;
    color: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.rank-1 .podium-box {
    height: 110px;
    font-size: 28px;
}

/* MOBILE */
@media (max-width: 768px) {
    .podium-wrapper {
        flex-direction: column;
        align-items: center;
    }

    .rank-1, .rank-2, .rank-3 {
        order: unset;
        margin-top: 0;
    }

    .podium-item {
        margin-bottom: 24px;
    }
}
</style>
