@extends('layouts.main')
@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    @auth
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome back, <span class="text-primary">{{ auth()->user()->name }}</span></h3>
                        <h6 class="font-weight-normal mb-0">Halaman Kelola Poin Alfarizqi Unggas</h6>
                    </div>
                    @endauth
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white"><i class="mdi mdi-calendar"></i>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="images/analytics.svg" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>29<sup>C</sup></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <a href="/daftar-pengajuan" class="text-decoration-none text-white">
                                <div class="card-body">
                                    <p class="mb-4">Total Pelanggan</p>
                                    <p class="fs-30 mb-2">{{ $total }}</p>
                                    <p>Pelanggan</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <a href="/news" class="text-decoration-none text-white">
                                <div class="card-body">
                                    <p class="mb-4">Pelanggan Baru</p>
                                    <p class="fs-30 mb-2">{{ $baru }}</p>
                                    <p>Pelanggan</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <a href="/kritik-saran" class="text-decoration-none text-white">
                                <div class="card-body">
                                    <p class="mb-4">Belum Di Tukar</p>
                                    <p class="fs-30 mb-2">{{ $belum }}</p>
                                    <p>Pelanggan</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <a href="/home" class="text-decoration-none text-white">
                                <div class="card-body">
                                    <p class="mb-4">Sudah Di Tukar</p>
                                    <p class="fs-30 mb-2">{{ $tukar }}</p>
                                    <p>Pelanggan</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection