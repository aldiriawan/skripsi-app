@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Dosen</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dosen" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                required autofocus value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required
                value="{{ old('nik') }}">
            @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required
                value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" required
                value="{{ old('telepon') }}">
            @error('telepon')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="program_studi" class="form-label">Program Studi</label>
            <input type="text" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" required
                value="{{ old('program_studi') }}">
            @error('program_studi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data Dosen</button>
    </form>
</div>

@endsection
