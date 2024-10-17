@extends('admin.index')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <h2>Order Details for Order #{{ $order->order_id }}</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $orderTotal = 0; 
            @endphp
            @foreach($order->details as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->product->title }}</td>
                <td>{{ number_format($detail->price, 2) }} $</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->price * $detail->quantity, 2) }} $</td>
                @php
                    $orderTotal += $detail->price * $detail->quantity; 
                @endphp
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Total Order Amount:</strong></td>
                <td><strong>{{ number_format($orderTotal, 2) }} VND</strong></td>
            </tr>
        </tfoot>
    </table>

    <p><strong>Order Date:</strong> {{ $order->created_at }}</p>
    <p><strong>Status:</strong> {{ $order->status ? 'Completed' : 'Pending' }}</p>

    @if(!$order->status) 
    <form action="{{ route('orders.confirm', $order->order_id) }}" method="POST">
        @csrf
        @method('PATCH') 
        <button type="submit" class="btn btn-success">Confirm Order</button>
    </form>
    @endif
    
    <br>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>


@endsection
