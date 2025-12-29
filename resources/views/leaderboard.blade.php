<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Leaderboard</h1>

        {{-- PODIUM TOP 3 --}}
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-center align-items-end text-center gap-4">

                @php
                    $top3 = $leaders->take(3)->values();
                @endphp

                {{-- RANK 2 --}}
                @if(isset($top3[1]))
                <div class="d-flex flex-column align-items-center" style="margin-top:40px; width:250px;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:90px; color:silver;"></i>
                    <p class="fw-semibold">{{ $top3[1]->name }}</p>
                    <p class="text-muted small">{{ $top3[1]->final_points }} Points</p>
                    <div class="mt-2 bg-primary text-white fw-bold rounded"
                         style="font-size:24px; width:90px; height:90px; display:flex; align-items:center; justify-content:center;">
                        2
                    </div>
                </div>
                @endif

                {{-- RANK 1 --}}
                @if(isset($top3[0]))
                <div class="d-flex flex-column align-items-center" style="width:280px;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:110px; color:gold;"></i>
                    <p class="fw-semibold">{{ $top3[0]->name }}</p>
                    <p class="text-muted small">{{ $top3[0]->final_points }} Points</p>
                    <div class="mt-2 bg-warning fw-bold rounded"
                         style="font-size:28px; width:110px; height:110px; display:flex; align-items:center; justify-content:center;">
                        1
                    </div>
                </div>
                @endif

                {{-- RANK 3 --}}
                @if(isset($top3[2]))
                <div class="d-flex flex-column align-items-center" style="margin-top:40px; width:250px;">
                    <i class="bi bi-trophy-fill mb-2" style="font-size:90px; color:#cd7f32;"></i>
                    <p class="fw-semibold">{{ $top3[2]->name }}</p>
                    <p class="text-muted small">{{ $top3[2]->final_points }} Points</p>
                    <div class="mt-2 bg-success text-white fw-bold rounded"
                         style="font-size:24px; width:90px; height:90px; display:flex; align-items:center; justify-content:center;">
                        3
                    </div>
                </div>
                @endif

            </div>
        </div>

        {{-- RANK 4 KE BAWAH --}}
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
