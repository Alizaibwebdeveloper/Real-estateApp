@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">

        @include('_message')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update users</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Users</h6>

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
                                <label class="col-sm-3 col-form-label">Email<span style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" autocomplete="off"
                                        placeholder="Email" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Profile Image<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="photo" required>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Update</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
