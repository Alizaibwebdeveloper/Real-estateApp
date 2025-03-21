@extends('agent.agent_dashboard')
<!-- partial -->

@section('agent')
    <div class="page-content">
        @include('_message')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">QR code</a></li>
                <li class="breadcrumb-item active" aria-current="page">QRcode List</li>
            </ol>


            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-lg-12 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">QRcode List</h4>
                                            <div class="d-flex align-item-center" style="float: right;">
                                                <a href="{{ url('admin/qrcode/add') }}" class="btn btn-primary">Add
                                                    QRcode</a>
                                            </div>
                                        </div>

                                        <div class="table-responsive pt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Title</th>
                                                        <th>Price</th>
                                                        <th>Product_code</th>
                                                        <th>Description</th>
                                                        <th>Craeted at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td>{{ $product->id }}</td>
                                                            <td>{{ $product->title }}</td>
                                                            <td>{{ $product->price }}</td>
                                                            <td>
                                                                {!! DNS2D::getBarcodeHTML("$product->product_code", 'QRCODE') !!}
                                                                Product:{{ $product->product_code }}
                                                            </td>
                                                            <td>{{ $product->description }}</td>
                                                            <td>{{ date('Y-m-d'), strtotime($product->created_at) }}</td>
                                                            <td>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ url('admin/qrcode/edit/' . $product->id) }}"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-edit-2 icon-sm me-2">
                                                                        <path
                                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                        </path>
                                                                    </svg> <span class="">Edit</span></a>

                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ url('admin/qrcode/delete/' . $product->id) }}"
                                                                    onclick="confirm('Are you sure you want to delete this QR Code?')"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
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
                                                {{-- {{ $getRecord->links() }} --}}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
