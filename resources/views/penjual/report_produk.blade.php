@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-light bg-dark" text-align="center">Report Produk</div>
 
                <div class="card-body">
                    <div class="row mb-2">
                        @if (\Session::has('message'))
                            <div class="alert alert-success">
                                {!! \Session::get('message') !!}
                            </div>
                        @elseif(\Session::has('error'))
                            <div class="alert alert-danger">
                                {!! \Session::get('error') !!}
                            </div>
                        @endif
                    </div>
                    <div class="responsive">
                        <table class="table table-stripped table-bordered">
                            <thead>
                                <tr class="bg-dark text-light" text-align="center">
                                    <th>No</th>
                                    <th>Gambar Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($data_produk as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td text-align="center">
                                        <img class="img-fluid rounded shadow-sm"
                                            src="{{ asset('gambar/gambar_produk/'.$row->gambar_produk) }}"
                                            style="width: 90px; height:90px" alt="Gambar Produk">
                                    </td>
                                    <td>{{ $row->nama_produk }}</td>
                                    <td>{{ $row->stok }}</td>
                                    <td>{{ $row->deskripsi_produk }}</td>
                                    <td text-align="center">
                                        <a href="{{ url('/edit_produk/'.$row->id) }}" class="btn btn-sm btn-outline-info"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
Edit</a>
                                        <a href="{{ url('/hapus_produk/'.$row->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa-sharp fa-solid fa-trash-can"></i>Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
