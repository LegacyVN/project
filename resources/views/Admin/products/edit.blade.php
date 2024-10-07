@extends('Admin.index')
@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="card o-hidden card-hover">
            <div class="card-header border-0 pb-1">
                <div class="card-header-title p-0">
                    <h4>Edit Product</h4>
                </div>
            </div>
            <div class="card-body p-0">
                @if(Session::has('msg'))
                <p class="alert alert-success">{{ session('msg') }}</p>
                @endif

                <div class="container mt-4">
                    <form method="POST" action="{{ route('update_product', $product->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="text" name="image" id="image" value="{{ old('image', $product->image) }}" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="discount_price">Discount Price</label>
                            <input type="text" name="discount_price" id="discount_price" value="{{ old('discount_price', $product->discount_price) }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <br>
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection