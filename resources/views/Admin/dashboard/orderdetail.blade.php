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
                <td>${{ number_format($detail->price, 2) }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>${{ number_format($detail->price * $detail->quantity, 2) }}</td>
                @php
                    $orderTotal += $detail->price * $detail->quantity;
                @endphp
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Total Order Amount:</strong></td>
                <td><strong>${{ number_format($orderTotal, 2) }}</strong></td>
            </tr>
            <tr>
                <td>Author: </td>
            </tr>
        </tfoot>
    </table>

    <p><strong>Order Date:</strong> {{ $order->created_at }}</p>
    <p><strong>Status:</strong> {{ $order->status ? 'Completed' : 'Wait for confirmation' }}</p>

    @if(!$order->status)
    <form action="{{ route('orders.confirm', $order->order_id) }}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success">Confirm Order</button>
    </form>
    @endif

    <br>
    
    <!-- test comment -->
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('admin/dashboard') }}" class="btn btn-secondary btn-block text-left"> Go to check New Order</a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('admin/checked_order/index') }}" class="btn btn-secondary btn-block text-right">Go to checked Order</a>
        </div>
    </div>
</div>



@endsection
