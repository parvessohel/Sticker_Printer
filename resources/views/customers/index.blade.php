@extends('layout') <!-- This points to the correct layout file -->

@section('content')
    <h1 class="page-title">Customers List</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>

    <div class="customer-list">
        @foreach($customers as $customer)
        <div class="customer-card">
            <div class="customer-details">
                <h3>{{ $customer->name }}</h3>
                <p>Phone: {{ $customer->phone }}</p>
                <p>Address: {{ $customer->address }}</p>
            </div>
            <div class="customer-actions">
                <!-- Edit Button -->
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                
                <!-- Delete Button -->
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
