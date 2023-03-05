@extends('layout.app')

@section('title', 'Daftar User')
@extends('layout.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Daftar User </h4>

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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">
                                    <a class="btn btn-danger btn-sm" href="#" role="button" data-toggle="modal"
                                        data-target="#metode-payment">
                                        Tambah Data User
                                    </a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="30">No</th>
                                            <th>Nama</th>
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th>Jam Login</th>
                                            <th>Jam Logout</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activity as $ac)
                                            @php
                                                $dd = '%';
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ac->name }}</td>
                                                <td>{{ $ac->level }}</td>
                                                <td>{{ $ac->email }}</td>
                                                <td>
                                                    @if ($ac->login == null)
                                                    @else
                                                        {{ date('d-m-Y H:i:s', strtotime($ac->login)) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($ac->logout == null)
                                                    @else
                                                        {{ date('d-m-Y H:i:s', strtotime($ac->logout)) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($ac->status == null)
                                                        <span class="text-info">New Member</span>
                                                    @elseif ($ac->status == 'Login')
                                                        <span class="text-success">{{ $ac->status }}</span>
                                                    @else
                                                        <span class="text-danger">{{ $ac->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($ac->status == 'Login')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="javascript: return confirm('Hapus rekening ?')"
                                                            disabled>
                                                            <i class="fa-regular fa-trash-can"></i>
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                onclick="javascript: return confirm('Hapus rekening ?')"
                                                                disabled>
                                                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                            </button>
                                                        @else
                                                            <a href="{{ url('admin/akun/' . $ac->email . $dd . '/delete') }}"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="javascript: return confirm('Delete all ?')"><i
                                                                    class="fa-regular fa-trash-can"></i></a>
                                                            <a href="{{ url('admin/akun/' . $ac->email . $dd . '/show') }}"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="fa-solid fa-magnifying-glass-plus"></i></a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th width="30">No</th>
                                            <th>Nama</th>
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th>Jam Login</th>
                                            <th>Jam Logout</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            {{-- modal --}}
            <div class="modal fade" id="metode-payment">
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
                                <form action="{{ url('admin/register') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-11">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama </label>
                                                        <input type="Text" name="name" class="form-control " required>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="email" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            required value="{{ old('email') }}">
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
                                                        <input type="password" class="form-control"
                                                            placeholder="Retype password" id="confirm-password"
                                                            onkeyup="cek()">
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
                                        <button type="submit" class="btn btn-primary" onclick="cekbtn()">Create</button>
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
