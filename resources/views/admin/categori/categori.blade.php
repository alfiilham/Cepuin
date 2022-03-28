@extends('layouts.layout')
@section('title','Pengaduan')

@section('content')
@if(session()->has('message'))
     <script>swal("Terima kasih!", "Berhasil Disimpan!", "success");</script>
    @endif
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox ">
            <div class="ibox-title p-3">
                    <div class="d-inline">
                        <a href="{{url('categories/create')}}" class="btn btn-primary text-white"><i class="fa fa-plus"></i> Tambah Categori</a>
                    </div>
                    <form method="GET" action="{{ url('/admin/inputan/item') }}" class="form-inline justify-content-between">
                        <div class="form-group mt-3">
                            <select name="per_page" class="form-control" onchange="this.form.submit()">
                                <option value="5" {{ ($per_page == 5 ? "selected":"") }}>5</option>
                                <option value="10" {{ ($per_page == 10 ? "selected":"") }}>10</option>
                                <option value="15" {{ ($per_page == 15 ? "selected":"") }}>15</option>
                                <option value="20" {{ ($per_page == 20 ? "selected":"") }}>20</option>
                                <option value="50" {{ ($per_page == 50 ? "selected":"") }}>50</option>
                                <option value="100" {{ ($per_page == 100 ? "selected":"") }}>100</option>
                            </select>
                        </div>
                        <div class="input-group"> 
                            <input type="text" class="form-control" id="search_name" name="search_name" placeholder="Cari..." value="{{$search_name}}">
                            <button class="btn btn-info text-white"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="ibox-content">
                    <div class="table table-responsive">
                        <table class="table-striped table-bordered table-hover w-100 d-md-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th width="80%">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nama}}</td>
                                        <td class="action-width text-center">
                                            <a href=""><span class="btn btn-warning text-white"><i class="fa fa-pencil"></i></span></a>
                                            <form action="" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger text-white" onclick="return confirm('Apakah kamu yakin untuk menghapus Item ini?');"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                {{ $data->links() }}
                </div>
            </div>
        </div>
</div>
@endsection
@section('script')
@endsection