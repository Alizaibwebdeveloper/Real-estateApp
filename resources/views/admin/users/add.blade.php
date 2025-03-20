@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">

        @include('_message')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add users</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Users</h6>

                        <form class="forms-sample" action="{{ url('admin/users/add') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        class="required">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">UserName<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter UserName" name="username"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" autocomplete="off"
                                        placeholder="Email" required onblur="dublicateEmail(this)">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Phone<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" name="phone" class="form-control" placeholder="Mobile number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Role<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-control" id="">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="agent">Agent</option>
                                        <option value="user">Users</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Status<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control" id="">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                        autocomplete="off" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url('admin/users') }}" class="btn btn-secondary">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function dublicateEmail(element) {
            var email = $(element).val();
            $.ajax({
                url: "{{ url('check-email') }}",
                type: "POST",
                data: {
                    email: email,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    if (response.exists) {
                        alert('Email already exists');
                    } else {

                    }
                }
            })
        }
    </script>
@endsection
