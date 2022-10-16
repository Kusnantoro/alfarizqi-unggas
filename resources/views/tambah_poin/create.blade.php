@extends('layouts.main')
@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Tambah Poin <span class="text-primary">Alfarizqi Unggas . .</span></h3>
                        <h6 class="font-weight-normal mb-0">Halaman Tambah Poin Pelanggan Alfarizqi Unggas</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white"><i
                                        class="mdi mdi-calendar"></i>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-end">
                <a href="/kelola"><button class="btn btn-danger">Kembali</button></a>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-3">Form Tambah Poin Pelanggan</h3>
                    <hr class="py-1">
                    <form method="post" action="/tambah" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="id_pelanggan">Nomor ID Pelanggan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('id_pelanggan') is-invalid @enderror"
                                    name="id_pelanggan" id="id_pelanggan" readonly value="{{ 'ARU-' . date('Ym') . '-' .$kode }}">
                                @error('id_pelanggan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="nama">Nama Pelanggan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="Nama Pelanggan .." required autofocus
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Nomor Handphone<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                        name="no_hp" id="no_hp" placeholder="No HP .." required
                                        value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                id="alamat" placeholder="Alamat .." required value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <h4 for="poin" class="text-center">Total Poin</h4>
                                    <input type="number"
                                        class="form-control text-center @error('poin') is-invalid @enderror" name="poin"
                                        id="poin" placeholder="Poin" value="{{ old('poin') }}"
                                        style="font-size: 2rem">
                                    @error('poin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button type="reset" class="btn btn-light mr-2">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
