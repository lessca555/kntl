<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Pelanggaran;
use App\Models\PelanggaranSiswa;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_uuid',
        'nisn',
        'kelas',
        'name',
        'email',
        'password',
        'jk',
        'alamat',
        'tlpn',
        // 'tempat',
        // 'ttl',
        // 'pelanggaran',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }
    public function gambarqr()
    {
        return $this->hasMany(gambarqr::class);
    }
    public function pelanggaran_siswa()
    {
        return $this->hasMany(PelanggaranSiswa::class);
    }
}
