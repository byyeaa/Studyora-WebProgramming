<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">
                        Search Results for "{{ $search }}"
                    </h2>

                    @if($quizzes->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($quizzes as $quiz)
                                <div class="border rounded-lg p-4">
                                    <h3 class="font-bold text-lg">{{ $quiz->title }}</h3>
                                    <p class="text-gray-600 mt-2">{{ $quiz->description }}</p>
                                    <a href="{{ route('quiz.show', $quiz->id) }}" 
                                       class="text-blue-600 hover:underline mt-2 inline-block">
                                        View Quiz
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500 text-lg">
                                No quiz found for "{{ $search }}"
                            </p>
                            <a href="{{ url('/') }}" class="text-blue-600 hover:underline mt-4 inline-block">
                                Back to Home
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>