<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    public function create()
    {
        $cek = Point::count();
        if ($cek == 0) {
            $urut = 1001;
            $kode = $urut;
        } else {
            $get = Point::all()->last();
            $urut = (int)substr($get->id_pelanggan, 11) + 1;
            $kode = $urut;
        }

        return view('tambah_poin.create', compact('kode'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_pelanggan' => 'required|max:255',
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:100',
            'alamat' => 'required|max:255',
            'poin' => 'max:100',
        ]);

        Point::create($validateData);
        return redirect('/kelola')->with('success', 'Data Pelanggan Berhasil ditambahkan!');
    }
}
