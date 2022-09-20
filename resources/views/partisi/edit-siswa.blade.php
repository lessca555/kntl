@extends('layout.pepek')
@section('dashboard')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Edit Siswa</div>
                    <hr>
                    @foreach ($siswa as $sis => $s)
                        <form action="{{ route('update-siswa') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="id" value="{{ $s->id }}" type="hidden">
                                <label for="input-1">NISN</label>
                                <input type="text" class="form-control form-control-rounded" id="input-1"
                                    placeholder="Enter Your Name" name="nisn" value="{{ $s->nisn }}">
                            </div>
                            <div class="form-group">
                                <label for="input-2">Nama Siswa</label>
                                <input type="text" class="form-control form-control-rounded" id="input-2"
                                    placeholder="Enter Your Name" name="name" value="{{ $s->name }}">
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" class="form-control form-control-rounded">
                                    <option value="{{ $s->kelas }}">{{ $s->kelas }}</option>
                                    <option value="">- PILIH KELAS-</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <br> <input type="radio" class="form-control-rounded" id="input-3" name="jk"
                                    value="L"> &nbsp;<label for="input-3">Laki-Laki</label>&nbsp;&nbsp;
                                <input type="radio" class="form-control-rounded" id="input-4" name="jk"
                                    value="P">
                                &nbsp; <label for="input-4">Perempuan</label>
                            </div>
                            <div class="form-group">
                                <label>Pelanggaran</label>
                                <select name="pelanggaran" class="form-control form-control-rounded">
                                    <option value="{{ $s->pelanggaran }}">
                                        @if ($s->pelanggaran == '-')
                                            Tidak Ada Pelanggaran
                                        @else
                                            {{ $s->pelanggaran }}
                                        @endif
                                    </option>
                                    <option value="-">- PILIH Pelanggaran-</option>
                                    @foreach ($pelanggaran as $p)
                                        <option value="{{ $p->nomor }} - {{ $p->nama }}">{{ $p->nomor }} -
                                            {{ $p->nama }}
                                        </option>
                                    @endforeach
                                </select>
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
