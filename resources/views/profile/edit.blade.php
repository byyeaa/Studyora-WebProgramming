<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Profile</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="bi bi-star-fill" style="font-size: 80px; color: gold;"></i>
                        </div>
                        <h4 class="fw-bold mb-1">{{ $user->name ?? 'Guest User' }}</h4>
                        <p class="text-muted mb-3">{{ $user->email ?? '-' }}</p>

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
