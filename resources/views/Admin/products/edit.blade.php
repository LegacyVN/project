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
                    <form method="POST" action="{{ route('products.update', $product->id) }}">
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

                        <!-- Giá giảm (nếu có) -->
                        <div class="form-group mb-3">
                            <label for="discount_price">Discount Price</label>
                            <div class="col-sm-9">
                                <select name="discount_price" class="form-control" id="discount_price">
                                    <option value="0.00" selected="selected">No Discount</option>
                                    @for($i = 0.05; $i <= 1.00; $i +=0.05)
                                        <option value="{{ number_format($i, 2) }}" {{ $product->discount_price == $i ? 'selected' : '' }}>
                                        {{ number_format($i * 100, 0) . "%" }}
                                        </option>
                                        @endfor
                                </select>
                                <input class="form-control mt-2" type="text" value="{{ old('discount_price', number_format($product->discount_price * 100, 0)) }}%" name="discount_price_display" placeholder="Discount Price (%)" readonly>
                                <!-- @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                        </div>



                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Instock</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Outstock</option>
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