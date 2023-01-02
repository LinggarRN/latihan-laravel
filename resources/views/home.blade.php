@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <?php
                        $user_id = Auth::user()->id;
                        $role_id = Auth::user()->role_id;
 
                        $data = DB::table('users')
                            ->leftJoin('katalog_role', 'users.role_id', 'katalog_role.id')
                            ->select('katalog_role.deskripsi as role_user')
                            ->where('users.id', $user_id)
                            ->first();
                    ?>
                    {{ __('Anda berhasil login sebagai ') }} {{ $data->role_user }}
 
                    <hr>
 
                    @if($role_id == 1)
                    <!--JIKA ROLE USER PENJUAL-->
                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-success">Input Produk</div>
                                    
                                    <div class="card-body">
                                        <span class="text-success">Input produk anda di sini</span>
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-white btn-success"><i class="fa-sharp fa-solid fa-magnifying-glass"></i>Input</a>
                                    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-warning">Report Input Produk</div>
 
                                    <div class="card-body">
                                        <span class="text-warning">Lihat produk anda di sini</span>
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-white btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i>Report</a>
                                </div>
                            </div>
                        </div>
                    @elseif($role_id == 2)
                    <!--MENU UNTUK PEMBELI-->
                    <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-warning bg-primary">Input Produk</div>
 
                                    <div class="card-body">
                                        <span>pilih produk di sini</span>
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-warning btn-primary">Pilih</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-dark bg-danger">Report produk pilihan</div>
 
                                    <div class="card-body">
                                        <span>Lihat produk yang sudah dipilih</span>
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-dark btn-danger">Lihat</a>
                                </div>
                            </div>
                        </div>
                        @elseif($role_id == 3)
                    <!--MENU UNTUK ADMIN-->
                    <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-info">Produk yang sudah dibayar</div>
 
                                    <div class="card-body">
                                        <span>Lihat produk yang sudah dibayar</span>
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-white btn-info">Lihat</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-dark">Produk siap dikemas</div>
 
                                    <div class="card-body">
                                        <span>pilih produk yang siap dikemas</span>
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-white btn-dark">Pilih</a>
                                </div>
                            </div>
                        </div>
                        @elseif($role_id == 4)
                    <!--MENU UNTUK KURIR-->
                    <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-danger bg-dark">Produk sudah dikemas</div>
 
                                    <div class="card-body">
                                        <p class="text-danger">lihat produk yang sudah dikemas </p>
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-danger btn-dark">Lihat</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-warning bg-success">Produk siap kirim</div>
 
                                    <div class="card-body">
                                        <p class="text-warning">Pilih produk yang siap kirim</p>
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-warning btn-success">Pilih</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

