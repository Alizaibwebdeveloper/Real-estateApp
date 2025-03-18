@extends('admin.admin_dashboard')


@section('content')
    @include('_message')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header text-center bg-gradient-primary text-white py-4">
                    <h4 class="mb-0">Reset Your Password</h4>
                </div>
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('set_new_password/' . $token) }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-3">
                            <label for="password" class="fw-bold">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control border-0 shadow-sm" id="password"
                                    name="password" required placeholder="Enter new password">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                            </div>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="fw-bold">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control border-0 shadow-sm" id="password-confirm"
                                    name="password_confirmation" required placeholder="Confirm new password">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-lock-fill"></i></span>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold shadow-sm">Reset Password</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center bg-light py-3">
                    <a href="{{ url('admin/login') }}" class="text-decoration-none text-primary fw-bold">Back to Login</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 600px;
            margin: auto;
        }

        .shadow-lg {
            margin: auto;
            text-align: center;
            margin-top: 50px;
        }

        .bg-gradient-primary {
            background: linear-gradient(45deg, #007bff, #0056b3);
        }

        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            font-size: 16px;
        }

        .btn {
            border-radius: 10px;
            font-size: 16px;
        }

        .input-group-text {
            border-radius: 10px;
        }

        .text-primary:hover {
            text-decoration: underline;
        }
    </style>
@endsection
