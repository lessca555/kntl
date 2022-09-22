@extends('layout.pepek')
@section('dashboard')
    <div class="card mt-3">
        <div class="card-content">
            <div class="row row-group m-0">
                <div class="col-12 col-lg-12 col-xl-12 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">Selamat Datang {{ $admin->name }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-content">
            <div class="row row-group m-0">
                @if ($admin->roles()->first()->name == 'superadmin')
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">Jumlah Siswa <span class="float-right"><i
                                        class="zmdi zmdi-accounts"></i></span>
                                <br>
                                <br>
                                {{ $jumsis }}
                            </h4>
                            {{-- <span class="float-right"><i class="fa fa-user"></i></span> --}}
                            {{-- <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">Jumlah Kelas <span class="float-right"><i
                                        class="zmdi zmdi-accounts"></i></span>
                                <br>
                                <br>
                                {{ $kelas }}
                            </h4>
                            {{-- <span class="float-right"><i class="fa fa-user"></i></span> --}}
                            {{-- <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">Pelanggaran <span class="float-right"><i
                                        class="zmdi zmdi-alert-triangle"></i></span>
                                <br>
                                <br>
                                {{ $langgar }}
                            </h4>
                            {{-- <span class="float-right"><i class="fa fa-user"></i></span> --}}
                            {{-- <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">{{ date('l,') }}<span class="float-right"><i
                                        class="fa fa-calendar"></i></span>
                                <br>

                                <br>
                                {{ date('d/M/Y') }}
                            </h4>
                            {{-- <span class="float-right"><i class="fa fa-user"></i></span> --}}
                            {{-- <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                        </div> --}}
                        </div>
                    </div>
                @else
                    <div class="col-12 col-lg-12 col-xl-12 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">{{ date('l,') }}<span class="float-right"><i
                                        class="fa fa-calendar"></i></span>
                                <br>

                                <br>
                                {{ date('d/M/Y') }}
                            </h4>
                            {{-- <span class="float-right"><i class="fa fa-user"></i></span> --}}
                            {{-- <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                        </div> --}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
