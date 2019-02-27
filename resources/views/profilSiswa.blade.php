@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>
    .project-tab {
    padding: 10%;
    margin-top: -8%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>
<div class="animated fadeIn">
    <!-- Orders -->
    <div class="order">
        <div class="row ">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Profile Card</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="/images/admin.jpg" alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1">{{$profil->nama_panggilan}}</h5>
                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{$profil->asal_sekolah}}</div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            <a href="#"><span class="mr-3"><i class="fas fa-phone"></i></span>{{$profil->telepon_siswa}}</a>
                            <a href="#"><span class="ml-3 mr-3"><i class="fab fa-line"></i></span>{{$profil->id_line}}</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Administrasi</strong>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">ID Siswa</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class=""><strong>{{$profil->id_siswa}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">NO Kuitansi</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class=""><strong>{{$profil->kuitansi}}</strong></p>
                                    </div>
                                </div>                                
                        </div>
                </div>
                
            </div>

            <div class="col-lg-8">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Diri</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Data Pribadi</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Data Orangtua</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-rencana" role="tab" aria-controls="nav-rencana" aria-selected="false">Rencana Siswa</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="card">
                                            {{-- <div class="card-header">
                                                <strong>Basic Form</strong> Elements
                                            </div> --}}
                                            <div class="card-body card-block">
                                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label class=" form-control-label">Nama Lengkap</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <p class=""><strong>{{$profil->nama_lengkap}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label class=" form-control-label">Tempat Lahir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <p class=""><strong>{{$profil->tempat_lahir}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label class=" form-control-label">Tanggal Lahir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <p class=""><strong>{{$profil->tgl_lahir}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label class=" form-control-label">Jenis Kelamin</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <p class=""><strong>{{$profil->jenis_kelamin}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label class=" form-control-label">Agama</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <p class=""><strong>{{$profil->agama}}</strong></p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="card">
                                            {{-- <div class="card-header">
                                                <strong>Basic Form</strong> Kedua
                                            </div> --}}
                                            <div class="card-body card-block">
                                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Alamat Rumah</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->alamat}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->email}}</strong></p>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="card">
                                            {{-- <div class="card-header">
                                                <strong>Basic Form</strong> Elements
                                            </div> --}}
                                            <div class="card-body card-block">
                                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Nama Ayah</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->nama_ayah}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Nama Ibu</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->nama_ibu}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Pekerjaan Ayah</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->pekerjaan_ayah}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Pekerjaan Ibu</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->pekerjaan_ibu}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Telepon Rumah</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->telepon_rumah}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Telepon Orangtua</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->telepon_ortu}}</strong></p>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="nav-rencana" role="tabpanel" aria-labelledby="nav-contact-rencana">
                                    <div class="card">
                                            {{-- <div class="card-header">
                                                <strong>Basic Form</strong> Elements
                                            </div> --}}
                                            <div class="card-body card-block">
                                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Asal Sekolah</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->asal_sekolah}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Hari yang dipilih</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->jadwal}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Jam yang dipilih</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->jam	}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Rencana Setelah Lulus</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <p class=""><strong>{{$profil->rencana_lulus}}</strong></p>
                                                            </div>
                                                        </div>  
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                    </div>
                            </div>
                        </div>
                </div>
            
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
@endsection