@extends('Admin.index') <!-- Assuming you have a layout file -->

@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<style>
    .btn-edit,
    .btn-delete,
    .btn-primary {
        transition: transform 0.3s;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-edit:hover {
        transform: scale(1.1);
        color: white;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn-delete:hover {
        transform: scale(1.1);
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-primary:hover {
        transform: scale(1.1);
    }
</style>


    <div class="container-fluid">
        <!-- Index Body Start -->
        <div class="col-12">
            <div class="card o-hidden card-hover">
                <div class="card-header border-0 pb-1">
                    <div class="card-header-title p-0">
                        <h4>User Management</h4>
                    </div>
                </div>
                <div class="card-body p-0">                  
                    <div class="container mt-4">
                        <form method="GET" action="{{ route('user_search') }}">
                            <input type="text" name="keyword" placeholder="Search by user name" value="{{ request('keyword') }}" class="form-control">
                            <button type="submit" class="btn btn-primary mt-2">Search</button>
                        </form>
                    </div>

                    <div class="container mt-4">
                        <p style="color: black; margin-bottom: 0">Total Users: {{ $totalusers }}</p>
                    </div>

                    <div class="container mt-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Usertype</th>
                                    <th>Status</th>
                                    <th>Orders</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>
                                        @if($user->usertype == 'admin')
                                        <span style="background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 4px; font-weight: bold;">
                                            {{$user->usertype}}
                                        </span>
                                        @else
                                        <span style="background-color: blue; color: white; padding: 5px 10px; border-radius: 4px; font-weight: bold;">
                                            {{$user->usertype}}
                                        </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($user->user_status == 1)
                                        <span style="color: green">
                                            <span class="material-symbols-outlined">check_box</span>
                                        </span>
                                        @else
                                        <span style="color: red">
                                            <span class="material-symbols-outlined">check_box_outline_blank</span>
                                        </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($user->orders()->count() > 0)
                                        <a href="{{url('admin/dashboard')}}" class="btn btn-primary">View Orders</a>
                                        @else
                                        <span class="btn btn-primary" style="background-color: #dc3545 !important;">No Order</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit_user', $user->id) }}" class="btn btn-edit me-2">
                                                <span class="material-icons">edit</span>
                                            </a>
                                            @if($user->usertype != 'admin')
                                            <a href="{{ route('delete_user', $user->id) }}" class="btn btn-delete" onclick="return confirmation(event)">
                                                <span class="material-icons">delete</span>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
        <!-- Index Body End -->
    </div>
</div>


<!-- JavaScript Files -->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}" defer></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();
        const urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
            title: "Delete Confirmation",
            text: "Are you sure you want to delete this user?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>


@endsection