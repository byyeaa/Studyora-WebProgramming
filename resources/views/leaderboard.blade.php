<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Leaderboard</h1>

        <div class="card p-4 mb-4 podium-card">
            <div class="podium-wrapper d-flex justify-content-center align-items-end text-center gap-4">

                @php
                    $top3 = $leaders->take(3)->values();
                @endphp

                @if(isset($top3[1]))
                <div class="d-flex flex-column align-items-center" style="margin-top:40px; width:250px;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:90px; color:silver;"></i>
                    <p class="fw-semibold mb-1">{{ $top3[1]->name }}</p>
                    <p class="text-muted small mb-2">{{ $top3[1]->final_points }} Points</p>
                    <div class="bg-primary text-white fw-bold rounded"
                         style="width:200px; height:90px; font-size:24px; display:flex; align-items:center; justify-content:center;">
                        2
                    </div>
                </div>
                @endif

                @if(isset($top3[0]))
                <div class="d-flex flex-column align-items-center" style="width:280px;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:110px; color:gold;"></i>
                    <p class="fw-semibold mb-1">{{ $top3[0]->name }}</p>
                    <p class="text-muted small mb-2">{{ $top3[0]->final_points }} Points</p>
                    <div class="bg-warning text-white fw-bold rounded"
                         style="width:200px; height:110px; font-size:28px; display:flex; align-items:center; justify-content:center;">
                        1
                    </div>
                </div>
                @endif

                @if(isset($top3[2]))
                <div class="d-flex flex-column align-items-center" style="margin-top:40px; width:250px;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:90px; color:#cd7f32;"></i>
                    <p class="fw-semibold mb-1">{{ $top3[2]->name }}</p>
                    <p class="text-muted small mb-2">{{ $top3[2]->final_points }} Points</p>
                    <div class="bg-success text-white fw-bold rounded"
                         style="width:200px; height:90px; font-size:24px; display:flex; align-items:center; justify-content:center;">
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
                    <i class="bi bi-trophy-fill" style="font-size:40px; color:lightgray;"></i>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

<style>
.podium-card {
    overflow: hidden;
}
    
@media (max-width: 576px) {
    .podium-wrapper {
        zoom: 0.4;
        justify-content: center;
    }

    .podium-card {
        padding-bottom: 1rem;
    }
}
</style>
