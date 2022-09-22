<?php

namespace App\Imports;

use App\Models\PelanggaranSiswa;
use App\Models\User;
use Webpatser\Uuid\Uuid;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new User([
    //         'user_uuid' => Uuid::generate(4),
    //         'nisn' => $row[0],
    //         'kelas' => $row[2],
    //         'name' => $row[1],
    //         'email' => $row[0] . '@smkn3sby.com',
    //         'password' => Hash::make('smkn3sby'),
    //         'jk' => $row[3],
    //         'alamat' => '',
    //         'tlpn' => '',
    //         'tempat' => '',
    //         'ttl' => '',
    //         // 'pelanggaran' => '-',
    //         'avatar' => '',
    //     ]);
    // }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $lolo = User::create([
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
                'pelanggaran' => '-',
                'avatar' => '',
            ]);
            $lolo->PelanggaranSiswa()->create([
                'user_uuid' =>  $lolo->user_uuid,
                'nama' => '',
            ]);
            $lolo->PointSiswa()->create([
                'user_uuid' =>  $lolo->user_uuid,
                'point' => '',
            ]);
            $lolo->assignRole('siswa');
        }
    }
}
