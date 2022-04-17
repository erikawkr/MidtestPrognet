

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
            <form action="{{Route('admin.detailpenjualan.saveadd', $id)}}" method="POST" class="">
                @csrf
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Id Buku</label>
                    <div class="col-9 dropdown bootstrap-select form-control dropup" style="border:none;">
                        <select name="buku_id" id="buku_id" class="form-control" tabindex="-98" required>
                        <option selected value="" disabled>Select Id Buku</option>
                        @foreach($bukus as $b)
                            <option value="{{$b->id}}">{{$b->id}} - {{$b->judul}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Qty Buku</label>
                    <input type="number" name="qty" class="form-control col-9 bg-light border-0 small" value=1 min="1">
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