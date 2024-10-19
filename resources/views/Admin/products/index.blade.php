@extends('Admin.index')
@section('content')
<style>

    thead {
        background-color: #f5f5f5 !important;
    }
    

    .card-header {
        height: 70px; 
        background-color: #00a99d !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .table-hover tbody tr:hover {
        background-color: #f0f0f0; 
    }

    .btn i {
        vertical-align: middle;
    }

    i.fas:hover{
        color: #f0f0f0 !important;
    }
</style>

<div class="container-fluid mt-5">
    <div class="col-12">
        <div class="card shadow-lg border-0">
            <div class="card-header text-white">
                <h4 class="text-center">Products Management</h4>
            </div>
            <div class="card-body">
                @if(Session::has('msg'))
                <p class="alert alert-success text-center">{{ session('msg') }}</p>
                @endif

                <div class="container mt-4">
                    <form method="GET" action="{{ route('products.search') }}" class="d-flex">
                        <input type="text" name="keyword" placeholder="Search by product title" value="{{ request('keyword') }}" class="form-control me-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>

                <div class="container mt-4 text-center">
                    <p class="fw-bold" style="color: #333;">Total Products: {{ $totalproducts }}</p>
                </div>


                <div class="table-responsive mt-4">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="text-center">
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('products')}}/{{$product->image}}" alt="{{ $product->title }}" class="img-fluid" style="max-width: 100px;">
                                </td>
                                <td class="text-center">{{ $product->price }} $</td>
                                <td>{{ $product->category->cat_name }}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td class="text-center">
                                    @if($product->status == true)
                                    <span class="badge bg-success">In Stock</span>
                                    @else
                                    <span class="badge bg-danger">Out Stock</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">

                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary btn-sm mx-1" title="Edit Product">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('products.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" class="mx-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm mx-1" title="Delete Product">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('product_photos.create', $product->id) }}" class="btn btn-outline-warning btn-sm mx-1" title="Add Product Image">
                                            <i class="fas fa-plus-square"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection