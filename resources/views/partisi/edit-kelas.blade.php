@extends('layout.pepek')
@section('dashboard')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Edit Kelas Siswa</div>
                    <hr>
                    @foreach ($data as $kelas)
                        <form action="{{ route('update-kelas') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" value="{{ $kelas->id }}" name="id">
                                <label for="input-6">Nama Kelas</label>
                                <input type="text" class="form-control form-control-rounded" id="input-6"
                                    name="nama" value="{{ $kelas->nama }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i>
                                    Submit</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
