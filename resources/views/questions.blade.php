<x-app-layout>
    <div class="container py-4">
        <h5 class="fw-bold mb-3">Pertanyaan {{ $currentIndex + 1 }}</h5>

        <div class="card shadow-sm p-4 my-4 rounded-4">
            <p class="mb-4">{{ $question->question_text }}</p>

            <form action="{{ route('quiz.submit', $quizId) }}" method="POST">
                @csrf

                <div class="row">
                    @foreach($question->options as $opt)
                    <div class="col-md-6 mb-3">
                        <label class="w-100 p-3 rounded-4 border fw-semibold d-flex align-items-center gap-2"
                            style="cursor:pointer;">

                            <input type="radio"
                                name="option"
                                value="{{ $opt->id }}"
                                required>

                            {{ $opt->option_text }}

                        </label>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-3">
                    <button class="btn btn-lg px-5 rounded-pill text-white"
                            style="background-color:#1A2A4F;">
                        @if($isLast)
                            Selesai
                        @else
                            Selanjutnya
                        @endif
                    </button>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>