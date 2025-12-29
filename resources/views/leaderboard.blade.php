<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <h2 class="fw-bold mb-4 text-center">🏆 Leaderboard</h2>

    {{-- ================= TOP 3 ================= --}}
    <div class="card p-4 mb-5">
        <div class="row justify-content-center align-items-end text-center">

            @php
                $top3 = $leaders->take(3)->values();
            @endphp

            {{-- RANK 2 --}}
            <div class="col-4 d-flex flex-column align-items-center" style="margin-top:40px;">
                @if(isset($top3[1]))
                    <i class="bi bi-trophy-fill mb-2"
                       style="font-size:90px; color:silver;"></i>

                    <p class="fw-semibold mb-0">{{ $top3[1]->name }}</p>
                    <small class="text-muted">{{ $top3[1]->final_points }} Points</small>

                    <div class="mt-2 bg-primary text-white fw-bold rounded"
                         style="width:90px;height:90px;display:flex;align-items:center;justify-content:center;font-size:24px;">
                        2
                    </div>
                @endif
            </div>

            {{-- RANK 1 --}}
            <div class="col-4 d-flex flex-column align-items-center">
                @if(isset($top3[0]))
                    <i class="bi bi-trophy-fill mb-2"
                       style="font-size:110px; color:gold;"></i>

                    <p class="fw-semibold mb-0">{{ $top3[0]->name }}</p>
                    <small class="text-muted">{{ $top3[0]->final_points }} Points</small>

                    <div class="mt-2 bg-warning fw-bold rounded"
                         style="width:110px;height:110px;display:flex;align-items:center;justify-content:center;font-size:28px;">
                        1
                    </div>
                @endif
            </div>

            {{-- RANK 3 --}}
            <div class="col-4 d-flex flex-column align-items-center" style="margin-top:40px;">
                @if(isset($top3[2]))
                    <i class="bi bi-trophy-fill mb-2"
                       style="font-size:90px; color:#cd7f32;"></i>

                    <p class="fw-semibold mb-0">{{ $top3[2]->name }}</p>
                    <small class="text-muted">{{ $top3[2]->final_points }} Points</small>

                    <div class="mt-2 bg-success text-white fw-bold rounded"
                         style="width:90px;height:90px;display:flex;align-items:center;justify-content:center;font-size:24px;">
                        3
                    </div>
                @endif
            </div>

        </div>
    </div>

    {{-- ================= RANK 4+ ================= --}}
    @foreach ($leaders->slice(3) as $index => $user)
        <div class="card p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-bold mb-0">{{ $index + 4 }}. {{ $user->name }}</h5>
                    <small class="text-muted">{{ $user->final_points }} Points</small>
                </div>
                <i class="bi bi-trophy-fill"
                   style="font-size:40px; color:#d3d3d3;"></i>
            </div>
        </div>
    @endforeach

</div>

</body>
</html>
