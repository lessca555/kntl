@extends('layout.pepek')
@section('dashboard')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Tambah Siswa</div>
                    <hr>
                    <form action="{{ route('store-siswa') }}" method="POST" id="add_name" name="add_name">
                        @csrf
                        <div class="form-group">
                            <label for="input-1">NISN</label>
                            <input type="text" class="form-control form-control-rounded" id="input-1"
                                placeholder="Enter Your Name" name="nisn">
                        </div>
                        <div class="form-group">
                            <label for="input-2">Nama Siswa</label>
                            <input type="text" class="form-control form-control-rounded" id="input-2"
                                placeholder="Enter Your Name" name="name">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas" class="form-control form-control-rounded">
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
                            <input type="radio" class="form-control-rounded" id="input-4" name="jk" value="P">
                            &nbsp; <label for="input-4">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label>Pelanggaran</label>
                            {{-- <select name="pelanggaran" class="form-control form-control-rounded">
                                <option value="-">- PILIH Pelanggaran-</option>
                                @foreach ($pelanggaran as $p)
                                    <option value="{{ $p->nomor }} - {{ $p->nama }}">{{ $p->nomor }} -
                                        {{ $p->nama }}</option>
                                @endforeach
                            </select> --}}
                            <table class="table table-bordered" id="dynamicTable">
                                <tr>
                                    <td>
                                        <select name="pelanggaran[]" class="form-control form-control-rounded name_list">
                                            <option value="-">- PILIH Pelanggaran-</option>
                                            @foreach ($pelanggaran as $p)
                                                <option value=" {{ $p->nomor }} - {{ $p->nama }}">
                                                    {{ $p->nomor }} -
                                                    {{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-rounded" name="point[]">
                                    </td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                            More</button></span></td>
                                </tr>
                            </table>
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
    <script type="text/javascript">
        var i = 0;

        $("#add").click(function() {

            ++i;

            $("#dynamicTable").append(
                '<tr><td><select name="pelanggaran[]" class="form-control form-control-rounded name_list"><option value="-">- PILIH Pelanggaran-</option> <?php $pelanggaran = App\Models\Pelanggaran::all(); foreach($pelanggaran as $p) {?> ($pelanggaran as $p)<option value="{{ $p->nomor }} - {{ $p->nama }}">{{ $p->nomor }} - {{ $p->nama }}</option> <?php } ?> </select></td><td><input type="number" class="form-control form-control-rounded" name="point[]"></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
            );
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
