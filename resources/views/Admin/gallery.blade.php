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

    i.fas:hover {
        color: #f0f0f0 !important;
    }
</style>

<div class="container-fluid mt-5">
    <div class="col-12">
        <div class="card shadow-lg border-0">
            <div class="card-header text-white">
                <h4 class="text-center">Gallery Management</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-4">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Image's Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($gallery))
                            @foreach($gallery as $photo)
                            <tr>
                                <td>{{ $photo->id}}</td>
                                <td class="text-center">
                                    <img src="{{ asset('gallery')}}/{{$photo->photo_name}}" alt="{{ $photo->photo_name }}" class="img-fluid" style="max-width: 100px;">
                                </td>
                                <td class="text-center">{{ $photo->photo_name }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <form action="{{route('gallery.deletePhoto', $photo->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');" class="mx-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm mx-1" title="Delete Photo">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan=4>No Image Available</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                @if (isset($gallery))
                <div class="mt-4 d-flex justify-content-center">
                    {{ $gallery->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                </div>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection