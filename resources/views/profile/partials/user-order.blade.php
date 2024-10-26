<section id="profile-user-orders">
    <div class="container">
        @if (isset($orders))
        <table class="table table-bordered  table-striped table-hover mt-4">
            <thead class="text-center table-info">
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Check Status</th>
                    <th>Check Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td class="text-center align-middle">{{ $order->order_id }}</td>
                    <td class="text-center align-middle">{{ $order->created_at }}</td>
                    <td class="text-center align-middle">
                        @if ($order->status)
                        <span style="color: green;">
                            Completed
                        </span>
                        @else
                        <span style="color: blue;">
                            In Progress
                        </span>
                        @endif
                    </td>
                    <td class="text-center align-middle" id="{{$order->order_id}}">
                        <button type="button" class="btn check-details-btn inact">Check</button>
                    </td>
                </tr>
                <tr class="collap">
                    <td colspan="4">
                        <div class="container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                @php
                                $orderTotal = 0;
                                @endphp
                                <tbody>
                                    @foreach($order->details as $detail)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $detail->product->title }}</td>
                                        <td class="align-middle"><img src="{{ asset('products')}}/{{$detail->product->image}}" alt="{{ $detail->product->title }}" class="img-fluid" style="max-width: 100px;"></td>
                                        <td class="align-middle">${{ number_format($detail->price, 2) }}</td>
                                        <td class="align-middle">{{ $detail->quantity }}</td>
                                        <td class="align-middle">${{ number_format($detail->price * $detail->quantity, 2) }}</td>

                                    </tr>
                                    @php
                                    $orderTotal += $detail->price * $detail->quantity;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right"><strong>Total Order Amount:</strong></td>
                                        <td><strong>${{ number_format($orderTotal, 2) }}</strong></td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        @else
        You have no orders
        @endif
        <div class="mt-4 d-flex justify-content-center">
            {{ $orders->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</section>