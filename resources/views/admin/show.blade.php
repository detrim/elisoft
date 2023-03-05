@extends('layout.app')

@section('title', 'Edit Akun')
@extends('layout.sidebar')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Detail Akun User </h4>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a>Member</a></a></li>
                            <li class="breadcrumb-item active">Data</li>
                        </ol>
                    </div>
                </div>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </section>
        @foreach ($activity as $ac)
            @php
                $email = (bool) $ac->email;
                $var_email = $ac->email;
                $var_name = $ac->name;
                $dd = '%';
            @endphp
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-right">
                                        <a type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#update{{ $email }}">
                                            <i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                        <a href=" {{ url('admin/user') }} " class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-rotate-left"></i> Back
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <!-- /.card-header -->
                            <!-- /.login-logo -->

                            <div class="card card-outline card-primary">
                                <div class="row justify-content-center">
                                    <div class="col-md-11">
                                        <div class="card-header text-center">
                                            <a href="{{ url('login') }}" class="h1"><b>Member</b></a>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Level</label>
                                                <div class="col-sm-10">
                                                    <p><b>:</b> {{ $ac->level }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <p><b>:</b> {{ $ac->name }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <p><b>:</b> {{ $ac->email }} </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <p><b>:</b> {{ $ac->password }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Login</label>
                                                <div class="col-sm-10">
                                                    <p><b>:</b>
                                                        @if ($ac->login == null)
                                                        @else
                                                            {{ date('d-m-Y H:i:s', strtotime($ac->login)) }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Logout</label>
                                                <div class="col-sm-10">
                                                    <p><b>:</b>
                                                        @if ($ac->logout == null)
                                                        @else
                                                            {{ date('d-m-Y H:i:s', strtotime($ac->logout)) }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <p><b>:</b>
                                                        @if ($ac->status == null)
                                                            <span class="text-info">New Member</span>
                                                        @elseif ($ac->status == 'Login')
                                                            <span class="text-success">{{ $ac->status }}</span>
                                                        @else
                                                            <span class="text-danger">{{ $ac->status }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
        @endforeach

        <!-- /.card -->
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    {{-- modal --}}
    <div class="modal fade" id="update{{ $email }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ">
                        <form action="{{ url('admin/register-update/' . $var_email . $dd . '/update') }}" method="post"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-11">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama </label>
                                                <input type="Text" name="name" class="form-control " required
                                                    value="{{ $var_name }}">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email </label>
                                                <input type="email" value="{{ $var_email }}"
                                                    class="form-control @error('email') is-invalid @enderror" required
                                                    value="{{ old('email') }}" disabled>
                                                @error('email')
                                                    <small class="text-danger ">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <input type="password" name="password" class="form-control" required
                                                    placeholder="Password" id="password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember" onclick="myFunction()">
                                                <label for="remember">
                                                    Show Password
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group mb-0">
                                                <input type="password" class="form-control" placeholder="Retype password"
                                                    id="confirm-password" onkeyup="cek()">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p id="message"></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class=" text-right mt-3">
                                <button type="submit" class="btn btn-primary" onclick="cekbtn()">Update</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- endmodal --}}
    <!-- /.container-fluid -->

    </section>
    </div>
@endsection
