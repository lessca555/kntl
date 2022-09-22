@extends('layout.pepek')
@section('dashboard')
    <div class="row mt-3">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert" style="float: right">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tambah-pelanggaran') }}" class="btn btn-success card-title" style="float: right"><i
                            class="fa fa-plus"></i> Tambah
                        Pelanggaran</a>
                    <h5 class="card-title">DATA PELANGGARAN</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Pelanggaran</th>
                                    {{-- <th scope="col">Point Pelanggaran</th> --}}
                                    <th scope="col">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggar as $pel => $pela)
                                    <tr>
                                        <th scope="row">{{ $pel + $pelanggar->firstItem() }}</th>
                                        <td>{{ $pela->nomor }}</td>
                                        <td>{{ $pela->nama }}</td>
                                        {{-- <td>{{ $pela->point }}</td> --}}
                                        <td>
                                            <a href="/admin/pelanggaran/edit/{{ $pela->nama }}" class="btn btn-warning"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <a href="/admin/pelanggaran/hapus/{{ $pela->id }}" class="btn btn-danger"><i
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
