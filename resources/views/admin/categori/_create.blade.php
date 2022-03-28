@extends('layouts.layout')
@section('title','Create Categori')


@section('content')
<div class="col-lg-12 wrapper wrapper-content animated fadeInRight">
  <div class="ibox ">
    <div class="ibox-title">
      <h5>Tambah <small></small></h5>
    </div>
    <div class="ibox-content col-sm-12 white-bg ">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">  </h3>
        </div>
        <form action="{{ url('categories') }}" class="form-horizontal " method="post">
            @csrf
            @method('post')
          <div class="box-body">
            <div class="form-group row">
              <label for="id_member" class="col-sm-3 control-label"> Nama Categori </label>
              <div class="col-sm-4">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama')}}">
                  @error('nama')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3">
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn btn-info ">Submit</button>
              </div>
            <div class="col-md-3">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
@endsection
