@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">
        @include('_message')

        <div class="row profile-body">

            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Push Notificaion</h6>

                            <form class="forms-sample" action="{{ url('admin/notification_send') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">UserName<span
                                            style="color: red;">*</span></label>
                                    <select class="form-control" name="user_id" id="">
                                        <option value="">Select User</option>
                                        @foreach ($agentUser as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }} {{ $value->username }}({{ $value->role }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Title<span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="Title" value=""
                                        name="title">
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Message<span
                                            style="color: red;">*</span></label>

                                    <textarea class="form-control" placeholder="Message" name="message"></textarea>
                                </div>




                                <button type="submit" class="btn btn-primary me-2">Send Notification</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>
@endsection
