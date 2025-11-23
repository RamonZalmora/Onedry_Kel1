@extends('layouts.app', ['title' => 'Profil Saya'])

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-bold">👤 Profil Saya</h1>
    <p class="text-sm text-slate-500 mt-1">Kelola informasi akun dan pengaturan keamanan Anda</p>
</div>

<div class="max-w-4xl space-y-6">

    <!-- Update Profile Information -->
    @include('profile.partials.update-profile-information-form')

    <!-- Update Password -->
    @include('profile.partials.update-password-form')

    <!-- Delete Account -->
    @include('profile.partials.delete-user-form')

</div>

@endsection
