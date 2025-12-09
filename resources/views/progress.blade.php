
<x-app-layout>
    <div class="container mt-4">

        <h4 class="fw-bold mb-4">Progress</h4>

        <div class="card mb-4 shadow-sm">
            <div class="card-body">

                <h6 class="fw-bold">Level {{ $level ?? 10 }}</h6>

                <div class="border rounded p-3 mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-semibold">Streak</span>
                        <span class="text-muted">{{ $streakDays ?? 0 }} day(s)</span>
                    </div>

                    <div class="d-flex gap-4">
                        @php
                            $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
                        @endphp

                        @foreach ($days as $i => $day)
                            <div class="text-center">
                                <div class="rounded-circle d-flex justify-content-center align-items-center text-white"
                                    style="width: 32px; height: 32px; background-color: {{ in_array($i, $streakIndexes ?? [0,1,2,3]) ? 'rgba(69, 159, 53, 1)' : '#e9ecef' }};">
                                    @if(in_array($i, $streakIndexes ?? [0,1,2,3]))
                                        <i class="bi bi-check-lg"></i>
                                    @endif
                                </div>
                                <small class="d-block mt-1">{{ $day }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-around text-center">
                    <div>
                        <h5 class="fw-bold">{{ $totalQuizzes ?? 0 }}</h5>
                        <small>Kuis Selesai</small>
                    </div>

                    <div class="vr"></div>

                    <div>
                        <h5 class="fw-bold">{{ $totalQuestions ?? 0 }}</h5>
                        <small>Pertanyaan Dijawab</small>
                    </div>
                </div>

            </div>
        </div>

        <h6 class="fw-bold mb-3">Lanjutkan Belajar</h6>

        <div class="row">
            @forelse($ongoing as $quiz)
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h6 class="fw-bold">{{ $quiz->title }}</h6>
                            <small class="text-muted">{{ $quiz->progress }}% completed</small>

                            <div class="progress mt-2" style="height: 6px;">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $quiz->progress }}%; background-color:rgba(69, 159, 53, 1);">
                                </div>
                            </div>

                            <a href="{{ route('quiz.start', $quiz->id) }}" 
                            class="btn btn-sm mt-3 text-white"
                            style="background-color:#1A2A4F;">
                                Continue
                            </a>

                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Tidak ada kuis yang sedang kamu lanjutkan.</p>
            @endforelse
        </div>

    </div>
</x-app-layout>

