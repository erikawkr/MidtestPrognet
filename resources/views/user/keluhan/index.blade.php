

@extends('layouts.template-user')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengajuan Keluhan</h1>


    <a href="{{route('keluhan.create')}}"><div class="btn btn-primary py-3 " style="margin-bottom:20px;">+ Add Data List Keluhan</div></a>
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
                            <th>Keluhan User</th>
                            <th>Respond Admin</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Keluhan User</th>
                            <th>Respond Admin</th>
                            <th>Tanggal</th>
                            <th>Action</th>


                        </tr>
                    </tfoot>
                    <tbody>
                        @if($keluhans->count() ==0)
                        <tr>
                            <td colspan="6" style="text-align:center;">Data keluhan tidak tercatat di database</td>
                        </tr>
                        @else
                        @foreach($keluhans as $dd)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{ substr($dd->keluhan_user, 0, 200)}}</td>
                            <td>
                            @if($dd->is_reply == 0)
                                Belum direspond
                            @else
                                {{$dd->respond_admin}}
                            @endif
                            </td>
                            <td>{{$dd->tanggal}}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- <a href="" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a> -->
                                    @if($dd->is_reply==0)
                                    <a href="{{Route('keluhan.edit', $dd->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fas fa-exclamation-triangle"></i></a>
                                    <div class="sweetalert">
                                        <form action="{{Route('keluhan.delete', $dd->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                                        </form>
                                    </div>
                                    @else
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fas fa-exclamation-triangle"></i></a>
                                    <div class="sweetalert">
                                        <form action="#">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Data keluhan tidak bisa dihapus')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                                        </form>
                                    </div>
                                    @endif
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