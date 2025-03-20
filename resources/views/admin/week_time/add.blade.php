@extends('agent.agent_dashboard')
<!-- partial -->

@section('agent')
    <div class="page-content">

        @include('_message')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/week_time') }}">Week Time</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Week_Time</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Week_time</h6>

                        <form class="forms-sample" action="{{ url('admin/week_time/add') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        class="required">
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url('admin/week') }}" class="btn btn-secondary">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
