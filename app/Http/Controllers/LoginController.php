<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pelanggaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
                return redirect()->route('dashboard');
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
}
