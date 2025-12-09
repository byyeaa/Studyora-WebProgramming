
<x-app-layout>
    <div class="container-fluid px-4 pt-3 pb-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Hai, {{ $user->name ?? 'Username' }}</h4>
                <p class="text-muted mb-0">Siap lanjut hari ini?</p>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm mb-4 rounded-5">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 py-4 px-4">

                        <div>
                            <small class="text-muted d-block mb-1">Lanjutkan Mengerjakan</small>
                            <span class="fw-semibold fs-6">
                                {{ $lastQuizProgress->quiz->title ?? 'Belum ada progress' }}
                            </span>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ $lastQuizProgress ? route('quiz.start', $lastQuizProgress->quiz->id) : '#' }}"
                            class="btn btn-sm rounded-pill px-4 text-white {{ $lastQuizProgress ? '' : 'disabled' }}"
                            style="background-color:#1A2A4F;">
                                {{ $lastQuizProgress ? 'Lanjutkan' : 'Belum Ada' }}
                            </a>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-semibold mb-0">Rekomendasi Untukmu</h6>
                </div>

                <div class="row g-4">
                    @forelse ($recommendedQuizzes as $quiz)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-5 overflow-hidden h-100">

                            <img src="{{ asset('images/' . $quiz->thumbnail) }}"
                                class="w-100"
                                style="height: 140px; object-fit: cover;"
                                alt="thumbnail">

                            <div class="card-body p-4 d-flex flex-column">
                                <h6 class="fw-semibold mb-3">
                                    {{ $quiz->title }}
                                </h6>

                                <a href="{{ route('quiz.start', $quiz->id) }}"
                                class="btn btn-sm w-100 text-white rounded-pill mt-auto"
                                style="background-color:#1A2A4F;">
                                    Mulai
                                </a>
                            </div>

                        </div>
                    </div>
                    @empty
                        <p class="text-muted">Belum ada rekomendasi kuis.</p>
                    @endforelse
                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-5 mb-4">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">Info Akun</h6>

                        <p class="mb-1 small text-muted">Nama</p>
                        <p class="fw-semibold mb-3">{{ $user->name ?? 'Username' }}</p>

                        <p class="mb-1 small text-muted">Level</p>
                        <span class="px-4 py-1 rounded-pill small fw-semibold"
                            style="border:1.5px solid #1A2A4F; color:#1A2A4F;">
                            {{ $level ?? 0 }}
                        </span>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-5">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-2">Tips Hari Ini</h6>
                        <p class="small text-muted mb-0">
                            Kerjakan kuis sedikit demi sedikit agar tidak menumpuk.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-app-layout>
