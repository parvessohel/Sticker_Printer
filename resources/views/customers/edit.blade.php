@extends('layout')

@section('content')
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $customer->name }}" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $customer->phone }}" required>

        <label for="address">Address:</label>
        <textarea name="address" required>{{ $customer->address }}</textarea>

        <button type="submit">Update Customer</button>
    </form>
@endsection
