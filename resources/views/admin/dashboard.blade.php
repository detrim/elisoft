@extends('layout.app')

@section('title', 'Dashboard')
@extends('layout.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card bg-info text-black shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <h1 class="text-white ml-5 mt-5">Hi, Apa kabar</h1>
                                        <div class="ml-5 mt-5">
                                            <a href="" class="btn btn-danger btn-lg text-center ">
                                                Account
                                            </a>
                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="{{ asset('img/illustration-2.png') }}" width="400px">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div>
@endsection
