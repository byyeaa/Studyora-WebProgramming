<x-app-layout>
    <div class="container py-4">

    <h3 class="fw-bold mb-4">Detail Hasil Kuis</h3>

    <div class="mb-4">
        <span class="badge bg-success">Benar: {{ $benar }}</span>
        <span class="badge bg-danger">Salah: {{ $salah }}</span>
    </div>

    @foreach ($answers as $ans)
        @php
            $question = $ans->question;
            $correctOption = $question?->options->firstWhere('is_correct', 1);
        @endphp

        <div class="card mb-3 shadow-sm">
            <div class="card-body">

                {{-- Pertanyaan --}}
                <p class="fw-semibold">
                    {{ $loop->iteration }}. 
                    {{ $question?->question_text ?? '[Pertanyaan tidak ditemukan]' }}
                </p>

                {{-- Jawaban user --}}
                <p>
                    <strong>Jawaban kamu:</strong>  
                    @if($ans->option)
                        <span class="{{ $ans->is_correct ? 'text-success' : 'text-danger' }}">
                            {{ $ans->option->option_text }}
                        </span>
                    @else
                        <span class="text-muted">Tidak dijawab</span>
                    @endif
                </p>


                {{-- Jawaban benar --}}
                <p>
                    <strong>Jawaban benar:</strong>  
                    <span class="text-primary">
                        {{ $correctOption?->option_text ?? '[Tidak ada opsi benar]' }}
                    </span>
                </p>

                {{-- Status --}}
                @if($ans->is_correct)
                    <span class="badge bg-success">Benar</span>
                @else
                    <span class="badge bg-danger">Salah</span>
                @endif

            </div>
        </div>
    @endforeach

    <div class="mt-4 text-center">
        <a href="{{ route('home') }}" class="btn btn-primary px-4 py-2">Kembali</a>
    </div>

</div>

</x-app-layout>