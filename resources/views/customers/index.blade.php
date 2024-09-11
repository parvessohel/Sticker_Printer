@extends('layout')

@section('content')
    <h1 style="text-align: center; font-size: 2.5rem; color: #333; margin-bottom: 20px;">Customers List</h1>
    
    <!-- Add Customer and Print All Buttons -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('customers.create') }}" class="btn btn-success" style="margin-right: 10px;">Add Customer</a>
        <button class="btn btn-primary" id="printAllButton">Print All</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div id="customerList">
        @foreach($customers as $customer)
        <div class="customer-block" style="padding: 0.5in; border: 1px solid #ccc; background-color: #f9f9f9; margin-bottom: 0.1in; text-align: center;">
            <h3 style="font-size: 1.2rem; margin: 0; font-weight: bold;"><strong>{{ $customer->name }}</strong></h3>
            <p style="font-size: 1rem; margin: 0.1in 0; font-weight: bold;"><strong>{{ $customer->phone }}</strong></p>
            <p style="font-size: 1rem; margin: 0.1in 0; font-weight: bold;"><strong>{{ $customer->address }}</strong></p>
            <button class="btn btn-secondary printButton" data-content="{{ $customer->name }}\n{{ $customer->phone }}\n{{ $customer->address }}">Print</button>
        </div>
        @endforeach
    </div>
    
    <script>
        document.getElementById('printAllButton').addEventListener('click', function() {
            var customerBlocks = document.querySelectorAll('.customer-block');

            customerBlocks.forEach(function(block, index) {
                var printWindow = window.open('', '', 'height=600,width=400');
                printWindow.document.write('<html><head><title>Print Customer</title>');
                printWindow.document.write('<style>@media print { .customer-block { width: 3in; height: 2in; margin: 0; page-break-before: always; page-break-inside: avoid; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; font-size: 0.8rem; font-weight: bold; } }</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<div class="customer-block">' + block.innerHTML.replace(/<br>/g, '<br/>') + '</div>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.focus();
                printWindow.print();
                printWindow.close();
            });
        });

        document.querySelectorAll('.printButton').forEach(function(button) {
            button.addEventListener('click', function() {
                var content = this.getAttribute('data-content').replace(/\n/g, '<br>');
                var printWindow = window.open('', '', 'height=600,width=400');
                printWindow.document.write('<html><head><title>Print Customer</title>');
                printWindow.document.write('<style>@media print { .customer-block { width: 3in; height: 2in; margin: 0; page-break-before: always; page-break-inside: avoid; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; font-size: 0.8rem; font-weight: bold; } }</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<div class="customer-block">' + content + '</div>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.focus();
                printWindow.print();
                printWindow.close();
            });
        });
    </script>
@endsection
