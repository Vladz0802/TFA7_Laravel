@extends('layout')

@section('title', 'Add User')

@section('content')
    <h1>Add User</h1>

    <form method="POST" action="{{ route('users.store') }}" novalidate>
        @csrf

        <div class="field">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}">
            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Save User</button>
        <a class="link" href="{{ route('users') }}">Cancel</a>
    </form>
@endsection
