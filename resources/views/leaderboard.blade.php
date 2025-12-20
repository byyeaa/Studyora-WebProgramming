<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Leaderboard</h1>

        {{-- ===========================
                TOP 3 SECTION
        =========================== --}}
        <div class="card p-4 mb-4">

            <div class="row text-center justify-content-center align-items-end">

                {{-- Rank 2 --}}
                @if(isset($leaders[1]))
                <div class="col-4">
                    <div class="rounded-circle bg-light border mx-auto mb-2" style="width:80px; height:80px;"></div>
                    <p class="fw-semibold">{{ $leaders[1]->user->name ?? 'User' }}</p>
                    <p class="text-muted small">{{ $leaders[1]->final_points }} Points</p>

                    <div class="mt-2 bg-primary text-white fw-bold rounded p-3" style="font-size:22px;">
                        2
                    </div>
                </div>
                @endif

                {{-- Rank 1 --}}
                @if(isset($leaders[0]))
                <div class="col-4">
                    <div class="rounded-circle bg-light border border-warning mx-auto mb-2" 
                        style="width:95px; height:95px; border-width:3px !important;"></div>

                    <p class="fw-semibold">{{ $leaders[0]->user->name ?? 'User' }}</p>
                    <p class="text-muted small">{{ $leaders[0]->final_points }} Points</p>

                    <div class="mt-2 bg-warning text-white fw-bold rounded p-3" style="font-size:26px;">
                        1
                    </div>
                </div>
                @endif

                {{-- Rank 3 --}}
                @if(isset($leaders[2]))
                <div class="col-4">
                    <div class="rounded-circle bg-light border mx-auto mb-2" style="width:80px; height:80px;"></div>
                    <p class="fw-semibold">{{ $leaders[2]->user->name ?? 'User' }}</p>
                    <p class="text-muted small">{{ $leaders[2]->final_points }} Points</p>

                    <div class="mt-2 bg-success text-white fw-bold rounded p-3" style="font-size:22px;">
                        3
                    </div>
                </div>
                @endif

            </div>
        </div>

        {{-- ===========================
            RANK 4 AND BELOW
        =========================== --}}
        @foreach ($leaders->slice(3) as $index => $item)
            <div class="card p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        {{-- +4 karena index dimulai dari 0, tapi rank mulai dari 4 --}}
                        <h5 class="fw-bold mb-0">{{ $index + 1 }}. {{ $item->user->name ?? 'User' }}</h5>
                        <small class="text-muted">{{ $item->final_points }} Points</small>
                    </div>

                    <div class="rounded-circle bg-light" style="width:50px; height:50px;"></div>

                </div>
            </div>
        @endforeach

    </div>
    
</x-app-layout>
