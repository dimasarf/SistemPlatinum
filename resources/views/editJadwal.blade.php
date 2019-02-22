@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 mx-auto col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Edit Jadwal
                    </div>
                    <div class="card-body card-block">
                        <form action="/jadwal-edit/{{$jadwal->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class=" form-control-label">Jam</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fas fa-clock"></i></div>
                                    <select class="custom-select option-jam" name="jam">
                                        <option value="{{$jadwal->jam}}" selected id="jam-selected">{{$jadwal->jam}}</option>
                                        <option value="17.00 - 18.30" >17.00 - 18.30</option>
                                        <option value="18.30 - 20.00">18.30 - 20.00</option>
                                        <option value="20.30 - 22.00">20.00 - 21.30</option>
                                    </select>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kelas</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-users"></i></div>
                                        <select class="custom-select option-kelas" name="kelas">
                                                @foreach($kelas as $kela)
                                                    @if($kela->id == $jadwal->idKelas)
                                                        <option value="{{$kela->id}}" selected>{{$kela->kelas}}</option>
                                                    @else
                                                        <option value="{{$kela->id}}">{{$kela->kelas}}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>                                            
                                </div>
                            <div class="form-group">
                                <label class=" form-control-label">Pelajaran</label>
                                    <div class="input-group">
                                        <div class="input-group-addon option-pelajaran"><i class="fas fa-book"></i></div>
                                        <select class="custom-select" name="pelajaran">
                                            <option value="" id="mapel-selected">Tes</option>
                                                @foreach($mapels as $mapel)
                                                    @if($mapel->id == $jadwal->idMapel)
                                                        <option value="{{$mapel->id}}" selected>{{$mapel->mapel}}</option>
                                                    @else
                                                        <option value="{{$mapel->id}}">{{$mapel->mapel}}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tutor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon option-tentor"><i class="fas fa-chalkboard-teacher"></i></div>
                                        <select class="custom-select" name="tentor">
                                            <option value="" id="tentor-selected">TES</option>
                                                @foreach($tentors as $tentor)
                                                    @if($tentor->id == $jadwal->idTentor)
                                                        <option value="{{$tentor->id}}" selected>{{$tentor->tentor}}</option>
                                                    @else
                                                        <option value="{{$tentor->id}}">{{$tentor->tentor}}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary btn-simpan-edit" id="" data-dismiss="modal" aria-label="Close"><i class="far fa-save"></i>&nbsp; Simpan</button>
                                </div>
                        </form>
                        @if (Session::has('status'))
							<div class="alert alert-success mt-1">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								{{ Session::get('status') }}
							</div>
						@endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Kelas -->
       
    </div>
@endsection