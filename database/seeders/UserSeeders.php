<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Webpatser\Uuid\Uuid;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'siswa']);

        $dahlah = User::create([
            'user_uuid' => Uuid::generate(4),
            'nisn' => '-',
            'kelas' => '0',
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'jk' => 'L',
            'alamat' => '',
            'tlpn' => '',
            'tempat' => '',
            'ttl' => '',
            // 'pelanggaran' => '0',
            'avatar' => 'yoda.png'
        ]);
        $dahlah->assignRole('superadmin');
    }
}
