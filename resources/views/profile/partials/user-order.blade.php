<section>
    @if (isset($orders))
    @foreach ($orders as $order)
    <fieldset>
        <legend><strong>Order No.{{ $loop->iteration }}</strong></legend>
        <p><strong>Order Date: </strong><span>{{ $order->created_at }}</span></p>
        <br>
        <p><strong>Status: </strong>
            @if ($order->status)
            <span style="color: green;">
                <i class="fas fa-check-circle"></i>
            </span>
            @else
            <span style="color: red;">
                <i class="fas fa-times-circle"></i>
            </span>
            @endif
        </p>
        <br>
        <table class="table table-bordered cart-table">
            <thead class="cart-table-head">
                <tr class="table-head-row">
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
                <tr class="table-body-row">
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
            </tfoot>
        </table>
    </fieldset>
    @endforeach
    @else
    You have no orders
    @endif

</section>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{asset('user')}}/js/cart/bootstrap.min.js"></script>