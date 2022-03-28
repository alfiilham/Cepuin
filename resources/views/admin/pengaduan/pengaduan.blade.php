@extends('layouts.layout')
@section('title','Pengaduan')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox ">
            <div class="ibox-title p-3">
                    <!-- <div class="d-inline">
                        <a href="/admin/inputan/item/create" class="btn btn-primary text-white"><i class="fa fa-plus"></i> Tambah Item</a>
                    </div> -->
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
                                <th>Nik</th>
                                <th>Categori</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Like</th>
                                <th>Dislike</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nik}}</td>
                                        <td>{{$d->dataCategori->nama}}</td>
                                        <td>{{$d->isi_laporan}}</td>
                                        <td><img src="{{url('image/pengaduan/'.$d->foto)}}" height="100" width="100"></td>
                                        <td>{{$d->status}}</td>
                                        <td>{{$d->like}}</td>
                                        <td>{{$d->dislike}}</td>
                                        <td class="action-width text-center">
                                            @if($d->status == "0")
                                            <form action="{{url('pengaduan/proses/'.$d->id)}}" method="post" class="d-inline">
                                                @csrf
                                                <button class="btn btn-primary text-white">Proses Pengaduan</button>
                                            </form>
                                            @endif
                                            @if($d->status == "proses")
                                            <form action="{{url('pengaduan/selesai/'.$d->id)}}" method="post" class="d-inline">
                                                @csrf
                                                <button class="btn btn-warning text-white">Selesaikan Pengaduan</button>
                                            </form>
                                            @endif
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