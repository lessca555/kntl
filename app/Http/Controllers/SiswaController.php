<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Webpatser\Uuid\Uuid;
use App\Models\PointSiswa;
use App\Models\Pelanggaran;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
// use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;

use App\Models\PelanggaranSiswa;
use Illuminate\Routing\Controller;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $siswa = User::all();
        return view('partisi.data-siswa', [
            'admin' => User::find(auth()->id()),
            'siswa' => User::role('siswa')->paginate(10),
            // 'qrcode' => QrCode::format('png')->size(100)->generate('https://127.0.0.0.1/laporan/' . 'siswa->uuid'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partisi.tambah-siswa', [
            'admin' => User::find(auth()->id()),
            'kelas' => Kelas::all(),
            'pelanggaran' => Pelanggaran::all()

            // 'siswa' => User::role('siswa')->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $halah = User::all();
        $tes = $request->validate([
            'nisn' => 'required',
            'name' => 'required',
            'kelas' => 'required',
            'jk' => 'required',
            'pelanggaran' => ['nullable', 'array'],
            'pelanggaran.*' => ['nullable', 'string'],
            'point' => ['nullable', 'array'],
            'point.*' => ['nullable', 'string'],
        ]);
        $hola = User::updateOrCreate(['nisn' => $request->nisn], [
            'user_uuid' => Uuid::generate(4),
            // 'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'name' => $request->name,
            'email' => $request->nisn . '@smkn3sby.com',
            'password' => Hash::make('smkn3sby'),
            'jk' => $request->jk,
            'alamat' => '',
            'tempat' => '',
            'ttl' => '',
            // 'pelanggaran' => $request->pelanggaran,
            'avatar' => '',
        ]);
        $hola->PelanggaranSiswa()->truncate();
        // $lohe = Pelanggaran::where('nama', $request->pelanggaran)->get();
        foreach ($request->pelanggaran as $ilmu) {
            $hola->PelanggaranSiswa()->create([
                'user_uuid'  => $hola->user_uuid,
                // 'nomor' => $lohe->nomor,
                'nama' => $ilmu,
                // 'point' => $lohe->point
            ]);
        }
        $hola->PointSiswa()->truncate();
        foreach ($request->point as $p) {
            $hola->PointSiswa()->create([
                'user_uuid' => $hola->user_uuid,
                'point' => $p
            ]);
        }
        // foreach ($lohe->point as $no) {P
        //     $hola->PelanggaranSiswa()->create([
        //         'point' => $no
        //     ]);
        // }
        $hola->assignRole('siswa');
        // @dd($hola);
        return redirect()->route('data-siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('partisi.edit-siswa', [
            'admin' => User::find(auth()->id()),
            'kelas' => Kelas::all(),
            'pelanggaran' => Pelanggaran::all(),
            'siswa' => User::where('id', $id)->get(),
            'pelsis' => PelanggaranSiswa::where('user_id', $id)->get(),
            'pointsis' => PointSiswa::where('user_id', $id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nisn' => 'required',
            'name' => 'required',
            'kelas' => 'required',
            'jk' => 'required',
            'pelanggaran' => ['nullable', 'array'],
            'pelanggaran.*' => ['nullable', 'string'],
        ]);
        $hola = User::updateOrCreate(['nisn' => $request->nisn], [
            'user_uuid' => Uuid::generate(4),
            // 'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'name' => $request->name,
            'email' => $request->nisn . '@smkn3sby.com',
            'password' => Hash::make('smkn3sby'),
            'jk' => $request->jk,
            'alamat' => '',
            'tempat' => '',
            'ttl' => '',
            // 'pelanggaran' => $request->pelanggaran,
            'avatar' => '',
        ]);
        // $hola->PelanggaranSiswa()->truncate();
        // $lohe = Pelanggaran::where('nama', $ilmu)->get();
        foreach ($request->pelanggaran as $ilmu) {
            $hola->PelanggaranSiswa()->create([
                // 'nomor' => $lohe->nomor,
                'nama' => $ilmu,
                // 'point' => $lohe->point,
            ]);
        }

        $hola->assignRole('siswa');
        // @dd($hola);
        return redirect()->route('data-siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }
    public function import_excel(Request $request)
    {
        // Excel::import(new SiswaImport, $request->file('fileexcel'));
        // return redirect()->back();
        // validasi
        $request->validate([
            'fileexcel' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('fileexcel');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);

        // import data
        Excel::import(new SiswaImport, public_path('/file_siswa/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('data-siswa');
    }
    public function view_import()
    {
        return view('partisi.import-siswa', [
            'admin' => User::find(auth()->id()),
        ]);
    }
}
