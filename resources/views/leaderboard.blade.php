<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Leaderboard</h1>

        <div class="card p-4 mb-4">
            <div class="podium-wrapper d-flex justify-content-center align-items-end text-center gap-4">

                @php
                    $top3 = $leaders->take(3)->values();
                @endphp

                @if(isset($top3[1]))
                <div class="d-flex flex-column align-items-center" style="margin-top:40px; width:250px; flex-shrink:0;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:90px; color:silver;"></i>
                    <p class="fw-semibold">{{ $top3[1]->name }}</p>
                    <p class="text-muted small">{{ $top3[1]->final_points }} Points</p>
                    <div class="mt-2 bg-primary text-white fw-bold rounded"
                         style="font-size:24px; width:200px; height:90px; display:flex; align-items:center; justify-content:center;">
                        2
                    </div>
                </div>
                @endif

                @if(isset($top3[0]))
                <div class="d-flex flex-column align-items-center" style="width:280px; flex-shrink:0;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:110px; color:gold;"></i>
                    <p class="fw-semibold">{{ $top3[0]->name }}</p>
                    <p class="text-muted small">{{ $top3[0]->final_points }} Points</p>
                    <div class="mt-2 bg-warning text-white fw-bold rounded"
                         style="font-size:28px; width:200px; height:110px; display:flex; align-items:center; justify-content:center;">
                        1
                    </div>
                </div>
                @endif

                @if(isset($top3[2]))
                <div class="d-flex flex-column align-items-center" style="margin-top:40px; width:250px; flex-shrink:0;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:90px; color:#cd7f32;"></i>
                    <p class="fw-semibold">{{ $top3[2]->name }}</p>
                    <p class="text-muted small">{{ $top3[2]->final_points }} Points</p>
                    <div class="mt-2 bg-success text-white fw-bold rounded"
                         style="font-size:24px; width:200px; height:90px; display:flex; align-items:center; justify-content:center;">
                        3
                    </div>
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
                    <i class="bi bi-trophy-fill" style="font-size:40px; color: lightgray;"></i>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>

<style>
@media (max-width: 992px) {
    .podium-wrapper {
        transform: scale(0.85);
        transform-origin: top center;
    }
}

@media (max-width: 768px) {
    .podium-wrapper {
        transform: scale(0.7);
        transform-origin: top center;
    }
}

@media (max-width: 576px) {
    .podium-wrapper {
        transform: scale(0.6);
        transform-origin: top center;
    }
}

@media (max-width: 420px) {
    .podium-wrapper {
        transform: scale(0.52);
        transform-origin: top center;
    }
}

</style>
