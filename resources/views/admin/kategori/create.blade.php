

@extends('layouts.template-admin')

@section('content')



<!-- Begin Page Content -->
<div class="container-fluid">

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
            <form action="{{Route('admin.kategori.saveadd')}}" method="POST" class="">
                @csrf
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control col-9 bg-light border-0 small" placeholder="Input Judul Buku...">
                    <!-- <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div> -->
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