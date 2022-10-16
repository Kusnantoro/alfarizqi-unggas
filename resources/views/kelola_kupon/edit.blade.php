@extends('layouts.main')
@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Ubah Poin <span class="text-primary">Alfarizqi Unggas . .</span></h3>
                        <h6 class="font-weight-normal mb-0">Halaman Ubah Poin Pelanggan Alfarizqi Unggas</h6>
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
                    <h3 class="card-title text-center mb-3">Form Ubah Poin Pelanggan</h3>
                    <hr class="py-1">
                    <form method="POST" action="/kelola/{{ $pelanggan->id }}">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="id_pelanggan">Nomor ID Pelanggan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('id_pelanggan') is-invalid @enderror"
                                    name="id_pelanggan" id="id_pelanggan" readonly value="{{ old('id_pelanggan', $pelanggan->id_pelanggan) }}">
                                @error('id_pelanggan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="nama">Nama Pelanggan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="Nama Pelanggan .." required
                                    value="{{ old('nama', $pelanggan->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Nomor Handphone<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                        name="no_hp" id="no_hp" placeholder="No HP .." required
                                        value="{{ old('no_hp', $pelanggan->no_hp) }}">
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
                                id="alamat" placeholder="Alamat .." required
                                value="{{ old('alamat', $pelanggan->alamat) }}" onkeyup="sum()">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <h4 for="add_poin" class="text-center">Tambah Poin</h4>
                                    <input type="number"
                                        class="form-control text-center @error('add_poin') is-invalid @enderror"
                                        name="add_poin" id="add_poin" placeholder="Poin" value="{{ old('add_poin') }}"
                                        style="font-size: 2rem" onkeyup="sum();">
                                    @error('add_poin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <h4 for="tukar_poin" class="text-center">Tukar Poin</h4>
                                    <input type="number"
                                        class="form-control text-center @error('tukar_poin') is-invalid @enderror"
                                        name="tukar_poin" id="tukar_poin" placeholder="Poin"
                                        value="{{ old('tukar_poin') }}" style="font-size: 2rem" onkeyup="sum();">
                                    @error('tukar_poin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <h4 for="last_poin" class="text-center">Poin Saat Ini</h4>
                                    <input type="number"
                                        class="form-control text-center @error('last_poin') is-invalid @enderror"
                                        name="last_poin" id="last_poin"
                                        value="{{ old('last_poin', $pelanggan->poin == null ? '0' : $pelanggan->poin) }}"
                                        style="font-size: 2rem" onkeyup="sum();" readonly>
                                    @error('last_poin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-auto ml-3">
                                <label class=""></label>
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="TUKAR"
                                                value="TUKAR" {{ $pelanggan->status == 'TUKAR' ? 'checked' : '' }}>
                                            <label class="form-check-label text-white badge bg-success" onclick="cek()" for="TUKAR">
                                                Ditukar
                                            </label>
                                            <p class="fw-light text-wrap" id="check" style="color:red; width:15rem"><i>*Tidak dapat ditukar, poin anda kurang dari 30 Poin</i></p>
                                        </div>
                                    </div>
                                    <div class="col-auto ml-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="BELUM"
                                                value="BELUM" {{ $pelanggan->status == 'BELUM' ? 'checked' : '' }}>
                                            <label class="form-check-label text-white badge bg-danger" onclick="back()" for="BELUM">
                                                Belum
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="form-group">
                                    <h4 for="poin" class="text-center">Total Poin</h4>
                                    <input type="number"
                                        class="form-control text-center @error('poin') is-invalid @enderror"
                                        id="poin" placeholder="Total" name="poin" value="{{ old('poin', $pelanggan->poin == null ? '0' : $pelanggan->poin) }}"
                                        style="font-size: 2rem" readonly>
                                    @error('poin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="simpan" class="btn btn-primary mr-2">Simpan</button>
                        <button type="reset" class="btn btn-light mr-2">Batal</button>
                    </form>
                    <hr>
                    <div class="col-auto">
                        <h4 class="card-title"><u>Keterangan : </u></h4>
                        <h5>30 Poin = 1 Kg Gula Pasir</h5>
                        <h5>50 Poin = 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>100 Poin = 1 Kg Beras Premium + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>200 Poin = 1 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>300 Poin = 2 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>400 Poin = 3 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>500 Poin = 5 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>600 Poin = 6 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>700 Poin = 7 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>800 Poin = 9 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>900 Poin = 10 Kg Beras Premium + 1 Liter Minyak + 1 Kg Gula Pasir + 1 Pack Teh</h5>
                        <h5>1000 Poin = 1 Karung Beras Premium</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sum() {
            let add_point = document.getElementById('add_poin').value;
            let tukar_point = document.getElementById('tukar_poin').value;
            let last_point = document.getElementById('last_poin').value;
            let result1 = parseInt(add_point) + parseInt(last_point);
            let result2 = parseInt(last_point) - parseInt(tukar_point);
            if (!isNaN(result1)) {
                document.getElementById('poin').value = result1;
            } else if (!isNaN(result2)) {
                document.getElementById('poin').value = result2;
            }
        }

        $("#check").hide();
        cek = () => {
            var t_poin = document.getElementById('last_poin').value;
            if ( t_poin < 30) {
                $("#check").show();
                document.getElementById("TUKAR").disabled = true;
                document.getElementById("simpan").disabled = true;
            } else {
                $("#check").hide();
                document.getElementById("TUKAR").disabled = false;
            }
        }
        
        back = () => {
            $("#check").hide();
            document.getElementById("TUKAR").disabled = false;
            document.getElementById("simpan").disabled = false;
        }
    </script>
@endsection
