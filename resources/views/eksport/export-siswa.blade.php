<table>
    <thead>
        <tr>
            {{-- <th>NO</th> --}}
            <th style="width:100px;text-align:center;">NISN</th>
            <th style="width:100px;text-align:center;">NAMA</th>
            <th style="width:100px;text-align:center;">KELAS</th>
            <th style="width:100px;text-align:center;">JENIS KELAMIN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $sis)
            <tr>
                {{-- <td>{{ $sis->id }}</td> --}}
                <td style="width:100px;text-align:center;">{{ $sis->nisn }}</td>
                <td style="width:100px;text-align:center;">{{ $sis->name }}</td>
                <td style="width:100px;text-align:center;">{{ $sis->kelas }}</td>
                <td style="width:100px;text-align:center;">{{ $sis->jk }}</td>
                {{-- <td style="width:auto;text-align:center;">{!! DNS2D::getBarcodeHtml('https://127.0.0.0.1/laporan/' . $sis->user_uuid, 'QRCODE', 5, 5) !!}</td> --}}

            </tr>
        @endforeach
    </tbody>
</table>
