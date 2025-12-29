<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Leaderboard</h1>

        <div class="card p-4 mb-4">
            <div class="row justify-content-center align-items-end text-center">

                @php
                    $top3 = $leaders->take(3)->values();
                @endphp

                <!-- Rank 2 -->
                <div class="col-lg-4 col-md-4 col-4 d-flex flex-column align-items-center" style="margin-top:40px; width:200px;">
                    @php
                        $user = $top3[1] ?? null;
                        $rank = 2;
                        $trophyColor = 'silver';
                        $trophySize = '90px';
                        $boxFontSize = '24px';
                    @endphp
                    @if($user)
                        <i class="bi bi-trophy-fill mb-2" style="font-size:{{ $trophySize }}; color: {{ $trophyColor }};"></i>
                        <p class="fw-semibold">{{ $user->name }}</p>
                        <p class="text-muted small">{{ $user->final_points }} Points</p>
                        <div class="mt-2 bg-primary text-white fw-bold rounded" 
                             style="font-size:{{ $boxFontSize }}; width:90px; height:90px; display:flex; align-items:center; justify-content:center;">
                            {{ $rank }}
                        </div>
                    @endif
                </div>

                <!-- Rank 1 -->
                <div class="col-lg-4 col-md-4 col-4 d-flex flex-column align-items-center" style="margin-top:0px;  width:200px;">
                    @php
                        $user = $top3[0];
                        $rank = 1;
                        $trophyColor = 'gold';
                        $trophySize = '110px';
                        $boxFontSize = '28px';
                    @endphp
                    <i class="bi bi-trophy-fill mb-2" style="font-size:{{ $trophySize }}; color: {{ $trophyColor }};"></i>
                    <p class="fw-semibold">{{ $user->name }}</p>
                    <p class="text-muted small">{{ $user->final_points }} Points</p>
                    <div class="mt-2 bg-warning fw-bold rounded" 
                         style="font-size:{{ $boxFontSize }}; width:110px; height:110px; display:flex; align-items:center; justify-content:center;">
                        {{ $rank }}
                    </div>
                </div>

                <!-- Rank 3 -->
                <div class="col-lg-4 col-md-4 col-4 d-flex flex-column align-items-center" style="margin-top:40px;  width:200px;">
                    @php
                        $user = $top3[2] ?? null;
                        $rank = 3;
                        $trophyColor = '#cd7f32';
                        $trophySize = '90px';
                        $boxFontSize = '24px';
                    @endphp
                    @if($user)
                        <i class="bi bi-trophy-fill mb-2" style="font-size:{{ $trophySize }}; color: {{ $trophyColor }};"></i>
                        <p class="fw-semibold">{{ $user->name }}</p>
                        <p class="text-muted small">{{ $user->final_points }} Points</p>
                        <div class="mt-2 bg-success text-white fw-bold rounded" 
                             style="font-size:{{ $boxFontSize }}; width:90px; height:90px; display:flex; align-items:center; justify-content:center;">
                            {{ $rank }}
                        </div>
                    @endif
                </div>

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
