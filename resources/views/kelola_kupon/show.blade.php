@extends('layouts.main')
@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Portal Data Pelanggan <span class="text-primary">Alfarizqi Unggas .
                                .</span></h3>
                        <h6 class="font-weight-normal mb-0">Halaman Data Pelanggan Alfarizqi Unggas</h6>
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
            <div class="row col-12 mb-3 justify-content-end mt-2">
                <a href="/kelola"><button class="btn btn-danger">Kembali</button></a>
            </div>
        </div>
        <div class="container my-1">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card mb-3">
                        <div class="row no-gutters shadow">
                            <div class="col-md-7 card-body">
                                <h2 class="text-primary">{{ $pelanggan->nama }}</h2>
                                <h4 class="card-text">No Handphone : +62{{ $pelanggan->no_hp }}</h4>
                                <h4 class="card-text">Alamat : {{ $pelanggan->alamat }}</h4>
                                <h4 class="card-text mt-3"><small
                                        class="text-muted">{{ $pelanggan->created_at->format('d-F-Y') }}</small></h4>
                            </div>
                            <div class="col-auto card-body">
                                <h2 class="card-text">Total Poin : {{ $pelanggan->poin }}</h2>
                                <h4 class="card-text">Status Poin :
                                    @if ($pelanggan->status == 'TUKAR')
                                        <span class="badge bg-success text-white">SUDAH DI TUKAR</span>
                                    @elseif ($pelanggan->status == 'BELUM')
                                        <span class="badge bg-danger text-white">BELUM DI TUKAR</span>
                                    @else
                                        <span class="badge bg-warning text-white">PELANGGAN BARU</span>
                                    @endif
                                </h4>
                                <h4 class="card-text">Kirim Notifikasi ke Pelanggan :
                                    <a
                                        href="https://wa.me/+62{{ $pelanggan->no_hp }}?text=Yth.%20Pelanggan%20Alfarizqi%20Unggas%0ABerikut%20adalah%20data%20perolehan%20poin%20Anda%20%3A%0ANama%20%3A%20{{ $pelanggan->nama }}%0ANo%20HP%20%3A%200{{ $pelanggan->no_hp }}%0AAlamat%20%3A%20{{ $pelanggan->alamat }}%0ATotal%20Poin%20%3A%20{{ $pelanggan->poin }}%0AStatus%20%3A%20{{ $pelanggan->status == 'TUKAR' ? 'SUDAH DI TUKAR' : 'BELUM DI TUKAR' }}%0A%0ATerima%20kasih%20atas%20kepercayaan%20anda%20telah%20berbelanja%20di%20Alfarizqi%20Unggas.%0ATerus%20kumpulkan%20poin%20Anda%2C%20dan%20tukarkan%20dengan%20hadiah%20yang%20menarik." target="_blank"><img
                                            src="/images/wa.png" style="width: 40px; lay"></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
