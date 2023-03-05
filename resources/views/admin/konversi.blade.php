@extends('layout.app')

@section('title', 'Konversi')
@extends('layout.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Konversi </h4>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a>Konversi</a></a></li>
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
                                        Tambah Data Bilangan Angka
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
                                            <th>Nominal</th>
                                            <th>Text</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bilangan as $bil)
                                            @php
                                                $dd = '%';
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ number_format($bil->angka, 0, ',', '.') }}</td>
                                                <td>{{ $bil->text }}</td>
                                                <td>

                                                    <a href="{{ url('admin/konversi/' . $bil->id . $dd . '/delete') }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="javascript: return confirm('Delete ?')"><i
                                                            class="fa-regular fa-trash-can"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th width="30">No</th>
                                            <th>Nominal</th>
                                            <th>Text</th>
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
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create New Bilangan Angka</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 ">
                                <form action="{{ url('admin/stringkonversi') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-11">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Angka </label>
                                                        <input type="number" name="angka" class="form-control " required>
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
