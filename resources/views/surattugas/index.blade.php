@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="my-3">Data Surat Tugas</h2>
    <form action="/surattugas/import" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
            <input type="file" class="form-control-file" name="import_file">
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
    </form>
    <a href="/surattugas/create" class="btn btn-primary">Tambah Data Surat</a>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success')}}
</div>
@endif

@if ($surattugas->count())
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Waktu</th>
                <th scope="col">Jenis Surat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surattugas as $s)
            <tr>
                <td>{{ $s->nomor }}</td>
                <td>{{ $s->dosen->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d M Y') }}</td>
                <td>{{ $s->keterangan }}</td>
                <td>{{ \Carbon\Carbon::parse($s->waktu)->format('d M Y') }}</td>
                <td>{{ $s->jenis }}</td>
                <td>
                    <a href="/surattugas/{{ $s->nomor }}" class="btn btn-info mr-2"><i class="bi bi-eye-fill"></i></a>
                    <a href="/surattugas/{{ $s->nomor }}/edit" class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                    <form action="/surattugas/{{ $s->nomor }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Are you Sure?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p class="text-center fs-4">No Data Found.</p>
@endif


@endsection
