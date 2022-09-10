<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function create()
    {
        return view('tambah_poin.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:100',
            'alamat' => 'required|max:255',
            'poin' => 'max:100',
        ]);

        Point::create($validateData);
        return redirect('/kelola')->with('success', 'Data Pelanggan Berhasil ditambahkan!');
    }
}
