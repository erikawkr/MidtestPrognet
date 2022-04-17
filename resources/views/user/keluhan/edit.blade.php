

@extends('layouts.template-user')

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
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <form action="{{Route('keluhan.saveedit', $dd->id)}}" method="POST" class="">
                @csrf
                <div class="input-group row mt-3">
                    <label for="product rate" class="form-label col-3" style="padding-top:0.375rem;">Keluhan</label>
                    <textarea name="keluhan" class="form-control col-9 bg-light border-0 small" placeholder="Input Keluhan User..." rows="4">{{$dd->keluhan_user}}</textarea>
                    <!-- <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div> -->
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