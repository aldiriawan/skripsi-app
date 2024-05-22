@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="my-3">Dosen</h4>
            <div class="btn-group mb-1">
                @php
                    $selectedProgramStudi = request('program_studi');
                    $buttonLabel = $selectedProgramStudi ? $selectedProgramStudi : 'Pilih Program Studi';
                @endphp
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $buttonLabel }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dosen?program_studi=Informatika">Informatika</a></li>
                    <li><a class="dropdown-item" href="/dosen?program_studi=Sistem%20Informasi">Sistem Informasi</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-12 mb-3">
            <form action="/dosen" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success')}}
        </div>
        @endif

        @if ($dosen->count())
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="/dosen?dosen_id={{ $d->id }}" class="detail-dosen text-decoration-none text-dark {{ request('dosen_id') == $d->id ? 'fw-bold' : '' }}">{{ $d->nama }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center fs-4">No Data Found.</p>
        @endif
    </div>

    <div class="col-md-8">
        @if ($selectedDosen)
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">{{ $selectedDosen->nama }}</h4>
                <!-- Grafik Batang -->
                <h4 class="mb-0 text-center">Kinerja Dosen Pertahun</h4>
                <canvas id="barChart" style="max-height: 300px;"></canvas>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Publikasi</h4>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Tahun
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">2021</a></li>
                            <li><a class="dropdown-item" href="#">2022</a></li>
                            <li><a class="dropdown-item" href="#">2023</a></li>
                            <li><a class="dropdown-item" href="#">2024</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <table class="table table-small table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center;">Jurnal Nasional</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $kategoriAkreditasi = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'];
                                @endphp
                                @foreach ($kategoriAkreditasi as $kategori)
                                    @php
                                        $jumlah = $jumlahAkreditasiPerKategori->firstWhere('akreditasi', $kategori);
                                    @endphp
                                    <tr>
                                        <td>{{ $kategori }}</td>
                                        <td>{{ $jumlah ? $jumlah->jumlah_akreditasi : 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <!-- Tabel Jurnal Internasional -->
                        <div class="table-responsive">
                            <table class="table table-small table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: center;">Internasional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi tabel Jurnal Internasional -->
                                    <tr>
                                        <td>S1</td>
                                        <td></td> <!-- Kolom kanan kosong -->
                                    </tr>
                                    <tr>
                                        <td>S2</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>S3</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>S4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>S5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>S6</td>
                                        <td></td>
                                    </tr>
                                    <!-- Tambahkan baris lain sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p><strong>Jurnal Internasional:</strong></p>
                            <p><strong>Jurnal Nasional:</strong></p>
                            <p><strong>Jumlah HKI:</strong></p>
                            <p><strong>Jumlah Paten:</strong></p>
                        </div>
                    </div>
                </div>
            </div>
                        
        <div class="col-md-12">
                <!-- List -->
                <h3>Penunjang</h3>
                <ul>
                    @foreach ($penunjang as $data)
                        <li>
                            <div class="d-flex align-items-center">
                                <!-- Indikator bulat -->
                                <div class="indicator @if($data->waktu_akhir > now()->addDays(7)) bg-success @elseif($data->waktu_akhir > now()->addDays(2)) bg-warning @else bg-danger @endif"></div>
                                <!-- Keterangan -->
                                <div>
                                    {{ $data->keterangan }} - {{ \Carbon\Carbon::parse($data->waktu_awal)->format('d M Y') }} - {{ \Carbon\Carbon::parse($data->waktu_akhir)->format('d M Y') }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            
        </div>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data dummy untuk grafik batang
            var labels = ['2021', '2022', '2023', '2024'];
            var data = [65, 59, 80, 81, 56, 55];

            // Mendapatkan konteks dari elemen canvas
            var ctx = document.getElementById('barChart').getContext('2d');

            // Membuat objek grafik batang
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // Label di sumbu x
                    datasets: [{
                        label: 'Kinerja Dosen per Tahun',
                        data: data, // Data untuk grafik batang
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang batang
                        borderColor: 'rgba(75, 192, 192, 1)', // Warna border batang
                        borderWidth: 1 // Lebar border batang
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true // Mulai sumbu y dari 0
                        }
                    }
                }
            });
        </script>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
