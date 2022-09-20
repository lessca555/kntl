<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggaran;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePelanggaranRequest;
use App\Http\Requests\UpdatePelanggaranRequest;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partisi.data-pelanggaran', [
            'admin' => User::find(auth()->id()),
            'pelanggar' => Pelanggaran::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partisi.tambah-pelanggaran', [
            'admin' => User::find(auth()->id()),
            // 'pelanggar' => Pelanggaran::all()->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelanggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required',
            'nama' => 'required',
            'point' => 'required'
        ]);
        Pelanggaran::create([
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'point' => $request->point
        ]);
        return redirect()->route('pelanggaran-siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit($nama)
    {
        return view('partisi.edit-pelanggaran', [
            'admin' => User::find(auth()->id()),
            'pelanggar' => Pelanggaran::where('nama', $nama)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelanggaranRequest  $request
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggaran $pelanggaran)
    {
        $request->validate([
            'id' => 'required',
            'nomor' => 'required',
            'nama' => 'required',
            'point' => 'required'
        ]);
        Pelanggaran::where('id', $request->id)->update([
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'point' => $request->point
        ]);
        return redirect()->route('pelanggaran-siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggaran::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
}
