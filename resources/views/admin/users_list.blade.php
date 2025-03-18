@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">

        @include('_message')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users List</li>
            </ol>
        </nav>

        {{-- search box start --}}
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Search Users</h6>
                        <form action="" method="get">
                            @csrf
                            <div class="row">

                                <div class="col-sm-2">
                                    <div class="form-group mb-3">
                                        <label for="id">Id</label>
                                        <input type="text" class="form-control" id="id" name="id"
                                            value="{{ Request()->id }}" placeholder="Enter Id">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ Request()->name }}" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ Request()->username }}" placeholder="Enter username">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label for="username">Email Id</label>
                                        <input type="email" class="form-control" id="username" name="email"
                                            name="{{ Request()->email }}" placeholder="Enter email id">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label for="name">Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ Request()->phone }}" placeholder="Enter Phone">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" name="website"
                                            value="{{ Request()->website }}" placeholder="Enter webiste">
                                    </div>
                                </div>



                                <div class="col-sm-2">
                                    <div class="form-group mb-3">
                                        <label for="website">Role</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="agent">Agent</option>
                                            <option value="user">Users</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group mb-3">
                                        <label for="website">Status</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ url('admin/users') }}" class="btn btn-danger">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            {{-- search-box end --}}

            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">User List</h4>
                            <div class="d-flex align-item-center" style="float: right;">
                                <a href="{{ url('admin/users/add') }}" class="btn btn-primary">Add Users</a>
                            </div>
                        </div>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Phone</th>
                                        <th>Website</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Craeted at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-info text-dark">
                                        @foreach ($getRecord as $value)
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                @if ($value->photo)
                                                    <img src="{{ asset('upload/' . $value->photo) }}" alt="User Image"
                                                        style="width:100%; height:100%;">
                                                @endif
                                            </td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->website }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>
                                                @if ($value->role == 'admin')
                                                    <span class="badge bg-primary bg-info">Admin</span>
                                                @elseif ($value->role == 'agent')
                                                    <span class="badge bg-primary">Agent</span>
                                                @elseif ($value->role == 'user')
                                                    <span class="badge bg-primary bg-success">User</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value->status == 'active')
                                                    <span class="badge bg-primary">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/view/' . $value->id) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye icon-sm me-2">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3">
                                                        </circle>
                                                    </svg> <span class="">View</span></a>

                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/edit/' . $value->id) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 icon-sm me-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg> <span class="">Edit</span></a>

                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/delete/' . $value->id) }}"
                                                    onclick="confirm('Are you sure you want to delete this users?')"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash icon-sm me-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg> <span class="">Delete</span></a>
                                            </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>

                            <div style="padding: 20px; float:right;">
                                {{ $getRecord->links() }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
