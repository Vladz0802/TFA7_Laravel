@extends('layout')

@section('title', 'User Accounts')

@section('content')
    <h1>User Accounts</h1>

    <a class="btn" href="{{ route('users.create') }}">+ Add User</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through the users retrieved by Eloquent in UserController --}}
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        {{-- Show the saved thumbnail, or the placeholder if none was uploaded --}}
                        @if ($user->avatar)
                            <img class="avatar" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar of {{ $user->full_name }}">
                        @else
                            <img class="avatar" src="{{ asset('images/avatar-placeholder.svg') }}" alt="No avatar">
                        @endif
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td><a class="link" href="{{ route('users.edit', $user) }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
