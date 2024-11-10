@extends('layouts.dashboard.app')

@section('title', 'Pegawai')

@section('breadcrumb')
<x-dashboard.breadcrumb title="Pegawai" page="Pegawai" active="Pegawai" route="{{ route('pegawai.index') }}" />
@endsection

@section('content')
<div class="card card-height-100 table-responsive">
    <!-- cardheader -->
    <div class="card-header border-bottom-dashed align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Daftar Pegawai</h4>
        <div class="flex-shrink-0">
            @can('pegawai_store')
            <a type="button" class="btn btn-soft-primary btn-sm" href="{{ route('pegawai.create') }}">
                <i class="ri-add-line"></i>
                Tambah Data
            </a>
            @endcan
        </div>
    </div>
    <!-- end cardheader -->
    <!-- Hoverable Rows -->
    <table class="table table-hover table-nowrap mb-0" id="pegawaiTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">NIP</th>
                <th scope="col">File 1</th>
                <th scope="col">File 2</th>
                <th scope="col">File 3</th>
                <th scope="col" class="col-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->nip }}</td>
                    <td>
                        @if(!is_null($value->file1))
                        <a href="{{ url('uploads/' . $value->file1) }}" target="_blank">{{ $value->file1 }}</a>
                        @else
                        Tidak Ada File
                        @endif
                    </td>
                    <td>
                        @if(!is_null($value->file2))
                        <a href="{{ url('uploads/' . $value->file2) }}" target="_blank">{{ $value->file2 }}</a>
                        @else
                        Tidak Ada File
                        @endif
                    <td>
                        @if(!is_null($value->file3))
                        <a href="{{ url('uploads/' . $value->file3) }}" target="_blank">{{ $value->file3 }}</a>
                        @else
                        Tidak Ada File
                        @endif
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pegawai.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus Data</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function (){
        $('#pegawaiTable').DataTable({
            "ordering": false
        })
    })
</script>
@endsection