@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    @if(Auth::user()->level == 'admin')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        <h5>{{ $users }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="wrap">
                    <div class="card-header">
                        <h4>Total Category</h4>
                    </div>
                    <div class="card-body">
                        <h5>{{$categories}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="wrap">
                    <div class="card-header">
                        <h4>Total Produk</h4>
                    </div>
                    <div class="card-body">
                        <h5>{{$products}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif(Auth::user()->level == 'kasir')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="far fa-user"></i>
                </div>
                <div class="wrap">
                    <div class="card-header">
                        <h4>Data Transaksir</h4>
                    </div>
                    <div class="card-body">
                        <h5>nanti</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
    <div class="row">
        <div class="col-12">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg-parallax">
                    <div class="hero-inner">
                        <h2>Selamat Datang, {{Auth::user()->name }}!</h2>
                        <p class="lead">Hak Akses {{Auth::user()->level }} Telah diberikan kepada akun anda!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection