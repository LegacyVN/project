@extends('Admin.index') <!-- Assuming you have a layout file -->

@section('content')

<style>
    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>


<div class="container-fluid">
    <div class="col-12">
        <div class="card o-hidden card-hover">
            <div class="card-header border-0 pb-1">
                <div class="card-header-title p-0">
                    <h4>Edit User</h4>
                </div>
            </div>
            <div class="card-body p-0">
                @if(Session::has('msg'))
                <p class="alert alert-success">{{ session('msg') }}</p>
                @endif

                <div class="container mt-4">
                    <form method="POST" action="{{ route('update_user', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="usertype">User Type</label>
                            <select name="usertype" id="usertype" class="form-control" required onchange="confirmUserTypeChange(event)">
                                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="user_status" id="status" class="form-control" required>
                                <option value="1" {{ $user->user_status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $user->user_status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                        <br>
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let previousValue = document.querySelector('select[name="usertype"]').value; // Store the initial value

    function confirmUserTypeChange(ev) {
        const selectedValue = ev.target.value;

        if (selectedValue === 'admin') {
            // Show confirmation dialog
            swal({
                title: "Make User Admin Confirmation",
                text: "Are you sure you want to make this user an Admin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willConfirm) => {
                if (!willConfirm) {
                    // If user cancels, revert to the previous value
                    ev.target.value = previousValue; // Revert to previous value
                } else {
                    previousValue = selectedValue; // Update previous value
                }
            });
        } else {
            previousValue = selectedValue; // Update previous value if not changing to admin
        }
    }
</script>

@endsection