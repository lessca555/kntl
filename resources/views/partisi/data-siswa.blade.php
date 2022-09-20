@extends('layout.pepek')
@section('dashboard')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert" style="float: right">
            {{ session('success') }}
        </div>
    @endif
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tambah-siswa') }}" class="btn btn-success card-title"
                        style="float: right;margin-left:10px;"><i class="fa fa-plus"></i> Tambah
                        Siswa</a>
                    <a href="" class="btn btn-success card-title" style="float: right;margin-left:10px;"><i
                            class="fa fa-upload"></i>
                        Upload
                        Siswa</a>
                    <a href="{{ route('export-siswa') }}" class="btn btn-success card-title" style="float: right"><i
                            class="fa fa-print"></i>
                        Export
                        Siswa</a>
                    <h5 class="card-title">DATA SISWA</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Kelas</th>
                                    {{-- <th scope="col">Alamat</th> --}}
                                    <th scope="col">QR CODE</th>
                                    <th scope="col">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $sis => $lo)
                                    <tr>
                                        <th scope="row">{{ $lo->nisn }}</th>
                                        <td>{{ $lo->name }}</td>
                                        <td>{{ $lo->kelas }}</td>
                                        {{-- <td>{{ $lo->alamat }}</td> --}}
                                        {{-- <td><img src="data:image/png;base64,' . {!! DNS1D::getBarcodePNGPath('https://127.0.0.0.1/laporan/' . $lo->user_uuid, 'QRCODE', 5, 5) !!}">
                                        </td> --}}
                                        <td>{!! DNS2D::getBarcodeHtml('https://127.0.0.0.1/laporan/' . $lo->user_uuid, 'QRCODE', 5, 5) !!}
                                        </td>
                                        <td>
                                            <a href="/admin/siswa/edit/{{ $lo->name }}" class="btn btn-warning"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <a href="/admin/siswa/delete/{{ $lo->id }}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
    <!--End Row-->
@endsection
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>
