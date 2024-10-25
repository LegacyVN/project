@extends('admin.index') <!-- Assuming you have a layout file -->

@section('content')



<div class="container-fluid">
    <div class="row">
        <!-- chart caard section start -->
        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 border-0  card-hover card o-hidden">
                <div class="custome-1-bg b-r-4 card-body">
                    <div class="media align-items-center static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Orders</span>
                            <h4 class="mb-0 counter">{{ $totalorders }}
                                <span class="badge badge-light-primary grow">
                                    <i data-feather="trending-up"></i>8.5%</span>
                            </h4>
                        </div>
                        <div class="align-self-center text-center">
                            <i class="ri-database-2-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                <div class="custome-2-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Checked Orders</span>
                            <h4 class="mb-0 counter">{{ $totalCheckedOrders }}
                                <span class="badge badge-light-danger grow">
                                    <i data-feather="trending-down"></i>8.5%</span>
                            </h4>
                        </div>
                        <div class="align-self-center text-center">
                            <i class="ri-shopping-bag-3-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 card-hover border-0  card o-hidden">
                <div class="custome-3-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Products</span>
                            <h4 class="mb-0 counter">{{ $totalproducts }}
                                <a href="add-new-product.html" class="badge badge-light-secondary grow">
                                    ADD NEW</a>
                            </h4>
                        </div>

                        <div class="align-self-center text-center">
                            <i class="ri-chat-3-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                <div class="custome-4-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Customers</span>
                            <h4 class="mb-0 counter">{{ $totalUsers }}
                                <span class="badge badge-light-success grow">
                                    <i data-feather="trending-down"></i>8.5%</span>
                            </h4>
                        </div>
                        <div class="align-self-center text-center">
                            <i class="ri-user-add-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card-header bg-success text-white">
        <h2 class="text-center">Order Management</h2>
    </div>

    <div class="container mt-4">
        <p style="color: black; margin-bottom: 0">Total Unchecked Orders: {{ $totalUncheckedOrders }}</p>
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



<!-- footer End-->
</div>
<!-- index body end -->

@endsection