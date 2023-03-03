@extends('auth.main')
@section('title', 'Sign In')

@section('login')
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url('login') }}" class="h1"><b>Sign In</b></a>
        </div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ url('proseslogin') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email"name="email" class="form-control " required placeholder="Email anda">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" required placeholder="Password"
                        id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" onclick="myFunction()">
                            <label for="remember">
                                Show Password
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
                <p class="mb-1">
                    <a href="{{ url('reg') }}" class="text-center">Register a new membership</a>
                </p>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
