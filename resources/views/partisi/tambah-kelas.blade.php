@extends('layout.pepek')
@section('dashboard')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Tambah Kelas Siswa</div>
                    <hr>
                    <form action="{{ route('store-kelas') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="input-6">Nama Kelas</label>
                            <input type="text" class="form-control form-control-rounded" id="input-6"
                                placeholder="Enter Your Name" name="nama">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i>
                                Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
