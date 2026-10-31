@extends('layout')

@section('title', 'Add Customer')

@section('content')
    <h1>Add Customer</h1>

    <form method="POST" action="{{ route('customers.store') }}" novalidate>
        @csrf
        @include('customers._form')
        <button type="submit" class="btn">Save Customer</button>
        <a class="link" href="{{ route('customers') }}">Cancel</a>
    </form>
@endsection
