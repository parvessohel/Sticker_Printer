@extends('layout')

@section('content')
    <h3>{{ $customer->name }}</h3>
    <p>Phone: {{ $customer->phone }}</p>
    <p>Address: {{ $customer->address }}</p>
    <a href="{{ route('customers.edit', $customer) }}">Edit</a>
    <form action="{{ route('customers.destroy', $customer) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
