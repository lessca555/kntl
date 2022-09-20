<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran_siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
