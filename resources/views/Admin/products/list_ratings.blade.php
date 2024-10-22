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
                <h4 class="text-center">Ratings Management</h4>
            </div>
            <div class="card-body">
                @if(Session::has('msg'))
                <p class="alert alert-success text-center">{{ session('msg') }}</p>
                @endif

                <div class="container mt-4">
                    <form method="GET" action="{{ route('product_ratings.search') }}" class="d-flex">
                        <input type="text" name="keyword" placeholder="Search ratings by product title" value="{{ request('keyword') }}" class="form-control me-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="text-center">
                            <tr>
                                <th>Rating ID</th>
                                <th>User ID</th>
                                <th>Rate Score</th>                                  
                                <th>Rating Commment</th>
                                <th>Product's Name</th>                                                              
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ratings as $rating)
                            <tr>
                                <td class="text-center">{{$rating->rate_id}}</td>
                                <td class="text-center">{{$rating->user->id}}</td>
                                <td class="text-center">{{ $rating->rate_score }}</td>
                                <td class="text-center">{{ $rating->rate_comment }}</td>
                                <td class="text-center">{{ $rating->product->title }}</td>                                                               
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">                            
                                        <form action="{{route('product_ratings.deleteRating', $rating->rate_id)}}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this rating?');" class="mx-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm mx-1" title="Delete Rating">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $ratings->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}            </div>
            
            </div>
        </div>
    </div>
</div>


@endsection