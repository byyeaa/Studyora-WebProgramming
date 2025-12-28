<x-app-layout>
    <div class="container p-4">
        <h1 class="fw-bold mb-4">Profile</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body text-center p-4">

                        <img 
                            src="{{ auth()->user()->photo ? asset('profiles/' . auth()->user()->photo) : asset('images/default-avatar.png') }}" 
                            class="rounded-circle mb-3"
                            style="width:100px; height:100px; object-fit:cover;"
                        >

                        <h4 class="fw-bold mb-1">{{ auth()->user()->name }}</h4>
                        <p class="text-muted mb-3">{{ auth()->user()->email }}</p>

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 text-start">
                                <label class="form-label fw-semibold">Nama</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control rounded-pill"
                                    value="{{ auth()->user()->name }}"
                                    required
                                >
                            </div>

                            <div class="mb-4 text-start">
                                <label class="form-label fw-semibold">Foto Profil</label>
                                <input type="file" name="photo" class="form-control rounded-pill">
                            </div>

                            <button class="btn w-100 rounded-pill text-white fw-bold" style="background:#1A2A4F;">
                                Simpan Perubahan
                            </button>
                        </form>

                        <div class="mt-4">
                            @include('profile.partials.update-password-form')
                        </div>

                        <div class="mt-4">
                            @include('profile.partials.delete-user-form')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
