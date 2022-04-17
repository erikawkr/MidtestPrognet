

<?php

function rupiah ($angka) {
  $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
  return $hasil;
}
?>
@extends('layouts.template-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">Berisi data-data untuk table master Buku, dengan menerapkan konsep CRUD.</p>


    <a href="{{route('admin.buku.create')}}"><div class="btn btn-primary py-3 " style="margin-bottom:20px;">+ Add Data Buku</div></a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Record Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Stock</th>
                            <th>Action</th>


                        </tr>
                    </tfoot>
                    <tbody>
                        @if($bukus->count() ==0)
                        <tr>
                            <td colspan="6" style="text-align:center;">Data buku tidak tercatat di database</td>
                        </tr>
                        @else
                        @foreach($bukus as $buku)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$buku->judul}}</td>
                            <td>{{$buku->penerbit}}</td>
                            <td><?php echo rupiah($buku->harga) ?></td>
                            <td><img src="{{ URL::asset('asset/buku/'.$buku->gambar) }}"alt="{{ $buku->gambar }}" width="100px" height="auto"></td>
                            <td>{{$buku->category->nama_kategori}}</td>
                            <td>{{$buku->stock}}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- <a href="" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a> -->
                                    <a href="{{Route('admin.buku.edit', $buku->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fas fa-exclamation-triangle"></i></a>
                                    <div class="sweetalert">
                                    <form action="{{Route('admin.buku.delete', $buku->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                                    </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection