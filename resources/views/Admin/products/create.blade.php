@extends('Admin.index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Thêm Thông Tin Sản Phẩm</h5>
                            </div>
                            <form class="theme-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Tên sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="title" placeholder="Nhập tên sản phẩm" required>
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Mô tả sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Mô tả</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" placeholder="Nhập mô tả" required></textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Hình ảnh sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Hình ảnh</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="image" accept="image/*" required>
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Giá sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Giá</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="decimal" name="price" placeholder="Nhập giá" required>
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Danh mục sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Danh mục</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="category_id" required>
                                            <option value="" disabled selected>Chọn danh mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Số lượng sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Số lượng</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" name="quantity" placeholder="Nhập số lượng" required>
                                        @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Giá giảm (nếu có) -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Giá giảm</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" name="discount_price" placeholder="Nhập giá giảm (không bắt buộc)">
                                        @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Trạng thái sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="status" required>
                                            <option value="1">Còn hàng</option>
                                            <option value="0">Hết hàng</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nút thêm sản phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
