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
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td>
                                        <select name="pelanggaran[]" class="form-control form-control-rounded name_list">
                                            <option value="">- PILIH Pelanggaran-</option>
                                            @foreach ($pelanggaran as $p)
                                                <option value="{{ $p->nomor }} - {{ $p->nama }}">
                                                    {{ $p->nomor }} -
                                                    {{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><button class="btn btn-success" type="button" id="add-transaksi">
                                            <span class="mdi mdi-plus-circle"></span></td>
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
@endsection
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add2').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row2' + i +
                '"><td><select name="pelanggaran[]" class="form-control form-control-rounded name_list"><option value="">-PILIH PELANGGARAN-</option><?php $keilmuan = App\Models\Pelanggaran::all(); foreach($keilmuan as $d ) {?><option value="{{ $d->nomor }} - {{ $d->nama }}">{{ $d->nomor }} - {{ $d->nama }}</option><?php }?></select></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove2">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove2', function() {
            var button_id = $(this).attr("id");
            $('#row2' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                url: "name.php",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>
