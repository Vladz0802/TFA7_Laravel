@extends('layout')

@section('title', 'Edit Customer')

@section('content')
    <h1>Edit Customer</h1>

    <form method="POST" action="{{ route('customers.update', $customer) }}" novalidate>
        @csrf
        @method('PUT')
        @include('customers._form')
        <button type="submit" class="btn">Update Customer</button>
        <a class="link" href="{{ route('customers') }}">Cancel</a>
    </form>
@endsection
