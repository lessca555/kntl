<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;
use Webpatser\Uuid\Uuid;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'user_uuid' => Uuid::generate(4),
            'nisn' => $row[0],
            'kelas' => $row[2],
            'name' => $row[1],
            'email' => $row[0] . '@smkn3sby.com',
            'password' => Hash::make('smkn3sby'),
            'jk' => $row[3],
            'alamat' => '',
            'tlpn' => '',
            'tempat' => '',
            'ttl' => '',
            // 'pelanggaran' => '-',
            'avatar' => '',
        ]);
    }
}
