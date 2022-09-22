@extends('layout\pepek')
@section('dashboard')
    <div class="row mt-3">
        <div class="col-lg-4">
            <div class="card profile-card-2">
                <div class="card-img-block">
                    <img class="img-fluid" src="{{ asset('assets/images/download.png') }}" alt="Card image cap"
                        style="height:150px;">
                </div>
                <div class="card-body pt-5">
                    <img id="myImg"
                        src="@if ($admin->avatar == null) {{ asset('assets/images/yoda.png') }}
                    @else
                    {{ asset('avatar/' . $admin->avatar) }} @endif"
                        alt="profile-image" class="profile">
                    <div id="myModal" class="modal">

                        <!-- The Close Button -->
                        <span class="close" style="float: left;">&times;</span>

                        <!-- Modal Content (The Image) -->
                        <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                        <div id="caption"></div>
                    </div>
                    <h5 class="card-title">{{ $admin->name }}</h5>
                    <h3>{!! DNS2D::getBarcodeHtml('https://127.0.0.0.1/laporan/' . $admin->user_uuid, 'QRCODE', 10, 10) !!}</h3>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="icon-block">
                        <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
                        <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                        <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                    </div> --}}
                </div>

                {{-- <div class="card-body border-top border-light">
                    <div class="media align-items-center">
                        <div>
                            <img src="assets/images/timeline/html5.svg" class="skill-img" alt="skill img">
                        </div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>HTML5 <span class="float-right">65%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:65%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div><img src="assets/images/timeline/bootstrap-4.svg" class="skill-img" alt="skill img"></div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>Bootstrap 4 <span class="float-right">50%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div><img src="assets/images/timeline/angular-icon.svg" class="skill-img" alt="skill img"></div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>AngularJS <span class="float-right">70%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:70%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div><img src="assets/images/timeline/react.svg" class="skill-img" alt="skill img"></div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>React JS <span class="float-right">35%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:35%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}
            </div>

        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                                class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i
                                    class="icon-envelope-open"></i> <span class="hidden-xs">Messages</span></a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="profile">
                            <h5 class="mb-3">User Profile</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>NISN</h6>
                                    <p>{{ $admin->nisn }}</p>
                                    <h6>Nama</h6>
                                    <p>
                                        {{ $admin->name }}
                                    </p>
                                    <h6>Kelas</h6>
                                    <p>
                                        {{ $admin->kelas }}
                                    </p>
                                    <h6>Alamat</h6>
                                    <p>{{ $admin->alamat }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Tempat, Tanggal Lahir</h6>
                                    <p>
                                        @if ($admin->tempat != '')
                                            {{ $admin->tempat }} , {{ $admin->ttl }}
                                        @endif
                                    </p>
                                    <h6>No. Tlpn</h6>
                                    <p>{{ $admin->tlpn }}</p>
                                    <h6>Email</h6>
                                    <p>{{ $admin->email }}</p>
                                </div>
                                {{-- <div class="col-md-12">
                                    <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Recent
                                        Activity</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <tbody>

                                                @foreach ($pelsis as $p)
                                                    <tr>
                                                        <td>{{ $p->nama }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
                            </div>
                            <!--/row-->
                        </div>
                        {{-- <div class="tab-pane" id="messages">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a
                                                link to the latest summary report from the..
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">Yesterday</span> There has been
                                                a request on your account since that was..
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">9/10</span> Porttitor vitae
                                                ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt
                                                ullamcorper eros eget luctus.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the
                                                fix for tibulum tincidunt ullamcorper eros.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                        <div class="tab-pane" id="edit">
                            <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Mark">
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Jhonsan">
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="{{ $admin->email }}"
                                            name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Foto Profil</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="file" name="avatar">
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="url" value="">
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Alamat</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="{{ $admin->alamat }}"
                                            name="alamat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-3 col-form-label form-control-label">Tempat</label>
                                        <input class="form-control" type="text" value="{{ $admin->tempat }}"
                                            name="tempat">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 col-form-label form-control-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="ttl">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">NO. TELEPON</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" name="tlpn"
                                            value="{{ $admin->tlpn }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        </script>
    @endsection
