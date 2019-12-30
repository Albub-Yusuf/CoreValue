@extends('layouts.master')
@section('mainContent')
Welcome to Core Value Enterprise
<!-- Top Statistics -->
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                <h2 class="mb-1">User Registration</h2>
                <p><a href="#">New User</a></p>
                <div class="chartjs-wrapper">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini  mb-4">
            <div class="card-body">
                <h2 class="mb-1">Total User</h2>
                <p><a href="#">Total User</a></p>
                <div class="chartjs-wrapper">
                    <canvas id="dual-line"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                <h2 class="mb-1">Total Products</h2>
                <p><a href="{{route('product.index')}}">Products</a></p>
                <div class="chartjs-wrapper">
                    <canvas id="area-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                <h2 class="mb-1">Total Revenue</h2>
                <p>Total Revenue This Month</p>
                <div class="chartjs-wrapper">
                    <canvas id="line"></canvas>
                </div>
            </div>
        </div>
    </div>






</div>

    @push('library-js')
        <script src="{{asset('Backend/assets/js/chart.js')}}"></script>
    @endpush

@endsection