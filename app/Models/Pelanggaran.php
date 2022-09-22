<?php

namespace App\Models;

use App\Models\User;
use App\Models\PelanggaranSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    // public function PelanggaranSiswa()
    // {
    //     return $this->belongsToMany(PelanggaranSiswa::class);
    // }
}
