@extends('admin.index') <!-- Assuming you have a layout file -->

@section('content')

<style>
    .check-details-btn {
    background-color: #198754; 
    color: white;            
    padding: 8px 16px;        
    border-radius: 5px;      
    text-decoration: none;     
    display: inline-block;     
    transition: background-color 0.3s ease; 
}

.check-details-btn:hover {
    background-color: #145a32; 
    color: white;              
}
</style>

<div class="container-fluid">
    <div class="row">
        <!-- chart caard section start -->
        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 border-0  card-hover card o-hidden">
                <div class="custome-1-bg b-r-4 card-body">
                    <div class="media align-items-center static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Revenue</span>
                            <h4 class="mb-0 counter">$6659
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
                            <span class="m-0">Total Orders</span>
                            <h4 class="mb-0 counter">9856
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
                            <span class="m-0">Total Products</span>
                            <h4 class="mb-0 counter">893
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
                            <span class="m-0">Total Customers</span>
                            <h4 class="mb-0 counter">4.6k
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


<div class="container-fluid">
    <footer class="footer">
        <div class="row">
            <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
            </div>
        </div>
    </footer>
</div>
<!-- footer End-->
</div>
<!-- index body end -->

@endsection