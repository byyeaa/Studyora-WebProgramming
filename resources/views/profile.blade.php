@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm rounded-4 overflow-hidden">

                <div class="card-body text-center p-4">

                    <img 
                        src="{{ (!empty($user) && !empty($user->photo)) 
                            ? asset('profiles/'.$user->photo) 
                            : asset('images/default-avatar.png') }}" 
                        class="rounded-circle mb-3"
                        style="width:100px; height:100px; object-fit:cover;"
                    >

                    <h4 class="fw-bold mb-1">
                        {{ $user->name ?? 'Guest User' }}
                    </h4>

                    <p class="text-muted mb-3">
                        {{ $user->email ?? '-' }}
                    </p>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 text-start">
                            <label class="form-label fw-semibold">Nama</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control rounded-pill"
                                value="{{ $user->name ?? '' }}"
                                required
                            >
                        </div>

                        <div class="mb-4 text-start">
                            <label class="form-label fw-semibold">Foto Profile</label>
                            <input 
                                type="file" 
                                name="photo" 
                                class="form-control rounded-pill"
                            >
                        </div>

                        <button class="btn w-100 rounded-pill text-white fw-bold"
                                style="background:#1A2A4F;">
                            Simpan Perubahan
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
