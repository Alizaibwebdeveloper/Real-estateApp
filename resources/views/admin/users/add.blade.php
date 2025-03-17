@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">
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

                        <form class="forms-sample" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter Name" class="required">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">UserName<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter UserName" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" autocomplete="off" placeholder="Email"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Phone<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="Mobile number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Role<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="" class="form-control" id="">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="agent">Agent</option>
                                        <option value="user">Users</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                        autocomplete="off" placeholder="Password" required>
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
