@extends('layouts.main')
@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Kelola Poin Pelanggan <span class="text-primary">Alfarizqi Unggas .
                                .</span></h3>
                        <h6 class="font-weight-normal mb-0">Halaman Kelola Poin Pelanggan Alfarizqi Unggas</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end py-3">
            <div class="col-sm-5">
                <form action="/kelola">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari ..." name="search"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover bg-white">
                <thead class="thead-primary bg-primary text-white">
                    <tr>
                        <th class="text-center text-uppercase">Nama</th>
                        <th class="text-center text-uppercase">No HP</th>
                        <th class="text-center text-uppercase text-wrap">Alamat</th>
                        <th class="text-center text-uppercase">Total Poin</th>
                        <th class="text-center text-uppercase">Status</th>
                        <th class="text-center text-uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pelanggans->count())
                        @foreach ($pelanggans as $kelola)
                            <tr>
                                <td class="text-uppercase">{{ $kelola->nama }}</td>
                                <td>+62{{ $kelola->no_hp }}</td>
                                <td class="text-wrap">{{ $kelola->alamat }}</td>
                                <td class="text-center"><h3>{{ $kelola->poin }}</h3></td>
                                <td class="text-center">
                                    @if ($kelola->status == 'TUKAR')
                                        <span class="badge bg-success text-white">SUDAH DI TUKAR</span>
                                    @elseif ($kelola->status == 'BELUM')
                                        <span class="badge bg-danger text-white">BELUM DI TUKAR</span>
                                    @else
                                        <span class="badge bg-warning text-white">PELANGGAN BARU</span>
                                    @endif
                                
                                </td>
                                <td class="text-center">
                                    <a href="/kelola/{{ $kelola->id }}/edit"><span class="badge badge-success">Edit</span></a><span> | </span>
                                    <a href="/kelola/{{ $kelola->id }}"><span class="badge badge-primary">Preview</span></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-center fs-4">Tidak ada data poin pelanggan.</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex mt-3 justify-content-center">
        {{ $pelanggans->links() }}
    </div>
    </div>
@endsection
