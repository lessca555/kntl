<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use App\Models\PelanggaranSiswa;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function admin()
    {
        return view('admin');
    }
    public function logsis(Request $request)
    {
        $remember = $request->remember ? true : false;
        $credentials = $request->validate([
            'nisn' => 'required',
            'password' => 'required|min:8'
        ]);
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = User::find(auth()->id());
            if ($user->roles()->first()->name == 'siswa') {
                return redirect()->route('dashmin');
            } else {
                return redirect()->back()->with('gagal', 'Anda Bukan Siswa Disini');
            }
        }
        return redirect()->back()->with('error', 'NISN dan Password Salah!');
    }
    public function logmin(Request $request)
    {
        $remember = $request->ingat ? true : false;
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $admin = User::find(auth()->id());
            if ($admin->roles()->first()->name == 'superadmin') {
                return redirect()->route('dashmin');
            } else {
                return redirect()->back()->with('gagal', 'Anda Bukan Admin Disini');
            }
        }
        return redirect()->back()->with('error', 'E-Mail dan Password Salah!');
    }
    public function dashmin()
    {
        return view('partisi.dashmin', [
            'admin' => User::find(auth()->id()),
            'jumsis' => User::role('siswa')->count(),
            'langgar' => Pelanggaran::all()->count(),
            'kelas' => Kelas::all()->count(),
        ]);
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin-login')->with('logout', 'Anda Berhasil Logout');
    }
    public function profile()
    {
        // $cok = User::with('PelanggaranSiswa')->get();
        return view('partisi.profile', [
            'admin' => User::find(auth()->id()),
            // 'yauda' => User::where('user_uuid', $user_uuid)->get(),
            'pelsis' => PelanggaranSiswa::where('user_id', User::find(auth()->id()))->get()
        ]);
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'alamat' => 'required',
            'tempat' => 'required',
            'ttl' => 'required',
            'tlpn' => 'required',
            'password' => 'required|min:8|confirmed',
            'avatar' => 'nullable',
        ]);
        if ($request->avatar != " ") {
            $kin = $request->user()->update([
                'email' => $request->email,
                'alamat' =>  $request->alamat,
                'tlpn' => $request->tlpn,
                'tempat' => $request->tempat,
                'ttl' => $request->ttl,
                'password' => Hash::make($request->password),
                // 'avatar' => $filename,
            ]);
        } else {
            if ($request->file('avatar')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('avatar')->getClientOriginalName());
                $request->file('avatar')->move(public_path('avatar'), $filename);
            }
            $kin = $request->user()->update([
                'email' => $request->email,
                'alamat' =>  $request->alamat,
                'tlpn' => $request->tlpn,
                'tempat' => $request->tempat,
                'ttl' => $request->ttl,
                'password' => Hash::make($request->password),
                'avatar' => $filename,
            ]);
        }
        @dd('$request->user()');
        // return redirect()->back();
    }
}
