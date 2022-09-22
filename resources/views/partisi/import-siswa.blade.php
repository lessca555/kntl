@extends('layout.pepek')
@section('dashboard')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Tambah Siswa</div>
                    <hr>
                    <form action="{{ route('import-siswa') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>IMPORT EXCEL DATA SISWA</label>
                            <input type="file" name="fileexcel" class="form-control">
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
