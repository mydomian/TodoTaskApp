<!DOCTYPE html>
<html>
<head>
    @push('title')
        Employee Login
    @endpush
    @include('layouts.head')
</head>
<body class="hold-transition login-page">
    <div class="login-box animate__animated animate__zoomIn">
        <div class="login-logo">
            <a href="#"><b>Employee Login</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('employee.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-8">
                            <a href="{{ route('employee.registration') }}" class="text-info">Do you have registration?</a>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-info btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.scripts')
</body>
</html>
