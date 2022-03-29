@extends('layouts.layout')
@section('title','Create user')


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
        <form action="{{ url('user') }}" class="form-horizontal " method="post">
            @csrf
            @method('post')
          <div class="box-body">
            <div class="form-group row">
              <label for="id_member" class="col-sm-3 control-label"> Nama Petugas </label>
              <div class="col-sm-4">
                <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas" name="nama_petugas" value="{{ old('nama_petugas')}}">
                  @error('nama_petugas')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="id_member" class="col-sm-3 control-label"> No telepon</label>
              <div class="col-sm-4">
                <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp')}}">
                  @error('telp')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputEmail1" class="col-sm-3 control-label">Role</label>
              <div class="col-sm-4">
                <select name="role" id="" class="form-control mb-3" required>
                    <option selected style="display: none">----Pilih role-----</option>
                    <option value="admin">admin</option>
                    <option value="petugas">petugas</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputEmail1" class="col-sm-3 control-label">Role Unit</label>
              <div class="col-sm-4">
                <select name="roleUnit" id="" class="form-control mb-3" required>
                    <option selected style="display: none">----Pilih role Unit-----</option>
                    <option value="superAdmin">superAdmin</option>
                    <option value="verifikator">verifikator</option>
                    <option value="pelaksana">pelaksana</option>
                </select>
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
