@extends('layout')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>

    {{-- enctype="multipart/form-data" is required for file uploads --}}
    <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')

        <div class="field">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">
            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}">
            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="avatar">Profile Picture (image, max 2MB)</label>

            {{-- Current avatar, or the placeholder --}}
            @if ($user->avatar)
                <img class="avatar-big" src="{{ asset('storage/' . $user->avatar) }}" alt="Current avatar">
            @else
                <img class="avatar-big" src="{{ asset('images/avatar-placeholder.svg') }}" alt="No avatar">
            @endif

            <input type="file" id="avatar" name="avatar" accept="image/*">
            @error('avatar')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Update User</button>
        <a class="link" href="{{ route('users') }}">Cancel</a>
    </form>
@endsection
