@extends('layout.pepek')
@section('dashboard')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Edit Pelanggaran</div>
                    <hr>
                    @foreach ($pelanggar as $pel)
                        <form action="{{ route('update-pelanggaran') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="input-1">Nomor Pelanggaran</label>
                                <input type="hidden" value="{{ $pel->id }}" name="id">
                                <input type="text" class="form-control form-control-rounded" id="input-1"
                                    placeholder="Masukkan Nomor Pelanggaran" name="nomor" value="{{ $pel->nomor }}">
                            </div>
                            <div class="form-group">
                                <label for="input-6">Nama Pelanggaran</label>
                                <input type="text" class="form-control form-control-rounded" id="input-6"
                                    placeholder="Masukkan Nama Pelanggaran" name="nama" value="{{ $pel->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="input-2">Point</label>
                                <input type="number" class="form-control form-control-rounded" id="input-2"
                                    placeholder="Masukkan Point Pelanggaran" name="point" value="{{ $pel->point }}">
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
