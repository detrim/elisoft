@extends('auth.main')
@section('title', 'Register')

@section('login')
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url('login') }}" class="h1"><b>Register</b></a>
        </div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ url('register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text"name="name" class="form-control " required placeholder="Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                        value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
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
                <div class="input-group mb-0">
                    <input type="password" class="form-control" placeholder="Retype password" id="confirm-password"
                        onkeyup="cek()">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p id="message"></p>
                <div class="row post clearfix">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" onclick="myFunction()">
                            <label for="remember">
                                Show Password
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4 ">
                        <button type="submit" class="btn btn-primary btn-block" onclick="cekbtn()">Register</button>
                    </div>
                </div>
                <div class="post cleafix">
                    <a href="{{ url('in') }}" class="text-center">I already have a membership</a>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
