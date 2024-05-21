@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-6">
        <!-- Bagian kiri atas: Grafik Pie dan Grafik Garis Lurus -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Grafik Pie</h4>
                <canvas id="pieChart" style="max-height: 300px;"></canvas>
            </div>
            <div class="col-md-12">
                <h4 class="my-3">Grafik Garis Lurus</h4>
                <svg height="100" width="100%">
                    <line x1="0" y1="50" x2="100%" y2="50" style="stroke:rgb(0,0,0);stroke-width:2" />
                </svg>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Bagian kanan: Grafik Batang dan List -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Grafik Batang</h4>
                <canvas id="barChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Grafik Pie 1</h4>
                <canvas id="pieChart1" style="max-height: 150px;"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Grafik Pie 2</h4>
                <canvas id="pieChart2" style="max-height: 150px;"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="my-3">List</h4>
                <ul>
                    <li>Data 1</li>
                    <li>Data 2</li>
                    <li>Data 3</li>
                    <!-- Tambahkan item list lainnya sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
