@extends('layout.app')

@section('title', 'dashboard')
@extends('layout.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Tambah data user manual</h4>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a>Create</a></li>
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
                                        Tambah Data User Manual
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
                                            <th>Rekening</th>
                                            <th>Nama Bank</th>
                                            <th>Nama Pemilik</th>
                                            <th>Status Rekening</th>
                                            <th>Icon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="text-center">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>

                                                <a type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#metode-payment-edit">
                                                    <i class="fa-regular fa-pen-to-square"></i></a>
                                                {{-- modal --}}
                                                <div class="modal fade" id="metode-payment-edit">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            {{-- model --}}
                                                            {{-- endmodel --}}
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                {{-- endmodal --}}
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm text-primary btn-warning mt-1"
                                                        onclick="javascript: return confirm('Hapus rekening ?')"> <i
                                                            class="fa-regular fa-trash-can"></i>
                                                        </a></button>
                                                </form>

                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th width="30">No</th>
                                            <th>Rekening</th>
                                            <th>Nama Bank</th>
                                            <th>Nama Pemilik</th>
                                            <th>Status Rekening</th>
                                            <th>Icon</th>
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
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Metode Payment</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 ">
                                <form action="{{ url('admin/metode-payment/create') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <img src="{{ asset('assets/img/default.jpg') }}"
                                                    class="img-thumbnail img-preview" width="250px">

                                            </div>
                                        </div>

                                        <div class="col-md-8">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nomor Rekening </label>
                                                        <input type="Text" name="rekening" class="form-control " required
                                                            placeholder="Nomor rekening " value="{{ old('rekening') }}">

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Pemilik </label>
                                                        <input type="text" name="nama_pemilik" class="form-control "
                                                            required placeholder="Nama pemilik"
                                                            value="{{ old('nama_pemilik') }}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Bank </label>
                                                        <input type="text" name="nama_bank" class="form-control "
                                                            required placeholder="Nama bank"
                                                            value="{{ old('nama_bank') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status Rekening</label>
                                                        <select class="custom-select rounded-0  select2"
                                                            name="status_rekening">
                                                            <option value="Active">Active</option>
                                                            <option value="Non Active">Non Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="exampleInputFile">Icon <small class="text-danger">*JPG,
                                                            PNG,
                                                            JPEG.</small></label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="icon" id="photos"
                                                                class="custom-file-input " required
                                                                onchange="previewImgCreate()">
                                                            <label class="custom-file-label">Pilih
                                                                Berkas</label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class=" text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Create</button>
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
