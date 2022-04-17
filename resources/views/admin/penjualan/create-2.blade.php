
@extends('layouts.template-admin')

@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">Berisi data-data untuk table master Buku, dengan menerapkan konsep CRUD.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Data</h6>
        </div>
        <form action="{{Route('admin.penjualan.saveadd_final', $dd->id)}}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="card-body">            
            <div class="input-group row mt-3">
                <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">User Costumer</label>
                <input type="text" name="tanggal" class="form-control col-9 bg-light border-0 small" placeholder="Input Harga Buku..." value="{{$dd->id}}" disabled>
            </div>
            <div class="input-group row" style="margin-top:20px;">
                <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Tanggal</label>
                <input type="text" name="tanggal" class="form-control col-9 bg-light border-0 small" placeholder="Input Harga Buku..." value="{{$dd->tanggal}}" disabled>
            </div>
            <div class="row" style="margin-top:40px; margin-bottom:40px;">
                <a href="{{Route('admin.detailpenjualan.create', $dd->id)}}" class="btn btn-primary col-12">+ Add Detail Penjualan</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Buku</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Id Buku</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($dd->detail_transaksi_penjualans->count() ==0)
                        <tr>
                            <td colspan="6" style="text-align:center;">Silahkan input data buku agar tercatat di detail transaksi penjualan!</td>
                        </tr>
                        @else
                        @foreach($dd->detail_transaksi_penjualans as $d)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$d->buku_id}}</td>
                            <td>{{$d->qty}}</td>
                            <td>{{$d->sub_total}}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- <a href="" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a> -->
                                    <!-- <a href="{{Route('admin.kategori.edit', $dd->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fas fa-exclamation-triangle"></i></a> -->
                                    <div class="sweetalert">
                                    <form action="{{Route('admin.detailpenjualan.delete', $d->id)}}" method="POST">
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
            <div class="row" style="margin-top:40px; margin-bottom:40px;">
                <button type="submit" class="btn btn-success col-12">Submit</button>
            </div>
        </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
