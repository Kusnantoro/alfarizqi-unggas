<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class KelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelola_kupon.index', [
            'pelanggans' => Point::latest()->filter(request(['search']))->paginate(6)
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $kelola)
    {
        return view('kelola_kupon.show', [
            'pelanggan' => $kelola
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $kelola)
    {
        return view('kelola_kupon.edit', [
            'pelanggan' => $kelola
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $kelola)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:100',
            'alamat' => 'required|max:255',
            'poin' => 'max:100',
            'status' => 'max:100',
        ]);

        Point::where('id', $kelola->id)
            ->update($validateData);
            
        return redirect('/kelola')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}
