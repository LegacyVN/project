@extends('admin.index')

@section('content')
<div class="container mt-5">
    <div class="card-header bg-success text-white">
        <h2 class="text-center">Checked Order</h2>
    </div>

    <div class="container mt-4">
        <p style="color: black; margin-bottom: 0">Total Checked Order: {{ $totalOrders }}</p>
    </div>

    <table class="table table-bordered table-hover mt-4">
        <thead class="table-gray text-center">
            <tr>
                <th>Id Contract</th>
                <th>Customer Name</th>
                <th>Check Status</th>
                <th>Order Date</th>
                <th>Check Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->user->name }}</td>
                <td class="text-center">
                    @if ($order->status)
                    <span style="color: green;">
                        <i class="fas fa-check-circle"></i>
                    </span>
                    @else
                    <span style="color: red;">
                        <i class="fas fa-times-circle"></i>
                    </span>
                    @endif
                </td>
                <td>{{ $order->created_at }}</td>
                <td class="text-center">
                    <a href="{{ route('order.details', $order->order_id) }}" class="check-details-btn">
                        Check Details
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection