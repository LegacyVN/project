@extends('Admin.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Category Information</h5>
                            </div>

                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>

                            @if (session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>All Categories</h5>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Category Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="text-center">
                                        <td>{{ $category->cat_name }}</td>
                                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                        <td style="display: flex; justify-content: center; align-items: center;">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit btn-sm2"
                                                style="margin-right: 5px;">
                                                <i class="fa-solid fa-pen-to-square" style="color: #63E6BE;"></i>
                                            </a>

                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete"
                                                    style="background: none; border: none; cursor: pointer;">
                                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection