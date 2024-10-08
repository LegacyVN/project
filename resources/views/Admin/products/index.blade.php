@extends('Admin.index')
@section('content')
<div class="container-fluid">
    <!-- Index Body Start -->
    <div class="col-12">
        <div class="card o-hidden card-hover">
            <div class="card-header border-0 pb-1">
                <div class="card-header-title p-0">
                    <h4>Products Management</h4>
                </div>
            </div>
            <div class="card-body p-0">
                @if(Session::has('msg'))
                <p class="alert alert-success">{{ session('msg') }}</p>
                @endif

                <div class="container mt-4">
                    <form method="GET" action="{{ route('products.search') }}">
                        <input type="text" name="keyword" placeholder="Search by product title" value="{{ request('keyword') }}" class="form-control">
                        <button type="submit" class="btn btn-primary mt-2">Search</button>
                    </form>
                </div>

                <div class="container mt-4">
                    <p style="color: black; margin-bottom: 0">Total Products: {{ $totalproducts }}</p>
                </div>

                <div class="container mt-4">
                    <table class="table">
                        <thead>
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
                                <td>{{ $product->title }}</td> <!-- Thay name bằng title -->
                                <td><img src="{{ asset('images/' . $product->image) }}" alt=""></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->cat_name }}</td> <!-- Quan hệ với bảng categories -->
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @if($product->status == true)
                                    <span style="color: green">
                                        <span class="material-symbols-outlined">In Stock</span>
                                    </span>
                                    @else
                                    <span style="color: red">
                                        <span class="material-symbols-outlined">Out Stock</span>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('products.edit', $product->id)  }}" class="btn btn-edit">
                                            <i class="fa-solid fa-pen-to-square fa-lg" style="color: #024dcf;"></i>
                                        </a>
                                        <form action="{{ route('products.delete', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" style="border: none; background: none;">
                                                <i class="fa-regular fa-trash-can" style="color: #eb0000;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
    <!-- Index Body End -->
</div>

@endsection