
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
        <div class="card-body">
            <form action="{{Route('admin.buku.saveedit', $dd->id)}}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Judul Buku</label>
                    <input type="text" name="nama" class="form-control col-9 bg-light border-0 small" placeholder="Input Judul Buku..." value="{{$dd->judul}}">
                    <!-- <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div> -->
                </div>
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Penerbit Buku</label>
                    <input type="text" name="penerbit" class="form-control col-9 bg-light border-0 small" placeholder="Input Penerbit Buku..." value="{{$dd->penerbit}}">
                </div>
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Harga Buku</label>
                    <input type="number" name="harga" class="form-control col-9 bg-light border-0 small" placeholder="Input Harga Buku..." value="{{$dd->harga}}">
                </div>
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Kategori Buku</label>
                    <div class="col-9 dropdown bootstrap-select form-control dropup" style="border:none;">
                        <select name="category" id="category" class="form-control" tabindex="-98" required>
                        <option selected value="" disabled>Pilih Category Buku</option>
                        @foreach($kategoris as $c)
                            <option value="{{$c->id}}" @if($dd->category_id == $c->id) selected @endif>{{$c->nama_kategori}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group row" style="margin-top:30px;">
                    <label for="gambar" class="form-label col-3" style="padding-top:0.375rem;">Photo Buku</label>
                    <input type="file" class="form-control-file col-9" id="gambar" name="gambar" required>
                </div>
                <div class="row" style="margin-top:40px;">
                    <button type="submit" class="btn btn-primary col-12">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection