@extends('agent.agent_dashboard')
<!-- partial -->

@section('agent')
    <div class="page-content">

        @include('_message')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Qr Code</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update QR Code</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update QRCode</h6>

                        <form class="forms-sample" action="{{ url('admin/qrcode/edit/' . $product->id) }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" placeholder="Enter title"
                                        class="required" value="{{ $product->title }}">
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Price<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="price" class="form-control" placeholder="Enter Price"
                                        class="required" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description<span
                                        style="color:red;">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="description" placeholder="Enter Description" class="form-control">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ url('admin/qrcode') }}" class="btn btn-secondary">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
