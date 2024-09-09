<!-- resources/views/customers/create.blade.php -->
@extends('layout')

@section('content')
<h1>Create Customer</h1>
<form method="POST" action="{{ route('customers.store') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required>
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
    </div>
    <button class="btn btn-primary" type="submit">Add Customer</button>
</form>
@endsection
