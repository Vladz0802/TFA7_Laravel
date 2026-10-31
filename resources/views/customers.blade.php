@extends('layout')

@section('title', 'Customer Accounts')

@section('content')
    <h1>Customer Accounts</h1>

    <a class="btn" href="{{ route('customers.create') }}">+ Add Customer</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through the customers retrieved by Eloquent in CustomerController --}}
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td><a class="link" href="{{ route('customers.edit', $customer) }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
