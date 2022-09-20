<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        return view('eksport.export-siswa', [
            'siswa' => User::Role('siswa')->get()
        ]);
    }
}
