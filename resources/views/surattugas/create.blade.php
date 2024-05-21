@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Surat Tugas</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/surattugas" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nomor" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor"
                required autofocus value="{{ old('nomor') }}">
            @error('nomor')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dosen" class="form-label">Nama Dosen</label>
            <select class="form-select" name="dosen_id">
                @foreach ($dosens as $dosen)
                @if (old('dosen_id') == $dosen->id)
                <option value="{{ $dosen->id }}" selected>{{ $dosen->name }}</option>
                @else
                <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required
                value="{{ old('tanggal') }}">
            @error('tanggal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" required
                value="{{ old('keterangan') }}">
            @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="waktu" class="form-label">Deadline</label>
            <input type="date" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" required
                value="{{ old('waktu') }}">
            @error('waktu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bukti" class="form-label">Bukti</label>
            <input type="text" class="form-control @error('bukti') is-invalid @enderror" id="bukti" name="bukti" required
                value="{{ old('bukti') }}">
            @error('bukti')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Surat</label>
            <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                <option value="">Pilih Jenis Surat</option>
                <option value="penunjang" {{ old('jenis') == 'penunjang' ? 'selected' : '' }}>Penunjang</option>
                <option value="pengabdian" {{ old('jenis') == 'pengabdian' ? 'selected' : '' }}>Pengabdian</option>
                <option value="pengajaran" {{ old('jenis') == 'pengajaran' ? 'selected' : '' }}>Pengajaran</option>
                <option value="penelitian" {{ old('jenis') == 'penelitian' ? 'selected' : '' }}>Penelitian</option>
            </select>
            @error('jenis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah Surat Tugas</button>
    </form>
</div>

@endsection
