@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 mx-auto col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Masked Input</strong> <small> Small Text Mask</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="/tutor-baruu" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Bergabung</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                                        <input class="form-control" type="date" name="tanggal" id="tanggal">
                                </div>                                            
                            </div>
                            <div class="form-group">
                                    <label class=" form-control-label">Nama Lengkap</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-graduation-cap"></i></div>
                                        <input class="form-control" type="text" name="namaLengkap">
                                    </div>                                            
                                </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary btnTambah"><i class="fas fa-save"></i>&nbsp; Simpan</button>
                            </div>
                            
                        </form>
                            @if (Session::has('status'))
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-1 sembunyi mt-3">
                                {{ Session::get('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Kelas -->
       
    </div>
@endsection