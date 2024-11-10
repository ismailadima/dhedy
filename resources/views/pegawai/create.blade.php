@extends('layouts.dashboard.app')

@section('title', 'Tambah Data Pegawai')

@section('breadcrumb')
<x-dashboard.breadcrumb title="Pegawai" page="Pegawai" active="Tambah Pegawai" route="{{ route('pegawai.index') }}" />
@endsection

@section('content')
<div class="card card-height-100 table-responsive">
    <!-- cardheader -->
    <div class="card-header border-bottom-dashed align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Tambah Pegawai</h4>
    </div>
    <!-- end cardheader -->
    <div class="card-body">
        <form action="{{route('pegawai.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="namaInput" class="form-label">Nama Pegawai</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pegawai" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nipInput" class="form-label">NIP Pegawai</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP Pegawai" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nameInput" class="form-label">File 1</label>
                </div>
                <div class="col-lg-9">
                    <input type="file" class="form-control" id="file1" name="file1">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nameInput" class="form-label">File 2</label>
                </div>
                <div class="col-lg-9">
                    <input type="file" class="form-control" id="file2" name="file2">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nameInput" class="form-label">File 3</label>
                </div>
                <div class="col-lg-9">
                    <input type="file" class="form-control" id="file3" name="file3">
                </div>
            </div>
            <div class="text-end">
                <a type="button" class="btn btn-danger" href="{{route('pegawai.index')}}">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection