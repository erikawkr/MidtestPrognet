
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
            <form action="{{Route('admin.penjualan.saveadd')}}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">User Costumer</label>
                    <div class="col-9 dropdown bootstrap-select form-control dropup" style="border:none;">
                        <select name="user_id" id="user_id" class="form-control" tabindex="-98" required>
                        <option selected value="" disabled>Input Costumer Buku</option>
                        @foreach($users as $u)
                            <option value="{{$u->id}}">{{$u->id}} - {{$u->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group row" style="margin-top:20px;">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Tanggal</label>
                    <div class="col-sm-9">
                    20{{date('y-m-d')}} <span id="clockDisplay"></span>
                    </div>
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

@section('scriptjs')
<script src="/js/clock.js"></script>

@endsection